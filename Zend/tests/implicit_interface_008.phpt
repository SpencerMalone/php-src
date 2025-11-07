--TEST--
Implicit interface class must have public methods (not protected or private)
--FILE--
<?php

implicit interface Foo {
    public function bar(): void;
}

class WithPrivate {
    private function bar(): void {
        echo "Private\n";
    }
}

class WithProtected {
    protected function bar(): void {
        echo "Protected\n";
    }
}

class WithPublic {
    public function bar(): void {
        echo "Public\n";
    }
}

$private = new WithPrivate();
$protected = new WithProtected();
$public = new WithPublic();

var_dump($private instanceof Foo);
var_dump($protected instanceof Foo);
var_dump($public instanceof Foo);

?>
--EXPECT--
bool(false)
bool(false)
bool(true)
