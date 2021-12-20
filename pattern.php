<?php

// Пример Шифрованного кода
$a= 'Moscow';
$b = '+711111121';
$c = 'Petr';
//_______________
$city= 'Moscow';
$mobile_phone = '+711111121';
$name = 'Petr';

// Пример Приватизации кода
abstract class Product
{
    private static  $priceConst = 300;
    abstract public function getprice();
}
class DigitalProduct extends Product
{
    public function getprice()
    {
        echo self::$priceConst . PHP_EOL;
    }
}
//_______________
abstract class Product
{
    protected static  $priceConst = 300;
    abstract public function getprice();
}
class DigitalProduct extends Product
{
    public function getprice()
    {
        echo self::$priceConst . PHP_EOL;
    }
}
// Пример Интерфейсная солянка
interface people {
    protected function run();
    protected function swim();
    protected function fight();
    protected function eat();
}