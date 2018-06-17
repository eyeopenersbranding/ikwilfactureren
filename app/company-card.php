<?php
$Page_id="company";
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
<?php                         
	//selecteer alle gebruikers die toegang hebben tot de volledige website
	$company_id = $_GET["company_id"];
	$sql = "SELECT * FROM ikwil_companies WHERE company_id = '$company_id' AND company_user_id = '$user_id'";
	$result = mysqli_query($con, $sql);

	if($result -> num_rows >0){
		
		while($row = $result->fetch_assoc()) {

			 $company_id = $row['company_id'];
			 $company_name = $row['company_name'];
			 $company_address = $row['company_address'];
			 $company_city = $row['company_city'];
			 $company_zipcode = $row['company_zipcode'];
			 $company_phonenumber = $row['company_phonenumber'];
			 $company_kvk = $row['company_kvk'];
			 $company_btw = $row['company_btw'];
			 $company_email = $row['company_email'];
			 $company_website = $row['company_website'];
			 $company_notes = $row['company_notes'];
			 $company_person_id = $row['company_person_id'];
		}
	} 

	else {
	   die();
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
                        <h1><i class="zmdi zmdi-store zmdi-hc-fw"></i> Bedrijfskaart | <?php echo "$company_name"; ?></h1>
						<hr>
							<div class="actions">
								<div class="dropdown actions__item">
									<i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="" class="dropdown-item" data-toggle="modal"  data-target="#modal-company"><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Klant verwijderen</a>
									</div>
								</div>
							</div>
                    </header>

                    <div class="card profile" style="background-color: #00BCD4;">
                        <div class="profile__img">
                            <img src="app_data/demo/img/contacts/3.png" alt="">
                        </div>

                        <div class="profile__info">
                            <ul class="icon-list"  style="color: #FFF;">
								<li><i class="zmdi zmdi-account zmdi-hc-fw"></i> <?php echo "$company_name"; ?></li> 
								<li><i class="zmdi zmdi-pin"></i> <?php echo "$company_address"; ?></li>
								<li><i class="zmdi zmdi-pin"></i> <?php echo "$company_zipcode $company_city"; ?></li>
								<li><i class="zmdi zmdi-phone"></i> <?php echo "$company_phonenumber"; ?></li>
                                <li><i class="zmdi zmdi-email"></i> <?php echo "$company_email"; ?></li>
                            </ul>
                        </div>
						<div class="profile__info">
                            <ul class="icon-list">
									  
                            </ul>
                        </div>
                    </div>
					
					<div class="card">
                    <div class="card-header">
						 <?php
                                       		//selecteer het bedrijf die gekoppeld is met het person_id
											$sql = "SELECT * FROM ikwil_persons WHERE person_id = '$company_person_id'";
											$result = mysqli_query($con, $sql);

										
											while($row = $result->fetch_assoc()) {

											 $person_id = $row['person_id'];
											 $person_name = $row['person_name'];
											 $person_surname = $row['person_surname'];

                                              echo "
                                                  
													<a href='customer-card.php?customer_id=$person_id'><button type='button' class='btn btn-primary btn-lg waves-effect'><i class='zmdi zmdi-account'></i> Eigenaar: $person_name $person_surname </button></a><br><br>
                                                

                                                  ";}

                                        ?>
						<hr>
                        <h2 class="card-title">Bedrijfsdata van <?php echo "$company_name"; ?></h2>
						<hr>
                    </div>
					<!-- Sessie notification laten zien -->
					<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
					<!-- Sessie notification leeg maken -->
					<?php unset($_SESSION['notification']); ?>	
							     

                    <div class="card-block">
                        <div class="tab-container">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#klantkaart" role="tab">Bedrijfsgegevens</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#projecten" role="tab">Projecten</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#offertes" role="tab">Offerte</a>
                                </li>
								 <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#facturen" role="tab">Facturen</a>
                                </li>
								 <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#bijlage" role="tab">Bijlage</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active fade show" id="klantkaart" role="tabpanel">
									<br>
									<!-- Begin van de uitklapitem klantkaart --> 
									<form action='IKWIL_Engine/IKWILEdit_companies.php' method='post' enctype='multipart/form-data'>
									<input type="hidden" name="company_id" value="<?php echo "$company_id" ?>" />	
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="company_name" class="form-control" placeholder="Bedrijfsnaam" value="<?php echo "$company_name"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="company_address" class="form-control" placeholder="Straat + huisnummer" value="<?php echo "$company_address"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="company_zipcode" class="form-control" placeholder="Postcode" value="<?php echo "$company_zipcode"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="company_city" class="form-control" placeholder="Plaats" value="<?php echo "$company_city"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="company_phonenumber" class="form-control" placeholder="Telefoonnummer" value="<?php echo "$company_phonenumber"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="company_kvk" class="form-control" placeholder="KVK-nummer" value="<?php echo "$company_kvk"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="company_btw" class="form-control" placeholder="BTW-nummer" value="<?php echo "$company_btw"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="company_email" class="form-control" placeholder="E-mail" value="<?php echo "$company_email"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="company_website" class="form-control" placeholder="Website" value="<?php echo "$company_website"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<textarea name="company_notes" class="form-control wysiwyg-editor" placeholder="Notities / Bijzonderheden" rows="5" ><?php echo "$company_notes"; ?></textarea>
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<button type="submit" name="submit" class="btn btn-primary waves-effect"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Wijzig gegevens</button>
										<br><br>
										</form>
										<!-- Einde van de uitklapitem klantkaart --> 
                                </div>
								
								<div class="tab-pane fade" id="projecten" role="tabpanel">
									<form action="add-project.php" method="post" enctype="multipart/form-data">
							 		<input type="hidden" name="project_person_id" value="0" />
									<input type="hidden" name="project_company_id" value="<?php echo $company_id ?>" />
									<button type="submit" name="submitproject" class="btn btn-primary  waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Project aanmaken</button><br><br>
									</form>
                                    <!-- Begin van de uitklapitem facturen --> 
							  			<div class="table-responsive">
                            				<table id="data-table1" class="table table-bordered">
												<thead class="thead-default">
													<tr>
														<th>Afspraak</th>
														<th>Datum</th>
														<th>Tijd</th>
													</tr>
												</thead>
                                				<tbody>
												<?php 
														//selecteer alle gebruikers die toegang hebben tot de volledige website
														$sql = "SELECT * FROM ikwil_projects WHERE project_company_id = '$company_id'";
														$result = mysqli_query($con, $sql);
													
														if($result -> num_rows >0){
															
														while($row = $result->fetch_assoc()) {

															$project_id = $row['project_id'];
															$project_name = $row['project_name'];
															$project_time = $row['project_time'];
															$project_finished = $row['project_finished'];

													echo"
														<tr>
															<td><a href='project-card.php?project_id=$project_id'> $project_name</td>
															<td>$project_time</td>
															<td>$project_finished</td>
														</tr>
												   ";
															}
														} 

														else {
														   echo "<div class='alert alert-info' role='alert'>U heeft nog geen projecten met deze klant.</div>";
													}?>
												</tbody>
											</table>	
                            			</div>
										<!-- Einde van de uitklapitem facturen --> 
                                </div>
								
								<div class="tab-pane fade" id="offertes" role="tabpanel">
									<button type="button" class="btn btn-primary waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Offerte aanmaken</button><br><br>
								   <!-- Begin van de uitklapitem facturen --> 
							  			<div class="table-responsive">
                            				<table id="data-table2" class="table table-bordered">
												<thead class="thead-default">
													<tr>
														<th>Offertenummer</th>
														<th>Gericht aan</th>
														<th>Datum</th>
													</tr>
												</thead>
                                				<tbody>
												<?php 
														//selecteer alle gebruikers die toegang hebben tot de volledige website
														$sql = "SELECT * FROM ikwil_quotations WHERE quotation_company_id = '$company_id'";
														$result = mysqli_query($con, $sql);

															if($result -> num_rows >0){

															while($row = $result->fetch_assoc()) {

															$quotation_id = $row['quotation_id'];
															$quotation_name = $row['quotation_name'];
															$quotation_date = $row['quotation_date'];

													echo"
														<tr>
															<td><a href='quotation-card.php?quotation_id=$quotation_id'> $quotation_id</td>
															<td>$quotation_name</td>
															<td>$quotation_date</td>
														</tr>
												   ";		
															}
														} 

														else {
														   echo "<div class='alert alert-info' role='alert'>U heeft nog geen offertes voor deze klant.</div>";
													}?>

												</tbody>
											</table>	
                            			</div>
										<!-- Einde van de uitklapitem facturen --> 
                                </div>
								
                                <div class="tab-pane fade" id="facturen" role="tabpanel">
								<form action='add-invoice.php' method='post' enctype='multipart/form-data'>
									<input type="hidden" name="company_id" value="<?php echo "$company_id" ?>" />
									<input type="hidden" name="decider" value="company" />
									<button type="submit" name="submit" class="btn btn-primary waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Factuur aanmaken</button><br><br>
								</form>
								   <!-- Begin van de uitklapitem facturen --> 
							  			<div class="table-responsive">
                            				<table id="data-table3" class="table table-bordered">
												<thead class="thead-default">
													<tr>
														<th>Naam</th>
														<th>Gefactureerd aan</th>
														<th>Datum</th>
														<th>Status</th>
													</tr>
												</thead>
                                				<tbody>
												<?php 
														//selecteer alle gebruikers die toegang hebben tot de volledige website
														$sql = "SELECT * FROM ikwil_invoicing WHERE invoice_company_id = '$company_id'";
														$result = mysqli_query($con, $sql);
													
															if($result -> num_rows >0){

															while($row = $result->fetch_assoc()) {

															$invoice_id = $row['invoice_id'];
															$invoice_number = $row['invoice_number'];
															$invoice_name = $row['invoice_name'];
															$invoice_status = $row['invoice_status'];
															$invoice_date= $row['invoice_date'];

													echo"
														<tr>
															<td><a href='invoice-card.php?invoice_id=$invoice_id'> $invoice_number</td>
															<td>$invoice_name</td>
															<td>$invoice_date</td>
															<td>$invoice_status</td>
														</tr>
												   ";		
															}
														} 

														else {
														   echo "<div class='alert alert-info' role='alert'>U heeft nog geen facturen voor deze klant.</div>";
													}?>

												</tbody>
											</table>	
                            			</div>
										<!-- Einde van de uitklapitem facturen --> 
                                </div>
								
                                <div class="tab-pane fade" id="bijlage" role="tabpanel">
									<button type="button" class="btn btn-primary waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Bijlage uploaden</button><br><br>
								   <!-- Begin van de uitklapitem facturen --> 
							  			<div class="table-responsive">
                            				<table id="data-table4" class="table table-bordered">
												<thead class="thead-default">
													<tr>
														<th>Bestandnaam</th>
														<th>Actie</th>
													</tr>
												</thead>
                                				<tbody>
												<?php 
														//selecteer alle gebruikers die toegang hebben tot de volledige website
														$sql = "SELECT * FROM ikwil_attachments WHERE attachment_company_id = '$company_id'";
														$result = mysqli_query($con, $sql);
													
															if($result -> num_rows >0){

															while($row = $result->fetch_assoc()) {

															$attachment_id = $row['attachment_id'];
															$attachment_title = $row['attachment_title'];
															$attachment_file = $row['attachment_file'];

													echo"
														<tr>
															<td><a href='-card.php?invoice_id=$attachment_id'> $attachment_title</td>
															<td><button type='button' class='btn btn-primary waves-effect'><i class='zmdi zmdi-plus zmdi-hc-fw'></i> Verwijderen</button></td>

														</tr>
												   ";		
															}
														} 

														else {
														   echo "<div class='alert alert-info' role='alert'>Geen bijlage gevonden voor dit bedrijf.</div>";
													}?>

												</tbody>
											</table>	
                            			</div>
										<!-- Einde van de uitklapitem facturen --> 
                                </div>
                            </div>
                        </div>
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
			
		<script src="app_data/vendors/bower_components/trumbowyg/dist/trumbowyg.min.js"></script>			

        <!-- App functions and actions -->
        <script src="app_data/js/app.min.js"></script>
		<script src="app_data/js/app1.min.js"></script>
		<script src="app_data/js/app2.min.js"></script>
		<script src="app_data/js/app3.min.js"></script>
		<script src="app_data/js/app4.min.js"></script>
    </body>
</html>