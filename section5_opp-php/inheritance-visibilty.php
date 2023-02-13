<?php
class Hello {
    protected $lang; // Only accessible in the class 
    function __construct($lang) {
        $this->lang = $lang;
    }
    function greet() {
        if ( $this->lang == 'fr' ) return 'Bonjour';
        if ( $this->lang == 'es' ) return 'Hola';
        return 'Hello';
    }
}

$hi = new Hello('es');
echo $hi->greet()."\n";

// Inheritance
class Social extends Hello {
    function bye() {
	if ( $this->lang == 'fr' ) return 'Au revoir';
	if ( $this->lang == 'es' ) return 'Adios';
	return 'goodbye';
    }
}

$hi = new Social('es');
echo $hi->greet()."\n";
echo $hi->bye()."\n";
?>


<!-- Visibilty (Public, Private, Protected) -->

<?php
class MyClass
{
    public $pub = 'Public';
    protected $pro = 'Protected';
    private $priv = 'Private';

    function printHello()
    {
        echo $this->pub."\n";
        echo $this->pro."\n";
        echo $this->priv."\n";
    }
}

$obj = new MyClass();
echo $obj->pub."\n"; // Works
echo $obj->pro."\n"; // Fatal Error
echo $obj->priv."\n"; // Fatal Error
$obj->printHello(); // Shows Public, Protected and Private
?>

<?php
class MyClass2 extends MyClass
{

    function printHello()
    {
        echo $this->pub."\n";
        echo $this->pro."\n";
        echo $this->priv."\n"; // Undefined
    }
}

echo("--- MyClass2 ---\n");
$obj2 = new MyClass2();
echo $obj2->pub."\n"; // Works
$obj2->printHello(); // Shows Public, Protected, Undefined
?>