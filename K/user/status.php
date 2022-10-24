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
            <th class="head-data">Supplier</td>
            <th class="head-data">Price / Unit</td>
            <th class="head-data">Requested Amount</td>
            <th class="head-data">Total Price</td>
            <th class="head-data">Requested by</td>
            <th class="head-data">Approval</td>
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
</body>

<script>
  function lgbkSav3Btn(){
            if(nameVal.value == ""){
                swal ( "Oops" ,  "You have entered an invalid Employee Name!" ,  "error" );
            }else if(empSel.selectedIndex === 0){
                swal ( "Oops" ,  "You have selected an invalid Employer!" ,  "error" );
            }else{
                if(document.getElementById("lgbkFormTitle").innerHTML == "ADD"){
                    document.getElementById("lgbkAdd").click();
                }else if(document.getElementById("lgbkFormTitle").innerHTML == "EDIT"){
                    document.getElementById("lgbkEdit").click();
                }
            }
        }
</script>