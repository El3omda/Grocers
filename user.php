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
                <input type="text" value="" name="UserName" placeholder="Enter Your Name . . ." >
            </div>
            <div class="input-field">
                <label for="">Email</label>
                <input type="email" value="" name="UserEmail" placeholder="Enter Your Email . . ." >
            </div>
            <div class="input-field">
                <label for="">Password</label>
                <input type="text" value="" name="UserPass" placeholder="Enter Your Password . . ." >
            </div>
            <div class="input-field">
                <label for="">Phone</label>
                <input type="text" value="" name="UserPhone" placeholder="Enter Your Phone . . ." >
            </div>
            <div class="input-field">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
        </div>
    </section>
</body>
</html>