

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
          <?php 
          include ("../includes/d/config.php");
          $userdept =  $_SESSION["department"];
          $item_access_select = "select item, description from itemaccess where $userdept = 'true'";
          $item_access_query = mysqli_query($db_conn, $item_access_select);
          while ($item_fetch = mysqli_fetch_assoc($item_access_query)) {
                  $item_allowed_access = $item_fetch['item'];
                  $description_allowed_access = $item_fetch['description'];
                  include ("../includes/d/config.php");

                  $list_item = "select * from inventory where supplier = '$item_allowed_access'";
                  $item_access = mysqli_query($db_conn, $list_item);
                  while ($rowData = mysqli_fetch_assoc($item_access)) {
          ?>
              <td class="body-data"><?php echo $rowData['id']; ?></td>
              <td class="body-data"><?php echo $rowData['supplier']; ?></td>
              <td class="body-data"><?php echo $rowData['item']; ?></td>
              <td class="body-data"><?php echo $rowData['description']; ?></td>
              <td class="body-data"><?php echo $rowData['unit']; ?></td>
              <td class="body-data"><?php echo $rowData['unit_price']; ?></td>
              <td class="body-data"><?php echo $item_allowed_access; ?></td>
              <td class="body-data"><?php echo $description_allowed_access; ?></td>
              <td class="body-data"><a class="data-action" href="../F/status.php">Pending</a></td>
            </tr>
            <?php }} ?>
          </tbody>
        </table>
      </div>
    </div>