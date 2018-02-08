<?php

/**
 * clase car
 */
// class Car
// {
//   public $owner;
//
//   public function move()
//   {
//   echo "Moving <br>";
//   }
// }
//
// echo "Class Car <br>";
//
// $car = new Car();
//
// $car -> move();
//
// $car-> owner = 'Andres';
//
// echo "Owner: " . $car->owner;

class Car{

	//public
	private $owner;

	public function __construct($ownerName){
		$this->owner = $ownerName;
		echo 'Constructor';
		echo "<br>";
	}

	public function __destruct(){
		echo 'Destructor';
		echo "<br>";
	}

	public function move() {
		echo "moving";
		echo "<br>";
		echo "<br>";
	}

	public function getOwner(){
		return $this->owner;
	}

	public function setOwner($owner){
		$this->owner = $owner;
	}

}

echo 'Class car';
echo "<br>";

$car = new Car('Max');//instancia
$car2 = new Car('Max');
$car->move();


echo 'Owner car: '.$car->getOwner();
echo "<br>";
echo 'Owner car: '.$car2->getOwner();
echo "<br>";

 ?>
