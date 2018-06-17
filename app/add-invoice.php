<?php
$Page_id="invoice";
session_start();
include_once 'dbconnect.php';


if (isset($_SESSION['usr_id'])) {
    
} else {
    header('Location: login.php');
}

include 'page_includes/ikwil_redirect_core.php';

if ($user_role == $admin) {
    header('Location: ad-dashboard.php');
} else {
	
}
?>
<?php

  $decider = $_POST["decider"];
  $set_page = "company";

	  if($decider == $set_page)
	  {
		//selecteer alle gebruikers die toegang hebben tot de volledige website
		$company_id = $_POST["company_id"];
		$decider = $_POST["decider"];
		$sql = "SELECT * FROM ikwil_companies WHERE company_id = '$company_id'";
		$result = mysqli_query($con, $sql);

		while($row = $result->fetch_assoc()) {

				 $company_id = $row['company_id'];
				 $company_name = $row['company_name'];
				 $company_address = $row['company_address'];
				 $company_zipcode = $row['company_zipcode'];
				 $company_city = $row['company_city'];
				 $company_btw = $row['company_btw'];



	  }
	  
  }
	else{
		
	//selecteer alle gebruikers die toegang hebben tot de volledige website
	$person_id = $_POST["person_id"];
	$sql = "SELECT * FROM ikwil_persons WHERE person_id = '$person_id'";
	$result = mysqli_query($con, $sql);

	while($row = $result->fetch_assoc()) {
		
 			 $company_id = $row['person_id'];
			 $company_name = $row['person_name'];
             $company_address = $row['person_address'];
             $company_zipcode = $row['person_zipcode'];
             $company_city = $row['person_city'];
		
	}
       
}?>

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
                        <h1>Factuur aanmaken</h1>
                        <small>Factuur toevoegen</small>
                    </header>
		

<div class="card">
		<!-- Sessie notification laten zien -->
		<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
		<!-- Sessie notification leeg maken -->
		<?php unset($_SESSION['notification']); ?>
		<div class="card-block">
			<form action='IKWIL_Engine/IKWILAdd_invoice.php' method='post' enctype='multipart/form-data'>
			<input type="hidden" name="invoice_company_id" value="<?php echo "$company_id" ?>" />
			<input type="hidden" name="invoice_person_id" value="<?php echo "$person_id" ?>" />
			<h4 class="card-block__title mb-4"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Factuur toevoegen</h4>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_number" class="form-control" placeholder="Factuurnummer*">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_name" class="form-control" placeholder="col-sm-3" value="<?php echo "$company_name"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_address" class="form-control" placeholder="col-sm-3" value="<?php echo "$company_address"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_zipcode" class="form-control" placeholder="col-sm-3" value="<?php echo "$company_zipcode"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_city" class="form-control" placeholder="col-sm-3" value="<?php echo "$company_city"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_btw" class="form-control" placeholder="col-sm-3" value="<?php echo "$company_btw"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<br>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_1" class="form-control" placeholder="Item 1">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_1" class="form-control" placeholder="Prijs" value="0">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_2" class="form-control" placeholder="Item 2">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_2" class="form-control" placeholder="Prijs" value="0">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_3" class="form-control" placeholder="Item 3">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_3" class="form-control" placeholder="Prijs" value="0">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_4" class="form-control" placeholder="Item 4">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_4" class="form-control" placeholder="Prijs" value="0">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_5" class="form-control" placeholder="Item 5">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_5" class="form-control" placeholder="Prijs" value="0">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				
				<br>
			
				<div class="row">
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="col-sm-3" disabled value="Subtotaal">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="col-sm-3" disabled value="BTW">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="col-sm-3" disabled value="Totaal">
							<i class="form-group__bar"></i>
						</div>
						<div class="form-group">
						<label class="custom-control custom-radio">
							<input type="radio" name="invoice_status" value="Betaald" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Betaald</span>
						</label>
						<label class="custom-control custom-radio">
							<input type="radio" name="invoice_status" value="Onbetaald" class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Onbetaald</span>
						</label>
					</div>
					</div>
				</div>
			<button type="submit" name="submit" class="btn btn-primary waves-effect"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Factuur aanmaken</button>
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