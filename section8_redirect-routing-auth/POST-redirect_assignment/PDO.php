<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=4307;dbname=autos', 'fred', 'zap');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>