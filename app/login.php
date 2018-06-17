<?php
/**
 * Login,registreren, wachtwoord vergeten script.
 * @Data-config-cabinet
 * @author Carlos Keijzers
 */
session_start();

if(isset($_SESSION['usr_id'])) {
	header("Location: index.php");
}

//Verbinding maken met de database
include_once 'dbconnect.php';

//Algemeen variable data bestand embedden
require_once 'page_includes/data_config.php';

//set validation error flag as false
$error = false;

//======================================================================
// Engine voor het registreren
//======================================================================

if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$surname = mysqli_real_escape_string($con, $_POST['surname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = ($error_notification['registration_name_error']);
		$error_message_register = ($error_notification['registration_name_error']);
	}
	if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
		$error = true;
		$surname_error = ($error_notification['registration_surname_error']);
		$error_message_register = ($error_notification['registration_surname_error']);
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = ($error_notification['registration_email_error']);
		$error_message_register = ($error_notification['registration_email_error']);
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = ($error_notification['registration_password_error']);
		$error_message_register = ($error_notification['registration_password_error']);
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = ($error_notification['registration_cpassword_error']);
		$error_message_register = ($error_notification['registration_cpassword_error']);
	}
	if (!$error) {
		$role = "1";
		$status = "Inactief";
		$licence_start_date = "0";
		setlocale(LC_ALL, 'nl_NL');
        $demo_start_date = date("j-m-Y");
		$email_token = uniqid();
		if(mysqli_query($con, "INSERT INTO ikwil_users(name,surname,email,password,role,status,email_token,demo_start_date,licence_start_date) VALUES('" . $name . "', '" . $surname . "', '" . $email . "', '" . md5($password) . "', '" . $role . "', '" . $status . "', '" . $email_token . "', '" . $demo_start_date . "', '" . $licence_start_date . "')")) {
			
			$register_success = ($success_notification['registration_success']);
			$success_message_register = ($success_notification['registration_success']);
		
			
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
	}
}

//======================================================================
// Engine voor het inloggen
//======================================================================

if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$result = mysqli_query($con, "SELECT * FROM ikwil_users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		$_SESSION['usr_surname'] = $row['surname'];
		$_SESSION['usr_email'] = $row['email'];
		
		$role = $row['role'];
		$email = $row['email'];
		$name = $row['name'];
		$surname = $row['surname'];
		$email_token = $row['email_token'];
		$user_id = $row['id'];
		$account_confirmed = $row['account_confirmed'];
		
		$admin = "1";
		$account_confirmed_check = "1";
		
		
		if ($account_confirmed == $account_confirmed_check){  
		
		}else{
		
	 header("Location: mailer_formats/account-activeren.php?email=$email&token=$email_token&name=$name&surname=$surname&user_id=$user_id");	
		die();	
		}
		

		
		if ($role == $admin){ 
		
		header("Location: ad-dashboard.php");}
		
	else{ header("Location: index.php");}
	
	} else {

		$error_message = ($error_notification['wrong_credentials']);
	}
}

//======================================================================
// Engine voor het wachtwoord herstellen
//======================================================================

