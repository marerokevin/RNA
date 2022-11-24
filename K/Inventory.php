<?php 
include "../includes/con/sess.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../S/css/topbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../S/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../S/css/Inventory.css?v=<?php echo time(); ?>">
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
              <th class="head-data">Initial Inventory</td>
              <th class="head-data">Initial Inventory Amount</td>
              <th class="head-data">Safety Stock</td>
              <th class="head-data">Total Forcast</td>
              <th class="head-data">Action</td>
            </tr>
          </thead>
          <tbody class="table-body-container">
          <?php include ("../includes/D/config.php");

$list_item = "select * from inventory";
$item_access = mysqli_query($db_conn, $list_item);
while ($rowData = mysqli_fetch_assoc($item_access)) {
?>
            <tr class="table-body-row"> 
              <td class="body-data"><?php echo $rowData['id']; ?></td>
              <td class="body-data"><?php echo $rowData['supplier']; ?></td>
              <td class="body-data"><?php echo $rowData['item']; ?></td>
              <td class="body-data"><?php echo $rowData['description']; ?></td>
              <td class="body-data"><?php echo $rowData['unit']; ?></td>
              <td class="body-data"><?php echo $rowData['unit_price']; ?></td>
              <td class="body-data"><?php echo $rowData['initial_inventory']; ?></td>
              <td class="body-data"><?php echo $rowData['initial_inventory_amount']; ?></td>
              <td class="body-data"><?php echo $rowData['safety_stock']; ?></td>
              <td class="body-data"><?php echo $rowData['total_forcast']; ?></td>
              <td class="body-data"><a class="data-action" href="../F/update.php">Update</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
<script src="/RNA/S/scripts/sidebar.js"></script>
<script src="/RNA/S/scripts/searchbar.js"></script>

<script>
        function getInitials(firstName, lastName) {
            return (firstName[0] + lastName[0]).toUpperCase()
        }

        function getYear() {
            return (new Date).getFullYear() % 100
        }

        function paddedNumber(number) {
            var result = ""
            for(var i = 4 - number.toString().length; i > 0; i--) {
            result += "0"
            }
            return result + number
        }

        function makeStudentID(firstName, lastName, studentNumber) {
            return getInitials(firstName, lastName) + paddedNumber(studentNumber) + getYear()
        }

        var sequenceNumber = 1
        function gatherDataAndOutput() {
            var firstName = document.getElementById("disaster_desc").value
            var lastName = document.getElementById("disaster_type").value
            var outputElement = document.getElementById("dis_control_number")

            outputElement.value = makeStudentID(firstName, lastName, sequenceNumber)

            sequenceNumber++; // make a different ID for the next student.
        }
    
    </script>