<?php

session_start();

if ($_SESSION['UserEmail'] != 'admin@admin.com') {
    header('Location:../../index.php');
}

require_once '../../config.php';


if (isset($_POST['AddItem'])) {
    @$ItemName = $_POST['ItemName'];
    @$ItemNameAR = $_POST['ItemNameAR'];
    @$ItemImage = $_POST['ItemImage'];
    @$InStock = $_POST['InStock'];
    @$BuyPrice = $_POST['BuyPrice'];
    @$SellPrice = $_POST['SellPrice'];
    @$ItemUnit = $_POST['ItemUnit'];
    @$ItemUnitAR = $_POST['ItemUnitAR'];
    @$ItemInfo = $_POST['ItemInfo'];
    @$ItemInfoAR = $_POST['ItemInfo'];
    @$ItemCal = $_POST['ItemCal'];
    @$ItemType = $_POST['ItemType'];
    @$ItemTypeAR = $_POST['ItemTypeAR'];

    // Sql Insert Items
    $sqlII = "INSERT INTO items (Item,ItemAr,ItemImage,InStock,BuyPrice,SellPrice,Unit,UnitAr,ItemInfo,ItemInfoAr,ItemCal,ItemType,ItemTypeAr)
    VALUES ('$ItemName','$ItemNameAR','$ItemImage','$InStock','$BuyPrice','$SellPrice','$ItemUnit','$ItemUnitAR','$ItemInfo','$ItemInfoAR','$ItemCal','$ItemType','$ItemTypeAR')";
    if (mysqli_query($conn,$sqlII)) {
        echo 'Inserted Successfully';
    } else {
        echo 'Something Wrong !! => ' . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Items || Add New</title>
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="css/add.css">
</head>

<body>
    <section>
        <a class="control" href="index.php"><i class="fa fa-cogs"></i></a>
        <div class="add-new-item">
            <form action="" method="POST">
                <div class="left">
                    <div class="input-feild">
                        <label for="ItemName">Item Name</label>
                        <input type="text" name="ItemName" id="ItemName" required>
                    </div>
                    <div class="input-feild">
                        <label for="ItemNameAR">Arabic Item Name</label>
                        <input type="text" name="ItemNameAR" id="ItemNameAR" required>
                    </div>
                    <div class="input-feild">
                        <label for="ItemImage">Item Image</label>
                        <input type="text" name="ItemImage" id="ItemImage" required>
                    </div>
                    <div class="input-feild">
                        <label for="InStock">In Stock</label>
                        <input type="text" name="InStock" id="InStock" required>
                    </div>
                    <div class="input-feild">
                        <label for="BuyPrice">Buy Price</label>
                        <input type="text" name="BuyPrice" id="BuyPrice" required>
                    </div>
                    <div class="input-feild">
                        <label for="SellPrice">Sell Price</label>
                        <input type="text" name="SellPrice" id="SellPrice" required>
                    </div>
                    <div class="input-feild">
                        <label for="ItemTypeAR">Arabic Item Type</label>
                        <select name="ItemTypeAR" id="ItemTypeAR">
                            <option value="شيبسي">شيبسي</option>
                            <option value="مشروبات">مشروبات</option>
                            <option value="خضراوات">خضراوات</option>
                            <option value="فواكهة">فواكهة</option>
                        </select>
                    </div>
                </div>
                <div class="right">
                    <div class="input-feild">
                        <label for="Unit">Unit</label>
                        <select name="ItemUnit" id="Unit">
                            <option value="KG">KG</option>
                            <option value="G">G</option>
                            <option value="L">L</option>
                            <option value="ML">ML</option>
                            <option value="Pk">Pk</option>
                            <option value="Pice">Pice</option>
                        </select>
                    </div>
                    <div class="input-feild">
                        <label for="UnitAR">Unit</label>
                        <select name="ItemUnitAR" id="UnitAR">
                            <option value="كيلو">كيلو</option>
                            <option value="جرام">جرام</option>
                            <option value="لتر">لتر</option>
                            <option value="مليلتر">مليلتر</option>
                            <option value="صندوق">صندوق</option>
                            <option value="قطعة">قطعة</option>
                        </select>
                    </div>
                    <div class="input-feild">
                        <label for="ItemInfo">Item Info</label>
                        <textarea name="ItemInfo" id="ItemInfo" required></textarea>
                    </div>
                    <div class="input-feild">
                        <label for="ItemInfoAR">Arabic Item Info</label>
                        <textarea name="ItemInfoAR" id="ItemInfoAR" required></textarea>
                    </div>
                    <div class="input-feild">
                        <label for="ItemCal">Item Calories</label>
                        <input type="text" name="ItemCal" id="ItemCal" required>
                    </div>
                    <div class="input-feild">
                        <label for="ItemType">Item Type</label>
                        <select name="ItemType" id="ItemType">
                            <option value="Chips">Chips</option>
                            <option value="Drinks">Drinks</option>
                            <option value="vegetables">vegetables</option>
                            <option value="Fruits">Fruits</option>
                        </select>
                    </div>
                </div>
                <div class="input-feild">
                    <input type="submit" name="AddItem" value="Add">
                </div>
            </form>
        </div>
    </section>
</body>

</html>