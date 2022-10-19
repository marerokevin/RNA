<?php
include "./includes/D/config.php";
include "./includes/con/sess.php";
$request_id = $_GET["request"];
  $sql = "SELECT * FROM `request` WHERE id='$request_id'";
  $result=mysqli_query($db_conn, $sql);
  echo time();
?>

    <div id="example" style="width: 350px;
        height: 80px;
        margin: 100px auto;
        background-color: #f2f2f2;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border: 1px solid #666666;
        padding: 15px;
        text-align: center;
        font-weight: bold;
        font-size: 15px;
        border: 3px solid #cccccc;
        position: absolute;
        left: 50%;
        top: 100px;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);">
      <div>
        <p>Any content</p>
      </div>
    </div>

    <script>
        function example() {
          el = document.getElementById("example");
          el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
        }
      </script>