<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Items</title>
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <style>
        @font-face {
            font-family: ubuntu;
            src: url(../../fonts/ubuntu.ttf);
        }
        .links-container {
            width: 70%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .links-container ul {
            list-style: none;
        }

        ul li {
             text-align: center;
             font-weight: bold;
             font-family: ubuntu,arial;
             width: 50%;
             margin: 10px auto;
             font-size: 20px;

        }
        
        ul li a {
            text-decoration: none;
            display: block;
            width: 100%;
            border: 1px solid #5dc002;
            padding: 20px 0;
            border-radius: 10px;
            background-color: #5dc002;
            color: #fff;
            transition: all .3s;
        }

        ul li a:hover {
            color: #5dc002;
            background-color: #fff;
        }
        
.control {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    background-color: #5dc002;
    border: 1px solid #5dc002;
    border-radius: 5px;
    color: #fff;
    font-size: 22px;
    transition: all .3s;
}

.control:hover {
    background-color: #fff;
    color: #5dc002;
}

    </style>
</head>
<body>
    <a class="control" href="../index.php"><i class="fa fa-angle-left"></i></a>
    <div class="links-container">
        <ul>
            <li><a href="add.php">Add New Item</a></li>
            <li><a href="show.php">Show Items</a></li>
        </ul>
    </div>
</body>
</html>