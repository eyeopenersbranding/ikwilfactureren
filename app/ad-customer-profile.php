<?php
$Page_id = "";
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
?>
<?php   
	$account_id = $_GET["account_id"];
	//selecteer alle gebruikers die toegang hebben tot de volledige website
	$sql = "SELECT * FROM ikwil_user_info WHERE user_user_id = '$account_id'";
	$result = mysqli_query($con, $sql);

	if($result -> num_rows >0){
		
	while($row = $result->fetch_assoc()) {

		 $user_company_name = $row['user_company_name'];
		 $user_address = $row['user_address'];
		 $user_city = $row['user_city'];
		 $user_zipcode = $row['user_zipcode'];
		 $user_telephone = $row['user_telephone'];
		 $user_website = $row['user_website'];
		 $user_email = $row['user_email'];
		 $user_btw = $row['user_btw'];
		 $user_kvk = $row['user_kvk'];
		 $user_bank = $row['user_bank'];
		 $user_notes = $row['user_notes'];

} }
	else {
			$_SESSION['notification'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
			<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Deze persoon heeft nog geen setup doorgelopen!</div>";
	}
	
	//selecteer basis account gegevens
	$sql = "SELECT * FROM ikwil_users WHERE id = '$account_id'";
	$result = mysqli_query($con, $sql);

	while($row = $result->fetch_assoc()) {

		 $name = $row['name'];
		 $surname = $row['surname'];
		 $email = $row['email'];
		 $password = $row['password'];
		 $account_status = $row['status'];
		 $inactief = "Inactief";


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
                <div class="content__inner content__inner--sm">
                    <header class="content__title">
                        <h1>Account</h1>
                        <small>Basis gegevens</small>
						
						<div class="actions">
								<div class="dropdown actions__item">
									<i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="" class="dropdown-item" data-toggle="modal"  data-target="#modal-delete-account"><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Account verwijderen</a>
									</div>
								</div>
							</div>
                    </header>

                    <div class="card profile">
                        <div class="profile__img">
                            <img src="app_data/demo/img/contacts/2.jpg" alt="">
                        </div>

                        <div class="profile__info">
                            <ul class="icon-list">
								<li><i class="zmdi zmdi-account zmdi-hc-fw"></i> <?php echo "$name $surname"; ?></li> 
                                <li><i class="zmdi zmdi-email"></i> <?php echo "$email"; ?></li>
                            </ul>
                        </div>
                    </div>
										<div class="card">
					<!-- Sessie notification laten zien -->
					<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
					<!-- Sessie notification leeg maken -->
					<?php unset($_SESSION['notification']); ?>	
											
											
					<?php if ($account_status == $inactief) { ?>
						
						
					<?php } else { ?>
					<div class="card-block">
								<h4 class="card-block__title mb-4"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Account profiel</h4>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_company_name" class="form-control" placeholder="Bedrijfsnaam" value="<?php echo "$user_company_name"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_address" class="form-control" placeholder="Straat + huisnummer" value="<?php echo "$user_address"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_zipcode" class="form-control" placeholder="Postcode" value="<?php echo "$user_zipcode"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_city" class="form-control" placeholder="Plaats" value="<?php echo "$user_city"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_telephone" class="form-control" placeholder="Telefoonnummer" value="<?php echo "$user_telephone"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_website" class="form-control" placeholder="Website URL" value="<?php echo "$user_website"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_email" class="form-control" placeholder="E-mail adres" value="<?php echo "$user_email"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>
								<br>
								<br>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_btw" class="form-control" placeholder="BTW nummer" value="<?php echo "$user_btw"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_kvk" class="form-control" placeholder="KVK nummer" value="<?php echo "$user_kvk"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="user_bank" class="form-control" placeholder="IBAN bankrekeningnummer" value="<?php echo "$user_bank"; ?>" disabled>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<textarea name="user_notes" class="form-control" placeholder="Tekst onder factuur / offerte" rows="5" disabled><?php echo "$user_notes"; ?></textarea>
											<i class="form-group__bar"></i>
										</div>
									</div>
								</div>	
		
						</div>
					<?php } ?>					

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