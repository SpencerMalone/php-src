--TEST--
Implicit interface with hooked property type checking - exact type match
--FILE--
<?php

implicit interface Identifiable {
    public int $id { get; }
}

class User {
    public int $id {
        get => $this->id;
    }

    public function __construct(int $id) {
        $this->id = $id;
    }
}

class Product {
    public string $id { // Wrong type
        get => $this->id;
    }

    public function __construct(string $id) {
        $this->id = $id;
    }
}

class Item {
    public $id { // No type declaration
        get => $this->id;
    }

    public function __construct($id) {
        $this->id = $id;
    }
}

$user = new User(123);
$product = new Product("abc");
$item = new Item(123);

var_dump($user instanceof Identifiable);
var_dump($product instanceof Identifiable);
var_dump($item instanceof Identifiable);

?>
--EXPECT--
bool(true)
bool(false)
bool(false)
