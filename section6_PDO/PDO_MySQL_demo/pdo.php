<?php
$pdo = new PDO('mysql:host=localhost;port=4307;dbname=misc',
    'fred', 'zap');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>