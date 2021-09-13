<?php

require_once 'config.php';

session_start();

if (!isset($_SESSION['UserEmail'])) {
    header("Location:index.php");
}

header("Refresh:7;url=shop.php");

// Get User All Data

$UserEmail = $_SESSION['UserEmail'];
$sqlGUD = "SELECT * From users WHERE Email = '$UserEmail'";
$resultGUD = mysqli_query($conn,$sqlGUD);
$rowGUD = $resultGUD->fetch_assoc();


// Start Notifications Creator

# Check If User Enter His Phone

if (empty($rowGUD['Phone'])) {
    // Add Notification Of Etering Phone
    $NotifiText = 'Please Compelete Your Account Informations';
    $sqlEYP = "INSERT INTO notifications (UserEmail, NotifiText) VALUES ('$UserEmail', '$NotifiText')";
    mysqli_query($conn,$sqlEYP);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading . . . </title>
    <style>
    @font-face {
        font-family: ubuntu;
        src: url(fonts/ubuntu.ttf);
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f9f9f9;
    }

    .loading {
        width: 90%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        font-family: ubuntu;
    }

    .loading .welcome {
        font-weight: bold;
        font-size: 17px;
        line-height: 1.7;
    }

    .prog {
        border: 1px solid #DF2E2E;
        height: 35px;
        width: 250px;
        margin: auto;
        border-radius: 5px;
        background-color: #fff;
        margin-top: 5px;
    }

    .prog .bar {
        border-radius: 5px;
        border: 1px solid #fff;
        height: 97%;
        background-color: #5dc002;
        width: 20%;
        transition: width 4s;
        color: #DF2E2E;
        font-weight: bold;
    }

    .prog .bar span {
        line-height: 30px;
        color: #fff;
        font-weight: bold;
    }

    .start {
        width: 100% !important;
    }
    .hidden {
        height: 40px;
        display: none;
        font-weight: bold;
        line-height: 38px;
    }
    </style>
</head>

<body>
    <div class="loading">
        <p class="welcome">
            Welcome <?php echo $_SESSION['UserName'];?><br> We Preparing The Site For You
        </p>
        <div class="progress-box">
            <div class="prog">
                <div class="bar">
                    <span>25</span> %
                </div>
            </div>
        </div>
        <p class="hidden">You Will Be Redirected Now . . .</p>
    </div>
    <script src="js/jquery.main.js"></script>
    <script>
        var progbar = document.querySelector('.bar span');
        var prog = document.querySelector('.bar');
        var changeValue = setInterval(function() {
            progbar.innerHTML = parseInt(progbar.innerHTML) + 25;
            if (progbar.innerHTML == "100") {
            clearInterval(changeValue);
        }
        }, 1000);
        window.onload = function () {
            prog.classList.add('start');
            setTimeout(function() {
                $('.progress-box').slideUp();
                $('.hidden').delay(500).slideDown();
            },4500);
        }
    </script>
</body>

</html>