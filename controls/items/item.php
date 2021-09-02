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
                        <input type="text" name="ItemName" value="" id="ItemName" required>
                    </div>
                    <div class="input-feild">
                        <label for="ItemImage">Item Image</label>
                        <input type="text" name="ItemImage" value="" id="ItemImage" required>
                    </div>
                    <div class="input-feild">
                        <label for="InStock">In Stock</label>
                        <input type="text" name="InStock" value="" id="InStock" required>
                    </div>
                    <div class="input-feild">
                        <label for="BuyPrice">Buy Price</label>
                        <input type="text" name="BuyPrice" value="" id="BuyPrice" required>
                    </div>
                    <div class="input-feild">
                        <label for="SellPrice">Sell Price</label>
                        <input type="text" name="SellPrice" value="" id="SellPrice" required>
                    </div>
                    <div class="input-feild">
                        <input formnovalidate type="submit" name="DelItem" value="Delete Item">
                    </div>
                </div>
                <div class="right">
                    <div class="input-feild">
                        <label for="Unit">Unit</label>
                        <select name="ItemUnit" id="Unit">
                            <option value="Kilograme">KG</option>
                            <option value="Grame">G</option>
                            <option value="Liter">L</option>
                            <option value="MileLiter">ML</option>
                            <option value="Package">Pk</option>
                            <option value="Pice">Pice</option>
                        </select>
                    </div>
                    <div class="input-feild">
                        <label for="ItemInfo">Item Info</label>
                        <textarea name="ItemInfo" id="ItemInfo" required></textarea>
                    </div>
                    <div class="input-feild">
                        <label for="ItemCal">Item Calories</label>
                        <input type="text" name="ItemCal"  value="" id="ItemCal" required>
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
                    <div class="input-feild">
                        <input type="submit" name="EditItem" value="Edit Item">
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>