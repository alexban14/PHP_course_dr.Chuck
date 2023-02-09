<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ban Alexandru</title>
</head>
<body>
	<h1>Welcome to my guessing game</h1>

	<?php
		// HOW DO YOU GENERATE A RANDOM INTEGER NUMBER??
		$nrToGuess = 435;
		
		if ( !isset($_GET['guess']) ) {
			print 'Missing guess parameter';
		} else if ( empty($_GET['guess']) ) {
			print 'Your guess is too short';
		} else if ( !is_numeric($_GET['guess']) ) {
			print 'Your guess is not a number';
		} else if ( $_GET['guess'] < $nrToGuess ) {
			print 'Your guess is too low';
		} else if ( $_GET['guess'] > $nrToGuess ) {
			print 'Your guess is to high';
		} else if ( $_GET['guess'] == $nrToGuess ) {
			print 'Congratulations - You are right';
		};
	?>
	
</body>
</html>