<?php

session_start();

if (!isset($_SESSION['UserEmail'])) {
    header('Location:index.php');
}

require_once 'config.php';

$UserEmail = $_SESSION['UserEmail'];

$sqlGUFI = "SELECT ItemID FROM favorites WHERE UserEmail = '$UserEmail'";

$resultGUFI = mysqli_query($conn,$sqlGUFI);

if (isset($_POST['ItemID'])) {
    foreach ($_POST as $name => $value) {
    $sqlDFF = "DELETE FROM favorites WHERE UserEmail = '$UserEmail' AND ItemID = '$value'";
    mysqli_query($conn,$sqlDFF);
    header("Location:favorites.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Favorites</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <section>
        <a class="abs-top0 abs-top" href="cart.php">
            <i class="fa fa-shopping-basket"></i>
        </a>
        <a class="abs-top1 abs-top" href="shop.php">
            <i class="fa fa-home"></i>
        </a>
        <p class="head">
            Your Favorite Items
        </p>
        <div class="item-u-selected">
            <table>
                

                <?php
                
                    if ($resultGUFI->num_rows > 0) {
                        echo '
                        <tr>
                    <th>Item</th>
                    <th>Item Image</th>
                    <th>Item Info</th>
                    <th>Price / Unite</th>
                    <th>Remove</th>
                </tr>
                        ';
                        while ($rowGUFI = $resultGUFI->fetch_assoc()) {
                            $ItemID = $rowGUFI['ItemID'];
                            $sqlFI = "SELECT * FROM items WHERE ID = '$ItemID'";
                            $resultFI = mysqli_query($conn,$sqlFI);
                            while ($rowFI = $resultFI->fetch_assoc()) {
                                echo '
                                <tr>
                                    <td>' . $rowFI['Item'] . '</td>
                                    <td><img src="' . $rowFI['ItemImage'] . '" alt="' . $rowFI['Item'] . '"></td>
                                    <td><p>' . $rowFI['ItemInfo'] . '</p></td>
                                    <td>' . $rowFI['SellPrice'] . ' EGP</td>
                                    <td>
                                    <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">

                                        <button type="submit" name="ItemID" value="' . $rowFI['ID'] . '">
                                            <i class="fa fa-times"></i></form>
                                        </button>

                                    </td>
                                </tr>
                                ';
                            }
                        }
                    } else {
                        echo '
                            <p style="font-weight:bold;font-size:17px;text-align: center;margin-top: 100px;">There Is No Favorite Items Yet</p>
                        ';
                    }
                
                ?>

            </table>
        </div>
    </section>
</body>

</html>