<?php 
include "../includes/con/sess.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../S/images/fontawesome/css/all.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../S/css/topbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../S/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../S/css/index.css?v=<?php echo time(); ?>">
    <title>GIS - Dashboard</title>
  </head>
  <body>
  <div>
    	<?php include "../includes/bar/navbar.php"; ?>
    </div>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php include "../includes/bar/sidebar.php"; ?>
    <div class="header">Dashboard</div>
    <div class="main_content_wsb" id="main_content">
      <div class="graphcard-container">
        <div class="graph-container">

        </div>
        <div class="card-container">
          <div class="card">
            <img class="card-img" src="/RNA/S/images/frog.jpg" alt="">
            <div class="card-inner">
              <a href="#" class="card-title">Completed</a>
            </div>
          </div>
          <div class="card">
            <div class="card-inner">
              <a href="#" class="card-title">Short stock</a>
            </div>
          </div>
          <div class="card">
            <div class="card-inner">
              <a href="#" class="card-title">Waiting for Delivery</a>
            <!-- Users -->
            </div>
          </div>
          <div class="card">
            <div class="card-inner">
              <a href="#" class="card-title">Pending Requests</a>
              <!-- Total Sales -->
            </div>
          </div>
        </div>
      </div>
      <div class="table-container">
        <table class="table-frame">
          <thead class="table-head-container">
            <tr class="table-head-row">
              <td class="head-data">Number</td>
              <td class="head-data">Supplier</td>
              <td class="head-data">Item</td>
              <td class="head-data">Description</td>
              <td class="head-data">Unit</td>
              <td class="head-data">Unit Price</td>
              <td class="head-data">Date Requested</td>
              <td class="head-data">Requested by</td>
              <td class="head-data">Status</td>
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
  <script>
    let today = new Date().toISOString().substr(0, 10);
    document.querySelector("#today2").valueAsDate = new Date();
  </script>
<script src="/RNA/S/scripts/sidebar.js"></script>
<script src="/RNA/S/scripts/searchbar.js"></script>