<?php 

$serverip = "localhost";
$username = "root";
$pass = "";

try {
    $conn = new PDO ("mysql:host=$serverip;dbname=inline_edit", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully...";
}   catch(PDOException $err) {
    echo "Connection Failed.. !" . $err->getMessage();
}


?>