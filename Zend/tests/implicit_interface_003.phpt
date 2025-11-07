--TEST--
Implicit interface cannot have non-public methods
--FILE--
<?php

implicit interface InvalidInterface {
    private function foo(): void;
}

?>
--EXPECTF--
Fatal error: Access type for interface method InvalidInterface::foo() must be public in %s on line %d