if (isset($_POST['forgot_password'])) {

	$email_address = mysqli_real_escape_string($con, $_POST['email_address']);


	$result = mysqli_query($con, "SELECT * FROM ikwil_users WHERE email = '" . $email_address. "'");
	if ($row = mysqli_fetch_array($result)) {
		

		header("Location: mailer_formats/forgot-password.php?email=$email_address");	
		

		}else{
		
	
		}
		

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="app_data/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="app_data/vendors/bower_components/animate.css/animate.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="app_data/css/applogin.css">
    </head>

    <body data-ma-theme="blue">
		 <?php if (isset($error_message)) { echo " 
			<div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                      </button><i class='zmdi zmdi-alert-triangle zmdi-hc-fw'></i> $error_message
       		</div>";} ?>
		
		<?php if (isset($error_message_register)) { ?>
			<div class='alert alert-danger alert-dismissible fade show'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
					</button><i class='zmdi zmdi-alert-triangle zmdi-hc-fw'></i> 
				<?php if (isset($name_error)) echo $name_error; ?> 
				<?php if (isset($surname_error)) echo $surname_error; ?>
				<?php if (isset($email_error)) echo $email_error; ?>
				<?php if (isset($password_error)) echo $password_error; ?>
				<?php if (isset($cpassword_error)) echo $cpassword_error; ?>
			</div>
		<?php } ?>
		
		<?php if (isset($success_message_register)) { ?>
			<div class='alert alert-success alert-dismissible fade show'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
					</button><i class='zmdi zmdi-alert-triangle zmdi-hc-fw'></i> 
				<?php if (isset($register_success)) echo $register_success; ?> 
			</div>
		<?php } ?>
		

        <div class="login">
            <!-- Inloggen -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    Aanmelden bij uw account

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-forget-password" href="">Wachtwoord vergeten?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                <div class="login__block__body">
				
					<br>
					<br>
					<div class="input-group <?php if (isset($error_message)) { echo "has-danger" ;} ?>">
						<span class="input-group-addon">@</span>
						<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="E-mail">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<br>
					<br>
					<div class="input-group <?php if (isset($error_message)) { echo "has-danger" ;} ?>">
						<span class="input-group-addon"><i class="zmdi zmdi-lock-outline zmdi-hc-fw"></i></span>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Wachtwoord">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<br>
					<br>

                    <button type="submit" name="login" value="Registreren" class="btn btn-primary btn-block waves-effect">Inloggen</button>
					<br>
					<br>
					<button type="submit" data-ma-action="login-switch" data-ma-target="#l-register" href="" name="login" value="Registreren" class="btn btn-success btn-block waves-effect">Meld je gratis aan</button>
					<br>
					<br>
				
					<a class="dropdown-item" href="../index.php">www.ikwilfactureren.nl</a>
                     
                </div>
                </form>    
            </div>

			
		
            <!--  Registreren -->
            <div class="login__block" id="l-register">
                <div class="login__block__header palette-Blue bg">
                    <i class="zmdi zmdi-account-circle"></i>
                    Maak een account aan

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-ma-action="login-switch" data-ma-target="#l-forget-password" href="">Wachtwoord vergeten?</a>
                            </div>
                        </div>
                    </div>
                </div>
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <div class="login__block__body">
					<br>
					<br>
					<div class="input-group <?php if (isset($name_error)) { echo "has-danger" ;} ?>">
						<span class="input-group-addon"><i class="zmdi zmdi-face zmdi-hc-fw"></i></span>
						<div class="form-group">
							<input type="text" name="name" class="form-control" placeholder="Naam">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<br>
					<br>
					<div class="input-group <?php if (isset($surname_error)) { echo "has-danger" ;} ?>">
						<span class="input-group-addon"><i class="zmdi zmdi-face zmdi-hc-fw"></i></span>
						<div class="form-group">
							<input type="text" name="surname" class="form-control" placeholder="Achternaam">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<br>
					<br>
					<div class="input-group <?php if (isset($email_error)) { echo "has-danger" ;} ?>">
						<span class="input-group-addon">@</span>
						<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="E-mail">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<br>
					<br>
					<div class="input-group <?php if (isset($password_error)) { echo "has-danger" ;} ?>">
						<span class="input-group-addon"><i class="zmdi zmdi-lock-outline zmdi-hc-fw"></i></span>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Wachtwoord">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<br>
					<br>
					<div class="input-group <?php if (isset($cpassword_error)) { echo "has-danger" ;} ?>">
						<span class="input-group-addon"><i class="zmdi zmdi-lock-outline zmdi-hc-fw"></i></span>
						<div class="form-group">
							<input type="password" name="cpassword" class="form-control" placeholder="Wachtwoord bevestigen">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<br>
					<br>

                    
            
       
                    <button type="submit" name="signup" value="Registreren" class="btn btn-block btn-primary waves-effect">Registreren</button>
					<br>
					<br>
					<button type="submit" data-ma-action="login-switch" data-ma-target="#l-login" href="" name="login" value="Registreren" class="btn btn-success btn-block waves-effect">Inloggen</button>
					<hr>
					<small class="card-subtitle">Door verder te gaan met het maken van je account en het gebruiken van ikwilfactureren.nl, ga je akkoord met onze <strong>Algemene Voorwaarden</strong> en <strong>Privacybeleid</strong>. Indien je hier niet mee akkoord gaat, kun je ikwilfactureren.nl niet gebruiken.</small>
                </div>
            </form>
            </div>
      

            <!-- Wachtwoord vergeten -->
            <div class="login__block" id="l-forget-password">
                <div class="login__block__header palette-Purple bg">
                    <i class="zmdi zmdi-account-circle"></i>
                    Wachtwoord vergeten?
                </div>
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="forgot_password">
					<div class="login__block__body">
						<p class="mt-4">Vul je e-mailadres hieronder in. Een e-mail met instructies over hoe je je wachtwoord moet resetten zal worden verstuurd.</p>

						<div class="form-group form-group--float form-group--centered">
							<input type="text" name="email_address" class="form-control">
							<label>E-mail adres</label>
							<i class="form-group__bar"></i>
						</div>

						<button type="submit" name="forgot_password" value="Registreren" class="btn btn-primary btn-block waves-effect">Wachtwoord resetten</button>

						<br>
						<br>
						<hr>

						<br>
						<br>
						<button type="submit" data-ma-action="login-switch" data-ma-target="#l-login" href="" name="login" value="Login" class="btn btn-primary btn-block waves-effect">Inloggen</button>
						<br>
						<br>
						<button type="submit" data-ma-action="login-switch" data-ma-target="#l-register" href="" name="login" value="Registreren" class="btn btn-success btn-block waves-effect">Meld je gratis aan</button>
						<br>
						<br>
					</div>
				</form>
            </div>
        </div>

        <!-- Older IE warning message -->
            <!--[if IE]>
                <div class="ie-warning">
                    <h1>Warning!!</h1>
                    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                    <div class="ie-warning__downloads">
                        <a href="http://www.google.com/chrome">
                            <img src="app_data/img/browsers/chrome.png" alt="">
                        </a>

                        <a href="https://www.mozilla.org/en-US/firefox/new">
                            <img src="app_data/img/browsers/firefox.png" alt="">
                        </a>

                        <a href="http://www.opera.com">
                            <img src="app_data/img/browsers/opera.png" alt="">
                        </a>

                        <a href="https://support.apple.com/downloads/safari">
                            <img src="app_data/img/browsers/safari.png" alt="">
                        </a>

                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                            <img src="app_data/img/browsers/edge.png" alt="">
                        </a>

                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="app_data/img/browsers/ie.png" alt="">
                        </a>
                    </div>
                    <p>Sorry for the inconvenience!</p>
                </div>
            <![endif]-->

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="app_data/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="app_data/vendors/bower_components/tether/dist/js/tether.min.js"></script>
        <script src="app_data/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="app_data/vendors/bower_components/Waves/dist/waves.min.js"></script>

        <!-- App functions and actions -->
        <script src="app_data/js/app.min.js"></script>
    </body>
</html>