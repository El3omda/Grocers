<?php

session_start();

require_once '../../config.php';

if ($_SESSION['UserEmail'] != 'admin@admin.com') {
    header("Location:../../index.php");
}
$id = $_REQUEST['id'];
if (empty($id) || !isset($id)) {
    header('Location:index.php');
}

$sqlGI = "SELECT * FROM items WHERE ID = '$id'";
$result = mysqli_query($conn,$sqlGI);
$row = $result->fetch_assoc();

// Sql Update

if (isset($_POST['EditItem'])) {
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

    $sqlUpadte = "UPDATE items SET Item = '$ItemName' ,ItemAr = '$ItemNameAR',ItemImage = '$ItemImage',
InStock = '$InStock',BuyPrice = '$BuyPrice',SellPrice = '$SellPrice',Unit = '$ItemUnit',UnitAr = '$ItemUnitAR',
ItemInfo = '$ItemInfo',ItemInfoAr = '$ItemInfoAR',ItemCal = '$ItemCal',ItemType = '$ItemType',ItemTypeAr ='$ItemTypeAR' WHERE ID = '$id'";

    if (mysqli_query($conn,$sqlUpadte)) {
        echo 'Updated Successfully';
        header("Location:item.php?id=" . $row['ID']);
    } else {
        echo 'Somting Wrong => ' . mysqli_error($conn);
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
    <a class="control" href="show.php"><i class="fa fa-angle-left"></i></a>
    <div class="add-new-item">
      <form action="" method="POST">
        <div class="left">
          <div class="input-feild">
            <label for="ItemName">Item Name</label>
            <input type="text" name="ItemName" value="<?php echo $row['Item'];?>" id="ItemName" required>
          </div>
          <div class="input-feild">
            <label for="ItemName">Arabic Item Name</label>
            <input type="text" name="ItemNameAR" value="<?php echo $row['ItemAr'];?>" id="ItemName" required>
          </div>
          <div class="input-feild">
            <label for="ItemImage">Item Image</label>
            <input type="text" name="ItemImage" value="<?php echo $row['ItemImage'];?>" id="ItemImage" required>
          </div>
          <div class="input-feild">
            <label for="InStock">In Stock</label>
            <input type="text" name="InStock" value="<?php echo $row['InStock'];?>" id="InStock" required>
          </div>
          <div class="input-feild">
            <label for="BuyPrice">Buy Price</label>
            <input type="text" name="BuyPrice" value="<?php echo $row['BuyPrice'];?>" id="BuyPrice" required>
          </div>
          <div class="input-feild">
            <label for="SellPrice">Sell Price</label>
            <input type="text" name="SellPrice" value="<?php echo $row['SellPrice'];?>" id="SellPrice" required>
          </div>
          <div class="input-feild">
            <label for="ItemTypeAR">Arabic Item Type</label>
            <select name="ItemTypeAR" id="ItemTypeAR">
              <option value="<?php echo $row['ItemTypeAr'];?>" selected disabled><?php echo $row['ItemTypeAr'];?></option>
              <option value="شيبسي">شيبسي</option>
              <option value="مشروبات">مشروبات</option>
              <option value="خضراوات">خضراوات</option>
              <option value="فواكهة">فواكهة</option>
            </select>
          </div>
          <div class="input-feild">
            <input formnovalidate type="submit" name="DelItem" value="Delete Item">
          </div>
        </div>
        <div class="right">
          <div class="input-feild">
            <label for="Unit">Unit</label>
            <select name="ItemUnit" id="Unit">
              <option value="<?php echo $row['Unit'];?>" selected disabled><?php echo $row['Unit'];?></option>
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
              <option value="<?php echo $row['ItemTypeAr'];?>" selected disabled><?php echo $row['ItemTypeAr'];?></option>
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
            <textarea name="ItemInfo" id="ItemInfo" required><?php echo $row['ItemInfo'];?></textarea>
          </div>
          <div class="input-feild">
            <label for="ItemInfoAR">Arabic Item Info</label>
            <textarea name="ItemInfoAR" id="ItemInfoAR" required><?php echo $row['ItemInfoAr'];?></textarea>
          </div>
          <div class="input-feild">
            <label for="ItemCal">Item Calories</label>
            <input type="text" name="ItemCal" value="<?php echo $row['ItemCal'];?>" id="ItemCal" required>
          </div>
          <div class="input-feild">
            <label for="ItemTypeAR">Item Type</label>
            <select name="ItemTypeAR" id="ItemTypeAR">
              <option value="<?php echo $row['ItemType'];?>" selected disabled><?php echo $row['ItemType'];?></option>
              <option value="Chips">Chips</option>
              <option value="Drinks">Drinks</option>
              <option value="vegetables">vegetables</option>
              <option value="Fruits">Fruits</option>
            </select>
          </div>
          <div class="input-feild">
            <input type="submit" name="EditItem" value="Edit Item">
          </div>
        </div>
      </form>
    </div>
  </section>
</body>

</html>