--TEST--
ReflectionClass::implementsInterface with implicit interfaces
--FILE--
<?php

implicit interface StringRepresentable {
    public function toString(): string;
}

class MyClass {
    public function toString(): string {
        return "MyClass instance";
    }
}

class OtherClass {
    // No toString method
}

$reflection1 = new ReflectionClass(MyClass::class);
$reflection2 = new ReflectionClass(OtherClass::class);

var_dump($reflection1->implementsInterface(StringRepresentable::class));
var_dump($reflection2->implementsInterface(StringRepresentable::class));

?>
--EXPECT--
bool(true)
bool(false)
