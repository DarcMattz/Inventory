<?php
    $prodId = $_POST['prodId'];
    $prodCode = (int) $_POST['prodCode'];
    $prodName = $_POST['prodName'];
    $prodType = $_POST['prodType'];
    $prodUnit = $_POST['prodUnit'];
    $prodSupplier = $_POST['prodSupplier'];
    $prodPrice = (int) $_POST['prodPrice'];

    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "inventory";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
    $sql = "UPDATE product SET prodCode='$prodCode', prodName='$prodName', prodType='$prodType', prodUnit='$prodUnit', prodSupplier='$prodSupplier', prodPrice='$prodPrice' WHERE prodId=$prodId";

    $result = mysqli_query($conn, $sql);
    header("location: add.php");
