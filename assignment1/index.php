<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ban Alexandru PHP</title>

	<style>
		a {
			display: block;
			margin-bottom: 0.3rem;
		}
		p {
			margin-bottom: 0.5rem;
		}
	</style>
</head>
<body>
	<h1>Ban Alexandru PHP</h1>
	<p>
		<?php
			$hasedName = hash('sha256', 'Ban Alexandru');
			print "The SHA256 hash of " . '"Ban Alexandru" ' .  "is: $hasedName. \n";
		?>
	</p>
	<a href="/assignment1/check.php">Click here to check te error setting</a>
	<a href="/assignment1/fail.php">Click here to cause a traceback</a>
</body>
</html>