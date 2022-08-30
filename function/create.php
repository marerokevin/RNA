<?php
include "../includes/sess.php";

$showAlert = false; 
$showError = false; 
$exists=false;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    include ("../includes/config.php");
    
    $id_number = $_POST["id_number"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email_addres = $_POST["email_addres"];
    $telephone_number = $_POST["telephone_number"];
    $location = $_POST["location"];
    $department = $_POST["department"]; 
    $section = $_POST["section"];

    $employee_create_select = "SELECT * from users WHERE first_name='$first_name' AND last_name='$last_name' AND id_number='$id_number'";
    $employee_create_result = mysqli_query($db_conn, $employee_create_select);
    $employee_create_count = mysqli_num_rows($employee_create_result); 

    if($employee_create_count == 0) {
        if($exists==false) {

            $employee_create_insert = "INSERT INTO `users` ( `id_number`, `first_name`, `last_name`, `email_addres`, `telephone_number`, `location`, `department`, `section`, `date`) VALUES ('$id_number','$first_name', '$last_name', '$email_addres', '$telephone_number', '$location', '$department', '$section', current_timestamp())";
    
            $employee_insert_result = mysqli_query($db_conn, $employee_create_insert);
    
            if ($employee_insert_result) {
                $showAlert = true; 
            }
        }else { 
            $showError = "Passwords do not match."; 
        }      
    }
    if($employee_insert_result>0) {
        $exists="The employee is already on the list."; 
    }
}
?>

    
<!DOCTYPE html>
<html lang="en">
<title>Employee Directory - Create</title>
<head>
<link rel="stylesheet" type="text/css" href="/DNA/resources/styles/create.css">
<link rel="stylesheet" type="text/css" href="/DNA/resources/css/styles.css">
</head>

<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<body>
<?php


    if($showAlert) {
    
        echo '<div class="alert-success" role="alert">
        <button type="button" class="closebtn-success"
            data-dismiss="alert" aria-label="Close">
            <strong>Success!</strong> You have encoded a new employee
            <span aria-hidden="true">×</span> 
        </button> 
    </div>'; 
    }
    
    if($showError) {
    
        echo '<div class="alert-danger" role="alert"> 
        <button type="button" class="closebtn-error" 
            data-dismiss="alert" aria-label="Close">
            <strong>Error!</strong> '. $showError.'
            <span aria-hidden="true">×</span> 
        </button> 
    </div>'; 
   }
        
    if($exists) {
        echo '<div class="alert-danger" role="alert">
        <button type="button" class="closebtn-error" 
            data-dismiss="alert" aria-label="Close">
            <strong>Error!</strong> '. $exists.' 
            <span aria-hidden="true">×</span> 
        </button>
    </div>'; 
    }
   
