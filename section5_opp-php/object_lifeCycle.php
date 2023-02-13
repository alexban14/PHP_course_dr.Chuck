<?php
class PartyAnimal {
    function __construct() {
       echo("Constructed\n");
    }
    function something() {
        echo("Something\n");
    }
    function __destruct() {
        echo("Destructed\n");
    }
}

echo("--One\n");
$x = new PartyAnimal();
echo("--Two\n");
$y = new PartyAnimal();
echo("--Three\n");
$x->something();
echo("--The End?\n");
?>

<!-- A class can have many instances -->
<!-- We can create lots of objects - the class is the template for the object. -->
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
?>