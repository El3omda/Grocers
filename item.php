<?php

session_start();

require_once 'config.php';

if (!isset($_SESSION['UserEmail'])) {
    header('Location:index.php');
}

// Get Item By Id

$ItemId = $_REQUEST['id'];

if (!isset($ItemId) || empty($ItemId)) {
    header("Location:shop.php");
}

$sqlGI = "SELECT * FROM items WHERE ID = '$ItemId'";
$resultGI = mysqli_query($conn,$sqlGI);
$rowI = $resultGI->fetch_assoc();

// Add Item To Cart

# Check If Item Is Already Exist
$UserEmail = $_SESSION['UserEmail'];
$sqlCIIE = "SELECT * FROM orders WHERE ItemID = '$ItemId' AND UserEmail = '$UserEmail'";
$resultCIIE = mysqli_query($conn,$sqlCIIE);

if ($resultCIIE->num_rows > 0) {
    while ($rowCIIE = $resultCIIE->fetch_assoc()) {
        $OldQuantity = $rowCIIE['ItemQuentity'];
        if (isset($_POST['quan'])) {
            foreach ($_POST as $name => $value) {
                $NewQuantity = $OldQuantity + $value;
                // Sql For Update Quantity In Orders Tabel
                $sqlUIQ = "UPDATE orders SET ItemQuentity = '$NewQuantity' WHERE ItemID = '$ItemId'";
                if (mysqli_query($conn,$sqlUIQ)) {
                    // header('Location:cart.php');
                    $oldStock = $rowI['InStock'];
                    @$quan = $_POST['quan'];
                    $newStock = $oldStock - $quan;
                    $sqlDecreaseQuantity = "UPDATE items SET InStock = '$newStock' WHERE ID = '$ItemId'";
                    if (isset($_POST['quan'])) {
                      @$quan = $_POST['quan'];
                            if ($quan > $rowI['InStock']) {
                                echo '
                                    <p style="text-align: center;font-weight: bold"> There Is Now Avaliable Stock Now We Are Sorry .</p>
                                ';
                            } else {
                                mysqli_query($conn,$sqlDecreaseQuantity);
                                $SellPrice = $rowI['SellPrice'];
                                $sqlAddItem = "INSERT INTO orders (UserEmail,ItemID,ItemQuentity,ItemPrice) 
                                VALUES ('$UserEmail', '$ItemId', '$quan', '$SellPrice')";
                                if (mysqli_query($conn,$sqlAddItem)) {
                                    $oldStock = $rowI['InStock'];
                                    $newStock = $oldStock - $quan;
                                    $sqlDecreaseQuantity = "UPDATE items SET InStock = '$newStock' WHERE ID = '$ItemId'";
                                    if (isset($_POST['quan'])) {
                                        if (mysqli_query($conn,$sqlDecreaseQuantity)) {
                                          echo $rowI['InStock'];
                                        header("Location:cart.php");
                        
                                        } else {
                                            echo 'faild ' . mysqli_error($conn);
                                        }
                                    }
                                }
                            }
                    }
                } else {
                    echo 'faild ' . mysqli_error($conn);
                }
            }
        }
    }
} else {
    // Add Item Directly
    @$quan = $_POST['quan'];
    if ($quan > $rowI['InStock']) {
        echo '
            <p style="text-align: center;font-weight: bold"> There Is Now Avaliable Stock Now We Are Sorry .</p>
        ';
    } else {
        $SellPrice = $rowI['SellPrice'];
        $sqlAddItem = "INSERT INTO orders (UserEmail,ItemID,ItemQuentity,ItemPrice) 
        VALUES ('$UserEmail', '$ItemId', '$quan', '$SellPrice')";
        if (mysqli_query($conn,$sqlAddItem)) {
            $oldStock = $rowI['InStock'];
            $newStock = $oldStock - $quan;
            $sqlDecreaseQuantity = "UPDATE items SET InStock = '$newStock' WHERE ID = '$ItemId'";
            if (isset($_POST['quan'])) {
                if (mysqli_query($conn,$sqlDecreaseQuantity)) {
                  echo $rowI['InStock'];
                // header("Location:cart.php");

                } else {
                    echo 'faild ' . mysqli_error($conn);
                }
            }
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buy <?php echo $rowI['Item'];?></title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/item.css">
</head>

<body>
  <section>
    <a class="abs-top0 abs-top" href="shop.php">
      <i class="fa fa-angle-left"></i>
    </a>
    <a class="abs-top1 abs-top" href="cart.php">
      <i class="fa fa-shopping-cart"></i>
    </a>
    <div class="item-image">
      <img src="<?php echo $rowI['ItemImage'];?>" alt="">
    </div>
    <div class="name-quantity">
      <div class="name">
        <?php echo $rowI['Item'];?>
      </div>
      <div class="quantity">
        <ul>
          <li><i class="fa fa-minus"></i></li>
          <li>
            <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $rowI['ID'];?>" id="quantity" method="POST">
              <input type="text" name='quan' value="0" /><?php echo $rowI['Unit'];?>
            </form>
          </li>
          <li><i class="fa fa-plus"></i></li>
        </ul>
      </div>
    </div>
    <div class="item-info">
      <p><?php echo $rowI['ItemInfo'];?></p>
      <ul>
        <li><i class="fa fa-star"></i> 4.5</li>
        <li><span><?php echo $rowI['SellPrice'];?></span> EGP \ <?php echo $rowI['Unit'];?></li>
        <li><i class="fa fa-heartbeat"></i> <?php echo $rowI['ItemCal'];?> Kcal</li>
      </ul>
    </div>
    <div class="related">
      <ul>

        <?php
            
            // Get Related Items

            $ItemType = $rowI['ItemType'];

            $sqlGRI = "SELECT * FROM items WHERE ItemType = '$ItemType' AND ID != '$ItemId' LIMIT 5";
            $resultGRI = mysqli_query($conn,$sqlGRI);

            if ($resultGRI->num_rows > 0) {
                while ($rowRI = $resultGRI->fetch_assoc()) {
                    echo '
                    <li><a href="item.php?id=' . $rowRI['ID'] . '"><img src="' . $rowRI['ItemImage'] . '" alt=""></a></li>
                    ';
                }
            }

            ?>

      </ul>
    </div>
    <div class="price-add">
      <ul>
        <li>
          <p>TotalPrice <br> <span class="tp">0</span> <span class="cur">EGP</span></p>
        </li>
        <li>
          <button form="quantity" type="submit">
            <i class="fa fa-shopping-basket"></i>
            Add To Cart
          </button>
        </li>
      </ul>
    </div>
  </section>
  <script>
  var min = document.querySelector('.name-quantity .quantity ul li:first-of-type');
  var quan = document.querySelector('.name-quantity .quantity ul li:nth-of-type(2) input');
  var plus = document.querySelector('.name-quantity .quantity ul li:last-of-type');
  var pr = document.querySelector('.item-info ul li:nth-of-type(2) span');
  var tota = document.querySelector('.tp');

  min.onclick = function() {
    if (quan.value > 0) {
      quan.value -= .5;
    }
    tota.innerHTML = parseFloat(quan.value) * parseFloat(pr.innerHTML);
  }

  plus.onclick = function() {
    quan.value = parseFloat(quan.value) + .5;
    tota.innerHTML = parseFloat(quan.value) * parseFloat(pr.innerHTML);
  }

  // console.log(tota.innerHTML)
  </script>
</body>

</html>