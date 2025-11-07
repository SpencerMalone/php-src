--TEST--
Implicit interface with class type return - covariance
--FILE--
<?php

class Animal {}
class Dog extends Animal {}
class Cat extends Animal {}

implicit interface AnimalFactory {
    public function create(): Animal;
}

class DogFactory {
    public function create(): Dog {
        return new Dog();
    }
}

class CatFactory {
    public function create(): Cat {
        return new Cat();
    }
}

$dogFactory = new DogFactory();
$catFactory = new CatFactory();

var_dump($dogFactory instanceof AnimalFactory);
var_dump($catFactory instanceof AnimalFactory);

?>
--EXPECT--
bool(true)
bool(true)
