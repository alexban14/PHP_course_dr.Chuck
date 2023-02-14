<?php

if ( isset($_POST['cancel']) ) {
	header("Location: index.php"); // => used to send a raw http header
	return;
}

$salt = 'XyZzy12*_';
$stored_hash ='1a52e17fa899cf40fb04cfc42e6352f1'; // passowrd = "php123", username = "who"
$failure = false;

if ( isset($_POST['who']) && !str_contains( $_POST['who'], '@' ) ) {
	$failure = 'Email must have an at-sign (@)';
} else if ( isset($_POST['who']) && isset($_POST['pass']) ) {
	if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
		$failure = 'User name and password are required';
	} else {
		$saltedPass = $salt . $_POST['pass'];
		$passToCheck = hash('md5', $saltedPass);
		if ( $passToCheck == $stored_hash) {
			header( "Location: autos.php?name=" . urlencode($_POST['who']) );
			return;
		} else {
			$failure = 'Incorrect password';
		}
	}
}

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
	<h1>Please Log In</h1>

<?php
	if( $failure !== false) {
		echo('<p style="color: red;">' . htmlentities($failure) . "</p>\n");
	}
?>

	<form method="post">
		<label for="nam">Email</label>
		<input type="text" name="who" id="nam"><br/>
		<label for="id_1723">Password</label>
		<input type="password" name="pass" id="id_1723"><br/>
		<input type="submit" value="Log In">
		<input type="submit" name="cancel" value="Cancel">
	</form>
	<p>
		For a password hint, view source and find a password hint
		in the HTML comments.
	</p>
	</div>
</body>
</html>