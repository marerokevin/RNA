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
          <tbody class="table-body-container"> <?php 
          include ("../includes/d/config.php");
          $first_name = $_SESSION["first_name"];
          $last_name = $_SESSION["last_name"];
          $level = $_SESSION["user_level"];
          $user = "$last_name $first_name";
          include ("../includes/d/config.php");
          $request_select = "SELECT * from request where `requestor` = '$user'"; //select all requests from the requestor.
          $request_query = mysqli_query($db_conn, $request_select);
            while ($request = mysqli_fetch_assoc($request_query)) { ?>
          <tr class="table-body-row"> 
              <td class="body-data"><?php echo $request['request_id']; ?></td>
              <td class="body-data"><?php echo $request['date_request']; ?></td>
              <td class="body-data"><?php echo $request['item']; ?></td>
              <td class="body-data"><?php echo $request['supplier']; ?></td>
              <td class="body-data"><?php echo $request['price']; ?>/<?php echo $request['unit']; ?></td>
              <td class="body-data"><?php echo $request['required_quantity']; ?></td>
              <td class="body-data"><?php echo $request['total_price']; ?></td>
              <td class="body-data"><?php echo $request['requestor'];?></td>
              <td class="body-data">
                <?php
                  if ($request['approval'] == False) { //waiting for approval
                    if ($level == "Administrator") { //if administrator ?>
                      <a class="data-action" " href="/RNA/K/admin/approve.php?request=<?php echo $request['request_id']; ?>">For Approval</a> <?php //approval button(modal)
                    }else { //Waiting for approval(as user)
                      echo "For approval"; //Display for approval on user
                    }
                  }else { //approved
                    echo "Approved"; //message if approval = true
                  }
                ?>
              </td>
              <td class="body-data"> <?php
                  if ($request['status'] == false && $request['approval'] == false) { // Waiting for approval from admin.
                     echo "Waiting for approval";//aproval button
                  }elseif ($request['status'] == false && $request['approval'] == true) { // for receiving of user. ?>
                    <a class="data-action" href="../receiving.php?request=<?php echo $request['request_id']; ?>">For receiving</a> <?php
                  }elseif ($request['status'] == true && $request['approval'] == true) { //after receiving of user/admin
                      echo "Received"; } ?>
                </td>
          </tr>
          <?php } ?>
        </tbody>
        </table>
      </div>
    </div>
    </div>
  </body>
</html>
<script src="/RNA/S/scripts/sidebar.js"></script>
<script src="/RNA/S/scripts/searchbar.js"></script>