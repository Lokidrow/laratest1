<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Test</title>
        <style>
            div {
                margin-bottom: 10px;
            }
            table {
                border-collapse: collapse;
            }
            table td {
                font-size: 13px;
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>
        <div>
            Загрузка файла CSV
        </div>
        <form action="/upload" method="post" enctype="multipart/form-data">
            @csrf
            {{ csrf_field() }}

            @method("post")
            <div>
                <input type="file" name="file"/>
            </div>
            <div>
                <button>Submit</button>
            </div>
        </form>
        <div>
            @if (count($rows) > 0)
            <table border="1">
                <thead>
                    <tr>
                        <th>
                            Код
                        </th>
                        <th>
                            Наименование
                        </th>
                        <th>
                            Уровень1
                        </th>
                        <th>
                            Уровень2
                        </th>
                        <th>
                            Уровень3
                        </th>
                        <th>
                            Цена
                        </th>
                        <th>
                            ЦенаСП
                        </th>
                        <th>
                            Количество
                        </th>
                        <th>
                            Поля свойств
                        </th>
                        <th>
                            Совместные покупки
                        </th>
                        <th>
                            Единица измерения
                        </th>
                        <th>
                            Картинка
                        </th>
                        <th>
                            Выводить на главной
                        </th>
                        <th>
                            Описание
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>
                            {{ $row->code }}
                        </td>
                        <td>
                            {{ $row->name }}
                        </td>
                        <td>
                            {{ $row->level1 }}
                        </td>
                        <td>
                            {{ $row->level2 }}
                        </td>
                        <td>
                            {{ $row->level3 }}
                        </td>
                        <td>
                            {{ $row->price }}
                        </td>
                        <td>
                            {{ $row->pricesp }}
                        </td>
                        <td>
                            {{ $row->amount }}
                        </td>
                        <td>
                            {{ $row->properties }}
                        </td>
                        <td>
                            {{ $row->purchases }}
                        </td>
                        <td>
                            {{ $row->unit }}
                        </td>
                        <td>
                            {{ $row->image }}
                        </td>
                        <td>
                            {{ $row->show_on_main }}
                        </td>
                        <td>
                            {{ $row->descr }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                Таблица пуста, данных не загружено
            @endif
        </div>
    </body>
</html>
