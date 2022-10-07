<?php 
include ("../includes/d/config.php");
include ("../includes/con/sess.php");

        include ("../includes/d/config.php");
        if(isset($_POST["request"])) {
            $item = $_POST["item"];
            $supplier = $_POST["supplier"];
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
    </head>
    <div class="createForm">
            <form class="create-form" action="/RNA/F/request.php" method="post">
                <h2 class="Main-title">Request Item</h2>
                <h3 class="SMD">Administrator</h3>
                <!-- Page 1 -->
                <div class="page">
                    <!-- Page 1 -->
                    <label for="start-grid" class="start-title">Item Description</label>
                    <div class="start-container" id="start-grid">
                        <!-- Supplier -->
                        <div class="input-container">
                        <select type="text" class="input-main" id="supplier" name="supplier" required>
                            <option value="" disabled selected>Select Supplier</option>
                        <?php include ("../includes/D/config.php");
                            $list_item = "select distinct supplier from inventory";
                            $supplier_query = mysqli_query($db_conn, $list_item);
                            while ($supplier = mysqli_fetch_assoc($supplier_query)) {
                                echo '<option value="'.$supplier['supplier'].'">'.$supplier['supplier'].'</option>';
                            }
                        ?>
                        </select>
                        </div>

                        <!-- Item Name -->
                        <div class="input-container">
                        <select type="text" class="input-main" id="item" name="item" onkeyup="stoppedTyping()" required>
                        <option value="" disabled selected>Select item</option>
                        <?php  
                            $list_supplier = "select description, item, supplier from inventory";
                            $item_query = mysqli_query($db_conn, $list_supplier);
                            while ($items = mysqli_fetch_assoc($item_query)) {
                                echo '<option value="'.$items["supplier"].'">'.$items["item"].' - '.$items["description"].'</option>';
                            } ?>
                        </select>
                        </div>
                    </div>
                    <label for="start-grid" class="start-title">Required Stock:</label>
                    <div class="start-container" id="start-grid">
                        <!-- Initial Quantity -->
                        <div class="input-container"> 
                          <input type="text" class="input-main" id="disaster_desc" name="required_amt" placeholder="Required amount" required>
                        </div>
                    </div>

                    <label for="start-grid" class="start-title">Price per Unit</label>
                    <div class="start-container" id="start-grid">
                        <!-- Price -->
                        <div class="input-container"> 
                            <p>12</p>
                        </div>

                        <!-- Unit -->
                        <div class="input-container"> 
                            <input type="text" class="input-main" id="disaster_desc" name="unit" placeholder="Unit" required>
                        </div>
                    </div>
                </div>
                <!-- Page 2 -->
                <div class="page">
                    <!-- Department -->
                    <div class="department-input-container"> 
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
                    </div>
                    <!-- Section -->
                    <div class="input-container"> 
                        <select type="text" class="input-main" id="item-select" name="select" onkeyup="stoppedTyping()" required>
                            <option value="" disabled selected>Select Unit</option>
                            <option value="Administrator">Unit</option>
                            <option value="Head">Head</option>
                            <option value="User">User</option>
                        </select>
                    </div>

                    <!-- Encoded By -->      
                    <div class="input-container"> 
                        <label for="encoded_by" class="input-label">Encoded by</label>
                        <input type="text" class="input-main" id="encoded_by"
                        name="encoded_by" value="<?php echo ($_SESSION["username"]); ?>" readonly required>    
                    </div>

                    <!-- Submit -->      
                    <div class="submit">
                        <input type="submit" class="subbutton" value="Submit" id="button" name="request">
                    </div>
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
                <span class="step"></span>
                <span class="step"></span>

                </div>

            </form>
        </div>
<script src="/RNA/S/scripts/control-number.js"></script>
<script src="/RNA/S/scripts/step.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
$("#supplier").change(function() {
  if ($(this).data('options') === undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#item option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value=' + id + ']');
  $('#item').html(options);
  console.log(options);
});
</script>

