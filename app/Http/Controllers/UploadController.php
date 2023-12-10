<?php

namespace App\Http\Controllers;

use App\Models\Datarow;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UploadController extends Controller
{

    protected string $string = ''; // Строка значение для парсинга CSV

    public function index(): View
    {
        $rows = Datarow::all();

        return view('index', ['rows' => $rows]);
    }

    public function upload(Request $request): View
    {
        if (!$request->file('file')) {
            $message = 'Файл не выбран';
        } else
        {
            $mime = $request->file('file')
                ->getMimeType();
            if ($mime !== 'text/csv')
            {
                $message = 'Принимается только CSV файл';
            }
            else
            {
                $file = $request->file('file')
                    ->openFile();
                $line = 0;
                while (!$file->eof())
                {
                    $row = $file->fgets();
                    if ($line > 0)
                    {
                        $arr = $this->parseCSVString($row);
                        $obj = new Datarow();
                        $obj->code = $arr[0] ?? '';
                        $obj->name = $arr[1] ?? '';
                        $obj->level1 = $arr[2] ?? '';
                        $obj->level2 = $arr[3] ?? '';
                        $obj->level3 = $arr[4] ?? '';
                        $obj->price = $arr[5] ?? '';
                        $obj->pricesp = $arr[6] ?? '';
                        $obj->amount = $arr[7] ?? '';
                        $obj->properties = $arr[8] ?? '';
                        $obj->purchases = $arr[9] ?? '';
                        $obj->unit = $arr[10] ?? '';
                        $obj->image = $arr[11] ?? '';
                        $obj->show_on_main = $arr[12] ?? '';
                        $obj->descr = $arr[13] ?? '';
                        $obj->save();
                    }
                    $line++;
                }
                $message = 'Успешно сохранён';
            }
        }
        return view('upload', ['message' => $message]);
    }

    /**
     * Парсинг строки CSV файла
     * @param string $line
     * @return array
     */
    private function parseCSVString(string $line): array
    {
        $arr = []; // Массив значений столбцов
        $mark = 0; // Признак открытой кавычки
        $line = trim($line);
        for ($i = 0, $c = mb_strlen($line); $i < $c; $i++) {
            $s = mb_substr($line, $i, 1); // Текущий символ
            if ($i < $c - 1) {
                $next = mb_substr($line, $i + 1, 1); // Следующий символ
            } else {
                $next = '';
            }
            if ($s === '"' && $i < $c - 1) {
                if ($next === '"') { // 2 кавычки подряд означают одну кавычку
                    $i++;
                    $this->string .= '"';
                } elseif ($mark === 0) { // Режим открытой кавычки
                    $mark = 1;
                } else { // Режим без кавычки
                    $mark = 0;
                }
            } elseif ($s === '\\' && $i < $c - 1 && in_array($next, ['"', '\\', ';', ','])) { // Символ экранирования
                $this->string .= $next;
            } elseif (($s === ',' || $s === ';') && $mark === 0) { // В режиме без кавычек - символы разделители значений-столбцов
                $arr[] = $this->string;
                $this->string = '';
            } else { // Обычный символ просто добавляем к текущему строке-значению
                $this->string .= $s;
            }
        }
        if ($this->string && $mark === 0) { // конец строки означает конец строки-значения, но только если не открыты кавычки
            $arr[] = $this->string;
        }
        return $arr;
    }

}
