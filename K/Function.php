<?php 
include "../includes/con/sess.php";
include ("../includes/D/config.php");

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../S/css/topbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../S/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../S/css/function.css?v=<?php echo time(); ?>">
    <title>GSIS - Inventory</title>
  </head>
  <body>
    <div>
    	<?php include "../includes/bar/navbar.php"; ?>
    </div>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php include "../includes/bar/sidebar.php"; ?>
    <div class="main_content_wsb" id="main_content">
	    <div class="header">Risk Mitigation</div>
      <div class="inventorynav">
        <li class="navholder">
          <a onclick="tablet4()" id="status" class="navticket-off" href="/RNA/K/Function.php?action=request">Requests</a>
          <a onload="tablet1()" id="create" class="navticket-off" href="/RNA/K/Function.php?action=add">Add Item</a>
          <a onclick="tablet2()" id="approval" class="navticket-off" href="/RNA/K/Function.php?action=update">Update Item</a>
          <a onclick="tablet3()" id="confirm" class="navticket-off" href="/RNA/K/Function.php?action=delete">Delete Item</a>
        </li>
      </div>
      <div class="roomcontainer">
        <div class="bedsidetable">
          <div class="tabContainer">
            <?php 
            if ( isset($_GET['action']) && $_GET['action']=="request") {
                include('../F/request.php');
              } else if ( isset($_GET['action']) && $_GET['action']=="add") {
                include('../F/add.php');
              } else if ( isset($_GET['action']) && $_GET['action']=="update") {
                include('../F/update.php');
              } else if ( isset($_GET['action']) && $_GET['action']=="delete") {
                include('../F/delete.php');
              }
            ?>
          </div>
        </div>
      </div>

      
  </body>
</html>
<script src="/RNA/S/scripts/sidebar.js"></script>
<script src="/RNA/S/scripts/searchbar.js"></script>
<script src="/RNA/S/scripts/tablets.js"></script>
<script src="/RNA/S/scripts/time2.js"></script>
<script src="/RNA/S/scripts/step.js"></script>
