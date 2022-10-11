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
        <form class="create-form" action="../F/user/request.php" method="post">
            <h2 class="Main-title">Request Item</h2>
            <h3 class="SMD">Administrator</h3>
            <div class="start-container" id="start-grid">
                
                <span class="number">1</span>
                <label for="start-grid" class="input-label">Item Description</label>
                <div class="start-container" id="start-grid">
                    <!-- Supplier -->
                    <label for="supplier" class="input-label">Supplier</label>
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
                    <label for="item" class="input-label">Item</label>
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
                    <!-- Required Amount -->
                    <div class="start-container" id="start-grid">
                    <label for="required_amt" class="input-label">Required Amount</label>
                        <div class="input-container"> 
                            <input type="text" class="input-main" id="required_amt" name="required_amt" placeholder="Enter required amount" required oninput="multiply()">
                        </div>
                    </div>

                    <!-- Total Amount -->
                    <div class="start-container" id="start-grid">
                    <label for="start-grid" class="input-label">Total Amount</label>
                        <div class="input-container"> 
                            <input type="text" class="input-main" name="price" id="price" placeholder="Price" oninput="multiply()" readonly>
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <label for="start-grid" class="input-label">Total Amount</label>
                <div class="start-container" id="start-grid">
                    <div class="input-container">
                        <span class="input-main" id="total_amt">Total Amount</span>
                    </div>
                </div>

                <!-- Request_ID -->
                <label for="start-grid" class="input-label">Request Number</label>
                <div class="start-container" id="start-grid">
                    <div class="input-container"> 
                        <input type="text" class="input-main" id="request_id" placeholder="Request Number"
                        name="request_id" required onblur="gatherDataAndOutput()" readonly autofocus="">
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

<script>
function disableItemSelect(){
    
}
</script>
<script>
    function getInitials(firstName, lastName) {
        return (firstName[0] + lastName[0])()
    }

    function getYear() {
        return (new Date).getFullYear() % 100
    }

    function paddedNumber(number) {
        var result = ""
        for(var i = 4 - number.toString().length; i > 0; i--) {
        result += "0"
        }
        return result + number
    }

    function makeStudentID(firstName, lastName, studentNumber) {
        return getInitials(firstName, lastName) + paddedNumber(studentNumber) + getYear()
    }

    var sequenceNumber = 1
    function gatherDataAndOutput() {
        var firstName = document.getElementById("required_amt").value
        var lastName = document.getElementById("price").value
        var outputElement = document.getElementById("request_id")

        outputElement.value = makeStudentID(firstName, lastName, sequenceNumber)

        sequenceNumber++; // make a different ID for the next student.
    }

    console.log(firstName);

</script>