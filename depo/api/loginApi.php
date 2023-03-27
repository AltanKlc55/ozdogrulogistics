<?php
$host = 'localhost';
$dbname = 'odlsystem_db';
$username = 'ozdogrulogadmin';
$password = '9b7&h3dK6';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $connect = new PDO($dsn, $username, $password, $options);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connect error: ' . $e->getMessage();
    exit;
}


$query = $connect->prepare("select tel_no from tbl_personeller");
$query->execute();




?>


