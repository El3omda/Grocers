<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Informations</title>
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <section>
        <a class="abs-top0 abs-top" href="show.php">
            <i class="fa fa-angle-left"></i>
        </a>
        <div class="edit-user-info">
            <form action="" method="POST">
                <div class="input-field">
                    <label for="">Name</label>
                    <input type="text" value="" name="UserName" placeholder="Enter User Name . . ." required>
                </div>
                <div class="input-field">
                    <label for="">Email</label>
                    <input type="email" value="" name="UserEmail" placeholder="Enter User Email . . ." required>
                </div>
                <div class="input-field">
                    <label for="">Password</label>
                    <input type="text" value="" name="UserPass" placeholder="Enter User Password . . ." required>
                </div>
                <div class="input-field">
                    <label for="">Phone</label>
                    <input type="text" value="" name="UserPhone" placeholder="Enter User Phone . . ." required>
                </div>
                <div class="input-field">
                    <input type="submit" name="update" value="Update">
                </div>
                <div class="input-field">
                    <input type="submit" name="delete" value="Delete" formnovalidate>
                </div>
            </form>
        </div>
    </section>
</body>

</html>