<?php 
include ("../includes/d/config.php");
include ("../includes/con/sess.php");

    include ("../includes/d/config.php");
    if(isset($_POST["request"])) {
        $supplier = $_POST["supplier"];
        $item = $_POST["item"];
        $required_amt = $_POST["required_quantity"];
        $price = $_POST["price"];
        $unit = $_POST["unit"];
        $date_request = date('M d Y', strtotime($_POST["date_request"]));

        $request_insert = "INSERT INTO `request`(`item`, `supplier`, `required_quantity`, `price`, `unit`, `date`, `date_request`) VALUES ('$item', '$supplier', '$required_amt', '$price', '$unit', current_timestamp(), '$date_request')";

        $request_insert_query = mysqli_query($db_conn, $request_insert);

        if($request_insert_query)
        {
            header("location: RNA/K/Function.php?action=request");
            echo '<script type="text/javascript"> alert("Done!") </script>';
        }
        else
        {
            header("location: RNA/K/Function.php?action=request");
            echo '<script type="text/javascript"> alert("Information not updated") </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../S/css/update.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"/>
        <title>GSIS - Request</title>
    </head>
    <div class="createForm">
            <form class="create-form" action="./request2.php" method="post">
                <h2 class="Main-title">Request Item</h2>
                <h3 class="SMD">Administrator</h3>
                <!-- Page 1 -->
                <div class="page">
                    <!-- Page 1 -->
                    <label for="start-grid" class="start-title">Item Description</label>
                    <div class="start-container" id="start-grid">
                        <!-- Supplier -->
                        <div class="input-container">
                        <select type="text" id="supplier" name="supplier" required>
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

                        <!-- Unit -->
                        <div class="input-container"> 
                        </div>
                    </div>



                    <label for="start-grid" class="start-title">Total Amount</label>
                    <div class="start-container" id="start-grid">
                        <!-- Price -->
                        <div class="input-container">
                            <span class="input-main" id="total_amt">Total Amount</span>
                        </div>
                    </div>
                </div>
                <!-- Page 2 -->
                <div class="page">
                    <!-- Department -->
                    <!-- <div class="department-input-container"> 
                        <div class="department-container">
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Administration" name="admin" onkeyup="stoppedTyping()" required>
                                <label for="administration" class="checkbox-label">Administration</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Accounting" name="acct" onkeyup="stoppedTyping()" required>
                                <label for="Accounting" class="checkbox-label">Accounting</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Purchasing" name="purchasing" onkeyup="stoppedTyping()" required>
                                <label for="Purchasing" class="checkbox-label">Purchasing</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Prod-Tecnology" name="prodtech" onkeyup="stoppedTyping()" required>
                                <label for="Prod-Tecnology" class="checkbox-label">Production Tecnology</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Quality-Control" name="qc" onkeyup="stoppedTyping()" required>
                                <label for="Quality-Control" class="checkbox-label">Quality Control</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Quality-Assurance" name="qa" onkeyup="stoppedTyping()" required>
                                <label for="Quality-Assurance" class="checkbox-label">Quality Assurance</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Prod1" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Prod1" class="checkbox-label">Production 1</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Prod2" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Prod2" class="checkbox-label">Production 2</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Parts-Inspection" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Parts-Inspection" class="checkbox-label">Parts Inspection</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="System-Kaizen" name="select" onkeyup="stoppedTyping()" required>
                                <label for="System-Kaizen" class="checkbox-label">System Kaizen</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Prod-Support" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Prod-Support" class="checkbox-label">Production Support</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="PPD" name="select" onkeyup="stoppedTyping()" required>
                                <label for="PPD" class="checkbox-label">Parts Production</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="DOK" name="select" onkeyup="stoppedTyping()" required>
                                <label for="DOK" class="checkbox-label">Direct Operation Kaizen</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="PPIC" name="select" onkeyup="stoppedTyping()" required>
                                <label for="PPIC" class="checkbox-label">Production Planning and Inventory Control</label>
                            </div>
                        </div>
                    </div> -->

                    <!-- Encoded By -->      
                    <div class="input-container"> 
                        <label for="encoded_by" class="input-label">Encoded by</label>
                        <input type="text" class="input-main" id="encoded_by"
                        name="encoded_by" value="<?php echo ($_SESSION["last_name"]); ?> <?php echo ($_SESSION["first_name"]); ?>" readonly required>    
                    </div>

                    <!-- Submit -->      
                    <!-- <div class="submit">
                        <input type="submit" class="subbutton" value="Submit" id="button" name="request">
                    </div> -->
                </div>
                <small id="emailHelp" class="reminder">Make sure to answer all the fields properly</small>
                <div class="next">
                    <div style="float:left;">
                        <button class="prev-button" type="button" id="prevBtn" onclick="nextPrev(-1)" placeholder="<"><a class="caret-left" href=""><</a> Prev</button>
                    </div>
                    <div style="float:right;">
                        <button class="next-button" type="button" id="nextBtn" onclick="nextPrev(1)" placeholder=">">></button>
                    </div>
                </div>
                <div style="text-align:center;margin-top:40px;">

                </div>1

            </form>
        </div>
<script src="/RNA/S/scripts/control-number.js"></script>
<script src="/RNA/S/scripts/step.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
$('#supplier').chosen({width:"100%", "padding":"5px"}).change(function() {
    jQuery("#supplier")
  var $options = $('#item').chosen().change()
    .val('')
    .find('option')
    .show();
  if (this.value != '0')
    $options
    .not('[data-val="' + this.value + '"],[data-val=""]')
    .hide();
})

$('#item').change(function() {
  var $options = $('#unit')
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

