<!-- PHP functions -->

<!-- Built in functions -->
<?php
	echo strrev(" .dlrow olleH");
	echo str_repeat("Hip ", 2);
	echo strtoupper("hooray!"); 
	echo strlen("intro"); 
	echo "\n";
?>

<!-- Defining your own functions -->
<?php
	// defining a function
	function greet() {
		print "Hello\n";
	}
	
	greet(); // => a function call
?>

<!-- Functioins with arguments and return statments -->
<?php
	// can choose to accept optional arguments
	function howdy($lang='es') {
		if ( $lang == 'es' ) return "Hola";
		if ( $lang == 'fr' ) return "Bonjour";
		return "Hello";
	}
	
	print howdy() . " Glenn\n";
	print howdy('fr') . " Sally\n";
	// a function will take its arguments, do some computation, and return a value to be used as the value of the function call in the calling expression
?>

<!-- Call by value -->
<?php
	// The argument variable within the function is an “alias” to the actual variable.
	// the function does not change the value of the argument
	function double($alias) {
		$alias = $alias * 2;
		return $alias;
	}

	$val = 10;
	$dval = double($val);
	echo "Value = $val Doubled = $dval\n"; // => Value = 10 Doubled = 20
?>

<!-- Call by reference -->
<?php
	// calling a argument by reference "&$variable" changes the value of the argument
	function triple(&$realthing) {
		$realthing = $realthing * 3;
	}
	
	$val = 10;
	triple($val);
	echo "Triple = $val\n"; // => Triple = 30
?>
