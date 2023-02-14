<!-- This code does it all in a select instead of a prepare/execute pattern,
	but it is prone to SQL Injection -->

<?php
if ( isset($_POST['email']) && isset($_POST['password']) ) {
	$e = $_POST['email'];
	$p = $_POST['password'];
	$sql = "SELECT name FROM users
		 WHERE email = '$e'
		 AND password = '$p'";
	$stmt = $pdo->query($sql);
}
?>