--TEST--
Implicit interface with optional parameters - compatibility
--FILE--
<?php

implicit interface Logger {
    public function log(string $message, int $level = 0): void;
}

class SimpleLogger {
    public function log(string $message, int $level = 0): void {
        echo "[$level] $message\n";
    }
}

class ExtendedLogger {
    // Adding more optional parameters is OK
    public function log(string $message, int $level = 0, string $context = ''): void {
        echo "[$level] $message ($context)\n";
    }
}

class RequiredLogger {
    // Making optional param required is NOT OK
    public function log(string $message, int $level): void {
        echo "[$level] $message\n";
    }
}

$simple = new SimpleLogger();
$extended = new ExtendedLogger();
$required = new RequiredLogger();

var_dump($simple instanceof Logger);
var_dump($extended instanceof Logger);
var_dump($required instanceof Logger);

?>
--EXPECT--
bool(true)
bool(true)
bool(false)
