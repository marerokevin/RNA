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

      <div class="table-container">
        <div class="table-frame">
          <table class="table">
          <thead class="table-head-container">
            <tr class="table-head-row">
              <th class="head-data">Number</td>
              <th class="head-data">Supplier</td>
              <th class="head-data">Item</td>
              <th class="head-data">Description</td>
              <th class="head-data">Unit</td>
              <th class="head-data">Unit Price</td>
              <th class="head-data">Date Requested</td>
              <th class="head-data">Requested by</td>
              <th class="head-data">Status</td>
            </tr>
          </thead>
          <tbody class="table-body-container">
            <tr class="table-body-row">
              <td class="body-data">1</td>
              <td class="body-data">San Miguel Corp.</td>
              <td class="body-data">Alcohol</td>
              <td class="body-data">Ginebra San Miguel</td>
              <td class="body-data">Bottle</td>
              <td class="body-data">140.00</td>
              <td class="body-data">January 1, 1970</td>
              <td class="body-data">Antonio James Domo</td>
              <td class="body-data"><a class="data-action" href="../F/status.php">Pending</a></td>
            </tr>
            <tr class="table-body-row">
              <td class="body-data">1</td>
              <td class="body-data">San Miguel Corp.</td>
              <td class="body-data">Alcohol</td>
              <td class="body-data">Ginebra San Miguel</td>
              <td class="body-data">Bottle</td>
              <td class="body-data">140.00</td>
              <td class="body-data">January 1, 1970</td>
              <td class="body-data">Antonio James Domo</td>
              <td class="body-data"><a class="data-action" href="../F/status.php">Pending</a></td>
            </tr>
            <tr class="table-body-row">
              <td class="body-data">1</td>
              <td class="body-data">San Miguel Corp.</td>
              <td class="body-data">Alcohol</td>
              <td class="body-data">Ginebra San Miguel</td>
              <td class="body-data">Bottle</td>
              <td class="body-data">140.00</td>
              <td class="body-data">January 1, 1970</td>
              <td class="body-data">Antonio James Domo</td>
              <td class="body-data"><a class="data-action" href="../F/status.php">Pending</a></td>
            </tr>
            <tr class="table-body-row">
              <td class="body-data">1</td>
              <td class="body-data">San Miguel Corp.</td>
              <td class="body-data">Alcohol</td>
              <td class="body-data">Ginebra San Miguel</td>
              <td class="body-data">Bottle</td>
              <td class="body-data">140.00</td>
              <td class="body-data">January 1, 1970</td>
              <td class="body-data">Antonio James Domo</td>
              <td class="body-data"><a class="data-action" href="../F/status.php">Pending</a></td>
            </tr>
            <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
              <tr class="table-body-row">
                <td class="body-data">1</td>
                <td class="body-data">San Miguel Corp.</td>
                <td class="body-data">Alcohol</td>
                <td class="body-data">Ginebra San Miguel</td>
                <td class="body-data">Bottle</td>
                <td class="body-data">140.00</td>
                <td class="body-data">January 1, 1970</td>
                <td class="body-data">Antonio James Domo</td>
                <td class="body-data"><a href="../F/status.php">Pending</a></td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
<script src="/RNA/S/scripts/sidebar.js"></script>
<script src="/RNA/S/scripts/searchbar.js"></script>
<script src="/RNA/S/scripts/tablets.js"></script>
<script src="/RNA/S/scripts/time2.js"></script>
<script src="/RNA/S/scripts/step.js"></script>
