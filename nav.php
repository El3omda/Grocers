<link rel="stylesheet" href="css/font-awesome.min.css">
<nav>
    <ul>
        <li><a href="shop.php"><i class="fa fa-home"></i></a></li>
        <li><a href="#"><i class="fa fa-bell-o"></i>
            <?php
            
                if (@$NotifiNo != 0) {
                    echo '
                        <span>' . @$NotifiNo . '</span>
                    ';
                }

            ?>
            
            </a></li>
        <li>
            <a href="cart.php"><i class="fa fa-shopping-basket"></i></a>
        </li>
        <li><a href="favorites.php"><i class="fa fa-heart"></i></a></li>
        <li><a href="user.php"><i class="fa fa-user"></i></a></li>
    </ul>
</nav>
<style>
* {
    padding: 0;
    margin: 0;
}

nav {
    position: fixed;
    bottom: 0;
    right: 0;
    left: 0;
    padding: 15px 0;
    border: 1px solid #5dc002;
    border-top-right-radius: 25px;
    border-top-left-radius: 25px;
    background-color: #5dc002;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline-block;
    float: left;
    width: calc(100% / 4);
    text-align: center;
}

nav ul li a {
    font-size: 30px;
    color: #fff;
    transition: all .3s;
}

nav ul li a:hover {
    color: #EEE;
}

nav ul li:nth-of-type(3) {
    position: relative;
}

nav ul li:nth-of-type(3) a {
    position: absolute;
    top: -57px;
    left: 0;
    transform: translateX(-50%);
    border: 3px solid #5dc002;
    padding: 20px;
    border-radius: 50%;
    background-color: #f9f9f9;
    color: #5dc002;
}

nav ul li:nth-of-type(3) a:hover {
    background-color: #fff;
}

nav ul li:nth-of-type(4) a:hover i {
    color: #DF2E2E;
}

nav ul li:nth-of-type(3) a span,
nav ul li:nth-of-type(2) a span {
    position: absolute;
    bottom: 0;
    color: #DF2E2E;
    font-size: 17px;
    font-weight: bold;
    width: 25px;
    height: 25px;
    line-height: 21px;
    border-radius: 50%;
    background-color: #fff;
    border: 1px solid #DF2E2E;
}

nav ul li:nth-of-type(3) a span,
nav ul li:nth-of-type(2) a span {
    bottom: 5px;
}

@media (max-width:780px) {
    nav ul li:nth-of-type(3) a {
        top: -53px;
        padding: 15px;
    }
}

@media (max-width:600px) {
    nav ul li:nth-of-type(3) a {
        top: -53px;
        padding: 12px;
    }

    nav ul li:nth-of-type(3) a span,
    nav ul li:nth-of-type(2) a span {
        font-size: 13px;
        width: 20px;
        height: 20px;
        line-height: 17px;
    }
}

@media (max-width:480px) {
    nav ul li:nth-of-type(3) a {
        top: -48px;
        padding: 8px;
    }

    nav ul li:nth-of-type(3) a span,
    nav ul li:nth-of-type(2) a span {
        font-size: 13px;
        width: 20px;
        height: 20px;
        line-height: 17px;
    }
}

@media (max-width:360px) {
    nav ul li:nth-of-type(3) a {
        top: -42px;
        padding: 5px;
    }

    nav ul li a {
        font-size: 24px;
    }
}

@media (max-width:290px) {
    nav ul li:nth-of-type(3) a {
        top: -38px;
    }

    nav ul li a {
        font-size: 20px;
    }

    nav ul li:nth-of-type(3) a span,
    nav ul li:nth-of-type(2) a span {
        font-size: 10px;
        width: 18px;
        height: 19px;
    }
}
</style>