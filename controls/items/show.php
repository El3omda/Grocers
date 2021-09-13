<?php

session_start();

require_once '../../config.php';

if ($_SESSION['UserEmail'] != 'admin@admin.com') {
    header("Location:../../index.php");
}

$sqlGI = "SELECT * FROM items";
$result = mysqli_query($conn,$sqlGI);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Items || Show Items</title>
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="css/show.css">
</head>

<body>
    <a class="control" href="index.php"><i class="fa fa-cogs"></i></a>
    <div class="filter">
        <form action="" method="POST">
            <input type="search" name="itemName" placeholder="Enter Item Name . . . " required>
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="items-container">
        <table>
            <?php
            
            
            if ($result->num_rows > 0) {
                echo '
            <tr>
                <th>Item</th>
                <th>In Stock</th>
                <th>Sell Price</th>
                <th>Action</th>
            </tr>
            ';
            while ($row = $result->fetch_assoc()) {
                echo '
                <tr>
                    <td>' . $row['Item'] . '</td>
                    <td>' . $row['InStock'] . ' KG</td>
                    <td>' . $row['SellPrice'] . ' EGP</td>
                    <td>
                        <a href="item.php?id=' . $row['ID'] . '">All Data</a>
                    </td>
                </tr>
                ';
            }
            } else {
                echo '
                    <p style="font-weight:bold;font-size:18px;margin-top: 100px;text-align: center;></p>
                ';
            }
            
            
            ?>
            
        </table>
    </div>
</body>

</html>