<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>

    <style>
        body {
            margin: 0;
            background-color: #C2DEDC;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 25vh auto;
            padding: 20px;
            background-color: #ECE5C7;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px;
            padding: 1rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 95%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group input[type="submit"] {
            width: 100%;
            background-color: #116A7B;
            color: #fff;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #13778b;
        }

        .alert {
            color: red;
            font-size: 15px;
            margin: 10px 0px;
        }
    </style>
</head>

<body>
    <?php
    $error = '';

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($username == "admin" and $password == "admin") {
            header("Location: add.php");
        } else {
            $error = "<div class='alert'>*Account Doesn't Exist</div>";
        }
    }
    ?>
    <div class="container">

        <img src="./img/user.png" alt="login icon">
        <?php echo $error; ?>
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required="">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required="">
            </div>
            <div class="form-group">
                <input type="submit" id="login" name="login" value="Login">
            </div>
        </form>
    </div>
</body>

</html>