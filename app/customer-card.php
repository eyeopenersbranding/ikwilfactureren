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
    header('Location: ad-dashboard.php');
} else {
	
}
?>
<?php                         
	//selecteer alle gebruikers die toegang hebben tot de volledige website
	$person_id = $_GET["customer_id"];
	$sql = "SELECT * FROM ikwil_persons WHERE person_id = '$person_id' AND person_user_id = '$user_id'";
	$result = mysqli_query($con, $sql);

	if($result -> num_rows >0){
		
		while($row = $result->fetch_assoc()) {

			 $person_id = $row['person_id'];
			 $person_name = $row['person_name'];
			 $person_address = $row['person_address'];
			 $person_city = $row['person_city'];
			 $person_zipcode = $row['person_zipcode'];
			 $person_notes = $row['person_notes'];
			 $person_gender = $row['person_gender'];
			 $person_surname = $row['person_surname'];
			 $person_phonenumber = $row['person_phonenumber'];
			 $person_mobilephonenumber = $row['person_mobilephonenumber'];
			 $person_email = $row['person_email'];
			 $person_profession = $row['person_profession'];
			 $person_birthdate = $row['person_birthdate'];
			 $person_user_id = $row['person_user_id'];

		}
	} 

	else {
	   die();
}			
			//Laat weten aan de bijlage engine welke pagina dit is
			$customer_page = "1";
			$company_page = "0";
			$project_page = "0";	
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
                    <h1><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i> Klantkaart | <?php echo "$person_name $person_surname"; ?></h1>
					<hr>
     					
						<div class="actions">
								<div class="dropdown actions__item">
									<i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="" class="dropdown-item" data-toggle="modal"  data-target="#modal-default"><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Klant verwijderen</a>
									</div>
								</div>
							</div>
                    </header>


                    <div class="card profile" style="background-color: #8BC34A;">
                        <div class="profile__img">
                            <img src="app_data/demo/img/contacts/2.jpg" alt="">
                        </div>

                        <div class="profile__info">
                            <ul class="icon-list" style="color: #FFF;">
								<li><i class="zmdi zmdi-account zmdi-hc-fw"></i> <?php echo "$person_name $person_surname"; ?></li> 
								<li><i class="zmdi zmdi-pin"></i> <?php echo "$person_address"; ?></li>
								<li><i class="zmdi zmdi-pin"></i> <?php echo "$person_zipcode $person_city"; ?></li>
								<li><i class="zmdi zmdi-phone"></i> <?php echo "$person_phonenumber"; ?></li>
								<li><i class="zmdi zmdi-phone"></i> <?php echo "$person_mobilephonenumber"; ?></li>
                                <li><i class="zmdi zmdi-email"></i> <?php echo "$person_email"; ?></li>
                            </ul>
                        </div>
                    </div>
					
					<div class="card">
                    <div class="card-header">
						<form action='add-company.php' method='post' enctype='multipart/form-data'>
						 <?php
								//selecteer het bedrijf die gekoppeld is met het person_id
								$sql = "SELECT * FROM ikwil_companies WHERE company_person_id = '$person_id'";
								$result = mysqli_query($con, $sql);

								if($result -> num_rows >0){

									while($row = $result->fetch_assoc()) {

									 $company_id = $row['company_id'];
									 $company_name = $row['company_name'];

									   echo "
									   <a href='company-card.php?company_id=$company_id'><button type='button' class='btn btn-primary btn-lg waves-effect'><i class='zmdi zmdi-store zmdi-hc-fw'></i> Gekoppeld bedrijf: $company_name</button></a><br><br>";
									}
								} 

								else {
									   echo "
									   <input type='hidden' name='company_person_id' value='$person_id' />
									   <button type='submit' name='submitcompany' class='btn btn-primary btn-lg waves-effect'><i class='zmdi zmdi-plus zmdi-hc-fw'></i> Bedrijf aanmaken</button><br><br>";


								}
							?>
							</form>
						<hr>
                        <h2 class="card-title">Klantdata van <?php echo "$person_name $person_surname"; ?></h2>
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
                                    <a class="nav-link active" data-toggle="tab" href="#klantkaart" role="tab">Klantgegevens</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#afspraken" role="tab">Afspraken</a>
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
									<form action='IKWIL_Engine/IKWILEdit_persons.php' method='post' enctype='multipart/form-data'>
									<input type="hidden" name="person_id" value="<?php echo "$person_id" ?>" />	
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_name" class="form-control" placeholder="Naam" value="<?php echo "$person_name"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_surname" class="form-control" placeholder="Achternaam" value="<?php echo "$person_surname"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<label class="custom-control custom-radio">
														<input type="radio" name="person_gender" value="Meneer" <?php if ($person_gender=="Meneer") echo " checked=\"true\""; ?> class="custom-control-input">
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description">Man*</span>
													</label>
													<label class="custom-control custom-radio">
														<input type="radio" name="person_gender" value="Mevrouw" <?php if ($person_gender=="Mevrouw") echo " checked=\"true\""; ?> class="custom-control-input">
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description">Vrouw*</span>
													</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_address" class="form-control" placeholder="Straat + huisnummer" value="<?php echo "$person_address"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_zipcode" class="form-control" placeholder="Postcode" value="<?php echo "$person_zipcode"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_city" class="form-control" placeholder="Plaats" value="<?php echo "$person_city"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_phonenumber" class="form-control" placeholder="Telefoonnummer" value="<?php echo "$person_phonenumber"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_mobilephonenumber" class="form-control" placeholder="Mobiele telefoonnummer" value="<?php echo "$person_mobilephonenumber"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_email" class="form-control" placeholder="E-mail" value="<?php echo "$person_email"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_profession" class="form-control" placeholder="Beroep" value="<?php echo "$person_profession"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" name="person_birthdate" class="form-control" placeholder="Geboortedatum (DD-MM-JJJJ)" value="<?php echo "$person_birthdate"; ?>">
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<div class="row">
										
											<div class="col-sm-12">
												<div class="form-group">
													<textarea name="person_notes" class="form-control wysiwyg-editor" placeholder="Notities / Bijzonderheden" rows="5" ><?php echo "$person_notes"; ?></textarea>
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<button type="submit" name="submit" class="btn btn-primary waves-effect"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Wijzig gegevens</button>
										<br><br>
										</form>
										<!-- Einde van de uitklapitem klantkaart --> 
                                </div>
								
								<div class="tab-pane fade" id="afspraken" role="tabpanel">
									<button type="button" class="btn btn-primary waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Afspraak aanmaken</button><br><br>
                                    <!-- Begin van de uitklapitem facturen --> 
							  			<div class="table-responsive">
                            				<table id="data-table" class="table table-bordered">
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
														$sql = "SELECT * FROM ikwil_appointments WHERE appointment_person_id = '$person_id'";
														$result = mysqli_query($con, $sql);
													
														if($result -> num_rows >0){
															
														while($row = $result->fetch_assoc()) {

															$appointment_id = $row['invoice_id'];
															$appointment_name = $row['appointment_name'];
															$appointment_date = $row['appointment_date'];
															$appointment_time = $row['appointment_time'];

													echo"
														<tr>
															<td><a href='appointment-card.php?appointment_id=$appointment_id'> $appointment_name</td>
															<td>$appointment_date</td>
															<td>$appointment_time</td>
														</tr>
												   ";
															}
														} 

														else {
														   echo "<div class='alert alert-info' role='alert'>U heeft nog geen afspraken gepland.</div>";
													}?>
												</tbody>
											</table>	
                            			</div>
										<!-- Einde van de uitklapitem facturen --> 
                                </div>
								
								<div class="tab-pane fade" id="projecten" role="tabpanel">
									<form action="add-project.php" method="post" enctype="multipart/form-data">
							 		<input type="hidden" name="project_person_id" value="<?php echo $person_id ?>" />
									<input type="hidden" name="project_company_id" value="0" />
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
														$sql = "SELECT * FROM ikwil_projects WHERE project_person_id = '$person_id'";
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
														$sql = "SELECT * FROM ikwil_quotations WHERE quotation_person_id = '$person_id'";
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
										<input type="hidden" name="person_id" value="<?php echo "$person_id" ?>" />
										<input type="hidden" name="decider" value="0" />
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
														$sql = "SELECT * FROM ikwil_invoicing WHERE invoice_person_id = '$person_id'";
														$result = mysqli_query($con, $sql);
													
															if($result -> num_rows >0){

															while($row = $result->fetch_assoc()) {

															$invoice_id = $row['invoice_id'];
															$invoice_name = $row['invoice_name'];
															$invoice_status = $row['invoice_status'];
															$invoice_date= $row['invoice_date'];

													echo"
														<tr>
															<td><a href='invoice-card.php?invoice_id=$invoice_id'> $invoice_id</td>
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
									<a href="" data-toggle="modal"  data-target="#modal-upload-attachment"><button type="button" class="btn btn-primary waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Bijlage uploaden</button></a><br><br>
								   <!-- Begin van de uitklapitem facturen --> 
							  			<div class="table-responsive">
                            				<table id="data-table4" class="table table-bordered">
												<thead class="thead-default">
													<tr>
														<th>PDF</th>
														<th>Bestandnaam</th>
														<th>Actie</th>
													</tr>
												</thead>
                                				<tbody>
												<?php 
														//selecteer alle gebruikers die toegang hebben tot de volledige website
														$sql = "SELECT * FROM ikwil_attachments WHERE attachment_person_id = '$person_id'";
														$result = mysqli_query($con, $sql);
													
															if($result -> num_rows >0){

															while($row = $result->fetch_assoc()) {

															$attachment_id = $row['attachment_id'];
															$attachment_title = $row['attachment_title'];
															$attachment_file = $row['attachment_file'];

													echo"
														<tr>
															 <td><a class='col-4 app-shortcuts__item' href='$attachment_file' target='_blank'>
                        										<i class='zmdi zmdi-file-text bg-blue'></i>
															</a></td>
															<td><a href='$attachment_file' target='_blank'> $attachment_title</td>
															<td><button type='button' class='btn btn-primary waves-effect'><i class='zmdi zmdi-plus zmdi-hc-fw'></i> Verwijderen</button></td>

														</tr>
												   ";		
															}
														} 

														else {
														   echo "<div class='alert alert-info' role='alert'>Geen bijlage gevonden.</div>";
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