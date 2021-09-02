<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Items || Show Items</title>
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="css/show.css">
</head>

<body>
    <a class="control" href="index.php"><i class="fa fa-cogs"></i></a>
    <div class="filter">
        <form action="" method="POST">
            <input type="search" name="itemName" placeholder="Enter Item Name . . . " required>
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="items-container">
        <table>
            <tr>
                <th>Item</th>
                <th>In Stock</th>
                <th>Sell Price</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>Tomato</td>
                <td>20 KG</td>
                <td>10 EGP</td>
                <td>
                    <a href="item.php">All Data</a>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>