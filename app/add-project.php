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
                        <h1><i class="zmdi zmdi-codepen zmdi-hc-fw"></i> Project toevoegen</h1>
                    </header>
		

<div class="card">
		<!-- Sessie notification laten zien -->
		<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
		<!-- Sessie notification leeg maken -->
		<?php unset($_SESSION['notification']); ?>
	
		<div class="card-block">
			<?php $project_person_id = $_POST["project_person_id"]; ?>
			<?php $project_company_id = $_POST["project_company_id"]; ?>
			<form action='IKWIL_Engine/IKWILadd_project.php' method='post' enctype='multipart/form-data'>
									<input type="hidden" name="project_person_id" value="<?php echo $project_person_id ?>" />
									<input type="hidden" name="project_company_id" value="<?php echo $project_company_id ?>" />
										<div class="row">
											<div class="col-sm-4">
												<label>Projectnaam</label>
												
												<div class="input-group">
													<span class="input-group-addon"><i class="zmdi zmdi-codepen zmdi-hc-fw"></i></span>
													<div class="form-group">
														<input type="text" name="project_name" class="form-control" placeholder="Projectnaam">
														<i class="form-group__bar"></i>
													</div>
												</div>
											</div>
											
											 <div class="col-sm-4">
												<label>Projecttijd (uren)</label>

												<div class="input-group">
													<span class="input-group-addon"><i class="zmdi zmdi-timer zmdi-hc-fw"></i></span>
													<div class="form-group">
														<input type="text" name="project_time"  class="form-control" placeholder="Projecttijd">
														<i class="form-group__bar"></i>
													</div>
												</div>
											</div>
											
											<div class="col-sm-4">
												<label>Project status</label>
												<div class="form-group">
													<label class="custom-control custom-radio">
														<input type="radio" name="project_finished" value="0"  class="custom-control-input">
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description">Onafgerond*</span>
													</label>
													<label class="custom-control custom-radio">
														<input type="radio" name="project_finished" value="1"  class="custom-control-input">
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
													<textarea name="project_notes" class="form-control wysiwyg-editor" placeholder="Projectinhoud" rows="5" ></textarea>
													<i class="form-group__bar"></i>
												</div>
											</div>
										</div>
										<button type="submit" name="submit" class="btn btn-primary waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Project toevoegen</button>
			
										<br><br>
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

        <!-- App functions and actions -->
        <script src="app_data/js/app.min.js"></script>
    </body>
</html>