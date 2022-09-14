<?php 
include ("../includes/d/config.php");
include ("../includes/con/sess.php");

    if ($_SESSION["user_level"]!="Administrator") {
        echo '<script type="text/javascript"> alert("Error 401, Unauthorized Access, please contact your Systems Administrator.") </script>';
        echo '<script type="text/javascript"> window.location.href="/RNA/K/index.php"; </script>';
    } else {
        include ("../includes/d/config.php");
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $disaster_desc = $_POST["disaster_desc"]; 
            $dis_control_number = $_POST["dis_control_number"];  
            $disaster_type = $_POST["disaster_type"];
            $AreaofEffect = $_POST["AreaofEffect"];
            $encoded_by = $_POST["encoded_by"];
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
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../S/css/add.css?v=<?php echo time(); ?>">
    </head>
        <div class="createForm">
            <form class="create-form" action="/RNA/F/request.php" method="post">
                <h2 class="Main-title">Add Item</h2>
                <h3 class="SMD">Administrator</h3>
                <!-- Page 1 -->
                <div class="page">
                    <!-- Page 1 -->
                    <label for="start-grid" class="start-title">Item Description</label>
                    <div class="start-container" id="start-grid">
                        <!-- Item Name -->
                        <div class="input-container"> 
                            <input type="text" class="input-main" id="disaster_desc" name="disaster_desc" placeholder="Item Name" required>
                        </div>
                        <!-- Supplier -->
                        <div class="input-container"> 
                            <input type="text" class="input-main" id="disaster_desc" name="disaster_desc" placeholder="Supplier" required>
                        </div>
                    </div>

                    <div class="start-container" id="start-grid">
                        <!-- Initial Quantity -->
                        <div class="input-container"> 
                            <input type="text" class="input-main" id="disaster_desc" name="disaster_desc" placeholder="Initial Quantity" required>
                        </div>
                    </div>

                    <label for="start-grid" class="start-title">Price per Unit</label>
                    <div class="start-container" id="start-grid">
                        <!-- Price -->
                        <div class="input-container"> 
                            <input type="text" class="input-main" id="disaster_desc" name="disaster_desc" placeholder="Price" required>
                        </div>

                        <!-- Unit -->
                        <div class="input-container"> 
                            <select type="text" class="input-main" id="item-select" name="select" onkeyup="stoppedTyping()" required>
                                <option value="" disabled selected>Select Unit</option>
                                <option value="Administrator">Unit</option>
                                <option value="Head">Head</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Page 2 -->
                <div class="page">
                    <!-- Department -->
                    <div class="department-input-container"> 
                        <div class="department-container">
                            <div class="checkbox-container">
                                <input type="checkbox" class="checkbox-main" id="Administration" name="select" onkeyup="stoppedTyping()" required>
                                <label for="administration" class="checkbox-label">Administration</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="Accounting" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Accounting" class="start-title">Accounting</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="Purchasing" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Purchasing" class="start-title">Purchasing</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="Prod-Tecnology" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Prod-Tecnology" class="start-title">Production Tecnology</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="Quality-Control" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Quality-Control" class="start-title">Quality Control</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="Quality-Assurance" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Quality-Assurance" class="start-title">Quality Assurance</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="Prod1" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Prod1" class="start-title">Production 1</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="Prod2" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Prod2" class="start-title">Production 2</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="Parts-Inspection" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Parts-Inspection" class="start-title">Parts Inspection</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="System-Kaizen" name="select" onkeyup="stoppedTyping()" required>
                                <label for="System-Kaizen" class="start-title">System Kaizen</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="Prod-Support" name="select" onkeyup="stoppedTyping()" required>
                                <label for="Prod-Support" class="start-title">Production Support</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="PPD" name="select" onkeyup="stoppedTyping()" required>
                                <label for="PPD" class="start-title">Parts Production</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="DOK" name="select" onkeyup="stoppedTyping()" required>
                                <label for="DOK" class="start-title">Direct Operation Kaizen</label>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" class="input-main" id="PPIC" name="select" onkeyup="stoppedTyping()" required>
                                <label for="PPIC" class="start-title">Production Planning and Inventory Control</label>
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
                        <input type="submit" class="subbutton" value="Submit" id="button">
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