<?php
require_once "pdo.php";
session_start();

if ( ! isset($_SESSION['email']) ) {
    die('Acess denied');
}

if ( !isset($_GET['auto_id']) ) {
    $_SESSION['error'] = 'Bad data';
    header("Location: edit.php?auto_id=" . $_POST['auto_id']);
    return;
}

if (
    isset($_POST['make']) && isset($_POST['model'])
    && isset($_POST['year']) && isset($_POST['mileage'])
    ) {

        if (
            strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1
            || !is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])
        ) {
            $_SESSION['error'] = 'All fileds are required';
            header('Location: edit.php?auto_id=' . $_GET['auto_id']);
            return; 
        }

        $sql = "UPDATE cars SET make = :make,
            model = :model,
            year = :year,
            mileage = :mileage
            WHERE auto_id = :auto_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':make' => $_POST['make'],
            ':model' => $_POST['model'],
            ':year' => $_POST['year'],
            ':mileage' => $_POST['mileage'],
            ':auto_id' => $_POST['auto_id']
        ));
        header('Location: view.php');
        return;
} // else {
    
// }


$stmt = $pdo->prepare("SELECT * FROM cars where auto_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['auto_id']));
$car = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <h1>Edit auto</h1>
<?php
if ( isset($_SESSION['error']) ) {
echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . " </p>\n");
unset($_SESSION['error']);
}
?>
    <form method="post">
        <p>Make:
        <input type="text" name="make" value="<?= htmlentities($car['make']) ?>"></p>
        <p>Model:
        <input type="text" name="model" value="<?= htmlentities($car['model']) ?>"></p>
        <p>Year:
        <input type="text" name="year" value="<?= htmlentities($car['year']) ?>"></p>
        <p>Mileage:
        <input type="text" name="mileage" value="<?= htmlentities($car['mileage']) ?>"></p>
        <input type="hidden" name="auto_id" value="<?= htmlentities($car['auto_id']) ?>">
        <p><input type="submit" value="Save"/>
        <a href="view.php">Cancel</a></p>
    </form>
</div>
</body>
</html>