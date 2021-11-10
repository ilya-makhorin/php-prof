<?php
class Transport
{
    public $brand;
    public $model;
    public $speed;
    public function title($brand = null,$model = null,$speed = null)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->speed = $speed ;
        echo $brand.','.$model.','.$speed;
    }
}
class Car extends Transport
{
    public function show()
    {
        $car_1 = $this->title('BMW','X5',260);
        echo $car_1 . PHP_EOL;
    }
}
$car = new Car();
$car->show();