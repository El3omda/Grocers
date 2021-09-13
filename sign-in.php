<?php

session_start();

if (isset($_SESSION['UserEmail'])) {
    header('Location:shop.php');
}

$_SESSION['url'] = $_SERVER['SCRIPT_NAME'];

require_once 'config.php';

@$UserEmail = $_POST['UserEmail'];
@$UserPass = $_POST['UserPass'];


if (isset($_POST['submit'])) {
    // Sql Check If Email Exist With The Same Password

    $sqlSU = "SELECT Name, Email, Password FROM users WHERE Email = '$UserEmail' AND Password = '$UserPass'";

    $result = mysqli_query($conn,$sqlSU);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($_SESSION['lang'] == 'ar') {
        $msg = "Welcome Back You Will Be Redirected In 2 Seconds" ;
    } else {
            $msg = "مرحبا بعودتك سيتم تحويلك بعد 3 ثواني";
        }
        $_SESSION['UserName'] = $row['Name'];
        $_SESSION['UserEmail'] = $row['Email'];
        header("Refresh: 2;url= loading-data.php");

        // Make User Online
        $LoginEmail = $_SESSION['UserEmail'];
        $sqlUO = "UPDATE users SET Online = 'Yes' WHERE Email = '$LoginEmail'";
        mysqli_query($conn,$sqlUO);
    } else {
        if ($_SESSION['lang'] == 'ar') {
            $msg = "Wrong Email Or Password";
        } else {
            $msg = "الايمال او كلمة المرور غير صحيحان";
        }
    }
}
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
            if (@$_SESSION['lang'] == 'ar') {
                echo ' تسجيل دخول || جروسارس';
            } else {
                echo 'Grocers Login';
            }
        ?></title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body 
<?php
        if (@$_SESSION['lang'] == 'ar') {
            echo 'class="ar"';
        }
    ?>
    >

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
                    echo 'تسجيل الدخول';
                } else {
                    echo 'Sgin In';
                }
            ?>
            </div>
            <div class="box"></div>
        </div>
        <div class="take-action sign-in">
            <p class="head">
            <?php 
                if (@$_SESSION['lang'] == 'ar') {
                    echo 'سجل دخولك لحسابك';
                } else {
                    echo 'Sign In To Your Account';
                }
            ?>
                
            </p>
            <form action="" method="POST">
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
                    <input type="email" <?php if (@$_SESSION['lang'] == 'ar') {echo 'class="ar"';}?> value="<?php echo @$UserEmail;?>" name="UserEmail" placeholder="<?php if (@$_SESSION['lang'] == 'ar') {echo 'أكتب ايمالك . . . ';} else {echo 'Enter Your Email . . .';}?>" required>
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
                    <input type="password" <?php if (@$_SESSION['lang'] == 'ar') {echo 'class="ar"';}?> name="UserPass" value="<?php echo @$UserPass;?>" placeholder="<?php if (@$_SESSION['lang'] == 'ar') {echo 'أكتب كلمة مرورك . . . ';} else {echo 'Enter Your Password . . .';}?>" required>
                </div>
                <div class="input-field">
                    <input <?php if (@$_SESSION['lang'] == 'ar') {echo 'class="ar"';}?> type="submit" name="submit" value="<?php if (@$_SESSION['lang'] == 'ar') {echo 'دخول';} else {echo 'Login';}?>">
                </div>
            </form>
        </div>
    </section>
    <script>
    var screenClose = document.querySelector('.screen i');
    var screen = document.querySelector('.screen p');
    if (screen.innerHTML == 'Wrong Email Or Password') {
        screen.classList.add('warning');
    } else if (screen.innerHTML == "Welcome Back You Will Be Redirected In 2 Seconds") {
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