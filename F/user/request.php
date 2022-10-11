<?php 
include ("../includes/d/config.php");
include ("../includes/con/sess.php");

    include ("../includes/d/config.php");
    if(isset($_POST["request"])) {
        $item = $_POST["item"];
        $supplier = $_POST["supplier"];
        $required_amt = $_POST["required_quantity"];
        $price = $_POST["price"];
        $unit = $_POST["unit"];
        $requestor = $_POST["requestor"];
        $date_request = date('M d Y', strtotime($_POST["date_request"]));
        $request_id = $_POST["request_id"];

        $request_insert = "INSERT INTO `request`(`item`, `supplier`, `required_quantity`, `price`, `unit`, `requestor`, `date`, `date_request`, `request_id`, `approval`) VALUES ('$item', '$supplier', '$required_amt', '$price', '$unit', '$requestor', current_timestamp(), '$date_request', '$request_id', false)";

        // $request_insert = "INSERT INTO request (`item`, `supplier`, `required_quantity`, `price`, `unit`, `requestor`, `date_request`, `request_id`, `approval`, `date`) VALUES ('test', 'test supplier', '100', '200', 'bottles', 'Kevin Roy Marero', 'today()', 'test', false, '10-17-2021')";

        $request_insert_query = mysqli_query($db_conn, $request_insert);

        if($request_insert_query)
        {
            header("location: RNA/K/item-request.php?action=request");
            echo '<script type="text/javascript"> alert("Done!") </script>';
        }
        else
        {
            header("location: RNA/K/item-request.php?action=request");
            echo '<script type="text/javascript"> alert("Information not updated") </script>';
        }
    }
?>