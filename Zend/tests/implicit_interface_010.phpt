--TEST--
ReflectionClass::isImplicitInterface() for implicit interfaces
--FILE--
<?php

implicit interface ImplicitInterface {
    public function foo(): void;
}

interface RegularInterface {
    public function bar(): void;
}

class RegularClass {
    public function baz(): void {}
}

$implicit = new ReflectionClass(ImplicitInterface::class);
$regular = new ReflectionClass(RegularInterface::class);
$class = new ReflectionClass(RegularClass::class);

echo "ImplicitInterface->isInterface(): ";
var_dump($implicit->isInterface());

echo "ImplicitInterface->isImplicitInterface(): ";
var_dump($implicit->isImplicitInterface());

echo "RegularInterface->isInterface(): ";
var_dump($regular->isInterface());

echo "RegularInterface->isImplicitInterface(): ";
var_dump($regular->isImplicitInterface());

echo "RegularClass->isInterface(): ";
var_dump($class->isInterface());

echo "RegularClass->isImplicitInterface(): ";
var_dump($class->isImplicitInterface());

?>
--EXPECT--
ImplicitInterface->isInterface(): bool(true)
ImplicitInterface->isImplicitInterface(): bool(true)
RegularInterface->isInterface(): bool(true)
RegularInterface->isImplicitInterface(): bool(false)
RegularClass->isInterface(): bool(false)
RegularClass->isImplicitInterface(): bool(false)
