<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: /RNA/function/create.php");
    exit;
    
}
include_once ("../includes/config.php");
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
    }else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    }else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, user_uid, user_pwd, first_name, last_name, user_level, email_address FROM accounts WHERE user_uid = ?";
        
        if($stmt = mysqli_prepare($db_conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $last_name, $first_name, $user_level, $email_address);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["user_level"] = $user_level;
                            $_SESSION["email_address"] = $email_address;
                            $_SESSION["username"] = $username;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["last_name"] = $last_name;
                            header("location: /RNA/K/index.php");
                        }else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($db_conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Employee Directory</title>
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="../resources/styles/login.css">
    <!--FONT-->
</head>
<body>
    <div class="title">
            <a href="/RNA/index.php" class="header_logo">
                <img src="../resources/images/glorylogo.svg" alt="GPI-BCP">
            </a>
        <h1 class="text-center">Glory Philippines Inc.</h1>
        <h2 class="system_title">Business Continuity Plan System</h2>
    </div>
    <div name="login_form" class="login">
        <h2 class="Login-title">Login</h2>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger 
            alert-dismissible fade show" role="alert">' . $login_err . '</div>';
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form">
                <input type="text" name="username" class="username<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Username" required oninvalid="this.setCustomValidity('Enter your username here')"
                oninput="this.setCustomValidity('')"/><br>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form">
                <input type="password" name="password" class="password<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" Placeholder="Password" required oninvalid="this.setCustomValidity('Enter your password here')" oninput="this.setCustomValidity('')"/><br>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form">
                <input type="submit" class="loginbtn" value="Login">
            </div>
            <label>
                <input class="rmbr" type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </form>
    </div>  
</body>
</html>