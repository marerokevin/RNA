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
    <link rel="stylesheet" href="../S/css/function.css?v=<?php echo time(); ?>">
  </head>
  <body>
    <div>
    	<?php include "../includes/bar/navbar.php"; ?>
    </div>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php include "../includes/bar/sidebar.php"; ?>
    <div class="main_content_wsb" id="main_content">
	    <div class="header">GSIS - Item Request</div>
      <div class="inventorynav">
        <li class="navholder">
          <a id="status" class="navticket-off" href="/RNA/K/item-request.php?action=status">Status</a>
          <a id="create" class="navticket-off" href="/RNA/K/item-request.php?action=request">Item Request</a>
          <a id="create" class="navticket-off" href="/RNA/K/item-request.php?action=delete">Item Update</a>
        </li>
      </div>
      <div class="roomcontainer">
        <div class="bedsidetable">
          <div class="tabContainer">
            <?php 
              if ( isset($_GET['action']) && $_GET['action']=="status") {
                include('../K/user/status.php');
              } elseif ( isset($_GET['action']) && $_GET['action']=="request") {
                include('../K/user/request.php');
              } elseif ( isset($_GET['action']) && $_GET['action']=="delete") {
                include('../K/user/delete.php');
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
