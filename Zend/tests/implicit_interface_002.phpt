--TEST--
Implicit interface with hooked properties
--FILE--
<?php

implicit interface Named {
    public string $name { get; }
}

class Person {
    public string $name {
        get => $this->name;
    }

    public function __construct(string $name) {
        $this->name = $name;
    }
}

class Animal {
    // No name property
}

$person = new Person("John");
$animal = new Animal();

var_dump($person instanceof Named);
var_dump($animal instanceof Named);

?>
--EXPECT--
bool(true)
bool(false)
