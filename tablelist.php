<style>
    img {
        width: 20px;
    }
</style>


<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "inventory";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM product";
$result = mysqli_query($conn, $query);


if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
            <th scope='row'><?php echo $row["prodCode"]; ?> </td>
            <td><?php echo $row["prodName"]; ?> </td>
            <td><?php echo $row["prodType"]; ?> </td>
            <td><?php echo $row["prodUnit"]; ?> </td>
            <td><?php echo $row["prodSupplier"]; ?> </td>
            <td><?php echo $row["prodPrice"]; ?> </td>
            <td><a href='del.php?a=<?php echo $row["prodId"]; ?>'><img src='img/trash-solid.svg'></a> <a href='edit.php?a=<?php echo $row["prodId"]; ?>'><img src='img/pen-solid.svg'></a></td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='7'>NONE</td></tr>";
}
