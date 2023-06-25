<?php

$id = $_GET['a'];

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "inventory";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

$sql = "DELETE FROM product WHERE prodId=$id";

if (mysqli_query($conn, $sql)) {
    header("location:add.php");
}