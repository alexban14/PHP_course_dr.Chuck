<?php
session_start();

require_once "PDO.php";
$name = '';
// Demand a GET parameter
if ( ! isset($_SESSION['email']) ) {
    die('Not logged in');
} else {
    $name = $_SESSION['email'];
}

// If the user requested logout go back to index.php
if ( isset($_POST['cancel']) ) {
    header('Location: view.php');
    return;
}

if ( 
    isset($_POST['mileage']) && !is_numeric($_POST['mileage'] )
    ||
    isset($_POST['year']) && !is_numeric($_POST['year'] )
 ) {
    $_SESSION['error'] = 'Mileage and year must be numeric';
    header('Location: add.php');
    return;
} else if ( isset($_POST['make']) && strlen($_POST['make']) > 1 ) {
    $sql = "INSERT INTO cars (make, year, mileage)
                VALUES (:mk, :yr, :mi)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':mk' => $_POST['make'],
        ':yr' => $_POST['year'],
        ':mi' => $_POST['mileage']
    ));

    $_SESSION['success'] = 'Record inserted';
    header('Location: view.php');
    return;
} else if ( isset($_POST['make']) && strlen($_POST['make']) < 1 ) {
    $_SESSION['error'] = 'Make is required';
    header('Location: add.php');
    return;
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
<?php
if ( isset( $_SESSION['error']) ) {
    echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
    unset( $_SESSION['error']);
}
?>
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
<input type="submit" name="cancel" value="Cancel">
</form>

</div>
</body>
</html>
