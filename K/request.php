<?php 
include "../includes/con/sess.php";
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
	    <div class="header">Inventory</div>
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
          <tbody class="request-table-body-container">
            <tr class="request-table-body-row">
              <th class="request-body-data">PNGE-XXX</td>
              <th class="request-body-data">Alcohol</td>
              <th class="request-body-data">San Miguel Corp.</td>
              <th class="request-body-data">Ginebra San Miguel</td>
              <th class="request-body-data">500</td>
              <th class="request-body-data">20</td>
              <th class="request-body-data">5</td>
              <th class="request-body-data">200PHP</td>
              <th class="request-body-data">1000PHP</td>
              <th class="request-body-data">Antonio James Domo</td>
              <th class="request-body-data">Administration</td>
              <th class="request-body-data">FEMMIS</td>
              <th class="request-body-data">January 1, 1970</td>
              <th class="request-body-data">For pickup</td>
            </tr>
            <tr class="request-table-body-row">
              <th class="request-body-data">PNGE-XXX</td>
              <th class="request-body-data">Alcohol</td>
              <th class="request-body-data">San Miguel Corp.</td>
              <th class="request-body-data">Ginebra San Miguel</td>
              <th class="request-body-data">500</td>
              <th class="request-body-data">20</td>
              <th class="request-body-data">5</td>
              <th class="request-body-data">200PHP</td>
              <th class="request-body-data">1000PHP</td>
              <th class="request-body-data">Antonio James Domo</td>
              <th class="request-body-data">Administration</td>
              <th class="request-body-data">FEMMIS</td>
              <th class="request-body-data">January 1, 1970</td>
              <th class="request-body-data">For pickup</td>
            </tr>
            <tr class="request-table-body-row">
              <th class="request-body-data">PNGE-XXX</td>
              <th class="request-body-data">Alcohol</td>
              <th class="request-body-data">San Miguel Corp.</td>
              <th class="request-body-data">Ginebra San Miguel</td>
              <th class="request-body-data">500</td>
              <th class="request-body-data">20</td>
              <th class="request-body-data">5</td>
              <th class="request-body-data">200PHP</td>
              <th class="request-body-data">1000PHP</td>
              <th class="request-body-data">Antonio James Domo</td>
              <th class="request-body-data">Administration</td>
              <th class="request-body-data">FEMMIS</td>
              <th class="request-body-data">January 1, 1970</td>
              <th class="request-body-data">For pickup</td>
            </tr>
            <tr class="request-table-body-row">
              <th class="request-body-data">PNGE-XXX</td>
              <th class="request-body-data">Alcohol</td>
              <th class="request-body-data">San Miguel Corp.</td>
              <th class="request-body-data">Ginebra San Miguel</td>
              <th class="request-body-data">500</td>
              <th class="request-body-data">20</td>
              <th class="request-body-data">5</td>
              <th class="request-body-data">200PHP</td>
              <th class="request-body-data">1000PHP</td>
              <th class="request-body-data">Antonio James Domo</td>
              <th class="request-body-data">Administration</td>
              <th class="request-body-data">FEMMIS</td>
              <th class="request-body-data">January 1, 1970</td>
              <th class="request-body-data">For pickup</td>
            </tr>
            <tr class="request-table-body-row">
              <th class="request-body-data">PNGE-XXX</td>
              <th class="request-body-data">Alcohol</td>
              <th class="request-body-data">San Miguel Corp.</td>
              <th class="request-body-data">Ginebra San Miguel</td>
              <th class="request-body-data">500</td>
              <th class="request-body-data">20</td>
              <th class="request-body-data">5</td>
              <th class="request-body-data">200PHP</td>
              <th class="request-body-data">1000PHP</td>
              <th class="request-body-data">Antonio James Domo</td>
              <th class="request-body-data">Administration</td>
              <th class="request-body-data">FEMMIS</td>
              <th class="request-body-data">January 1, 1970</td>
              <th class="request-body-data">For pickup</td>
            </tr>
            <tr class="request-table-body-row">
              <th class="request-body-data">PNGE-XXX</td>
              <th class="request-body-data">Alcohol</td>
              <th class="request-body-data">San Miguel Corp.</td>
              <th class="request-body-data">Ginebra San Miguel</td>
              <th class="request-body-data">500</td>
              <th class="request-body-data">20</td>
              <th class="request-body-data">5</td>
              <th class="request-body-data">200PHP</td>
              <th class="request-body-data">1000PHP</td>
              <th class="request-body-data">Antonio James Domo</td>
              <th class="request-body-data">Administration</td>
              <th class="request-body-data">FEMMIS</td>
              <th class="request-body-data">January 1, 1970</td>
              <th class="request-body-data">For pickup</td>
            </tr>
            <tr class="request-table-body-row">
              <th class="request-body-data">PNGE-XXX</td>
              <th class="request-body-data">Alcohol</td>
              <th class="request-body-data">San Miguel Corp.</td>
              <th class="request-body-data">Ginebra San Miguel</td>
              <th class="request-body-data">500</td>
              <th class="request-body-data">20</td>
              <th class="request-body-data">5</td>
              <th class="request-body-data">200PHP</td>
              <th class="request-body-data">1000PHP</td>
              <th class="request-body-data">Antonio James Domo</td>
              <th class="request-body-data">Administration</td>
              <th class="request-body-data">FEMMIS</td>
              <th class="request-body-data">January 1, 1970</td>
              <th class="request-body-data">For pickup</td>
            </tr>
            <tr class="request-table-body-row">
              <th class="request-body-data">PNGE-XXX</td>
              <th class="request-body-data">Alcohol</td>
              <th class="request-body-data">San Miguel Corp.</td>
              <th class="request-body-data">Ginebra San Miguel</td>
              <th class="request-body-data">500</td>
              <th class="request-body-data">20</td>
              <th class="request-body-data">5</td>
              <th class="request-body-data">200PHP</td>
              <th class="request-body-data">1000PHP</td>
              <th class="request-body-data">Antonio James Domo</td>
              <th class="request-body-data">Administration</td>
              <th class="request-body-data">FEMMIS</td>
              <th class="request-body-data">January 1, 1970</td>
              <th class="request-body-data">For pickup</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </body>
</html>
<script src="/RNA/S/scripts/sidebar.js"></script>
<script src="/RNA/S/scripts/searchbar.js"></script>