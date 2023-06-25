<style>
    .sidebar {
        z-index: 3;
        width: 250px;
        height: 100vh;
        margin-left: 0;
        padding: 20px;
        background-color: #116A7B;
        box-shadow: 0 0 10px rgba(0, 0, 0, .5);
        position: absolute;
        text-align: center;
    }

    .sidebar h1 {
        margin: 5px;
        color: #C2DEDC;
    }

    .nav {
        width: 100%;
        text-align: center;
    }

    .profile-frame {
        margin: 30px auto;
        width: 100px;
        height: 100px;
        border: solid 5px #C2DEDC;
        border-radius: 100%;
        text-align: center;
    }

    .profile-frame img {
        text-align: center;
        height: 91px;
        width: 91px;
        margin: auto;
        border-radius: 100%;
    }

    .sidebar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .sidebar a {
        display: block;
        color: #C2DEDC;
        padding: 8px 16px;
        text-decoration: none;
    }

    .sidebar li {
        text-align: center;
        margin: 15px 0;
    }

    .sidebar a:hover:not(.active) {
        color: #ECE5C7;
    }

    .dd-btn {
        cursor: pointer;
    }

    .dd-nav li {
        text-align: left;
        margin: 0;
        padding-left: 30%;
    }

    .dd-nav li a {
        font-size: 13px;
    }
</style>

<div class="sidebar">
    <h1>Inventory</h1>
    <div class="nav">

        <div class="profile-frame">
            <img src="img/jibe.png" alt="profile" class="profile">
        </div>
        <ul>
            <li><a id="btn-add" href="add.php">Add/Record</a></li>
            <li><a id="btn-edit" href="#">Edit</a></li>
            
            <br>
            <li><a id="btn-out" href="login.php">Logout</a></li>
        </ul>
    </div>
</div>