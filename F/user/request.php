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
              <th class="head-data">Department</td>
              <th class="head-data">Status</td>
            </tr>
          </thead>
		  <tbody class="table-body-container"> <?php 
          include ("../includes/d/config.php");
          $first_name = $_SESSION["first_name"];
          $last_name = $_SESSION["last_name"];
          $level = $_SESSION["user_level"];
          $user = "$last_name $first_name";
          include ("../includes/d/config.php");
          if ($level = "Administrator") {
						$request_select = "SELECT * from request"; //select all requests
					}elseif ($level = "Head") {
						$request_select = "SELECT * from request WHERE `department` = '$dept'"; //select all request from the department
					}else if ($level = "User") {
						$request_select = "SELECT * from request WHERE `requestor` = '$user'"; //select all request created by the user
					}
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
                    if ($level == "Administrator") { //Waiting for approval(as admin)?>
                      <a class="data-action" href="/RNA/K/admin/approve.php?request=<?php echo $request['request_id']; ?>">For Approval</a> <?php //approval button
                    }elseif ($level == "Head") {
                      if ($user == $request['approver']) {//Waiting for approval(as Head) ?>
                        <a class="data-action" href="/RNA/K/head/approve.php?request=<?php echo $request['request_id']; ?>">For approval of <?php echo  $request['approver']; ?></a> <?php
                      }elseif ($user != $request['approver']) { ?>
                        <a class="data-action" href="/RNA/K/head/approve.php?request=<?php echo $request['request_id']; ?>">For your approval</a> <?php
                      }
                    }elseif ($level == "User") {
                      echo "For approval of "; echo $request['approver']; //Display for approval on user
                    }
                  }else { //approved
                    echo "Approved"; //message if approval = true
                  }
                ?>
              </td>
              <td class="body-data">
                <?php
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