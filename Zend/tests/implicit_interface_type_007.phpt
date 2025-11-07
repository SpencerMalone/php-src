--TEST--
Implicit interface with multiple parameters - type checking
--FILE--
<?php

implicit interface Calculator {
    public function calculate(int $a, int $b, string $operation): float;
}

class SimpleCalculator {
    public function calculate(int $a, int $b, string $operation): float {
        return match($operation) {
            'add' => (float)($a + $b),
            'subtract' => (float)($a - $b),
            default => 0.0
        };
    }
}

class WrongCalculator {
    // Second parameter has wrong type
    public function calculate(int $a, string $b, string $operation): float {
        return 0.0;
    }
}

$simple = new SimpleCalculator();
$wrong = new WrongCalculator();

var_dump($simple instanceof Calculator);
var_dump($wrong instanceof Calculator);

?>
--EXPECT--
bool(true)
bool(false)
