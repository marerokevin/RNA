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
          <?php 
            include ("../includes/d/config.php");
            $first_name = $_SESSION["first_name"];
            $last_name = $_SESSION["last_name"];
            $user = "$first_name $last_name";
              include ("../includes/d/config.php");
              $request_select = "SELECT * from request where `requestor` = '$user'";
                $request_query = mysqli_query($db_conn, $request_select);
                  while ($request = mysqli_fetch_assoc($request_query)) {
          ?>
          <tr class="table-body-row"> 
              <td class="body-data"><?php echo $request['request_id']; ?></td>
              <td class="body-data"><?php echo $request['date_request']; ?></td>
              <td class="body-data"><?php echo $request['item']; ?></td>
              <td class="body-data"><?php echo $request['unit_price']; ?>/<?php echo $request['unit']; ?></td>
              <td class="body-data"><?php echo $request['required_quantity']; ?></td>
              <td class="body-data"><?php echo $request['price']; ?></td>
              <td class="body-data"><?php echo $request['supplier']; ?></td>
              <td class="body-data"><?php echo $request['requestor'];?></td>
              <td class="body-data"><?php
                if ($request['approval'] = False) { //false = waiting for approval, true = approved
                  echo "For approval";
                } else {
                  echo "Approved";
                }
              ?></td>
              <td class="body-data">
                <a class="data-action" href="../F/status.php">
                  <?php
                  if ($request['status'] = false && $request['approval'] == false) { //false = for receiving, true = received
                    echo "Waiting for approval";
                  } elseif ($request['status'] = false && $request['approval'] == true) {
                    echo "For receiving";
                  } elseif ($request['status'] = true && $request['approval'] == true) {
                    echo "Received";
                  }
                  ?>
                </a></td>
            </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>