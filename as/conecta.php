<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$dbhost = $_ENV['DB_HOST'];
$dbuser = $_ENV['DB_USER'];
$dbpass = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


