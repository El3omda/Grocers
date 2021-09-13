<?php

require_once 'config.php';

session_start();

if (!isset($_SESSION['UserEmail'])) {
    header('Location:index.php');
}

// Get User Informations

$UserEmail = $_SESSION['UserEmail'];

$sqlGUI = "SELECT * FROM users WHERE Email = '$UserEmail'";

$result = mysqli_query($conn,$sqlGUI);

$rowGUI = $result->fetch_assoc();

// Update User DAta 

if (isset($_POST['submit'])) {
    @$UserName = $_POST['UserName'];
    @$UserEmail = $_POST['UserEmail'];
    @$UserPass = $_POST['UserPass'];
    @$UserPhone = $_POST['UserPhone'];

    $sqlUUI = "UPDATE users SET Name = '$UserName', Email = '$UserEmail', Password = '$UserPass', Phone = '$UserPhone' WHERE Email = '$UserEmail'";
    if (mysqli_query($conn,$sqlUUI)) {
        $msg = 'Updated Successfully';
    } else {
        $msg = mysqli_error($conn);
    }
}
echo @$msg;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Informations</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <section>
    <a class="abs-top0 abs-top" href="shop.php">
            <i class="fa fa-home"></i>
        </a>
        <a class="abs-top1 abs-top" href="#">
            <i class="fa fa-shopping-cart"></i>
        </a>
        <div class="edit-user-info">
        <form action="" method="POST">
            <div class="input-field">
                <label for="">Name</label>
                <input type="text" value="<?php echo $rowGUI['Name'];?>" name="UserName" placeholder="Enter Your Name . . ." >
            </div>
            <div class="input-field">
                <label for="">Email</label>
                <input type="email" value="<?php echo $rowGUI['Email'];?>" name="UserEmail" placeholder="Enter Your Email . . ." >
            </div>
            <div class="input-field">
                <label for="">Password</label>
                <input type="text" value="<?php echo $rowGUI['Password'];?>" name="UserPass" placeholder="Enter Your Password . . ." >
            </div>
            <div class="input-field">
                <label for="">Phone</label>
                <input type="text" value="<?php echo $rowGUI['Phone'];?>" name="UserPhone" placeholder="Enter Your Phone . . ." >
            </div>
            <div class="input-field">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
        </div>
    </section>
</body>
</html>