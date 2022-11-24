<?php
include "/var/www/html/RNA/includes/D/config.php";
include "/var/www/html/RNA/includes/con/sess.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/RNA/S/css/topbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/RNA/S/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/RNA/S/css/approve.css?v=<?php echo time(); ?>">
  </head>
  <body>
    <div>
      <?php include "/var/www/html/RNA/includes/bar/navbar.php"; ?>
    </div>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php include "/var/www/html/RNA/includes/bar/sidebar.php"; ?>
    <div class="main_content_wsb" id="main_content">
    <?php
    $approver = $_SESSION["last_name"] .' '. $_SESSION["first_name"];
    $request_id = $_GET["request"];
    $request_select = "SELECT * FROM `request` WHERE `request_id` = '$request_id'";
    $request_query = mysqli_query($db_conn, $request_select);
    while ($request_specific = mysqli_fetch_assoc($request_query)) {
    ?>
	    <div class="header">GSIS - Approval for Request: <?php echo $request_specific['request_id'] ?></div>
        <div class="container">
          <div class="details">
                <?php
                  echo "<div class='detail_title'>Item: <div class='detail_print'>"; echo $request_specific['item']; echo "</div></div>";
                  echo "<div class='detail_title'>Supplier: <div class='detail_print'>"; echo $request_specific['supplier']; echo "</div></div>";
                  echo "<div class='detail_title'>Required Quantity: <div class='detail_print'>"; echo $request_specific['required_quantity']; echo "</div></div>";
                  echo "<div class='detail_title'>Price/Unit: <div class='detail_print'>"; echo $request_specific['price']; echo "/"; echo $request_specific['unit']; echo "</div></div>";
                  echo "<div class='detail_title'>Total Price: <div class='detail_print'>"; echo $request_specific['total_price']; echo "</div></div>";
                  echo "<div class='detail_title'>Requested by: <div class='detail_print'>"; echo $request_specific['requestor']; echo "</div></div>";
                  echo "<div class='detail_title'>Date requested: <div class='detail_print'>"; echo date('F d, Y', strtotime($request_specific['date_request'])); echo "</div></div>";
                ?>
          <div class="action_container">
            <!-- <form class="actions" method="post">
              <button name="accept" class="accept">Accept</button>
              <button name="edit" class="edit">Edit</button>
              <button name="cancel" class="cancel">Cancel</button>
            </form> -->
          </div>
        </div>
            <?php
            $edit_link = 'location: ./edit.php?id=';
              if (isset($_POST['accept'])) {
                $update_status = "UPDATE request set approval = true, approver = '$approver' WHERE request_id ='$request_id'";
                $request_query = mysqli_query($db_conn, $update_status);
                ?>
                <script>alert('Information updated successfully');</script>
                <?php
              }elseif (isset($_POST['edit'])) {
                header("location: ./edit.php?id=$request_id");
              }elseif (isset($_POST['cancel'])) {
                $update_status = "UPDATE request set approval = true WHERE request_id ='$request_id'";
                $request_query = mysqli_query($db_conn, $update_status);
                ?>
                <script>alert('Information updated successfully');</script>
                <?php } ?>
        </div>
      </div>
<?php } ?>
  </body>