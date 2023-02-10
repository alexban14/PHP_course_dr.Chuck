<?php
	$username = '';
	if ( !isset($_GET['name']) || strlen($_GET['name']) < 1 ) {
		die("Name parameter missing");
	} else {
		$username = $_GET['name'];
	}

	if ( isset($_POST['logout']) ) {
		header("Location: index.php");
		return;
	}


	// values for the game
	$names = array('Rock', 'Paper', 'Scissors');
	$human = isset($_POST["human"]) ? $_POST['human'] +0 : -1;

	$computer = rand(0, 2);

	function check ($computer, $human, $names) {
		if ( $human == -1) {
			return false;
		} else if ( $names["$computer"] == $names["$human"] ) {
			return "Tie";
		} else if ( $names["$computer"] == 'Rock' && $names["$computer"] == 'Paper' ) {
			return "You win";
		} else if ( $names["$computer"] == 'Paper' && $names["$computer"] == 'Rock' ) {
			return "You lose";
		} else if ( $names["$computer"] == 'Rock' && $names["$computer"] == 'Scissors' ) {
			return "You lose";
		} else if ( $names["$computer"] == 'Scissors' && $names["$computer"] == 'Rock' ) {
			return "You win";
		} else if ( $names["$computer"] == 'Paper' && $names["$computer"] == 'Scissors' ) {
			return "You win";
		} else if ( $names["$computer"] == 'Scissors' && $names["$computer"] == 'Paper' ) {
			return "You lose";
		}
	}

	$result = check($computer, $human, $names);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ban Alexandru c64eca8a</title>
	<?php require_once "bootstrap.php"; ?>
</head>
<body>
	<div class="container">
		<h1>Rock Paper Scissors</h1>
	
<?php
if ( $username ) {
	echo "<p>Welcome: ";
	echo htmlentities($username);
	echo "</p\n";
}	
?>

	<form method="POST">
		<select name="human">
		<option value="-1">Select</option>
		<option value="0">Rock</option>
		<option value="1">Paper</option>
		<option value="2">Scissors</option>
		<option value="3">Test</option>
	</select>
	<input type="submit" value="Play">
	<input type="submit" name="logout" value="Logout">
	</form>

	<pre>
<?php

if ( $human == -1) {
	print "Please select a strategy and press Play.\n";
} else {
	print "Result = $result\n";
}

if ( isset($_POST['human']) ) {
	print_r($_POST['human'] . "\n");
	print_r($human . "\n");
}

?>
	</pre>
</div>

</body>
</html>