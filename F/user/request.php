<?php 
include ("../includes/d/config.php");
include ("../includes/con/sess.php");

    include ("../includes/d/config.php");
    if(isset($_POST["request"])) {
        $supplier = $_POST["supplier"];
        $item = $_POST["item"];
        $required_amt = $_POST["required_quantity"];
        $price = $_POST["price"];
        $unit = $_POST["unit"];
        $requestor = $_POST["requestor"];
        $date_request = date('M d Y', strtotime($_POST["date_request"]));

        $request_insert = "INSERT INTO `request`(`item`, `supplier`, `required_quantity`, `price`, `unit`, `requestor`, `date`, `date_request`) VALUES ('$item', '$supplier', '$required_amt', '$price', '$unit', '$requestor', current_timestamp(), '$date_request')";

        $request_insert_query = mysqli_query($db_conn, $request_insert);

        if($request_insert_query)
        {
            header("location: RNA/K/Function.php?action=request");
            echo '<script type="text/javascript"> alert("Done!") </script>';
        }
        else
        {
            header("location: RNA/K/Function.php?action=request");
            echo '<script type="text/javascript"> alert("Information not updated") </script>';
        }
    }
?>