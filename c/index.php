<?php 
include "./includes/sess.php";
include ("./includes/config.php");

$search_filter = "SELECT * FROM users";
$search_query = mysqli_query($db_conn, $search_filter);
$search_count = mysqli_num_rows($search_query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./resources/images/fontawesome-free-6.1.2-web/css/solid.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./resources/css/topbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./resources/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./resources/css/index.css?v=<?php echo time(); ?>">
    <title>Home - Employee Directory</title>
  </head>
  <body>
    <div>
    	<?php include "./includes/navbar.php"; ?>
    </div>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php include "./includes/sidebar.php"; ?>
    <div class="main_content_wsb" id="main_content">
	    <div class="header">Dashboard</div>
	  <div class="cardWrapper" id="cardWrapper">
      <div class="cardContainer">
        <div class="cardTitle">
          <a href="" >MIS</a>  
        </div>
        <div class="cardContent">
          <div class="contentData">
            <div class="contentGraph">GRAPH</div>
            <div class="contentPercent">DATA</div>
          </div>
          <div class="contentText">
            <div class="contentTable">TABLE</div>
          </div>
        </div>
      </div>
      <div class="cardContainer">
        <div class="cardTitle">
          <a href="" >FEM</a>  
        </div>
        <div class="cardContent">
          <div class="contentData">
            <div class="contentGraph">GRAPH</div>
            <div class="contentPercent">DATA</div>
          </div>
          <div class="contentText">
            <div class="contentTable">TABLE</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
  </body>
</html>
<script src="/DNA/resources/scripts/sidebar.js"></script>
<script src="/DNA/resources/scripts/searchbar.js"></script>