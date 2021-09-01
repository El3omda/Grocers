<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <section>
        <a class="abs-top0 abs-top" href="#">
            <i class="fa fa-bars"></i>
        </a>
        <a class="abs-top1 abs-top" href="shop.php">
            <i class="fa fa-home"></i>
        </a>
        <p class="head">
            Your Cart
        </p>
        <div class="item-u-selected">
            <table>
                <tr>
                    <th>Item</th>
                    <th>Item Image</th>
                    <th>Quantity</th>
                    <th>Price / Unite</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                </tr>
                <tr>
                    <td>Tomato</td>
                    <td><img src="imgs/items/tomato.png" alt=""></td>
                    <td><span class="itqu">6.5</span> KG</td>
                    <td><span class="itpr">10</span> EGP</td>
                    <td><span class="ittopr"></span> EGP</td>
                    <td><a href="#"><i class="fa fa-times"></i></a></td>
                </tr>
                <tr>
                    <td>Carrot</td>
                    <td><img src="imgs/items/carrots.png" alt=""></td>
                    <td><span class="itqu">2</span> KG</td>
                    <td><span class="itpr">5</span> EGP</td>
                    <td><span class="ittopr"></span> EGP</td>
                    <td><a href="#"><i class="fa fa-times"></i></a></td>
                </tr>
                <tr>
                    <td>Chill</td>
                    <td><img src="imgs/items/chili.png" alt=""></td>
                    <td><span class="itqu">3.5</span> KG</td>
                    <td><span class="itpr">20</span> EGP</td>
                    <td><span class="ittopr"></span> EGP</td>
                    <td><a href="#"><i class="fa fa-times"></i></a></td>
                </tr>
            </table>
        </div>
        <div class="confirm">
            <ul>
                <li>Total Price <br> <span class="ftprice">50</span> <span class="cur">EGP</span></li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-basket"></i>
                        Confirm Buying
                    </a>
                </li>
            </ul>
        </div>
    </section>
<script src="js/jquery.main.js"></script>
<script src="js/main.js"></script>
</body>

</html>