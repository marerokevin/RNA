<?php 
include "../includes/sess.php";
include ("../includes/config.php");

$search_filter = "SELECT * FROM users";
$search_query = mysqli_query($db_conn, $search_filter);
$search_count = mysqli_num_rows($search_query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../resources/images/fontawesome/css/all.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../resources/css/topbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../resources/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../resources/css/RM.css?v=<?php echo time(); ?>">
    <title>Home - Risk Mitigation</title>
  </head>
  <body>
    <div>
    	<?php include "../includes/navbar.php"; ?>
    </div>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php include "../includes/sidebar.php"; ?>
    <div class="main_content_wsb" id="main_content">
	    <div class="header">Risk Mitigation</div>
      <div class="topnavticket">
        <li class="navholder">
          <a class="navticket" href="/RNA/K/Risk-Miti.php?action=create">Create</a>
          <a class="navticket" href="/RNA/K/Risk-Miti.php?action=approval">Approval</a>
          <a class="navticket" href="/RNA/K/Risk-Miti.php?action=confirm">Confirmation</a>
          <a class="navticket" href="/RNA/K/Risk-Miti.php?action=status">Status</a>
        </li>
      </div>
      <div class="tabContainer">
          <?php if ( isset($_GET['action']) && $_GET['action']=="create") {
            include('../F/create.php');
        } else {
            include('login.php');
        } ?>
      </div>
    </div>
  </div>
</div>
  </body>
</html>
<script src="/RNA/resources/scripts/sidebar.js"></script>
<script src="/RNA/resources/scripts/searchbar.js"></script>