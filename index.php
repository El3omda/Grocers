<?php

session_start();

if (isset($_SESSION['UserEmail'])) {
    header('Location:shop.php');
}

$_SESSION['url'] = $_SERVER['SCRIPT_NAME'];

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

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
                echo 'الصفحة الرئيسية || جروسارس';
            } else {
                echo 'Grocers Home Page';
            }
        ?>
  </title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body <?php
        if (@$_SESSION['lang'] == 'ar') {
            echo 'class="ar"';
        }
    ?>>

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
                echo 'الصفحة الرئيسية';
            } else {
                echo 'Home Page';
            }
        ?>
      </div>
      <div class="box"></div>
    </div>
    <div class="take-action">
      <p class="head">
        <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo '<i class="fa fa-hand-pointer-o"></i> اشتري كل اللي محتاجة <span>بضغظة</span>';
                } else {
                    echo 'Buy All You Need By <span>clicks</span> <i class="fa fa-hand-pointer-o"></i>';
                }
            ?>
        <br>
        <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'سجل حساب جديد او سجل دخولك';
                } else {
                    echo 'Sign In Or Sign Up';
                }
            ?>
      </p>
      <div class="box">
        <a class="green-btn" href="sign-up.php">
        <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'حساب جديد';
                } else {
                    echo 'Sign Up';
                }
            ?>
        </a>
        <a class="green-btn" href="sign-in.php">
        <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'تسجيل دخول';
                } else {
                    echo 'Sign In';
                }
            ?>    
        </a>
      </div>
    </div>
  </section>

</body>

</html>