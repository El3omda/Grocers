<?php

session_start();

if (isset($_SESSION['UserEmail'])) {
    header('Location:shop.php');
}

$_SESSION['url'] = $_SERVER['SCRIPT_NAME'];

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

require_once 'config.php';



    @$UserName = $_POST['UserName'];
    @$UserEmail = $_POST['UserEmail'];
    @$UserPass = $_POST['UserPass'];

    // Sql Add New User
if (isset($_POST['submit'])) {

    $sqlNU = "INSERT INTO users (Name, Email, Password) VALUES ('$UserName', '$UserEmail', '$UserPass')";
    if (mysqli_query($conn,$sqlNU)) {
        $msg = 'Your Account Created Successfully';
        header("Refresh: 2;url=sign-in.php");
    } else {
        $msg = 'This Email Is Already Register';
        mysqli_close($conn);
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
                echo ' تسجيل حساب جديد || جروسارس';
            } else {
                echo 'Grocers Register New Account';
            }
        ?></title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body <?php
        if (@$_SESSION['lang'] == 'ar') {
            echo 'class="ar"';
        }
    ?>>

  <section>
    <div class="screen">
      <i class="fa fa-times"></i>
      <p><?php echo @$msg;?></p>
    </div>
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
                    echo 'تسجيل حساب جديد';
                } else {
                    echo 'Register';
                }
            ?>
      </div>
      <div class="box"></div>
    </div>
    <div class="take-action signup">
      <p class="head">
        <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'سجل حساب جديد';
                } else {
                    echo 'Register A New Account';
                }
            ?>
      </p>
      <form action="" method="POST">
        <div class="input-field">
          <label for="">
            <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'الاسم';
                } else {
                    echo 'Name';
                }
            ?>
          </label>
          <input <?php if (@$_SESSION['lang'] == 'ar') {echo 'class="ar"';}?> type="text" name="UserName" placeholder="<?php if (@$_SESSION['lang'] == 'ar') {echo ' . . .  أكتب اسمك';} else {echo 'Enter Your Name . . .';}?>" required>
        </div>
        <div class="input-field">
          <label for="">
            <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'الايمال';
                } else {
                    echo 'Email';
                }
            ?>
          </label>
          <input type="email" <?php if (@$_SESSION['lang'] == 'ar') {echo 'class="ar"';}?> name="UserEmail" placeholder="<?php if (@$_SESSION['lang'] == 'ar') {echo ' . . .  أكتب ايمالك';} else {echo 'Enter Your Email . . .';}?>" required>
        </div>
        <div class="input-field">
          <label for="">
            <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'كلمة المرور';
                } else {
                    echo 'Password';
                }
            ?>
          </label>
          <input type="password" <?php if (@$_SESSION['lang'] == 'ar') {echo 'class="ar"';}?> name="UserPass" placeholder="<?php if (@$_SESSION['lang'] == 'ar') {echo ' . . .  أكتب كلمة مرورك';} else {echo 'Enter Your Password . . .';}?>" required>
        </div>
        <div class="input-field">
          <input <?php if (@$_SESSION['lang'] == 'ar') {echo 'class="ar"';}?> type="submit" name="submit"
            value="<?php if (@$_SESSION['lang'] == 'ar') {echo 'تسجيل';} else {echo 'Register';}?>">
        </div>
      </form>
    </div>
  </section>
  <script>
  var screenClose = document.querySelector('.screen i');
  var screen = document.querySelector('.screen p');
  if (screen.innerHTML == 'This Email Is Already Register') {
    screen.classList.add('warning');
  } else if (screen.innerHTML == "Your Account Created Successfully") {
    screen.classList.add('success');
  } else if (screen.innerHTML == "") {
    screenClose.parentElement.style.display = "none";
  }

  screenClose.onclick = function() {
    screenClose.parentElement.style.display = "none";
  }
  </script>
</body>

</html>