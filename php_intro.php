<!-- Variabels and constants -->

<?php
	$x = 'variable have dollar signs infront of them';
	
	// strings can span multiple lines
	echo "This is a simple string\n";
	echo "You can also have embedded new lines in
		strings this way as it is
		okay to do";

	echo "This will expand: \na new line";

	// in  "" stings values are expanded
	$expand = 12;
	echo "Variables do $expand\n";

	// you can also combine single quoted strings with double quoted strings
	echo 'Arnold once said: "I\'ll be back!"'

	// single quotes are very basic, they dont expand variables and don't break into new lines 
	echo 'Varibles do not $expand and strings don\'t break into: \n a new line either';

	// use SINGLE QUOTES whenever you can, so you don't expand variables by accident 
?>


/* Expressions => evaluate to a value (string, number, boolean, etc)
				=> often use operations and function calls
				=> can produce object like arrays
*/

<?php
	// String concatenation
	// the DOT operation aggresivley types value into strings
	$a = 'Hello ' . 'World!';
	echo $a . "\n";

	// Ternary operator
	$www = 123;
	$msg = $www > 100 ? 'Large' : 'Small' ;
	echo "First: $msg \n";
	// modulo operator
	$msg = ( $www % 2 ) ? 'Odd' : 'Even';
	echo "Second: $msg \n";
	
	// Side effect assignment - pure contractions
	echo "\n";
	$out = "Hello";
	$out = $out . " ";
	$out .= "World";
	$out .= "\n";
	$echo $out;

	/* Casting - PHP converts expression values silently and aggressively */
	$a = "100" + 36.23 + TRUE;
	echo "D: " . $d . "\n"; // => D: 137.23, PHP converts TRUE into 1, FASLE into invisible 0

	// Eqaulity operator (" == ") => converts the types of the two values that is checking
	// Identity oprator (" === ") => also checks the data type
?>

<?php
	// logical operators ( == ; != ; > ; < ; >= ; <= ; && || ! - not operator)

	// if else statement
	$ans = 42;
	if ( $ans == 42 ) {
		print "Hello World! \n";
	} else {
		print "Wrong answer\n";
	}

	// loop
	$fuel = 10;
	while ( $fuel > 1) {
		print "Vroom vroom \n";
		$fule = $fule - 1;
	}

	$count = 1;
	do {
		echo "Count times 5 is " . $count * 5;
		echo "\n";
	} while (++$count <= 5);

	// for loop => basically helps you construct a counted loop
	for ($count = 1; $count <= 6; $count ++) {
		echo "$count times 6 is " . $count * 6;
	}

	// You can break out of a loop using the "break statement";
	for ($count = 1; $count <= 600; count ++) {
		if ( $count == 5 ) break;
		echo "Count: $count\n";
	}

	// "continue statement" end the current itteration and jumps to the begining
	for ($count = 1; $count <= 10; count ++) {
		if ( $count % 5 == 0 ) continue;
		echo "Count: $count\n";
	}
	echo "Done\n";

	/* Ooutput:
		Count: 1
		Count: 3
		Count: 5
		Count: 7
		Done */
?>