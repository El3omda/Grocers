<?php

use JetBrains\PhpStorm\Language;

session_start();

require_once 'config.php';

if (!isset($_SESSION['UserEmail'])) {
    header('Location:index.php');
}

$_SESSION['url'] = $_SERVER['SCRIPT_NAME'];

// SQL GET Avaliable Items 

$sqlGAI = "SELECT * FROM items WHERE InStock > 0";
$resultGAI = mysqli_query($conn,$sqlGAI);

// Sql Get User Notifications

$UserEmail = $_SESSION['UserEmail'];
$sqlGUN = "SELECT * FROM notifications WHERE UserEmail = '$UserEmail'";
$resultGUN = mysqli_query($conn,$sqlGUN);

if (isset($_POST['delete'])) {
    $NotifiText = $_POST['NotiText'];
    $sqlDUN = "DELETE FROM notifications WHERE UserEmail = '$UserEmail' AND NotifiText = '$NotifiText'";
    mysqli_query($conn,$sqlDUN);
}

// Sql Get User Notifications Number

$sqlGUNN = "SELECT COUNT(ID) AS count FROM notifications WHERE UserEmail = '$UserEmail'";
$resultGUNN = mysqli_query($conn,$sqlGUNN);
$rowGUNN = $resultGUNN->fetch_assoc();
$NotifiNo = $rowGUNN['count'];

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

foreach ($_GET as $name => $id) {

// Add Item To Favorites

if ($id != 0) {
    $sqlSUFI = "SELECT * FROM favorites WHERE UserEmail = '$UserEmail' AND ItemID = '$id'";
    $resultSUFI = mysqli_query($conn,$sqlSUFI);
    if ($resultSUFI->num_rows > 0 ) {
        $sqlDIFF = "DELETE FROM favorites WHERE UserEmail = '$UserEmail' AND ItemID = '$id'";
        mysqli_query($conn,$sqlDIFF);
    } else {
        $sqlIITF = "INSERT INTO favorites (UserEmail,ItemID) VALUES ('$UserEmail', '$id')";
        mysqli_query($conn,$sqlIITF);
        header("Location:shop.php");
    }
}

}

// Add Item To Cart

