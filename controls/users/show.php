<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Users || Show Users</title>
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="css/show.css">
</head>

<body>
    <a class="control" href="index.php"><i class="fa fa-cogs"></i></a>
    <div class="filter">
        <form action="" method="POST">
            <input type="search" name="itemName" placeholder="Enter User Name, Phone Or Email . . . " required>
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="items-container">
        <table>
            <tr>
                <th>User Name</th>
                <th>User Phone</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>Emad Othman</td>
                <td>01202716895</td>
                <td>
                    <a href="user.php">Show Data</a>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>