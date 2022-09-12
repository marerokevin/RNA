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
            echo '<script type="text/javascript"> alert("Done!") </script>';
        }
        else
        {
            echo '<script type="text/javascript"> alert("Information not updated") </script>';
        }

        header("location: /RNA/K/index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../resources/css/request.css?v=<?php echo time(); ?>">
    </head>
            <div class="createForm">
                <form class="disaster_form" action="/RNA/F/request.php" method="post">
                    <h2 class="Main-title">BCP - Emergency Distress Form</h2>
                    <h3 class="SMD">Disasater Details</h3>

                    <div class="page">
                        <label for="start-grid" class="start-title">Item Description</label>
                        <div class="start-container" id="start-grid">
                            <div class="input-container"> 
                                <select type="text" class="input-main" id="item-select" name="select" onkeyup="stoppedTyping()" required>
                                    <option value="" disabled selected>Select Item</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Head">Head</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                            <div class="input-container"> 
                                <select type="text" class="input-main" id="item-select" name="select" onkeyup="stoppedTyping()" required>
                                    <option value="" disabled selected>Quantity</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Head">Head</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="start-container" id="start-grid">
                            <div class="input-container"> 
                                <select type="text" class="input-main" id="item-select" name="select" onkeyup="stoppedTyping()" required>
                                    <option value="" disabled selected>Select Supplier</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Head">Head</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="input-container"> 
                            <input type="text" class="input-main" id="disaster_desc" name="disaster_desc" placeholder="Please indicate the purpose..." required>
                        </div>

                        <div class="input-container"> 
                            <label for="disaster_desc" class="input-label">Description</label> 
                            <p class="mat-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam odit ratione, alias placeat est hic laudantium suscipit dolorem tempora quibusdam, sint libero earum, dolor voluptatum error! Architecto perspiciatis quisquam vitae.</p>
                        </div>
                    </div>

                    <div class="page">
                        <div class="input-container"> 
                            <label for="disaster_desc" class="input-label">Aasd</label> 
                            <input type="text" class="input-main" id="disaster_desc"
                            name="disaster_desc" required>
                        </div>
                    </div>

                        <!--Time_Start-->      
                    <div class="page">
                        <label for="start-grid" class="start-title">Start</label>
                            <div class="start-container" id="start-grid">
                                <div class="start-date-container">    
                                    <label for="Sdate" class="start-date-label">Date</label>
                                    <input type="date" class="start-date" id="Sdate" name="Sdate" required>
                                </div>

                                <div class="start-time-container">    
                                    <label for="Stime" class="start-time-label">Time</label>
                                    <input type="time" class="start-time" id="Stime" name="Stime" required>
                                </div>
                            </div>

                        <!--Time_End-->
                        <label for="end-grid" class="end-title">End</label>
                        <div class="end-container" id="end-grid">
                            <div class="end-date-container">    
                                <label for="Edate" class="end-date-label">Date</label>
                                <input type="date" class="end-date" id="Edate" name="Edate" required>
                            </div>

                            <div class="end-time-container">    
                                <label for="Etime" class="end-time-label">Time</label>
                                <input type="time" class="end-time" id="Etime" name="Etime" required>
                            </div>
                        </div>
                    </div>

                        <!--Disaster Type-->
                    <div class="page">
                        <div class="input-container">
                            <label for="disaster_type" class="input-label">Disaster Type</label> 
                            <input type="text" class="input-main" id="disaster_type"
                            name="disaster_type" required>
                        </div>
                    </div>

                    <div class="page">
                        <div class="input-container">
                            <label for="AreaofEffect" class="input-label">Affected Area</label> 
                            <input type="text" class="input-main" id="AreaofEffect"
                            name="AreaofEffect" required>
                        </div>
                    </div>

                        <!--Encoded by-->
                    <div class="page">
                        <div class="input-container"> 
                            <label for="encoded_by" class="input-label">Encoded by</label>
                            <input type="text" class="input-main" id="encoded_by"
                            name="encoded_by" value="<?php echo ($_SESSION["username"]); ?>" readonly required>    
                        </div>
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
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    </div>

                </form>
            </div>
    <script src="/RNA/S/scripts/control-number.js"></script>
    <script src="/RNA/S/scripts/step.js"></script>