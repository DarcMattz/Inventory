<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="templates/style.css">
    <style>
        #btn-add {
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
            <div class="main">

                <?php

                function insertAccount($prodCode, $prodName, $prodType, $prodUnit, $prodSupplier, $prodPrice, $conn)
                {

                    $query = "INSERT INTO product (prodCode, prodName, prodType, prodUnit, prodSupplier, prodPrice) VALUES (?,?,?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepare = mysqli_stmt_prepare($stmt, $query);

                    if ($prepare) {
                        mysqli_stmt_bind_param($stmt, "sssssd", $prodCode, $prodName, $prodType, $prodUnit, $prodSupplier, $prodPrice);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);
                        $conn->close();
                    } else {
                        die("Something went wrong");
                    }
                }

                function checkFields()
                {
                    $prodCode = (int) $_POST["prodCode"];
                    $prodName = $_POST["prodName"];
                    $prodType = $_POST["prodType"];
                    $prodUnit = $_POST["prodUnit"];
                    $prodSupplier = $_POST["prodSupplier"];
                    $prodPrice = (int) $_POST["prodPrice"];

                    $error = array();

                    # check if all fields are empty
                    if (empty($prodCode) || empty($prodName) || empty($prodType) || empty($prodUnit) || empty($prodSupplier) || $prodPrice <= 0) {
                        array_push($error, "All fields are required");
                    }
                    require_once "db_connect.php";

                    if (count($error) > 0) {
                        foreach ($error as $errors) {
                            echo "<div class='alert alert-danger'>$errors</div>";
                        }
                    } else {
                        insertAccount($prodCode, $prodName, $prodType, $prodUnit, $prodSupplier, $prodPrice, $conn);
                    }
                }


                if (isset($_POST["submit"])) {
                    checkFields();
                }


                ?>

                <form action="add.php" method="post">
                    <div class="mb-3">
                        <label for="prodCode">Product Code</label>
                        <input type="number" name="prodCode" id="prodCode" placeholder="Product Code">

                        <label for="prodName">Product Name</label>
                        <input type="text" name="prodName" id="prodName" placeholder="Product Name">

                        <label for="prodType">Product Type</label>
                        <input type="text" name="prodType" id="prodType" placeholder="Product Type">
                    </div>
                    <div class="mb-3">
                        <label for="prodUnit">Product Unit</label>
                        <input type="text " name="prodUnit" id="prodUnit" placeholder="Product Unit">

                        <label for="prodSupplier">Product Supplier</label>
                        <input type="text" name="prodSupplier" id="prodSupplier" placeholder="Product Supplier">

                        <label for="prodPrice">Product Price</label>
                        <input type="number" name="prodPrice" id="prodPrice" placeholder="Product Price">

                        <div class="mt-3">
                            <button type="submit" name="submit"><strong>Add</strong></button>
                        </div>
                </form>

            </div>
            <div class="main">
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Type</th>
                            <th scope="col">Product Unit</th>
                            <th scope="col">Product Supplier</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                       <?php include('tablelist.php') ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>