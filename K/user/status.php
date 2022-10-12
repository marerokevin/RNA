<head>
  <title>GSIS - Item Request Status</title>
</head>
<body>
  <div class="table-container">
    <div class="table-frame">
      <table class="table">
        <thead class="table-head-container">
          <tr class="table-head-row">
            <th class="head-data">Request ID</td>
            <th class="head-data">Date Requested</td>
            <th class="head-data">Item</td>
            <th class="head-data">Price / Unit</td>
            <th class="head-data">Requested Amount</td>
            <th class="head-data">Total Price</td>
            <th class="head-data">Supplier</td>
            <th class="head-data">Requested by</td>
            <th class="head-data">Approval</td>
            <th class="head-data">Status</td>
          </tr>
        </thead>
        <tbody class="table-body-container">
          <tr class="table-body-row"> 
            <?php 
              include ("../includes/d/config.php");
              $userdept =  $_SESSION["department"];
              $status_select = "SELECT status, approval from request";
              $status_query = mysqli_query($db_conn, $status_select);
              while ($status_fetch = mysqli_fetch_assoc($status_query)) {
                $status = $status_fetch['status'];
                $approval = $status_fetch['approval'];


                  if ($status = true) { //false = waiting for receiving, true = received
                    $status_print = "For receiving";
                }else {
                  $request_select = "SELECT * from request";
                  $request_query = mysqli_query($db_conn, $request_select);
                    while ($request = mysqli_fetch_assoc($request_query)) {
              ?>
              <td class="body-data"><?php echo $request['request_id']; ?></td>
              <td class="body-data"><?php echo $request['date_request']; ?></td>
              <td class="body-data"><?php echo $request['item']; ?></td>
              <td class="body-data"><?php echo $request['unit_price']; ?>/<?php echo $request['unit']; ?></td>
              <td class="body-data"><?php echo $request['required_quantity']; ?></td>
              <td class="body-data"><?php echo $request['price']; ?></td>
              <td class="body-data"><?php echo $request['supplier']; ?></td>
              <td class="body-data"><?php echo $request['requestor']; ?></td>
              <td class="body-data"><?php
                              if ($approval = false){ //false = waiting for approval, true = approved
                                $approval_print = "For Approval";
                              }
                              echo $approval_print; ?></td>
              <td class="body-data"><a class="data-action" href="../F/status.php"><?php echo $status_print;?></a></td>
            </tr>
          <?php }}} ?>
        </tbody>
      </table>
    </div>
  </div>
</body>