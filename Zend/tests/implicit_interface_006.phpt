--TEST--
Implicit interface with method parameter compatibility
--FILE--
<?php

implicit interface Calculator {
    public function add(int $a, int $b): int;
}

class SimpleCalculator {
    public function add(int $a, int $b): int {
        return $a + $b;
    }
}

class IncompatibleCalculator {
    // Wrong number of required parameters
    public function add(int $a): int {
        return $a;
    }
}

$simple = new SimpleCalculator();
$incompatible = new IncompatibleCalculator();

var_dump($simple instanceof Calculator);
var_dump($incompatible instanceof Calculator);

?>
--EXPECT--
bool(true)
bool(false)
