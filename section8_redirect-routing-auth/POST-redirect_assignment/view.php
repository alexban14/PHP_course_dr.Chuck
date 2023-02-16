<?php
session_start();
require_once "PDO.php";
$name = '';

if ( ! isset($_SESSION['email']) ) {
    die('Not logged in');
} else {
    $name = $_SESSION['email'];
}

$stmt = $pdo->query("SELECT make, year, mileage FROM cars");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
	<h1>Tracking Autos for <?= htmlentities( $name ) ?></h1>
<?php
if ( isset($_SESSION['success']) ) {
	echo('<p style="color: green;">' . htmlentities($_SESSION['success']) . " </p>\n");
	unset($_SESSION['success']);
}
?>
	<h1>Automobiles</h1>

<ul>
<?php
foreach ( $cars as $car) {
    echo "<li>";
    print htmlentities($car['year'])." ".htmlentities($car['make'])." / ".htmlentities($car['mileage']);
    echo "</li>";
}
?>
</ul>

	<a href="add.php">Add New</a> | 
	<a href="logout.php">Logout</a>
</body>
</html>