?>
    <div>
    <?php include "../includes/navbar.php"; ?>
    </div>
    <h1 class="text-center">Register</h1> 
    <form action="create.php" method="post">
        <div class="form-group"> 
        <label for="id_number">ID Number:</label>
        <input type="text" class="form-control" id="id_number"
            name="id_number" aria-describedby="emailHelp" placeholder="ID Number" onkeyup="stoppedTyping()" required>    
        </div>

        <div class="form-group"> 
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name"
            name="first_name" aria-describedby="emailHelp" placeholder="First Name" onkeyup="stoppedTyping()" required>    
        </div>

        <div class="form-group"> 
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name"
            name="last_name" aria-describedby="emailHelp" placeholder="Last Name" onkeyup="stoppedTyping()" required>    
        </div>

        <div class="form-group"> 
        <label for="department">Department:</label>
            <select class="form-control" id="department" name="department" placeholder="Select the Department" onkeyup="stoppedTyping()" required>
                <option value="" disabled selected>Select your department</option>
                <option value="Administration">Administration</option>
                <option value="Accounting">Accounting</option>
                <option value="Purchasing">Purchasing</option>
                <option value="Production Technology">Production Technology</option>
                <option value="Quality Control">Quality Control</option>
                <option value="Quality Assurance">Quality Assurance</option>
                <option value="Production 1">Production 1</option>
                <option value="Production 2">Production 2</option>
                <option value="Production Planning and Inventory Control">Production Planning and Inventory Control</option>
                <option value="Parts Inspection">Parts Inspection</option>
                <option value="System Kaizen">System Kaizen</option>
                <option value="Direct Operation Kaizen">Direct Operation Kaizen</option>
                <option value="Production Support">Production Support</option>
                <option value="Parts Production">Parts Production</option>
            </select>

            <div class="form-group"> 
            <label for="section">Section:</label>
            <select class="form-control" id="section" name="section" placeholder="Select the Section" onkeyup="stoppedTyping()">
                <option value="" disabled selected>Select your section</option>
                <option value="MIS">MIS</option>
                <option value="FEM">FEM</option>
                <option value="GS">GS</option>
                <option value="HR">HR</option>
                <option value="Accounting">Accounting</option>
                <option value="Quality Assurance">Quality Assurance</option>
            </select>

        <div class="form-group"> 
            <label for="location">Building:</label>
            <select class="form-control" id="location" name="location" placeholder="Select the location" onkeyup="stoppedTyping()" required>
                <option value="" disabled selected>Select your location</option>
                <option value="GPI-1">GPI-1</option>
                <option value="GPI-2">GPI-2</option>
                <option value="GPI-3">GPI-3</option>
                <option value="GPI-4">GPI-4</option>
                <option value="GPI-5">GPI-5</option>
                <option value="GPI-6">GPI-6</option>
                <option value="GPI-7">GPI-7</option>
                <option value="GPI-8">GPI-8</option>
                <option value="GPI-9">GPI-9</option>
            </select>

        <div class="form-group"> 
        <label for="email_addres">E-mail Address:</label>
        <input type="text" class="form-control" id="email_addres"
            name="email_addres" aria-describedby="emailHelp" placeholder="E-mail Address" onkeyup="stoppedTyping()">    
        </div>
        
        <!-- <div class="form-group">
        <label for="user_email">E-mail Address:</label>
            <input type="text" class="form-control"
            id="user_email" name="user_email" placeholder="E-mail Address" onkeyup="stoppedTyping()" required> 
        </div> -->
        
        <div class="form-group">
        <label for="telephone_number">Telephone Number/s:</label>
            <input type="text" class="form-control"
            id="telephone_number" name="telephone_number" placeholder="Enter section" onkeyup="stoppedTyping()" required>
        </div>

        <!-- <div class="form-group"> 
        <label for="user_department">Department:</label>
            <select class="form-control" id="user_department" name="user_department" placeholder="Select Department" onkeyup="stoppedTyping()" required>
                <option value="" disabled selected>Select your department</option>
                <option value="Administration">Administration</option>
                <option value="Accounting">Accounting</option>
                <option value="Purchasing">Purchasing</option>
                <option value="Production Technology">Production Technology</option>
                <option value="Quality Control">Quality Control</option>
                <option value="Quality Assurance">Quality Assurance</option>
                <option value="Production 1">Production 1</option>
                <option value="Production 2">Production 2</option>
                <option value="Production Planning and Inventory Control">Production Planning and Inventory Control</option>
                <option value="Parts Inspection">Parts Inspection</option>
                <option value="System Kaizen">System Kaizen</option>
                <option value="Direct Operation Kaizen">Direct Operation Kaizen</option>
                <option value="Production Support">Production Support</option>
                <option value="Parts Production">Parts Production</option>
            </select>
        <label for="user_pwd">Password:</label>
        <div class="form-group"> 
            <input type="password" class="form-control"
            id="user_pwd" name="user_pwd" placeholder="Password" onkeyup="stoppedTyping()" required> 
        </div>
        <div class="form-group">
        <label for="user_cpwd">Confirm your password:</label>
            <input type="password" class="form-control"
                id="user_cpwd" name="user_cpwd" placeholder="Confirm Password" onkeyup="stoppedTyping()" required> -->
        
            <small id="emailHelp" class="form-text text-muted">
            Make sure to complete all of the fields
            </small> 
        </div>      
        <div>
        <input type="submit" class="reg-btn" Value="Register"id="reg_btn">
        </div>
    </form> 

    <script type="text/javascript">
function createAlert(message){
  var alert = document.createElement("div");
  alert.setAttribute("class","alert alert-danger alert-dismissible fade show");
  alert.setAttribute("role","alert");
  alert.innerHTML = message;
  setTimeout(function() {
    $(alert).fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 8000);
  document.getElementById("modalBody").appendChild(alert);
}
// Reg Button Disable
function stoppedTyping(){
    if(document.getElementById("user_uid").value == "" || document.getElementById("user_fname").value == "" || document.getElementById("user_email").value == "" || document.getElementById("user_section").value == "" || document.getElementById("user_department").value == "" || document.getElementById("user_pwd").value == ""){
        document.getElementById("reg_btn").disabled = true;
    } else {
        document.getElementById("reg_btn").disabled = false;
    }
}
// $user_uid = $_POST["user_uid"];
//     $user_fname = $_POST["user_fname"];
//     $user_email = $_POST["user_email"];
//     $user_section = $_POST["user_section"];
//     $user_department = $_POST["user_department"];
//     $user_pwd = $_POST["user_pwd"]; 
//     $user_cpwd = $_POST["user_cpwd"];

// Confirm Password Checker

</script>

</body>
</html>