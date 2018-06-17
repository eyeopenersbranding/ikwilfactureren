<?php
$Page_id="project";
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
	$project_id = $_GET["project_id"];
	$sql = "SELECT * FROM ikwil_projects WHERE project_id = '$project_id' AND project_user_id = '$user_id'";
	$result = mysqli_query($con, $sql);

	if($result -> num_rows >0){
		
		while($row = $result->fetch_assoc()) {

			 $project_id = $row['project_id'];
			 $project_name = $row['project_name'];
			 $project_notes = $row['project_notes'];
			 $project_time = $row['project_time'];
			 $project_file = $row['project_file'];
			 $project_finished = $row['project_finished'];
			 $project_date = $row['project_date'];

		}
	} 

	else {
	   die();
}			
			//Laat weten aan de bijlage engine welke pagina dit is
			$customer_page = "0";
			$company_page = "0";
			$project_page = "1";	
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
		 
		 <link rel="stylesheet" href="app_data/vendors/bower_components/flatpickr/dist/flatpickr.min.css" />
		 <link rel="stylesheet" href="app_data/vendors/bower_components/dropzone/dist/dropzone.css">

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
                        <h1>Projectkaart | <?php echo "$project_name"; ?></h1>
						 <small>Datum | <?php echo "$project_date"; ?></small>
						<hr>
						
							<div class="actions">
								<div class="dropdown actions__item">
									<i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="" class="dropdown-item" data-toggle="modal"  data-target="#modal-delete-project"><i class="zmdi zmdi-delete zmdi-hc-fw"></i> Project verwijderen</a>
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
						
						
						<!-- Begin van de uitklapitem klantkaart --> 
									<form action='IKWIL_Engine/IKWILEdit_projects.php' method='post' enctype='multipart/form-data'>
									<input type="hidden" name="project_id" value="<?php echo "$project_id" ?>" />	
										<div class="row">
											<div class="col-sm-4">
												<label>Projectnaam</label>
												
												<div class="input-group">
													<span class="input-group-addon"><i class="zmdi zmdi-codepen zmdi-hc-fw"></i></span>
													<div class="form-group">
														<input type="text" name="project_name" class="form-control" placeholder="Projectnaam" value="<?php echo "$project_name"; ?>">
														<i class="form-group__bar"></i>
													</div>
												</div>
											</div>
											
											 <div class="col-sm-4">
												<label>Projecttijd (uren)</label>

												<div class="input-group">
													<span class="input-group-addon"><i class="zmdi zmdi-timer zmdi-hc-fw"></i></span>
													<div class="form-group">
														<input type="text" name="project_time"  class="form-control" placeholder="Pick a time" value="<?php echo "$project_time"; ?>">
														<i class="form-group__bar"></i>
													</div>
												</div>
											</div>
											
											<div class="col-sm-4">
												<label>Project status</label>
												<div class="form-group">
													<label class="custom-control custom-radio">
														<input type="radio" name="project_finished" value="0" <?php if ($project_finished=="0") echo " checked=\"true\""; ?> class="custom-control-input">
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description">Onafgerond*</span>
													</label>
													<label class="custom-control custom-radio">
														<input type="radio" name="project_finished" value="1" <?php if ($project_finished=="1") echo " checked=\"true\""; ?> class="custom-control-input">
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description">Afgerond*</span>
													</label>
												</div>
											</div>
										</div>
										<br><br>
										
										
							
										<div class="row">						
											<div class="col-sm-12">
												<div class="form-group">
													<textarea name="project_notes" charset=utf-8 class="form-control wysiwyg-editor" placeholder="Projectinhoud" rows="5" ><?php echo "$project_notes"; ?></textarea>
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<button type="submit" name="submit" class="btn btn-primary waves-effect"><i class="zmdi zmdi-edit zmdi-hc-fw"></i> Wijzig project</button>
										<a href="" data-toggle="modal"  data-target="#modal-upload-attachment"><button type="button" class="btn btn-primary waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Bijlage uploaden</button></a><br>
										<br><br>
										</form>
										<!-- Einde van de uitklapitem klantkaart --> 
						
						
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
														$sql = "SELECT * FROM ikwil_attachments WHERE attachment_project_id = '$project_id'";
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
															<td>
															
															 <form action='IKWIL_Engine/IKWILDelete_functions.php' method='post' enctype='multipart/form-data'>
																<input type='hidden' name='project_id' value='$project_id' />
																<input type='hidden' name='attachment_id' value='$attachment_id' />
																<input type='hidden' name='attachment_file' value='$attachment_file' />
																<button type='submit' name='delete_attachment' class='btn btn-danger'> Verwijderen</button>
															  </form>
															</td>

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
		<script src="app_data/vendors/bower_components/dropzone/dist/min/dropzone.min.js"></script>

        <script src="app_data/vendors/bower_components/flatpickr/dist/flatpickr.min.js"></script>
		 
		
        <!-- App functions and actions -->
        <script src="app_data/js/app.min.js"></script>
		<script src="app_data/js/app1.min.js"></script>
		<script src="app_data/js/app2.min.js"></script>
		<script src="app_data/js/app3.min.js"></script>
		<script src="app_data/js/app4.min.js"></script>
    </body>
</html>