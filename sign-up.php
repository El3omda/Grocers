<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocers Home Page</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

<section>
    <div class="top">
        <div class="lang">
            <a href="#">Arabic</a>
        </div>
        <div class="name">Sign Up</div>
        <div class="box"></div>
    </div>
    <div class="take-action signup">
        <p class="head">
            Register A New Account
        </p>
        <form action="" method="POST">
            <div class="input-field">
                <label for="">Name</label>
                <input type="text" name="UserName" placeholder="Enter Your Name . . ." required>
            </div>
            <div class="input-field">
                <label for="">Email</label>
                <input type="email" name="UserEmail" placeholder="Enter Your Email . . ." required>
            </div>
            <div class="input-field">
                <label for="">Password</label>
                <input type="password" name="UserPass" placeholder="Enter Your Password . . ." required>
            </div>
            <div class="input-field">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
</section>

</body>

</html>