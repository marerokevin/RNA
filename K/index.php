<?php 
include "../includes/sess.php";
include ("../includes/config.php");

$search_filter = "SELECT * FROM users";
$search_query = mysqli_query($db_conn, $search_filter);
$search_count = mysqli_num_rows($search_query);

?>
<?php
  if (isset($_POST['selectdate'])){
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      include_once("dbconnect.php");

      $from=date('Y-m-d 00:00:00',strtotime($_POST['selectdate']));
      $to=date('Y-m-d 23:59:59',strtotime($_POST['selectdate']));

      $sum_yeses = "SELECT date_encoded, user_department, SUM(bcp_yes) AS sum_yes FROM workinfo where date_encoded between '$from' AND '$to' GROUP BY user_department";
      $sum_yes = mysqli_query($conn, $sum_yeses) or die("error to fetch data");

      $sum_nos = "SELECT date_encoded, user_department, SUM(bcp_no) AS sum_no FROM workinfo where date_encoded between '$from' AND '$to' GROUP BY user_department";      
      $sum_no = mysqli_query($conn, $sum_nos) or die("error to fetch data");
        
      $sum_infos = "SELECT date_encoded, user_department, SUM(bcp_info) AS sum_info FROM workinfo where date_encoded between '$from' AND '$to' GROUP BY user_department";
      $sum_info = mysqli_query($conn, $sum_infos) or die("error to fetch data");

      if ($sum_yes->num_rows > 0) {
        $labels = $yes = '';
        while($row = $sum_yes->fetch_assoc()) {
          //get the company name separated by comma for chart labels
          $labels.= '"' .$row["user_department"]. '",';
          //get the total separated by comma for chart data
          $yes.= $row["sum_yes"].',';
        }
      }

      if ($sum_no->num_rows > 0) {
        $labels = $no = '';
        while($row = $sum_no->fetch_assoc()) {
          //get the company name separated by comma for chart labels
          $labels.= '"' .$row["user_department"]. '",';
          //get the total separated by comma for chart data
          $no.= -1 * $row["sum_no"].',';
        }
      }

      if ($sum_info->num_rows > 0) {
        $labels = $info = '';
        while($row = $sum_info->fetch_assoc()) {
          //get the company name separated by comma for chart labels
          $labels.= '"' .$row["user_department"]. '",';
          //get the total separated by comma for chart data
          $info.= $row["sum_info"].',';
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../resources/images/fontawesome/css/all.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../resources/css/topbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../resources/css/sidebar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../resources/css/index.css?v=<?php echo time(); ?>">
    <title>Home - Dashboard</title>
  </head>
  <body>
  <div>
    	<?php include "../includes/navbar.php"; ?>
    </div>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php include "../includes/sidebar.php"; ?>
    <div class="main_content_wsb" id="main_content">
      <div class="header">Dashboard</div>
      <div class="roomcontainer">
        <!--Date Selector-->
        <div class="wallhanger">
            <form class="dateselect" method="POST">
                <label class="dateLabel" type="date">Date: </label>
                <input class="datepicker" type="date" name="selectdate" id="today2">
                <button class="datebutton" type="submit" value="View" name="submit" id="submit">View</button>
            </form>
        </div>
        <div class="bedsidetable">
        <!--System Time-->
          <div class="systemtime" type="currenttime" id="currentTime"></div>
        </div>
      </div>
    <!--Bar Chart Display-->
      <div class="chart_container">
        <canvas class="test" id="myChart"></canvas>
      </div>
    <!--Table Display - Total-->
    <div class=tablecontainer>
      <table class="total">
        <h2 class="title">Total Manpower - Summary</h2>
        <tr>
          <th class="yes">Yes</th>
          <th class="no">No</th>
          <th class="info">No Information</th>
        </tr>
        <?php
          if (isset($_POST['selectdate'])){
            if($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'dbconnect.php'; 
        $sql = "SELECT date_encoded, user_department, SUM(bcp_yes) AS sum_yes, SUM(bcp_no) AS sum_no, SUM(bcp_info) AS sum_info FROM workinfo where date_encoded between '$from' AND '$to'";
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){ ?>
        <tr>
          <td class="yes"><?php echo $row['sum_yes'];?></td>
          <td class="no"><?php echo $row['sum_no'];?></td>
          <td class="info"><?php echo $row['sum_info'];?></td>
        </tr>
        </table>
      <?php }}}?>
    </div>
    <!--Table Display - Per Department-->
    <div class="tablecontainer">
    <table class="perdept">
    <h2>Total per Department</h2>
    <tr>
    <th class="depart">Department</th>
    <th class="date">Date Encoded</th>
    <th class="yes_per">Yes</th>
    <th class="no_per">No</th>
    <th class="info_per">No Information</th>
    </tr>
    <?php
    if (isset($_POST['selectdate'])){
      if($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php'; 
    $sql = "SELECT date_encoded, user_department, SUM(bcp_yes) AS sum_yes, SUM(bcp_no) AS sum_no, SUM(bcp_info) AS sum_info FROM workinfo where date_encoded between '$from' AND '$to' GROUP BY user_department";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){ ?>
    <tr>
    <td class="depart"><?php echo $row['user_department'];?></td>
    <td class="date"><?php echo $row['date_encoded'];?></td>
    <td class="yes_per"><?php echo $row['sum_yes'];?></td>
    <td class="no_per"><?php echo $row['sum_no'];?></td>
    <td class="info_per"><?php echo $row['sum_info'];?></td>
    </tr>
    <?php }}}?>
    </div>
    </div>
</div>
</body>
</html>
    <!--Bar Chart Script-->
      <script>
        var config, ctx;
        config = {
          type: 'bar',
          data: {
            labels: [<?php echo trim($labels);?>],
            datasets: [{
              label: 'Yes',
              backgroundColor: "rgba(18,122,0,0.9)",
              fillColor: "rgba(18,122,0,0.5)",
              data: [<?php echo trim($yes);?>],
            }, 
            {
              label: 'No Information',
              backgroundColor: "#8c8c8c",
              data: [<?php echo trim($info);?>]
            }, 
            {
              label: 'No',
              backgroundColor: '#89051b',
              data: [<?php echo trim($no);?>]
            }]
          },
          options: {
            scales: {
              xAxes: [{
                stacked: true
              }],
              yAxes: [{
                stacked: true
              }]
            }
          }
        };

        ctx = document.getElementById("myChart").getContext("2d");
        new Chart(ctx, config);
      </script>
    <!--Burger Script-->   
      <script>
        function Burjer() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
      </script>

    <!--Clock Script-->   
      <script>
        window.onload = function() {
          clock();
            function clock() {
              var now = new Date();
              var one_day = now.getHours();
              var hour = now.getHours();
              var min = now.getMinutes();
              var sec = now.getSeconds();
              var mid = 'PM';
              if (sec < 10) {
                sec = "0" + sec;
              }
              if (min < 10) {
                min = "0" + min;
              }
              if (hour > 12) {
                hour = hour - 12;
              }    
              if(hour==0){
                hour=12;
              }
              if(one_day < 12) {
                mid = 'am';
              }     
            document.getElementById('currentTime').innerHTML = hour+':'+min+':'+sec +''+mid ; setTimeout(clock, 1000);
          }
        }
      </script>
<!--Automatic Date Script-->
  <script>
    let today = new Date().toISOString().substr(0, 10);
    document.querySelector("#today2").valueAsDate = new Date();
  </script>
<script src="/RNA/resources/scripts/sidebar.js"></script>
<script src="/RNA/resources/scripts/searchbar.js"></script>