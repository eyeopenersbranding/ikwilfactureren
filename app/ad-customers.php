<?php
$Page_id="customers";
session_start();
include_once 'dbconnect.php';


if (isset($_SESSION['usr_id'])) {
    
} else {
    header('Location: login.php');
}

include 'page_includes/ikwil_redirect_core.php';

if ($user_role == $admin) {
    
} else {
 header('Location: index.php');
}

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$surname = mysqli_real_escape_string($con, $_POST['surname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
		$error = true;
		$surname_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		$role = "1";
		$status = "Actief";
		$email_token = "1";
		$demo_start_date = "0";
		$licence_start_date = "0";
		$account_confirmed = "1";
		if(mysqli_query($con, "INSERT INTO ikwil_users(name,surname,email,password,role,status,email_token,account_confirmed,demo_start_date,licence_start_date) VALUES('" . $name . "', '" . $surname . "', '" . $email . "', '" . md5($password) . "', '" . $role . "', '" . $status . "', '" . $email_token . "', '" . $account_confirmed . "', '" . $demo_start_date . "', '" . $licence_start_date . "')")) {
			 header("Location: admin.php");
			$_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
			<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Account succesvol aangemaakt.</div>";
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
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
        <link rel="stylesheet" href="app_data/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">

        <!-- App styles -->
        <link rel="stylesheet" href="app_data/css/app.css">
    </head>

    <body data-ma-theme="blue">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <?php include 'page_includes/header.php';?>
			
			<?php include 'page_includes/aside.php';?>

            <section class="content">
                <header class="content__title">
                    <h1>Mijn accounts</h1>
                </header>
                                         
                                            
                                      
                <div class="card">
					<!-- Sessie notification laten zien -->
					<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
					<!-- Sessie notification leeg maken -->
					<?php unset($_SESSION['notification']); ?>
					
                    <div class="card-header">
						<button type="button" class="btn btn-primary waves-effect" data-toggle="modal"  data-target="#modal-create-account"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Account toevoegen</button>
                    </div>

                    <div class="card-block">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr>
                                        <th>Naam</th>
                                        <th>E-mail</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php 
                                        //selecteer alle gebruikers die toegang hebben tot de volledige website
                                        $sql = "SELECT * FROM ikwil_users WHERE NOT role = '2' AND demo_start_date = '0'";
                                        $result = mysqli_query($con, $sql);
                                        
                                        while($row = $result->fetch_assoc()) {
											
											  $id = $row['id'];
											  $name = $row['name'];
											  $surname = $row['surname'];
											  $email = $row['email'];
											  $status = $row['status'];

									echo"
                                   		<tr>
											<td><a href='ad-customer-profile.php?account_id=$id'>$name $surname</a></td>
											<td><a href='mailto:$email'>$email</a></td>
											<td>$status</td>
                                    	</tr>
                                   ";}?>
									
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
 		
                <?php include 'page_includes/footer.php';?>
				<?php include 'page_includes/modals.php';?>
				
            </section>
        </main>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="app_data/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="app_data/vendors/bower_components/tether/dist/js/tether.min.js"></script>
        <script src="app_data/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="app_data/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="app_data/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="app_data/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <!-- Vendors: Data tables -->
        <script src="app_data/vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="app_data/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="app_data/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="app_data/vendors/bower_components/jszip/dist/jszip.min.js"></script>
        <script src="app_data/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>

        <!-- App functions and actions -->
        <script src="app_data/js/app.min.js"></script>
    </body>
</html>