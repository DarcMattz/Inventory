<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="templates/style.css">
    <style>
        #btn-edit {
            color: #ECE5C7;
        }

        .dd-nav {
            display: none;
        }

        .main {
            margin-left: 250px;
            padding: 40px;
            text-align: center;
        }

        .content {
            border-radius: 10px;
            margin: auto;
            background-color: #ECE5C7;
            width: 1000px;
            height: 550px;
            padding: 20px;
        }

        .mb-3 {
            margin-bottom: 10px;
        }

        .mt-3 {
            margin-top: 8px;
            float: right;
        }

        form {
            margin: auto;
            width: 1000px;
        }

        form input {
            width: 200px;
            height: 30px;
        }

        form button {
            width: 100px;
            height: 30px;
            background-color: aquamarine;
            border: none;
            cursor: pointer;
        }

        td,
        tr,
        th {
            border: solid black 1px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-1">
            <?php include('templates/sidebar.php'); ?>
        </div>
        <div>
            <?php include('templates/topnav.php'); ?>

            <?php

            $id = (int) $_GET['a'];

            $serverName = "localhost";
            $dBUsername = "root";
            $dBPassword = "";
            $dBName = "inventory";

            $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
            $result = mysqli_query($conn, "SELECT * FROM product WHERE prodId=$id");

            function edit()
            {
                $id = (int) $_GET['a'];
                $serverName = "localhost";
                $dBUsername = "root";
                $dBPassword = "";
                $dBName = "inventory";
                $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
                if (isset($_POST['sumbit'])) {
                    $prodCode = $_POST['prodCode'];
                    $prodName = $_POST['prodName'];
                    $prodType = $_POST['prodType'];
                    $prodUnit = $_POST['prodUnit'];
                    $prodSupplier = $_POST['prodSupplier'];
                    $prodPrice = (int) $_POST['prodPrice'];


                    $sql = "UPDATE product SET prodCode='$prodCode', prodName='$prodName', prodType='$prodType', prodUnit='$prodUnit', prodSupplier='$prodSupplier', prodPrice='$prodPrice' WHERE prodId=$id";

                    $result = mysqli_query($conn, $sql);

                    header("location: add.php");
                }
            }
            ?>
            <div class="main">
                <form action="edit.php" method="post">
                    <table border="1">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><input type="hidden" name="prodId" id="prodId" value="<?php echo $id; ?>">
                                    <input type="text" name="prodCode" id="prodCode" value="<?php echo $row["prodCode"]; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" name="prodName" id="prodName" value="<?php echo $row["prodName"]; ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="prodType" id="prodType" value="<?php echo $row["prodType"]; ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="prodUnit" id="prodUnit" value="<?php echo $row["prodUnit"]; ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="prodSupplier" id="prodSupplier" value="<?php echo $row["prodSupplier"]; ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="prodPrice" id="prodPrice" value="<?php echo $row["prodPrice"]; ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="submit" id="submit" value="Save"></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </form>
                <?php
                    edit();
                ?>
            </div>


        </div>
    </div>
</body>

</html>