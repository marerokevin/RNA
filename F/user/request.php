<?php 
include "/includes/con/sess.php";
include "/includes/D/config.php";



if(isset($_POST["request"])) {

    $code = "GS";
    $get_month = date('m', strtotime("now"));
    $number = "0001";

    $generated = "$code$get_month-$number";
    $item = $_POST["item"];
    $supplier = $_POST["supplier"];
    $required_quantity = $_POST["required_amt"];
    $unit = $_POST["unit"];
    $total = $_POST["total_amt"];
    $requestor = $_POST["requestor"];
    $date_request = date('M d Y', strtotime($_POST["date_request"]));

    $check_request_id = "SELECT request_id FROM `request` WHERE request_id = '$generated'";
    $query_request_id = mysqli_query($db_conn, $check_request_id);
    $count_exist = mysqli_num_rows($query_request_id);

    if($count_exist < 0) {
        $request_insert = "INSERT INTO request (`item`, `supplier`, `required_quantity`, `unit`, `requestor`, `date_request`, `request_id`, `approval`, `date`, `status`, `total_price`) VALUES ('$item', '$supplier', '$required_quantity', '$unit', '$requestor', current_timestamp(), '$generated', false, current_timestamp(), false, '$total')";

        // //test
        // INSERT INTO request (`item`, `supplier`, `required_quantity`, `price`, `unit`, `requestor`, `date_request`, `request_id`, `approval`, `date`, `status`, `unit_price`) VALUES ('$item', '$supplier', '$required_amt', '$price', '$unit', '$requestor', current_timestamp(), '$generated', false, now(), false, '$total');

        // //boilerplate
        // INSERT INTO request (`item`, `supplier`, `required_quantity`, `price`, `unit`, `requestor`, `date_request`, `request_id`, `approval`, `date`, `status`, `unit_price`) VALUES ('test', 'test supplier', '100', '200', 'bottles', 'Kevin Roy Marero', current_timestamp(), 'test', false, now(), false, '200');

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
    elseif($count_exist > 0){
        $number++;
    }
}
echo $generated;

?>