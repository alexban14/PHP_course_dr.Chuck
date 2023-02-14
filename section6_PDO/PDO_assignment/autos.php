<?php

require_once "PDO.php";
$err_message = false;
$success_message = false;
$name = '';
// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
} else {
    $name = $_GET['name'];
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

if ( 
    isset($_POST['mileage']) && !is_numeric($_POST['mileage'] )
    ||
    isset($_POST['year']) && !is_numeric($_POST['year'] )
 ) {
    $err_message = 'Mileage and year must be numeric';
} else if ( isset($_POST['make']) && strlen($_POST['make']) > 1 ) {
    $sql = "INSERT INTO cars (make, year, mileage)
                VALUES (:mk, :yr, :mi)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':mk' => $_POST['make'],
        ':yr' => $_POST['year'],
        ':mi' => $_POST['mileage']
    ));

    $success_message = 'Record inserted';
} else if ( isset($_POST['make']) && strlen($_POST['make']) < 1 ) {
    $err_message = 'Make is required';
}

$stmt = $pdo->query("SELECT make, year, mileage FROM cars");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
<title>Ban Alexandru c64eca8a</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
<h1>Tracking Autos for <?= htmlentities( $name ) ?></h1>
<p style="color: red;"> <?= htmlentities($err_message) ?> </p>
<p style="color: green;"> <?= htmlentities($success_message) ?> </p>
<form method="post">
<p>
    Make:
    <input type="text" name="make" size=60>
</p>
<p>
    Year
    <input type="text" name="year">
</p>
<p>
    Mileage
    <input type="text" name="mileage">
</p>
<input type="submit" value="Add">
<input type="submit" name="logout" value="Logout">
</form>

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

</div>
</body>
</html>
