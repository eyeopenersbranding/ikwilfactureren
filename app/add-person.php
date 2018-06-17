<?php
$Page_id="persons";
session_start();
include_once 'dbconnect.php';


if (isset($_SESSION['usr_id'])) {
    
} else {
    header('Location: login.php');
}

include 'page_includes/ikwil_redirect_core.php';

if ($user_role == $admin) {
    header('Location: admin-dashboard.php');
} else {

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
		<link rel="stylesheet" href="app_data/vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css">

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
                        <h1><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Klant toevoegen</h1>
						<hr>
                    </header>
		

<div class="card">
		<!-- Sessie notification laten zien -->
		<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
		<!-- Sessie notification leeg maken -->
		<?php unset($_SESSION['notification']); ?>
	
		<div class="card-block">
			<form action='IKWIL_Engine/IKWILAdd_persons.php' method='post' enctype='multipart/form-data'>
			<input type="hidden" name="person_user_id" value="<?php echo "$user_id" ?>" />
			
			<h4 class="card-block__title mb-4">*Verplichte velden</h4>

			<br>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group <?php if (isset($_GET["error_message"])) {  echo "has-danger"; }else{ echo "has-warning"; }; ?>">
							<input type="text" name="person_name" class="form-control" placeholder="Voornaam*">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group  <?php if (isset($_GET["error_message"])) {  echo "has-danger"; }else{ echo "has-warning"; }; ?>">
							<input type="text" name="person_surname" class="form-control" placeholder="Achternaam*">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group <?php if (isset($_GET["error_message"])) {  echo "has-danger"; }else{ echo "has-warning"; }; ?>">
							<label class="custom-control custom-radio">
                                <input type="radio" name="person_gender" value="Meneer" class="custom-control-input">
                                <span class="custom-control-indicator form-control-success"></span>
                                <span class="custom-control-description">Man*</span>
                            </label>
							<label class="custom-control custom-radio">
                                <input type="radio" name="person_gender" value="Mevrouw" class="custom-control-input">
                                <span class="custom-control-indicator form-control-success"></span>
                                <span class="custom-control-description">Vrouw*</span>
                            </label>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="person_address" class="form-control" placeholder="Straat + huisnummer">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="person_zipcode" class="form-control" placeholder="Postcode">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="person_city" class="form-control" placeholder="Plaats">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="person_telephone" class="form-control" placeholder="Telefoon">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="person_mobiletelephone" class="form-control" placeholder="Mobiele telefoon">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="person_email" class="form-control" placeholder="E-mail adres">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="person_profession" class="form-control" placeholder="Beroep">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="person_birthdate" class="form-control" placeholder="Geboortdatum (DD-MM-JJJJ)">
							<i class="form-group__bar"></i>
						</div>
					</div>
					<div class="col-sm-4"></div>
				</div>
				<br>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<textarea name="person_notes" class="form-control wysiwyg-editor" placeholder="Notities / Bijzonderheden" rows="5" ></textarea>
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<br>
				<button type="submit" name="submit" class="btn btn-primary waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Klant toevoegen</button>
			</form>
			</div>                   
	</div>
</div>

<?php include 'page_includes/footer.php';?>
				
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
		<script src="app_data/vendors/bower_components/trumbowyg/dist/trumbowyg.min.js"></script>

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