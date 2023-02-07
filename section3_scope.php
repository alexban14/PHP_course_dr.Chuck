<!-- Functions scope and modularity -->

<!-- variable names used inside of function code do not mix with the variables outside of the function
	 to avoid unexpected side effects if two programmers use the same variable name in different parts of the code. -->

<!-- Function scope (isolated), aka function scope -->
<?php
	function tryzap() {
		$val = 100;
	}
	
	$val = 10;
	tryzap();
	echo "TryZap = $val\n"; // => TryZap = 10
?>

<!-- Global Scope (shared) -->
<?php
	// used RARELY, because it tempers with any variable outside the function scope that might have the same name
	function dozap() {
		global $val;
		$val = 100;
	}
	
	$val = 10;
	dozap();
	echo "DoZap = $val\n"; // => DoZap = 100
?>

<!-- Over the developing years of PHP some functions might get removed in later versions -->
<!-- built in function to check if a FUNCTIOIN EXISTS -->
<?php
	if (function_exists("array_combine")){
		echo "Function exists";
	} else {
		echo "Function does not exist";
	}
?>

<!-- PHP is a very configurable system and has lots of capabilities that can be plugged in. -->
<?php
	// phpinfo() function prints out the internal configuration capabilities of your particular PHP installatio
	phpinfo();
?>


<!-- Requireing functionality from one file to another -->
<?php
	include "header.php"; // - Pull the file in here
	include_once "header.php"; // - Pull the file in here unless it has already been pulled in before
	require "header.php"; // - Pull in the file here and die if it is missing
	require_once "header.php"; // - You can guess what this means...
	/* These can look like functions - */ require_once("header.php");
?>

// => usage
	<?php
	require "top.php"; // => head part... title, rel links etc
	require "nav.php";
	?>
	<div id="container">
	<h1>Web Applications...</h1> 
	.
	.
	.
	</div>
	<?php
	require "foot.php";