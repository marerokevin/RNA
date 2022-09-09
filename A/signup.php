<?php

$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    include ("../includes/config.php");

    $user_uid = $_POST["user_uid"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $suffix = $_POST["suffix"];
    $user_pwd = $_POST["user_pwd"]; 
    $user_cpwd = $_POST["user_cpwd"];
    $user_level = $_POST["user_level"];
    $email_address = $_POST["email_address"];
    $section = $_POST["section"];
    $department = $_POST["department"];
    
            
    $create_user_select = "SELECT user_uid, first_name, last_name, suffix, user_pwd, user_cpwd, user_level, section, department FROM accounts WHERE user_uid='$user_uid'";
    $create_user_query = mysqli_query($db_conn, $create_user_select);
    $create_user_count = mysqli_num_rows($create_user_query); 

    if($create_user_count == 0) {
        if(($user_pwd == $user_cpwd) && $exists==false) {
    
            $hash = password_hash($user_pwd, PASSWORD_DEFAULT);

            $create_user_select2 = "INSERT INTO `accounts` ( `user_uid`, `first_name`, `last_name`, `suffix`, `user_pwd`, `user_level`, `email_address`, `section`, `department`, `date`) VALUES ('$user_uid', '$first_name', '$last_name', '$suffix', '$hash', '$user_level', '$email_address', '$section', '$department', current_timestamp())";
    
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../S/css/signup.css?v=<?php echo time(); ?>">
<?php
    if($showAlert) {
        echo '<title>Welcome!</title>'; 
    }

    if($showError) {
        echo '<title>Sorry!</title>'; 
    }
        
    if($exists) {
        echo '<title>Sorry!</title>'; 
    }
?>
</head>
<body>
    <div class="notification-container">
        <?php
            if($showAlert) {
                
                echo '<div class="alert-success" role="alert">
                <button type="button" class="closebtn-success" data-dismiss="alert" aria-label="Close">
                    <strong>Success!</strong> Your account is 
                now created and you can login.  
                    <span aria-hidden="true">×</span> 
                    <a class="link" href="/RNA/A/login.php"></a>
                    </button> 
            </div>'; 
            }

            if($showError) {

                echo '<div class="alert-danger" role="alert"> 
                <button type="button" class="closebtn-error" data-dismiss="alert" aria-label="Close">
                    <strong>Error!</strong> '. $showError.'
                    <span aria-hidden="true">×</span> 
                    <a class="link" href="/RNA/A/login.php"></a>
                </button> 
            </div>'; 
            }
                
            if($exists) {
                echo '<div class="alert-danger" role="alert">
                <button  type="button" class="closebtn-error" 
                    data-dismiss="alert" aria-label="Close">
                    <strong>Error!</strong> '. $exists.' 
                    <span aria-hidden="true">×</span> 
                    <a class="link" href="/RNA/A/login.php"></a>
                </button>
            </div>'; 
            }
        ?>
    </div>
</body>
</html>
