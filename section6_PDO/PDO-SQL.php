<?php
echo "<pre>\n";
$pdo=new PDO('mysql:host=127.0.1;port=4307;dbname=misc',
     'fred', 'zap');
$stmt = $pdo->query("SELECT * FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);
echo "</pre>\n";
?>

<!-- Output : 
Array(
    [user_id] => 1
    [name] => Chuck
    [email] => csev@umich.edu
    [password] => 123
)

Array(
    [user_id] => 2
    [name] => Glenn
    [email] => gg@umich.edu
    [password] => 456
)
-->