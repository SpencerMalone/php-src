--TEST--
Implicit interface with class type parameters - contravariance
--FILE--
<?php

class Animal {}
class Dog extends Animal {}

implicit interface Handler {
    public function handle(Animal $animal): void;
}

class AnimalHandler {
    public function handle(Animal $animal): void {
        echo "Handling animal\n";
    }
}

class DogHandler {
    public function handle(Dog $dog): void {
        echo "Handling dog\n";
    }
}

$animalHandler = new AnimalHandler();
$dogHandler = new DogHandler();

var_dump($animalHandler instanceof Handler);
var_dump($dogHandler instanceof Handler);

?>
--EXPECT--
bool(true)
bool(false)
