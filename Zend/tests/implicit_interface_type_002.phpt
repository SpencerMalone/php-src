--TEST--
Implicit interface with return type checking - compatible types
--FILE--
<?php

implicit interface Factory {
    public function create(): object;
}

class ObjectFactory {
    public function create(): object {
        return new stdClass();
    }
}

class StringFactory {
    public function create(): string {
        return "not an object";
    }
}

class NoReturnTypeFactory {
    public function create() {
        return new stdClass();
    }
}

$objectFactory = new ObjectFactory();
$stringFactory = new StringFactory();
$noTypeFactory = new NoReturnTypeFactory();

var_dump($objectFactory instanceof Factory);
var_dump($stringFactory instanceof Factory);
var_dump($noTypeFactory instanceof Factory);

?>
--EXPECT--
bool(true)
bool(false)
bool(false)
