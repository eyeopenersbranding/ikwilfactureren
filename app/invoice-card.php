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
	//selecteer alle gebruikers die toegang hebben tot de volledige website
	$invoice_id = $_GET["invoice_id"];
	$sql = "SELECT * FROM ikwil_invoicing WHERE invoice_id = '$invoice_id'";
	$result = mysqli_query($con, $sql);

	while($row = $result->fetch_assoc()) {
		
 			 $invoice_id = $row['invoice_id'];
			 $invoice_number = $row['invoice_number'];
             $invoice_name = $row['invoice_name'];
             $invoice_address = $row['invoice_address'];
             $invoice_city = $row['invoice_city'];
             $invoice_zipcode = $row['invoice_zipcode'];
			 $invoice_btw = $row['invoice_btw'];

             $invoice_item_1 = $row['invoice_item_1'];
             $invoice_item_2 = $row['invoice_item_2'];
             $invoice_item_3 = $row['invoice_item_3'];
             $invoice_item_4 = $row['invoice_item_4'];
             $invoice_item_5 = $row['invoice_item_5'];

             $invoice_price_1 = $row['invoice_price_1'];
             $invoice_price_2 = $row['invoice_price_2'];
             $invoice_price_3 = $row['invoice_price_3'];
             $invoice_price_4 = $row['invoice_price_4'];
             $invoice_price_5 = $row['invoice_price_5'];

             $invoice_status = $row['invoice_status'];
             $invoice_date = $row['invoice_date'];
             $invoice_person_id = $row['invoice_person_id'];
             $invoice_user_id = $row['invoice_user_id'];

             $tax = "0.21";
             $invoice_subtotal = $invoice_price_1 + $invoice_price_2 + $invoice_price_3 + $invoice_price_4 + $invoice_price_5;
             $invoice_tax = $invoice_subtotal * $tax;
             $invoice_total = $invoice_subtotal + $invoice_tax ;

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
                        <h1>Factuur: <?php echo "$invoice_id"; ?></h1>
                        <small>Factuur bewerken / printen</small>
						<div class="actions">
                            <a href="QUOEngine/examples/invoice.php?invoice_id=<?php echo "$invoice_id"; ?>" target="_blank" class="actions__item zmdi zmdi-cloud-download"></a>

                            <div class="dropdown actions__item">
                                <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                                <div class="dropdown-menu dropdown-menu-right">
									<a href="QUOEngine/examples/invoice.php?invoice_id=<?php echo "$invoice_id"; ?>" target="_blank" class="dropdown-item"> Factuur downloaden</a>
                                    <a href="" class="dropdown-item" data-toggle="modal"  data-target="#modal-delete-invoice">Factuur verwijderen</a>
                                </div>
                            </div>
                        </div>
                    </header>
		

<div class="card">
		<!-- Sessie notification laten zien -->
		<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
		<!-- Sessie notification leeg maken -->
		<?php unset($_SESSION['notification']); ?>
		<div class="card-block">
			<form action='IKWIL_Engine/IKWILEdit_invoice.php' method='post' enctype='multipart/form-data'>
			<input type="hidden" name="invoice_id" value="<?php echo "$invoice_id" ?>" />
			<h4 class="card-block__title mb-4"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Factuur bewerken</h4>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_number" class="form-control" placeholder="Factuurnummer*" value="<?php echo "$invoice_number"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_date" class="form-control" placeholder="col-sm-3" value="<?php echo "$invoice_date"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_name" class="form-control" placeholder="col-sm-3" value="<?php echo "$invoice_name"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_address" class="form-control" placeholder="col-sm-3" value="<?php echo "$invoice_address"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_zipcode" class="form-control" placeholder="col-sm-3" value="<?php echo "$invoice_zipcode"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_city" class="form-control" placeholder="col-sm-3" value="<?php echo "$invoice_city"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_btw" class="form-control" placeholder="BTW Nummer" value="<?php echo "$invoice_btw"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				<br>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_1" class="form-control" placeholder="Item 1" value="<?php echo "$invoice_item_1"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_1" class="form-control" placeholder="Prijs" value="<?php echo "$invoice_price_1"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_2" class="form-control" placeholder="Item 2" value="<?php echo "$invoice_item_2"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_2" class="form-control" placeholder="Prijs" value="<?php echo "$invoice_price_2"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_3" class="form-control" placeholder="Item 3" value="<?php echo "$invoice_item_3"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_3" class="form-control" placeholder="Prijs" value="<?php echo "$invoice_price_3"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_4" class="form-control" placeholder="Item 4" value="<?php echo "$invoice_item_4"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_4" class="form-control" placeholder="Prijs" value="<?php echo "$invoice_price_4"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_item_5" class="form-control" placeholder="Item 5" value="<?php echo "$invoice_item_5"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" name="invoice_price_5" class="form-control" placeholder="Prijs" value="<?php echo "$invoice_price_5"; ?>">
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
							<input type="text" class="form-control" placeholder="col-sm-3" value="<?php echo "$invoice_subtotal"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="col-sm-3" value="<?php echo "$invoice_tax"; ?>">
							<i class="form-group__bar"></i>
						</div>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4"></div>
					
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="col-sm-3" value="<?php echo "$invoice_total"; ?>">
							<i class="form-group__bar"></i>
						</div>
						<div class="form-group">
						<label class="custom-control custom-radio">
							<input type="radio" name="invoice_status" value="Betaald" <?php if ($invoice_status =="Betaald") echo " checked=\"true\""; ?> class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Betaald</span>
						</label>
						<label class="custom-control custom-radio">
							<input type="radio" name="invoice_status" value="Onbetaald" <?php if ($invoice_status =="Onbetaald") echo " checked=\"true\""; ?> class="custom-control-input">
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Onbetaald</span>
						</label>
					</div>
					</div>
				</div>
			<button type="submit" name="submit" class="btn btn-primary waves-effect"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Wijzig gegevens</button>
			</form>
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