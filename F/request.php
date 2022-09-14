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
        <link rel="stylesheet" href="../S/css/request.css?v=<?php echo time(); ?>">
    </head>

    <h2 class="Main-title">Delete Item</h2>
    <h3 class="SMD">Administrator</h3>
    <div class="request-table-container">
        <div class="request-table-frame">
          <table class="request-table">
          <thead class="request-table-head-container">
            <tr class="request-table-head-row">
              <th class="request-head-data">Request ID</td>
              <th class="request-head-data">Item</td>
              <th class="request-head-data">Supplier</td>
              <th class="request-head-data">Description</td>
              <th class="request-head-data">Current Stock</td>
              <th class="request-head-data">Available Forcasted Stock</td>
              <th class="request-head-data">Requested Quantity</td>
              <th class="request-head-data">Unit Price</td>
              <th class="request-head-data">Total Amount</td>
              <th class="request-head-data">Requested by</td>
              <th class="request-head-data">Department</td>
              <th class="request-head-data">Section</td>
              <th class="request-head-data">Date Requested</td>
              <th class="request-head-data">Status</td>
            </tr>
          </thead>
          <tbody class="table-body-container">
            <tr class="table-body-row">
              <th class="body-data">PNGE-XXX</td>
              <th class="body-data">Alcohol</td>
              <th class="body-data">San Miguel Corp.</td>
              <th class="body-data">Ginebra San Miguel</td>
              <th class="body-data">500</td>
              <th class="body-data">20</td>
              <th class="body-data">5</td>
              <th class="body-data">200PHP</td>
              <th class="body-data">1000PHP</td>
              <th class="body-data">Antonio James Domo</td>
              <th class="body-data">Administration</td>
              <th class="body-data">FEMMIS</td>
              <th class="body-data">January 1, 1970</td>
              <th class="body-data">For pickup</td>
            </tr>
            
          </tbody>
        </table>
      </div>