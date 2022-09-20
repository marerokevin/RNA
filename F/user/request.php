<?php 
include ("../includes/d/config.php");
include ("../includes/con/sess.php");

        include ("../includes/d/config.php");
        if(isset($_POST["request"])){
            $item_name = $_POST["item"]; 
            $supplier = $_POST["supplier"];  
            $required_amt = $_POST["required_amt"];
            $price = $_POST["price"];
            $unit = $_POST["unit"];
            $Sdate = date('M d Y', strtotime($_POST["Sdate"]));
            $Edate = date('M d Y', strtotime($_POST["Edate"]));
            $Stime = $_POST["Stime"];
            $Etime = $_POST["Etime"];

$sql = "INSERT INTO `disasterinfo`(`disaster_desc`, `dis_control_number`, `disaster_type`, `AreaofEffect`, `encoded_by`, `date_log`, `Sdate`, `Edate`, `Stime`, `Etime`) 
            VALUES ('$disaster_desc', '$dis_control_number', '$disaster_type', '$AreaofEffect', '$encoded_by', current_timestamp(), '$Sdate', '$Edate', '$Stime', '$Etime')";

            $result = mysqli_query($db_conn, $sql);

            if($result)
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
                        <!-- Item Name -->
                        <div class="input-container"> 
                          <input type="text" class="input-main" id="disaster_desc" name="item" placeholder="Item Name" required>
                        </div>
                        <!-- Supplier -->
                        <div class="input-container"> 
                          <input type="text" class="input-main" id="disaster_desc" name="supplier" placeholder="Supplier" required>
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
                            <input type="text" class="input-main" id="disaster_desc" name="price" placeholder="Price" required>
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