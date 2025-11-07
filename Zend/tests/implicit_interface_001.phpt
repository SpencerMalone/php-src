--TEST--
Basic implicit interface declaration and structural matching
--FILE--
<?php

implicit interface Drawable {
    public function draw(): void;
}

class Circle {
    public function draw(): void {
        echo "Drawing circle\n";
    }
}

class Square {
    public function draw(): void {
        echo "Drawing square\n";
    }
}

class Triangle {
    // Missing draw method
}

$circle = new Circle();
$square = new Square();
$triangle = new Triangle();

var_dump($circle instanceof Drawable);
var_dump($square instanceof Drawable);
var_dump($triangle instanceof Drawable);

?>
--EXPECT--
bool(true)
bool(true)
bool(false)
