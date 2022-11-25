<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../K/index.php");
    exit;
    
}
include_once ("../includes/D/config.php");
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if(isset($_POST["login"])){
 
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
        $sql = "SELECT id, user_uid, user_pwd, first_name, last_name, user_level, email_address, department, section, head FROM accounts WHERE user_uid = ?";
        
        if($stmt = mysqli_prepare($db_conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $last_name, $first_name, $user_level, $email_address, $department, $section, $head);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["user_level"] = $user_level;
                            $_SESSION["email_address"] = $email_address;
                            $_SESSION["username"] = $username;
                            $_SESSION["user_level"] = $user_level;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["last_name"] = $last_name;
                            $_SESSION["department"] = $department;
                            $_SESSION["section"] = $section;
                            $_SESSION["head"] = $head;
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
    <link rel="stylesheet" type="text/css" href="../S/css/login.css?v=<?php echo time(); ?>">
    <!--FONT-->
</head>
<body>
<?php
    include_once ("signup.php");
?>

<div class="notification-container" id="notification">
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

        if(!empty($login_err)){
            echo '<div class="alert-danger" role="alert">' . $login_err . '</div>';
        }
    ?>
    </div>
    <div class="overall-container">
    <div class="dual-function-container" id="login">
        <div name="login_form" class="login-container" >
        <div class="titlecontainer-login">
                <a href="/RNA/K/index.php" class="header_logo">
                    <img src="../S/images/30189013.jpg" alt="GPI-BCP" class="glory-logo">
                </a>
            <h1 class="company-name">Frogitty Frog</h1>
            <h2 class="system-name">Frog System</h2>
        </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form">
                <div class="username-container">
                    <label class="username-label" for="username">EMAIL or USERNAME</label>
                    <input type="text" name="username" class="username-input"<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Username" required oninvalid="this.setCustomValidity('Enter your username here')"
                    oninput="this.setCustomValidity('')"/><br>
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="password-container">
                    <label class="password-label" for="Password">PASSWORD</label>
                    <input type="password" name="password" class="password-input<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" Placeholder="Password" required oninvalid="this.setCustomValidity('Enter your password here')" oninput="this.setCustomValidity('')"/><br>
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="forgot-container">
                    <a class="forgot" href="#">Forgot password?</a>
                </div>
                <div class="login-button-container">
                    <input type="submit" name="login" class="login-button" value="Log In">
                </div>

                <label>
                    <input class="remeber" type="checkbox" checked="checked" name="remember"> Remember me
                </label>

                <div class="divider"></div>

                <div class="createaccount-container">
                    Need an account? <a class="createaccount" onclick="register()" href=#>Register</a>
                </div>


            </form>
        </div>  
    </div>

    <div class="register-container-hidden" id="register">
        <form class="signup-container" action="login.php" method="POST">
        <h1 class="title">Sign Up</h1> 
            <div class="input-container"> 
            <label class="input-label" for="Password">ID Number <a class="required">*</a></label>
            <input type="text" class="input-main" id="user_uid"
                name="user_uid" aria-describedby="emailHelp" onkeyup="stoppedTyping()" required>    
            </div>
            <div class="input-container"> 
            <label class="input-label" for="Password">User Designation <a class="required">*</a></label>
                <select type="text" class="select-main"
                id="user_level" name="user_level" onkeyup="stoppedTyping()" required>
                    <option value="" disabled selected>Select user level</option>
                    <option value="Head">Head</option>
                    <option value="User">User</option>
                </select>
            </div>
            <div class="full-name-container">
                    <div class="input-first-name-container"> 
                        <label class="input-label" for="Password">First Name <a class="required">*</a></label>
                        <input type="text" class="input-first-name-main" id="first_name" name="first_name" aria-describedby="emailHelp" onkeyup="stoppedTyping()" required>    
                    </div>

                    <div class="input-last-name-container"> 
                <label class="input-label" for="Password">Last Name <a class="required">*</a></label>
                    <input type="text" class="input-last-name-main" id="last_name"
                        name="last_name" aria-describedby="emailHelp" onkeyup="stoppedTyping()" required>    
                    </div>

                    <div class="input-suffix-name-container"> 
                <label class="input-label" for="Password">Suffix <a class="required">*</a></label>
                    <input type="text" class="input-suffix-main" id="suffix"
                        name="suffix" aria-describedby="emailHelp" onkeyup="stoppedTyping()">    
                    </div>
            </div>

            <div class="input-container"> 
                <label class="input-label" for="Password">Department <a class="required">*</a></label>
                <select type="text" class="select-main" id="department" name="department">
                    <option value="" disabled selected>Select user level</option>
                    <option id="admin" value="admin">Administration</option>
                    <option value="accounting">Accounting</option>
                    <option value="qa">Quality Assurance</option>
                    <option value="qc">Quality Control</option>
                    <option value="dok">Direct Operation Kaizen</option>
                    <option value="systemkaizen">System Kaizen</option>
                    <option value="prodsupport_stafftools">Production Support - Tools</option>
                    <option value="prodsupport_staffoffice">Production Support - Office</option>
                    <option value="prodsupport_supplies">Production Support - Supplies</option>
                    <option value="audittraining">Audit & Training</option>
                    <option value="prodmgt">Production Management</option>
                    <option value="impexcrating">Impex/Crating</option>
                    <option value="fabrication">Fabrication</option>
                    <option value="whreceiving">Warehouse/Receiving</option>
                    <option value="saitama">Saitama</option>
                    <option value="purchasing">Purchasing</option>
                    <option value="prodtech">Production Technology</option>
                    <option value="partsinspection">Parts Inspection</option>
                    <option value="prod1dcmotor">Production 1 - DC Motor</option>
                    <option value="prod1ud700yud">Production 1 - UD700/YUD</option>
                    <option value="prod1sdrb260">Production 1 - SDRB260</option>
                    <option value="prod1rbw10">Production 1 - RBW10</option>
                    <option value="prod1rbw100">Production 1 - RBW100</option>
                    <option value="prod1brm">Production 1 - BRM</option>
                    <option value="prod1technician">Production 1 - Technician</option>
                    <option value="prod1office">Production 1 - Office</option>
                    <option value="prod1partsprep">Production 1 - Parts Preparation</option>
                    <option value="prod2rbw150">Production 1 - RBW150</option>
                    <option value="prod2glr100">Production 1 - GLR100</option>
                    <option value="prod2rbg">Production 1 - RBG</option>
                    <option value="prod2technician">Production 2 - Technician</option>
                    <option value="prod2partsprep">Production 2 - Parts Preparation</option>
                    <option value="prod2packaging">Production 2 - Packaging</option>
                    <option value="prod2office">Production 2 - Office</option>
                    <option value="g200">G200</option>
                    <option value="rbw50">RBW50</option>
                    <option value="rbw100">RBW100</option>
                    <option value="sdrb100">SDRB100</option>
                </select>
            </div>

            <div class="input-container"> 
                <label class="input-label" for="Password">Section <a class="required">*</a></label>
                <select type="text" class="select-main" id="section" name="section">
                    <option value="" disabled selected>Select your section</option>
                    <option data-val="admin" value="mis">MIS</option>
                    <option data-val="admin" value="fem">FEM</option>
                    <option data-val="admin" value="wh">Warehouse</option>
                    <option data-val="admin" value="hb">Health Benefits</option>
                    <option data-val="qa" value="eosh">EOSH</option>
                    <option data-val="admin" value="gs">General Services</option>
                    <option data-val="admin" value="hr">Human Resources</option>
                    <option data-val="impexcrating"value="pm">Production Management</option>
                    <option data-val="prodmgt" value="impex">Import/Export</option>
                    <option data-val="audittraining" value="audittraining">Audit & Training</option>
                </select>
            </div>

            <div class="input-container">
                <label for="head" class="input-label">Head <a class="required">*</a></label>
                <select type="text" class="select-main" id="head" name="head">
                    <option value="" disabled selected>Select your head </option>
                    <?php
                        $list_head = "SELECT * FROM accounts WHERE user_level = 'Head'";
                        $head_query = mysqli_query($db_conn, $list_head);
                        while ($head = mysqli_fetch_assoc($head_query)) {
                            echo '<option data-val="'.$head["section"].'" value="'.$head["user_uid"].'">'.$head["first_name"].' '.$head["last_name"].'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="input-container">
                <label class="input-label" for="Password">E-mail Address <a class="required">*</a></label>
                <input type="text" class="input-main"
                id="email_address" name="email_address" onkeyup="stoppedTyping()" required> 
            </div>

            <div class="input-container"> 
                <label class="input-label" for="Password">Password <a class="required">*</a></label>
                <input type="password" class="input-main"
                id="user_pwd" name="user_pwd" onkeyup="stoppedTyping()" required> 
            </div>

            <div class="input-container">
                <label class="input-label" for="Password">Confirm Password <a class="required">*</a></label>
                <input type="password" class="input-main"
                    id="user_cpwd" name="user_cpwd" onkeyup="stoppedTyping()" required>
            </div>
                <small id="emailHelp" class="reminder">Make sure to fill up all fields properly <small>      

            <div>
                <input type="submit" name="register" class="regbutton" Value="Register"id="reg_btn">
            </div>
            <div class="haveaccount">Already have an account?
                <a href="#" onclick="register()">Login</a>
            </div>
        </form> 
    </div>
</div>
</body>
</html>
<script src="/RNA/S/scripts/register-r_side.js"></script>
<script src="/RNA/S/scripts/switch.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
    $('#department').change(function() {
        jQuery("#department")
        var $options = $('#section')
            .val('')
            .find('option')
            .show();
        if (this.value != '0')
            $options
            .not('[data-val="' + this.value + '"],[data-val=""]')
            .hide();
    })
</script>

<script>
    $('#section').change(function() {
        jQuery("#section")
        var $options = $('#head')
            .val('')
            .find('option')
            .show();
        if (this.value != '0')
            $options
            .not('[data-val="' + this.value + '"],[data-val=""]')
            .hide();
    })
</script>