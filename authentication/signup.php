<?php

$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    include ("../includes/config.php");

    $user_uid = $_POST["user_uid"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user_pwd = $_POST["user_pwd"]; 
    $user_cpwd = $_POST["user_cpwd"];
    $user_level = $_POST["user_level"];
    $email_address = $_POST["email_address"];
    
            
    $create_user_select = "SELECT user_uid, first_name, last_name, user_pwd, user_cpwd, user_level FROM accounts WHERE user_uid='$user_uid'";
    $create_user_query = mysqli_query($db_conn, $create_user_select);
    $create_user_count = mysqli_num_rows($create_user_query); 

    if($create_user_count == 0) {
        if(($user_pwd == $user_cpwd) && $exists==false) {
    
            $hash = password_hash($user_pwd, PASSWORD_DEFAULT);

            $create_user_select2 = "INSERT INTO `accounts` ( `user_uid`, `first_name`, `last_name`, `user_pwd`, `user_level`, `email_address`, `date`) VALUES ('$user_uid', '$first_name', '$last_name', '$hash', '$user_level', '$email_address', current_timestamp())";
    
            $result = mysqli_query($db_conn, $create_user_select2);
    
            if ($result) {
                $showAlert = true; 
            }
        }
        else {
            $showError = "Passwords do not match"; 
        }
    }
   if($create_user_count>0) {
      $exists="Username already taken"; 
   } 
}
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset=UTF-8>
    <title>Register - Directory</title>
    <link rel="stylesheet" type="text/css" href="/DNA/resources/styles/create.css">
    <link rel="stylesheet" type="text/css" href="/DNA/resources/css/styles.css">
</head>

<meta name="viewport" content=
    "width=device-width, initial-scale=1, 
    shrink-to-fit=no">
<body>
<?php
    if($showAlert) {
    
        echo '<div class="alert-success" role="alert">
        <button type="button" class="closebtn-success"
            data-dismiss="alert" aria-label="Close">
            <strong>Success!</strong> Your account is 
        now created and you can login.  
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
    <h1 class="text-center">Sign Up</h1> 
    <form action="signup.php" method="POST">
        <div class="form-group"> 
        <label for="user_uid">Username:</label>
        <input type="text" class="form-control" id="user_uid"
            name="user_uid" aria-describedby="emailHelp" placeholder="Username" onkeyup="stoppedTyping()" required>    
        </div>

        <label for="user_level">User Level:</label>
            <select type="text" class="form-control"
            id="user_level" name="user_level" placeholder="Select user level" onkeyup="stoppedTyping()" required>
            <option value="" disabled selected>Select user level</option>
            <option value="Administrator">Administrator</option>
            <option value="User">User</option>
        </select>

        <div class="form-group"> 
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name"
            name="first_name" aria-describedby="emailHelp" placeholder="First Name" onkeyup="stoppedTyping()" required>    
        </div>

        <div class="form-group"> 
        <label for="last_name">last Name:</label>
        <input type="text" class="form-control" id="last_name"
            name="last_name" aria-describedby="emailHelp" placeholder="Last Name" onkeyup="stoppedTyping()" required>    
        </div>

        <div class="form-group">
        <label for="email_address">E-mail Address:</label>
            <input type="text" class="form-control"
            id="email_address" name="email_address" placeholder="E-mail Address" onkeyup="stoppedTyping()" required> 
        </div>

        <label for="user_pwd">Password:</label>
        <div class="form-group"> 
            <input type="password" class="form-control"
            id="user_pwd" name="user_pwd" placeholder="Password" onkeyup="stoppedTyping()" required> 
        </div>
        <div class="form-group">
        <label for="user_cpwd">Confirm your password:</label>
            <input type="password" class="form-control"
                id="user_cpwd" name="user_cpwd" placeholder="Confirm Password" onkeyup="stoppedTyping()" required>
            <small id="emailHelp" class="form-text text-muted">
            Make sure to complete all of the fields
            </small> 
        </div>      
        <div>
        <input type="submit" class="reg-btn" Value="Register"id="reg_btn">
        </div>
    </form> 
</body>
</html>
