<?php

session_start();

require_once 'config.php';

if (!isset($_SESSION['UserEmail'])) {
    header('Location:index.php');
}

// SQL GET Avaliable Items 

if ($_REQUEST['cat'] == 'Vegetable') {
    $type = 'vegetables';
} elseif ($_REQUEST['cat'] == 'Fish') {
    $type = 'Fish';
} elseif ($_REQUEST['cat'] == 'Meat') {
    $type = 'Meat';
} elseif ($_REQUEST['cat'] == 'Baker') {
    $type = 'Baker';
} elseif ($_REQUEST['cat'] == 'Drinks') {
    $type = 'Drinks';
} elseif ($_REQUEST['cat'] == 'Chips') {
    $type = 'Chips';
} else {
    header("Location:shop.php");
}

$sqlGAI = "SELECT * FROM items WHERE InStock > 0 AND ItemType = '$type'";

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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocers || Our Shop</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/shope.css">
</head>

<body>
    <section>
        <div class="top">
            <div class="lang">
                <a href="#">Arabic</a>
            </div>
            <div class="name">Our Categories</div>
            <div class="box">
            </div>
        </div>
        <div class="filter">
            <div class="search">
                <input type="text" name="ItemName" placeholder="Search Your Item . . .">
                <i class="fa fa-search"></i>
            </div>
            <div class="btn-sh-filter">
                <i class="fa fa-cogs"></i>
            </div>
        </div>
        <div class="categories">
            <ul>
                <li><a href="categories.php?cat=Vegetable">Vegetable</a></li>
                <li><a href="categories.php?cat=Fish">Fish</a></li>
                <li><a href="categories.php?cat=Meat">Meat</a></li>
                <li><a href="categories.php?cat=Baker">Baker</a></li>
                <li><a href="categories.php?cat=Baker">Drinks</a></li>
                <li><a href="categories.php?cat=Chips">Chips</a></li>
            </ul>
        </div>
        <div class="item-container">

            <?php 
            
            if ($resultGAI->num_rows > 0) {
                while ($rowGAI = $resultGAI->fetch_assoc()) {
                    echo '
                    
                    <div class="item-box">
                        <a  href="item.php?id='. $rowGAI['ID'] . '">
                            <img src="' . $rowGAI['ItemImage'] . '" alt="' . $rowGAI['Item'] . '">
                            <div class="item-info">
                                <p class="name">' . $rowGAI['Item'] . '</p>
                                <p class="unit">1' . $rowGAI['Unit'] . ' Price</p>
                            </div>
                        </a>
                        <div class="item-action">
                            <p class="love">
                                <i class="fa fa-heart"></i>
                            </p>
                            <p class="price">' . $rowGAI['SellPrice'] . ' EGP</p>
                            <p class="addToCart">
                                <i class="fa fa-shopping-basket"></i>
                            </p>
                        </div>
                    </div>
                    
                    ';
                }
            } else {
                echo '
                <p style="font-weight:bold;font-size:16px;text-align: center;margin-top: 30px;">There Is No Avaliable Data Now Try Again Later</p>
                ';
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
                                <input type="submit" name="delete" value="Delete">
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
                    <li><a href="controls/index.php">Control</a></li>
                    ';
                }

                ?>
            </li>
            <li><a href="sign-out.php">Sign Out</a></li>
        </ul>
    </div>
    <?php include 'nav.php';?>

    <script src="js/jquery.main.js"></script>
    <script src="js/main.js"></script>
    <script>
        var leftNav = document.querySelector('.left-nav');


        leftNav.onclick = function () {
            $('.over-nav').fadeIn();
        }

        $('.over-nav i').click(function () {
            $('.over-nav').fadeOut();
        })
    </script>
</body>

</html>