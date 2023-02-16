<?php
require_once "pdo.php";
session_start();

if ( ! isset($_SESSION['email']) ) {
    die('Acess denied');
}