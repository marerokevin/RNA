<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../S/css/request.css?v=<?php echo time(); ?>">
        <title>GSIS - Request</title>
    </head>
    <div class="createForm">
        <form class="create-form" action="/F/user/request.php" method="post">
            <h2 class="Main-title">Request Item</h2>
            <h3 class="SMD">Administrator</h3>
            <div class="page">
                <span class="number">1</span>
                <label for="start-grid" class="input-label">Item Description</label>
                <div class="start-container" id="start-grid">
                    <!-- Supplier -->
                    <div class="input-container">
                        <select type="text" class="input-main" id="supplier" name="supplier" required>
                            <option value="" disabled selected>Select Supplier</option>
                            <?php include ("../includes/D/config.php");
                                $list_item = "select distinct supplier from inventory";
                                $supplier_query = mysqli_query($db_conn, $list_item);
                                while ($supplier = mysqli_fetch_assoc($supplier_query)) {
                                    echo '<option id="'.$supplier['supplier'].'" value="'.$supplier['supplier'].'">'.$supplier['supplier'].'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Item Name -->
                    <div class="input-container"> 
                        <select type="text" class="input-main" id="item" name="item" onchange="itemSelect(this)" required>
                            <option value="" disabled selected>Select item</option>
                            <?php  
                                $list_supplier = "select unit, unit_price, description, item, supplier from inventory";
                                $item_query = mysqli_query($db_conn, $list_supplier);
                                while ($items = mysqli_fetch_assoc($item_query)) {
                                    echo '<option data-val="'.$items["supplier"].'" value="'.$items["unit_price"].'">'.$items["item"].' - '.$items["description"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <span class="number">2</span>
                <label for="start-grid" class="input-label">Quantity</label>
                <div class="start-container" id="start-grid">
                    <!-- Initial Quantity -->
                    <div class="input-container"> 
                        <input type="text" class="input-main" id="required_amt" name="required_amt" placeholder="Enter required amount" required oninput="multiply()">
                    </div>
                </div>

                <div class="start-container" id="start-grid">
                    <!-- Price -->
                    <div class="input-container"> 
                        <input type="text" class="input-main" name="price" id="price" placeholder="Price" oninput="multiply()" readonly>
                    </div>


                </div>



                <label for="start-grid" class="input-label">Total Amount</label>
                <div class="start-container" id="start-grid">
                    <!-- Price -->
                    <div class="input-container">
                        <span class="input-main" id="total_amt">Total Amount</span>
                    </div>
                </div>
            </div>

                <!-- Encoded By -->      
                <label for="start-grid" class="input-label">Encoded by</label>
                <div class="start-container" id="start-grid">
                    <!-- Price -->
                    <div class="input-container">
                        <input class="input-main" name="requestor" id="requestor" value="<?php echo ($_SESSION["last_name"]); ?> <?php echo ($_SESSION["first_name"]); ?>">
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
<script src="/RNA/S/scripts/step.js"></script>
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
document.getElementById("price").value = data.value;
}

function multiply() { 
  const multiplicand = document.getElementById('price').value || 0; 
  const multiplier = document.getElementById('required_amt').value || 0; 
  const product = parseInt(multiplicand) * parseInt(multiplier);
  document.getElementById('price').innerHTML = multiplicand; 
  document.getElementById('required_amt').innerHTML = multiplier; 
  document.getElementById('total_amt').innerHTML = product; 
}
</script>
