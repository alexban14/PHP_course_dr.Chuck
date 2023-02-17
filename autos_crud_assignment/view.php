<?php
session_start();
require_once "PDO.php";
$name = '';

if ( ! isset($_SESSION['email']) ) {
    die('Not logged in');
} else {
    $name = $_SESSION['email'];
}

$stmt = $pdo->query("SELECT make, model, year, mileage , auto_id FROM cars");
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
<?php
if ( isset($cars) && count($cars) > 0) {
	echo('<table class="table">' . "\n");
	echo "<thead>\n";
	echo "<tr>\n";
	echo('<th scope="col">Make' . "</th>\n");
	echo('<th scope="col">Model' . "</th>\n");
	echo('<th scope="col">Year' . "</th>\n");
	echo('<th scope="col">Mileage' . "</th>\n");
	echo('<th scope="col">Edit' . "</th>\n");
	echo('<th scope="col">Delete' . "</th>\n");
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";
	foreach ( $cars as $car) {
		echo "<tr>\n";
		echo '<th class=row>';
		echo(htmlentities($car['make']));
		echo "</th>\n";
		echo '<td>';
		echo(htmlentities($car['model']));
		echo "</td>\n";
		echo '<td>';
		echo(htmlentities($car['year']));
		echo "</td>\n";
		echo '<td>';
		echo(htmlentities($car['mileage']));
		echo "</td>\n";
		echo '<td>';
		echo('<a href="edit.php?auto_id=' . $car['auto_id'] . '">Edit</a>');
		echo "</td>\n";
		echo '<td>';
		echo('<a href="delete.php?auto_id=' . $car['auto_id'] . '">Delete</a>');
		echo "</td>\n";
	}
} else {
	echo "<h3>No row found</h3>\n";
}
?>
	</tbody>
</table>

	<a href="add.php"><button>Add New Entry</button></a> | 
	<a href="logout.php"><button>Logout</button></a>
</body>
</html>