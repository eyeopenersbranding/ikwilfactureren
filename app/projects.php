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
				<header>
                    <h1><i class="zmdi zmdi-codepen zmdi-hc-fw"></i> Projecten</h1>
					<hr>
                </header>  
                                         
                                            
                                      
                <div class="card">
					<!-- Sessie notification laten zien -->
					<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
					<!-- Sessie notification leeg maken -->
					<?php unset($_SESSION['notification']); ?>
					
                    <div class="card-header">
                    </div>

                    <div class="card-block">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr>
                                        <th>Projectnaam</th>
                                        <th>Projectijd</th>
                                        <th>Project status</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php 
                                   
                                        //selecteer alle gebruikers die toegang hebben tot de volledige website
                                        $sql = "SELECT * FROM ikwil_projects WHERE project_user_id = '$user_id'";
                                        $result = mysqli_query($con, $sql);
                                        
                                        while($row = $result->fetch_assoc()) {
											
											  $project_id = $row['project_id'];
											  $project_name = $row['project_name'];
											  $project_time = $row['project_time'];
											  $project_finished = $row['project_finished'];


									echo"
                                   		<tr>
											<td><a href='project-card.php?project_id=$project_id'>$project_name</a></td>
											<td>$project_time</td>
											<td>$project_finished</td>
                                    	</tr>
                                   ";}?>
									
                                </tbody>
                            </table>
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