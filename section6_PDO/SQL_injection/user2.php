<?php
if ( isset($_POST['email']) && isset($_POST['password'])  ) {
    echo("Handling POST data...\n");
    $sql = "SELECT name FROM users
         WHERE email = :em AND password = :pw";
    echo "<pre>\n$sql\n</pre>\n";
	// Use Prepared Statements
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':em' => $_POST['email'],
        ':pw' => $_POST['password']));
// When the statement is executed,
// the placeholders get replaced with the actual strings and everything is automatically escaped!

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>