<?php
include "/var/www/html/RNA/includes/D/config.php";
include "/var/www/html/RNA/includes/con/sess.php";

$edit_id = $_GET["id"];

if(isset($_POST["edit"])) {
    $edit_select = "UPDATE item, required_quantity, supplier, total_price, price from request where request_id = $edit_id";
    $edit_query = mysqli_query($conn, $edit_select);
    while ($edit_fetch = mysqli_fetch_assoc($edit_query)) {
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/RNA/S/css/topbar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="/RNA/S/css/sidebar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="/RNA/S/css/edit.css?v=<?php echo time(); ?>">
        <title>GSIS - Request</title>
    </head>
    <body>
        <div>
            <?php include "/var/www/html/RNA/includes/bar/navbar.php"; ?>
        </div>
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <?php include "/var/www/html/RNA/includes/bar/sidebar.php"; ?>
        <div class="main_content_wsb" id="main_content">
	        <div class="header">Edit Request - <?php echo $edit_id; ?></div>
            <div class="tabContainer">
                <div class="createForm">
                    <form class="create-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?action=request" method="post">
                        <h2 class="Main-title">Edit request</h2>
                        <h3 class="SMD">Administrator</h3>
                        <div class="start-container" id="start-grid">
                            <span class="number">1</span>
                            <label for="start-grid" class="input-label">Item Description</label>
                            <div class="start-container" id="start-grid">
                                <!-- Supplier -->
                                <label for="supplier" class="input-label">Supplier</label>
                                <div class="input-container">
                                    <select type="text" class="input-main" id="supplier" name="supplier" required>
                                        <?php
                                            include "/var/www/html/RNA/includes/D/config.php";
                                            $request_select = "SELECT item, supplier, required_quantity, price FROM request WHERE request_id = '$edit_id'";
                                            $request_query = mysqli_query($db_conn, $request_select);
                                            while ($request = mysqli_fetch_assoc($request_query)) {
                                                $req_supplier = $request['supplier'];
                                                echo '<option selected id="'.$request['supplier'].'" value="'.$request['supplier'].'">'.$request['supplier'].'</option>';
                                                $list_item = "SELECT DISTINCT supplier FROM inventory WHERE supplier != '$req_supplier'";
                                                $supplier_query = mysqli_query($db_conn, $list_item);
                                                while ($supplier = mysqli_fetch_assoc($supplier_query)) {
                                                    echo '<option id="'.$supplier['supplier'].'" value="'.$supplier['supplier'].'">'.$supplier['supplier'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <!-- Item Name -->
                                <label for="item" class="input-label">Item</label>
                                <div class="input-container">
                                    <select type="text" class="input-main" id="item" name="item" onchange="itemSelect(this)" required>
                                        <?php
                                            include "/var/www/html/RNA/includes/D/config.php";
                                            $request_select = "SELECT item, supplier, required_quantity, price FROM request WHERE request_id = '$edit_id'";
                                            $request_query = mysqli_query($db_conn, $request_select);
                                            while ($request_item = mysqli_fetch_assoc($request_query)) {
                                                echo '<option selected id="'.$request_item["item"].'" data-val="'.$request_item["supplier"].'" request_item-val="'.$request_item["item"].'" data-item-unit="'.$request_item["unit"].'" data-item-price="'.$request_item["price"].'" value="'.$request_item["item"].'">'.$request_item["item"].'</option>';
                                                $req_item = $request_item['item'];
                                                $req_supplier = $request_item['supplier'];
                                                $list_item = "SELECT unit, unit_price, `description`, item, supplier FROM inventory WHERE item != '$req_item' AND supplier != '$req_supplier'";
                                                $item_query = mysqli_query($db_conn, $list_item);
                                                while ($items = mysqli_fetch_assoc($item_query)) {
                                                    echo '<option id="'.$items["item"].'" data-val="'.$items["supplier"].'" data-val="'.$items["item"].'" data-item-unit="'.$items["unit"].'" data-item-price="'.$items["unit_price"].'" value="'.$items["item"].'">'.$items["item"].' - '.$items["description"].'</option>';
                                                    $item = $items["item"];
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <span class="number">2</span>
                            <label for="start-grid" class="input-label">Quantity</label>
                            <!-- Required Amount -->
                            <div class="start-container" id="start-grid">
                                <label for="required_amt" class="input-label">Required Amount</label>
                                <div class="input-container"> 
                                    <input type="text" class="input-main" id="required_amt" name="required_amt" placeholder="Enter required amount" required oninput="multiply()">
                                </div>
                            </div>

                                <!-- Total Amount -->
                            <div class="start-container" id="start-grid">
                                <div class="start-container" id="start-grid">
                                    <label for="start-grid" class="input-label">Unit Price</label>
                                    <div class="input-container"> 
                                        <input type="text" class="input-main" name="price" id="price" placeholder="Price" oninput="multiply()"> / 
                                        <input type="text" class="input-main" name="uniteam" id="uniteam" placeholder="Unit">
                                    </div>
                                </div>
                            </div>

                            <!-- Price -->
                            <label for="start-grid" class="input-label">Total Amount</label>
                            <div class="start-container" id="start-grid">
                                <div class="input-container">
                                    <input class="input-main" id="total_amt" name="total_amt" readonly>
                                </div>
                            </div>

                            <!-- Encoded By -->      
                            <label for="start-grid" class="input-label">Encoded by</label>
                            <div class="start-container" id="start-grid">
                                <div class="input-container">
                                    <input class="input-main" name="requestor" id="requestor" value="<?php echo ($_SESSION["last_name"]); ?> <?php echo ($_SESSION["first_name"]); ?>">
                                </div>
                            </div>
                        </div>

                        <small id="emailHelp" class="reminder">Make sure to answer all the fields properly</small>
                        <!-- Submit -->      
                        <div class="submit">
                            <input type="submit" class="subbutton" value="Submit" id="button" name="request">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
<script src="/RNA/S/scripts/control-number.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
$('#supplier').change(function() {
    jQuery("#supplier")
    var $options = $('#item').change(function() {var $options = $('#unit')
        .val('')
        .find('option')
        .show();
    if (this.value != '0')
        $options
        .not('[data-val="' + this.value + '"],[data-val=""]')
        .hide();
    })
        .val('')
        .find('option')
        .show();
    if (this.value != '0')
        $options
        .not('[data-val="' + this.value + '"],[data-val=""]')
        .hide();
})

function itemSelect(data) {
document.getElementById("price").value = document.getElementById(document.getElementById("item").value).dataset.itemPrice;
document.getElementById("uniteam").value = document.getElementById(document.getElementById("item").value).dataset.itemUnit;
}

function multiply() {
    const multiplicand = document.getElementById(document.getElementById("item").value).dataset.itemPrice || 0;
    const multiplier = document.getElementById('required_amt').value || 0;
    const product = parseInt(multiplicand) * parseInt(multiplier);
    document.getElementById('price').innerHTML = multiplicand;
    document.getElementById('required_amt').innerHTML = multiplier;
    document.getElementById('total_amt').value = product;
}
</script>