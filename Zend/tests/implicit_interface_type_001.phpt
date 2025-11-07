--TEST--
Implicit interface with parameter type checking - compatible types
--FILE--
<?php

implicit interface Processor {
    public function process(string $data): void;
}

class StringProcessor {
    public function process(string $data): void {
        echo "Processing: $data\n";
    }
}

class WrongTypeProcessor {
    public function process(int $data): void {
        echo "Processing: $data\n";
    }
}

$string = new StringProcessor();
$wrong = new WrongTypeProcessor();

var_dump($string instanceof Processor);
var_dump($wrong instanceof Processor);

?>
--EXPECT--
bool(true)
bool(false)
