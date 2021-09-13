<?php

require_once 'config.php';
session_start();

if (!isset($_SESSION['UserEmail'])) {
    header('Location:index.php');
}

// Sql To Get User Cart Items
$UserEmail = $_SESSION['UserEmail'];
$sqlGUCI = "SELECT * FROM orders WHERE UserEmail = '$UserEmail'";
$resultGUCI = mysqli_query($conn,$sqlGUCI);





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
            if (@$_SESSION['lang'] == 'ar') {
                echo ' منتجاتك || جروسارس';
            } else {
                echo 'Your Cart';
            }
        ?>
  </title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/cart.css">
</head>

<body <?php
        if (@$_SESSION['lang'] == 'ar') {
            echo 'class="ar"';
        }
    ?>>
  <section>
    <!-- <a class="abs-top0 abs-top" href="#">
            <i class="fa fa-bars"></i>
        </a> -->
    <a class="abs-top1 abs-top" href="shop.php">
      <i class="fa fa-home"></i>
    </a>
    <p class="head">
      <?php
        if (@$_SESSION['lang'] == 'ar') {
            echo 'عربة المنتجات';
        } else {
            echo 'Your Cart';
        }
    ?>
    </p>
    <div class="item-u-selected">


      <?php
            
            if ($resultGUCI->num_rows > 0) {

                echo '
                <table>
                <tr>
                    <th>Item</th>
                    <th class="sh">Item Image</th>
                    <th>Quantity</th>
                    <th class="sh1">Price / Unite</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                </tr>
                ';
                while ($rowGUCI = $resultGUCI->fetch_assoc()) {
                    
                    // Sql Get Item Data By ID
                    $Id = $rowGUCI['ItemID'];
                    $sqlGIBI = "SELECT * FROM items WHERE ID = '$Id'";
                    $resultI = mysqli_query($conn,$sqlGIBI);
                    $rowI = $resultI->fetch_assoc();

                    echo '
                    <tr>
                        <td>' . $rowI['Item'] . '</td>
                        <td class="sh"><img src="' . $rowI['ItemImage'] . '" alt=""></td>
                        <td><span class="itqu">' . $rowGUCI['ItemQuentity'] . '</span><br>' . $rowI['Unit'] . '</td>
                        <td class="sh1"><span class="itpr">' . $rowGUCI['ItemPrice'] . '</span><br>EGP</td>
                        <td><span class="ittopr"></span><br>EGP</td>
                        <td>
                            <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                                <button type="submit" name="Del" value="' . $rowGUCI['ItemID'] . '">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    ';
                }
            
            echo '</table>';
            } else {
                echo '
                    <p style="text-align: center;font-weight: bold;margin-top: 150px;">
                        There Is No Item Into Your Cart Yet Go Shopping Now
                    </p>
                ';
            }
            
// Delete Item From Cart

if (isset($_POST['Del'])) {
    foreach ($_POST as $name => $value) {
        $sqlDIFC = "DELETE FROM orders WHERE ItemID = '$value'";
        $sqlSelctItemQuantity = "SELECT * FROM orders WHERE ItemID = '$value'";
        $resultItemQuantity = mysqli_query($conn,$sqlSelctItemQuantity);
        $rowItemQuantity = $resultItemQuantity->fetch_assoc();
        $OrderItemQuantity = $rowItemQuantity['ItemQuentity'];
    }
    if (mysqli_query($conn,$sqlDIFC)) {
        
        // Select Item Already Stock

        $sqlSelectAlreadyStock = "SELECT * FROM items WHERE ID = '$value'";
        $resultAlreadyStock = mysqli_query($conn,$sqlSelectAlreadyStock);
        $rowAlreadyStock = $resultAlreadyStock->fetch_assoc();
        $AlreadyInStock = $rowAlreadyStock['InStock'];
        
        // Sql Increase Item Quantity If Deleted From Cart
        
        $newStock = $AlreadyInStock + $OrderItemQuantity;
        $sqlUpdateQuantity = "UPDATE items SET InStock = '$newStock' WHERE ID = '$value'";
        mysqli_query($conn,$sqlUpdateQuantity);

        header('Location:cart.php');

    }  
}

            ?>

    </div>
    <div class="confirm">
      <ul>
        <li>Total Price <br> <span class="ftprice">50</span> <span class="cur">EGP</span></li>
        <li>
          <a href="#">
            <i class="fa fa-shopping-basket"></i>
            <?php
                        
                        if ($_SESSION['lang'] == 'ar') {
                            echo 'متابعة الشراء';
                        } else {
                            echo 'Confirm Buying';
                        }
                        
                        ?>
          </a>
        </li>
      </ul>
    </div>
  </section>
  <script src="js/jquery.main.js"></script>
  <script src="js/main.js"></script>
</body>

</html>