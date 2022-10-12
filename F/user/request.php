<?php 
include "/includes/con/sess.php";
include "/includes/D/config.php";
if(isset($_POST["request"])) {
    
    $date = date("ym");
    $code = "GS";
    $number = "0001";
    $item = $_POST["item"];
    $supplier = $_POST["supplier"];
    $required_amt = $_POST["required_quantity"];
    $price = $_POST["price"];
    $unit = $_POST["unit"];
    $requestor = $_POST["requestor"];
    $date_request = date('M d Y', strtotime($_POST["date_request"]));
    $request_id = "$code$date$number";

    $check_request_id = "SELECT request_id FROM `request` WHERE request_id = '$request_id'";
    $query_request_id = mysqli_query($db_conn, $check_request_id);
    $count_exist = mysqli_num_rows($query_request_id);

        if($count_exist < 0) {
            $request_insert = "INSERT INTO `request`(`item`, `supplier`, `required_quantity`, `price`, `unit`, `requestor`, `date`, `date_request`, `request_id`, `approval`) VALUES ('$item', '$supplier', '$required_amt', '$price', '$unit', '$requestor', current_timestamp(), '$date_request', '$request_id', false)";

            $request_insert_query = mysqli_query($db_conn, $request_insert);

            if(!$request_insert_query) {
                header("location: RNA/K/item-request.php?action=status");
                echo '<script type="text/javascript"> alert("Information not updated") </script>';
            }
            if($request_insert_query) {
                header("location: RNA/K/item-request.php?action=status");
                echo '<script type="text/javascript"> alert("Done!") </script>';
            }
        }
    if($count_exist > 0){
        $number++;
    }
}
?>