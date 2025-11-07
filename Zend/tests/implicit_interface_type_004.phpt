--TEST--
Implicit interface with nullable parameter types
--FILE--
<?php

implicit interface Renderer {
    public function render(?string $template): void;
}

class TemplateRenderer {
    public function render(?string $template): void {
        echo "Rendering\n";
    }
}

class NonNullableRenderer {
    public function render(string $template): void {
        echo "Rendering\n";
    }
}

$nullable = new TemplateRenderer();
$nonNullable = new NonNullableRenderer();

var_dump($nullable instanceof Renderer);
var_dump($nonNullable instanceof Renderer);

?>
--EXPECT--
bool(true)
bool(false)
