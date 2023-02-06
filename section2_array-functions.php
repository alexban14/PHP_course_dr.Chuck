<!-- Array functions -->

<!-- Checking for a key in an array -->
<?php
	$za = array();
	// setting key value pairs to the array
	$za["name"] = "Chuck";
	$za["course"] = "WA4E";
	
	if (array_key_exists('course',$za) ) {
		echo("Course exists\n");
	} else {
		echo("Course does not exist\n");
	}

	echo isset($za['name']) ? "name is set\n" : "name is not set\n";
	echo isset($za['addr']) ? "addr is set\n" : "addr is not set\n";
?>

<!-- A more elegant way to check if a value is inside an array !! from PHP 7.0 onwards -->
<!-- Null coalescing operator -->
<?php
	$username = $_GET['user'] ?? 'nobody';
	// equivalent to
	$username = $_GET['user'] ? $_GET['user'] : 'nobody';

	// Coalescing chaining
	$username = $_GET['user'] ?? $_GET['user'] ?? 'nobody';


	$za = array();
	$za["name"] = "Chuck";
	$za["course"] = "WA4E";

	// PHP >= 7.0.0 only
	$name = $za['name'] ?? 'not found';
	$addr = $za['addr'] ?? 'not found';

	echo("Name=$name\n");
	echo("Addr=$addr\n");

	// PHP < 7.0.0 equivalent
	$name = isset($za['name']) ? $za['name'] : 'not found';
?>

<!-- Count array function -->
<?php
	$za = array();
	$za["name"] = "Chuck";
	$za["course"] = "WA4E";
	print "Count: " . count($za) . "\n";
	if (  is_array($za) ) {
		echo '$za Is an array' . "\n";
	} else {
		echo '$za Is not an array' . "\n";
	}
?>

<!-- Sort functions -->
<?php
	$za = array();
	$za["name"] = "Chuck";
	$za["course"] = "WA4E";
	$za["topic"] = "PHP";
	print_r($za); // => prints the raw array

	sort($za); // => indexes the values
	// Array(
	// 	[0] => Chuck
	// 	[1] => PHP
	// 	[2] => WA4E
	// )

	ksort($za); // => sorts the array by the keys, alfabethically
	// Array(
	// 	[course] => WA4E
	// 	[name] => Chuck
	// 	[topic] => PHP
	// )

	asort($za); // => sorts the array by the values, alfabethically
	// Array(
	// 	[course] => WA4E
	// 	[name] => Chuck
	// 	[topic] => PHP
	// )
?>

<!-- Expload array => splits a string and indexes every word of the string as an array value -->
<?php
	$inp = "This is a sentence with seven words";
	$temp = explode(' ', $inp);
	print_r($temp);

	// Array(
	// 	[0] => This
	// 	[1] => is
	// 	[2] => a
	// 	[3] => sentence
	// 	[4] => with
	// 	[5] => seven
	// 	[6] => words
	// )
?>

<!-- Arrays in the parsing of URL parameters -->
<?php
	// PHP put query parameters in a GLOBAL ARRAY that can be accesed with $_GET
	$url = 'http://www.blablabla.com/get-01.php?x=2&y=4';
	print_r($_GET);
	// Output ==>
	//	Array(
	//		(x) => 2,
	//		(y) => 4
	//	)
?>