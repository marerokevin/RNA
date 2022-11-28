<?php
include "/includes/con/sess.php";
include "/includes/D/config.php";

if(isset($_POST["request"])) {
    $String_b='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = "GS";
    $get_month = date('m', strtotime("now"));
    $rand4 = substr(str_shuffle($String_b), 0, 4);

    $generated = "$code$get_month-$rand4";
    $item_desc_explode = explode(",", $item = $_POST["item"]);
    $item_exploded = $item_desc_explode[0];
    $desc_exploded = $item_desc_explode[1];
    $supplier = $_POST["supplier"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $required_quantity = $_POST["required_amt"];
    $total = $_POST["total_amt"];
    $requestor = $_POST["requestor"];
    $dept = $_SESSION["department"];
    $approver = $_SESSION["head"];
    

    $check_request_id = "SELECT request_id FROM `request` WHERE request_id = '$generated'";
    $query_request_id = mysqli_query($db_conn, $check_request_id);
    $count_exist = mysqli_num_rows($query_request_id);

    if ($count_exist == "0") {
        $request_insert = "INSERT INTO request (`item`, `description`, `unit`, `price`, `supplier`, `required_quantity`, `requestor`, `date_request`, `request_id`, `approval`, `status`, `total_price`, `department`, `approver`) VALUES ('$item_exploded', '$desc_exploded', '$unit', '$price', '$supplier', '$required_quantity', '$requestor', current_timestamp(), '$generated', false, false, '$total', '$dept', '$approver')";
        $request_insert_query = mysqli_query($db_conn, $request_insert);
    }else {
        $String_b='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = "GS";
        $get_month = date('m', strtotime("now"));
        $rand4 = substr(str_shuffle($String_b), 0, 4);
        $generated_repeat = "$code$get_month-$rand4";
        $request_insert = "INSERT INTO request (`item`, `description`, `unit`, `price`, `supplier`, `required_quantity`, `requestor`, `date_request`, `request_id`, `approval`, `status`, `total_price`, `department`, `approver`) VALUES ('$item_exploded', '$desc_exploded', '$unit', '$price', '$supplier', '$required_quantity', '$requestor', current_timestamp(), '$generated', false, false, '$total', '$dept', '$approver')";
        $request_insert_query = mysqli_query($db_conn, $request_insert);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../S/css/request.css?v=<?php echo time(); ?>">
        <title>GSIS - Request</title>
    </head>
    <div class="createForm">
        <form class="create-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?action=request" method="post">
            <h2 class="Main-title">Request Item</h2>
            <h3 class="SMD">Administrator</h3>
            <div class="start-container" id="start-grid">
                
                <span class="number">1</span>
                <label for="start-grid" class="input-label">Item Description</label>
                <div class="start-container" id="start-grid">
                    <!-- Supplier -->
                    <label for="supplier" class="input-label">Supplier</label>
                    <div class="input-container">
                    <!-- <select class="js-example-basic-single" id="supplier" name="supplier" required> -->
                        <select class="input-main2" id="supplier" name="supplier" required>
                            <option value="" disabled selected>Select Supplier</option>
                            <?php include "/includes/D/config.php";
                                $list_item = "SELECT DISTINCT supplier FROM inventory";
                                $supplier_query = mysqli_query($db_conn, $list_item);
                                while ($supplier = mysqli_fetch_assoc($supplier_query)) {
                                    echo '<option id="'.$supplier['supplier'].'" value="'.$supplier['supplier'].'">'.$supplier['supplier'].'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Item Name -->
                    <label for="item" class="input-label">Item</label>
                    <div class="input-container">
                        <select type="text" class="input-main" id="item" name="item" required>
                            <option value="" disabled selected>Select item</option>
                            <?php
                                $list_supplier = "SELECT DISTINCT item FROM inventory";
                                $item_query = mysqli_query($db_conn, $list_supplier);
                                while ($items = mysqli_fetch_assoc($item_query)) {
                                    echo '<option id="'.$items["item"].'" data-val="'.$items["supplier"].'" "value="'.$items["item"].'">'.$items["item"].'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Item Description -->
                    <label for="desc" class="input-label">Description</label>
                    <div class="input-container">
                        <select type="text" class="input-main" id="desc" name="desc" required>
                            <option value="" disabled selected>Select description</option>
                            <?php
                                $list_desc = "SELECT unit, unit_price, description, item, supplier FROM inventory";
                                $desc_query = mysqli_query($db_conn, $list_desc);
                                while ($desc = mysqli_fetch_assoc($desc_query)) {
                                    echo '<option id="'.$desc["description"].'" data-val="'.$desc["item"].'" data-val="'.$desc["supplier"].'" data-val="'.$desc["description"].'" data-desc-unit="'.$desc["unit"].'" data-desc-price="'.$desc["unit_price"].'" value="'.$desc["description"].'">'.$desc["description"].'</option>';
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
                            <input type="text" class="input-main" name="unit" id="unit" placeholder="Unit">
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
<script src="/RNA/S/scripts/control-number.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script>
$(document).ready(function() {
    $('.input-main2').select2();
});

$('#supplier').change(function() {
    jQuery("#supplier")
    var $options = $('#item').select2(function() {
        jQuery("#item")
        var $options = $('#unit').chosen(function() {
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
        .val('')
        .find('option')
        .show();
    if (this.value != '0')
        $options
        .not('[data-val="' + this.value + '"],[data-val=""]')
        .hide();
})

function multiply() {
    const multiplicand = document.getElementById(document.getElementById("item").value).dataset.itemPrice || 0;
    const multiplier = document.getElementById('required_amt').value || 0;
    const product = parseInt(multiplicand) * parseInt(multiplier);
    document.getElementById('price').innerHTML = multiplicand;
    document.getElementById('required_amt').innerHTML = multiplier;
    document.getElementById('total_amt').value = product;
}
</script>