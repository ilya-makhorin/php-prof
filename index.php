<?php
//1
abstract class Product
{
    protected static  $priceConst = 300;
    abstract public function getprice();
}
class DigitalProduct extends Product
{
    public function getprice()
    {
       echo self::$priceConst .PHP_EOL;
    }

}

class ItemProduct extends Product
{
    public function getprice()
    {
        echo self::$priceConst * 2 . PHP_EOL;

    }
}
class WeightProduct extends Product
{
    public function getquantity($quantity)
    {
        echo self::$priceConst * $quantity . PHP_EOL;
    }
    public function getprice()
    {
        $this -> getquantity(200);
    }
}


$DigitalProduct = new DigitalProduct();
$DigitalProduct->getprice();
$ItemProduct = new ItemProduct();
$ItemProduct->getprice();
$WeightProduct = new WeightProduct();
$WeightProduct->getprice();

//2
trait SingletonTrait {

    private static $instance;

    public static function getInstance() {
        if ( empty(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
}

class Singleton {
    use SingletonTrait;

    public function doAction() {
        echo 'I am a Singleton!';
    }
}

class AnotherSingleton {
    use SingletonTrait;

    public function doAction() {
        echo 'I am also a Singleton!';
    }
}

Singleton::getInstance()->doAction();
AnotherSingleton::getInstance()->doAction();

?>