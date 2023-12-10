<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datarow extends Model
{
    use HasFactory;

    protected $table = 'datatable';
    protected int $id;
    protected string $code;
    protected string $name;
    protected string $level1;
    protected string $level2;
    protected string $level3;
    protected string $price;
    protected string $pricesp;
    protected string $amount;
    protected string $properties;
    protected string $purchases;
    protected string $unit;
    protected string $image;
    protected string $show_on_main;
    protected string $descr;
    protected DateTime $created_at;
    protected DateTime $updated_at;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLevel1(): string
    {
        return $this->level1;
    }

    public function setLevel1(string $level1): void
    {
        $this->level1 = $level1;
    }

    public function getLevel2(): string
    {
        return $this->level2;
    }

    public function setLevel2(string $level2): void
    {
        $this->level2 = $level2;
    }

    public function getLevel3(): string
    {
        return $this->level3;
    }

    public function setLevel3(string $level3): void
    {
        $this->level3 = $level3;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function getPricesp(): string
    {
        return $this->pricesp;
    }

    public function setPricesp(string $pricesp): void
    {
        $this->pricesp = $pricesp;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    public function getProperties(): string
    {
        return $this->properties;
    }

    public function setProperties(string $properties): void
    {
        $this->properties = $properties;
    }

    public function getPurchases(): string
    {
        return $this->purchases;
    }

    public function setPurchases(string $purchases): void
    {
        $this->purchases = $purchases;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getShowOnMain(): string
    {
        return $this->show_on_main;
    }

    public function setShowOnMain(string $show_on_main): void
    {
        $this->show_on_main = $show_on_main;
    }

    public function getDescr(): string
    {
        return $this->descr;
    }

    public function setDescr(string $descr): void
    {
        $this->descr = $descr;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt($value): void
    {
        $this->created_at = $value;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($value): void
    {
        $this->updated_at = $value;
    }

}