foreach ($_POST as $name1 => $id1) {

// Add Item To Favorites

if ($id1 != 0) {
    $sqlSUFI1 = "SELECT * FROM orders WHERE UserEmail = '$UserEmail' AND ItemID = '$id1'";
    $resultSUFI1 = mysqli_query($conn,$sqlSUFI1);
    if ($resultSUFI1->num_rows > 0 ) {
        $sqlDIFF1 = "DELETE FROM orders WHERE UserEmail = '$UserEmail' AND ItemID = '$id1'";
        mysqli_query($conn,$sqlDIFF1);
    } else {
        // Sql To Get Item Price
        $sqlGIP = "SELECT SellPrice FROM items WHERE ID = '$id1'";
        $resultGIP = mysqli_query($conn,$sqlGIP);
        $rowGIP = $resultGIP->fetch_assoc();
        $ItemPrice = $rowGIP['SellPrice'];
        $sqlIITF1 = "INSERT INTO orders (UserEmail,ItemID,ItemQuentity,ItemPrice) VALUES ('$UserEmail', '$id1', 1, '$ItemPrice')";
        mysqli_query($conn,$sqlIITF1);
        header("Location:shop.php");
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
  <title>
  <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'المتجر || جروسارس';
                } else {
                    echo 'Grocers || Our Shop';
                }
            ?>
  </title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/shope.css">
</head>

<body <?php if (@$_SESSION['lang'] == 'ar') {echo 'class="ar"';}?>>
  <section>
    <div class="top">
      <div class="lang">
      <a href="<?php if (!isset($_SESSION['lang'])) {echo 'lang.php?ar';} else {echo 'lang.php';}?>">
          <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'English';
                } else {
                    echo 'Arabic';
                }
            ?>
        </a>
      </div>
      <div class="name">
      <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'المتجر';
                } else {
                    echo 'Our Shop';
                }
            ?>
      </div>
      <div class="box">
      </div>
    </div>
    <div class="filter">
      <div class="search">
        <input type="text" <?php if (@$_SESSION['lang'] == 'ar') {echo 'class="ar"';}?> name="ItemName" placeholder="<?php if (@$_SESSION['lang'] == 'ar') {echo ' . . .  بحث عن المنتجات';} else {echo 'Search Your Item . . .';}?>">
        <i class="fa fa-search"></i>
      </div>
      <div class="btn-sh-filter">
        <i class="fa fa-cogs"></i>
      </div>
    </div>
    <div class="categories">
      <ul>
        <li><a href="categories.php?cat=Vegetable">
        <?php if (@$_SESSION['lang'] == 'ar') {echo 'خضراوات';} else {echo 'Vegetable';}?>
        </a></li>
        <li><a href="categories.php?cat=Fish">
        <?php if (@$_SESSION['lang'] == 'ar') {echo 'أسماك';} else {echo 'Fish';}?>
        </a></li>
        <li><a href="categories.php?cat=Meat">
        <?php if (@$_SESSION['lang'] == 'ar') {echo 'لحوم';} else {echo 'Meat';}?>
        </a></li>
        <li><a href="categories.php?cat=Baker">
        <?php if (@$_SESSION['lang'] == 'ar') {echo 'مخبوزات';} else {echo 'Baker';}?>
        </a></li>
        <li><a href="categories.php?cat=Drinks">
        <?php if (@$_SESSION['lang'] == 'ar') {echo 'مشروبات';} else {echo 'Drinks';}?>
        </a></li>
        <li><a href="categories.php?cat=Chips">
        <?php if (@$_SESSION['lang'] == 'ar') {echo 'تسالي';} else {echo 'Chips';}?>
        </a></li>
      </ul>
    </div>
    <div class="item-container">

      <?php 
            
            if ($resultGAI->num_rows > 0) {
                while ($rowGAI = $resultGAI->fetch_assoc()) {
                    echo '
                    
                    <div class="item-box">
                        <a  href="item.php?id=' . $rowGAI['ID'] . '">
                            <img src="' . $rowGAI['ItemImage'] . '" alt="' . $rowGAI['Item'] . '">
                            <div class="item-info">
                                <p class="name">';
                                
                                if (@$_SESSION['lang'] == 'ar') {
                                  $itmname = $rowGAI['ItemAr'];
                                  $itmnunite = $rowGAI['UnitAr'];
                                  $itmprice = ' جنية';
                                } else {
                                  $itmname = $rowGAI['Item'];
                                  $itmnunite = $rowGAI['Unit'];
                                  $itmprice = 'ُ EGP';
                                }

                                echo $itmname . '</p>
                                <p class="unit">1 ' . $itmnunite . '</p>
                            </div>
                        </a>
                        <div class="item-action">
                            <p class="love">
                                <form class="formlove" action="' . $_SERVER['PHP_SELF'] . '" method="GET">
                                    <button type="submit" name="love" value="' . $rowGAI['ID'] . '">
                                        <i class="fa fa-heart ';
                                        
                                        // Add Class Active

                                        $sqlSAFI = "SELECT ItemID FROM favorites WHERE UserEmail = '$UserEmail'";
                                        $resultUAFI = mysqli_query($conn,$sqlSAFI);
                                        
                                        // Array Of User Already Favorite Items
                                        $UAFI = [];

                                        if ($resultUAFI->num_rows > 0) {
                                            while ($rowUAFI = $resultUAFI->fetch_assoc()) {
                                                array_push($UAFI,$rowUAFI['ItemID']);
                                            }
                                        }
                                        if (in_array($rowGAI['ID'],$UAFI)) {
                                            echo ' active';
                                        }
                                        
                                        
                                        echo '"></i>
                                    </button>
                                </form>
                            </p>
                            <p class="price">' . $rowGAI['SellPrice'] . $itmprice . ' </p>
                            <p class="addToCart">
                                <form class="formCart" action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                                    <button type="submit" name="cart" value="' . $rowGAI['ID'] . '">
                                        <i class="fa fa-shopping-basket ';
                                        
                                        // Add Class Active

                                        $sqlSAIC = "SELECT ItemID FROM orders WHERE UserEmail = '$UserEmail'";
                                        $resultSAIC = mysqli_query($conn,$sqlSAIC);
                                        
                                        // Array Of User Already Favorite Items
                                        $UAIC = [];

                                        if ($resultSAIC->num_rows > 0) {
                                            while ($rowSAIC = $resultSAIC->fetch_assoc()) {
                                                array_push($UAIC,$rowSAIC['ItemID']);
                                            }
                                        }
                                        if (in_array($rowGAI['ID'],$UAIC)) {
                                            echo ' active';
                                        }
                                        

                                        

                                        echo '"></i>
                                    </button>
                                </form>
                            </p>
                        </div>
                    </div>
                    
                    ';
                }
            }
            ?>

    </div>
  </section>
  <div class="notifications">
    <div class="content">
      <i class="fa fa-times"></i>

      <?php
            
            if ($resultGUN->num_rows > 0) {

                while ($rowGUN = $resultGUN->fetch_assoc()) {
                    echo '
                    
                    <div class="noti">
                        <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                            <textarea name="NotiText" readonly>' . $rowGUN['NotifiText'] . '</textarea>
                            <div class="action-btn">
                                <input type="submit" name="delete" value="';
                                  if ($_SESSION['lang'] == 'ar') {
                                    echo 'حذف';
                                  } else {
                                    echo 'Delete';
                                  }
                                echo' ">
                            </div>
                        </form>
                    </div>
                    
                    ';
                }
            } else {
                echo '
                    <p style="font-weight:bold;font-size: 17px;text-align: center;">There Is No Notification Now</p>
                ';
            }
            
            ?>
    </div>
  </div>
  <div class="left-nav">
    <i class="fa fa-cog"></i>
  </div>
  <div class="over-nav">
    <i class="fa fa-times"></i>
    <img src="imgs/user.png" alt="">
    <ul>
      <li><?php echo $_SESSION['UserName'];?></li>
      <li><?php echo $_SESSION['UserEmail'];?></li>
    </ul>
    <ul>
      <li>
        <?php
                
                if ($_SESSION['UserEmail'] == 'admin@admin.com') {
                    echo '
                    <li><a href="controls/index.php">
                    ';

      
      if ($_SESSION['lang'] == 'ar') {
        echo 'التحكم';
      } else {
        echo 'Controls';
      }

                    echo '
                    </a></li>
                    ';
                }

                ?>
      </li>
      <li><a href="sign-out.php">
      <?php
      
      if ($_SESSION['lang'] == 'ar') {
        echo 'تسجيل الخروج';
      } else {
        echo 'Sign';
      }
      
      ?>
      </a></li>

    </ul>
  </div>
  <?php include 'nav.php';?>

  <script src="js/jquery.main.js"></script>
  <script src="js/main.js"></script>
  <script>
  var leftNav = document.querySelector('.left-nav');


  leftNav.onclick = function() {
    $('.over-nav').fadeIn();
  }

  $('.over-nav i').click(function() {
    $('.over-nav').fadeOut();
  })
  </script>
</body>

</html>