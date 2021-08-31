<link rel="stylesheet" href="css/font-awesome.min.css">
<nav>
    <ul>
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
        <li>
                <a href="#"><i class="fa fa-shopping-basket"></i></a>
        </li>
        <li><a href="#"><i class="fa fa-heart"></i></a></li>
        <li><a href="#"><i class="fa fa-user"></i></a></li>
    </ul>
</nav>
<style>
    * {
        padding: 0;
        margin: 0;
    }
    nav {
        position: absolute;
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
</style>