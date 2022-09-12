<?php 
include "../includes/con/sess.php";
include ("../includes/D/config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../S/css/topbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../S/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../S/css/request.css?v=<?php echo time(); ?>">
    <title>Home - Risk Mitigation</title>
  </head>
  <body>
    <div>
    	<?php include "../includes/bar/navbar.php"; ?>
    </div>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php include "../includes/bar/sidebar.php"; ?>
    <div class="main_content_wsb" id="main_content">
	    <div class="header">Risk Mitigation</div>
      <div class="topnavticket">
        <li class="navholder">
          <a onload="tablet1()" id="create" class="navticket-off" href="/RNA/K/Function.php?action=request">Create</a>
          <a onclick="tablet2()" id="approval" class="navticket-off" href="/RNA/K/Function.php?action=approval">Approval</a>
          <a onclick="tablet3()" id="confirm" class="navticket-off" href="/RNA/K/Function.php?action=confirm">Confirmation</a>
          <a onclick="tablet4()" id="status" class="navticket-off" href="/RNA/K/Function.php?action=status">Status</a>
        </li>
      </div>
      <div class="roomcontainer">
        <div class="bedsidetable">
      <div class="tabContainer">
        <?php 
        if ( isset($_GET['action']) && $_GET['action']=="request") {
            include('../F/request.php');
          } else if ( isset($_GET['action']) && $_GET['action']=="approval") {
            include('../F/approval.php');
          } else if ( isset($_GET['action']) && $_GET['action']=="confirm") {
            include('../F/confirm.php');
          } else if ( isset($_GET['action']) && $_GET['action']=="status") {
            include('../F/status.php');
          }
        ?>
      </div>
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
