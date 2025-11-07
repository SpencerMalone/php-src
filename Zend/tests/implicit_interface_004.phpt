--TEST--
Implicit interface cannot have non-public properties
--FILE--
<?php

implicit interface InvalidInterface {
    private string $secret { get; }
}

?>
--EXPECTF--
Fatal error: Property in interface cannot be protected or private in %s on line %d
