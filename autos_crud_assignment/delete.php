<?php
require_once "pdo.php";
session_start();

if ( ! isset($_SESSION['email']) ) {
    die('Acess denied');
}

if ( !isset($_GET['auto_id']) ) {
	$_SESSION['error'] = 'Missing auto id';
	header('Location: view.php');
	return;
}

if ( isset($_POST['delete']) && isset($_POST['auto_id']) ) {
	$sql = "DELETE FROM cars WHERE auto_id = :zip";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array(':zip' => $_POST['auto_id']));
	$_SESSION['success'] = 'Record deleted';
	header('Location: view.php');
	return;
}

$stmt = $pdo->prepare("SELECT make, auto_id FROM cars WHERE auto_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['auto_id']));
$car = $stmt->fetch(PDO::FETCH_ASSOC);

if ( $car === false ) {
	$_SESSION['error'] = 'Bad value for auto_id';
	header('Location: view.php');
	return;
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
		<h3>Confirm: Deleting <?= htmlentities($car['make']) ?></h3>

		<form method="post">
		<input type="hidden" name="auto_id" value="<?= $car['auto_id'] ?>">
		<input type="submit" value="Delete" name="delete">
		<a href="view.php">Cancel</a>
		</form>
	</div>
</body>
</html>