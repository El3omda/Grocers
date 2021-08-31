<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocers || Our Shop</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/shope.css">
</head>
<body>
    <section>
    <div class="top">
        <div class="lang">
            <a href="#">Arabic</a>
        </div>
        <div class="name">Our Shop</div>
        <div class="box">
            <i class="fa fa-bars"></i>
        </div>
    </div>
    <div class="filter">
        <div class="search">
            <input type="text" name="ItemName" placeholder="Search Your Item . . .">
            <i class="fa fa-search"></i>
        </div>
        <div>
            <i class="fa fa-cogs"></i>
        </div>
    </div>
    <div class="categories">
        <ul>
            <li><a href="#">All</a></li>
            <li><a href="#">Vegetable</a></li>
            <li><a href="#">Fish</a></li>
            <li><a href="#">Meat</a></li>
            <li><a href="#">Baker</a></li>
            <li><a href="#">Drinks</a></li>
            <li><a href="#">Chips</a></li>
        </ul>
    </div>
    <div class="item-container">
        <a href="#" class="item-box">
            <img src="imgs/items/tomato.png" alt="">
            <div class="item-info">
                <p class="name">Tomato</p>
                <p class="unit">1KG Price</p>
            </div>
            <div class="item-action">
                <p class="love">
                    <i class="fa fa-heart-o"></i>
                </p>
                <p class="price">10 EGP</p>
                <p class="addToCart">
                    <i class="fa fa-shopping-basket"></i>
                </p>
            </div>
        </a>
        <a href="#" class="item-box">
            <img src="imgs/items/chili.png" alt="">
            <div class="item-info">
                <p class="name">Chili</p>
                <p class="unit">1KG Price</p>
            </div>
            <div class="item-action">
                <p class="love">
                    <i class="fa fa-heart-o"></i>
                </p>
                <p class="price">15 EGP</p>
                <p class="addToCart">
                    <i class="fa fa-shopping-basket"></i>
                </p>
            </div>
        </a>
        <a href="#" class="item-box">
            <img src="imgs/items/carrots.png" alt="">
            <div class="item-info">
                <p class="name">Carrot</p>
                <p class="unit">1KG Price</p>
            </div>
            <div class="item-action">
                <p class="love">
                    <i class="fa fa-heart-o"></i>
                </p>
                <p class="price">25 EGP</p>
                <p class="addToCart">
                    <i class="fa fa-shopping-basket"></i>
                </p>
            </div>
        </a>
    </div>
    </section>
    <?php include 'nav.php';?>
</body>
</html>