<!-- Error mode  ERRMODE_WARNING-->

<?php
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$stmt = $pdo->prepare("SELECT * FROM users where user_id = :xyz");
$stmt->execute(array(":pizza" => $_GET['user_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    echo("<p>user_id not found</p>\n");
} else {
    echo("<p>user_id found</p>\n");
}
?>


<!-- Error mode  ERRMODE_EXCETPION-->

<?php
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $pdo->prepare("SELECT * FROM users where user_id = :xyz");
	$stmt->execute(array(":pizza" => $_GET['user_id']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if ( $row === false ) {
		echo("<p>user_id not found</p>\n");
	} else {
		echo("<p>user_id found</p>\n");
	}
?>


<!-- Do your own try-catch error handling -->
<?php
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT * FROM users where user_id = :xyz");
$stmt->execute(array(":pizza" => $_GET['user_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    echo("<p>user_id not found</p>\n");
} else {
    echo("<p>user_id found</p>\n");
}
?>

<?php
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $stmt = $pdo->prepare("SELECT * FROM users where user_id = :xyz");
    $stmt->execute(array(":pizza" => $_GET['user_id']));
} catch (Exception $ex ) {
    echo("Internal error, please contact support");
    error_log("error4.php, SQL error=".$ex->getMessage()); 
	// a file in:  c:\xampp\php\logs\php_error_log
	// also it can be set up to log the error in a terminal
    return;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>