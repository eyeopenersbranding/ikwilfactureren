<?php
$Page_id="";
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
                <header class="content__title">
                    <h1><i class="zmdi zmdi-store zmdi-hc-fw"></i> Notificaties</h1>
                </header>
                                         
                                            
                                      
                       <div class="row todo">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="toolbar toolbar--inner">
                                    <div class="toolbar__label">29 bericht(en) voor u</div>

                                    <div class="actions">
                                        <i class="actions__item zmdi zmdi-search" data-ma-action="toolbar-search-open"></i>
                                        <div class="dropdown actions__item">
                                            <i class="zmdi zmdi-sort" data-toggle="dropdown"></i>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="" class="dropdown-item">Newest to Oldest</a>
                                                <a href="" class="dropdown-item">Oldest to Newest</a>
                                                <a href="" class="dropdown-item">Completed first</a>
                                            </div>
                                        </div>
                                        <a href="" class="actions__item zmdi zmdi-help-outline"></a>
                                        <a href="" class="actions__item zmdi zmdi-settings"></a>
                                    </div>

                                    <div class="toolbar__search">
                                        <input type="text" placeholder="Search...">

                                        <i class="toolbar__search__close zmdi zmdi-long-arrow-left" data-ma-action="toolbar-search-close"></i>
                                    </div>
                                </div>

                                <div class="listview listview--bordered">
									<?php
											//Het selecteren van de notificaties voor de gebruiker
												$sql = "SELECT * FROM ikwil_notifications WHERE notification_user_id = '$user_id'";
												$result = mysqli_query($con, $sql);

												if($result -> num_rows >0){

												while($row = $result->fetch_assoc()) {

													  $notification_id = $row['notification_id'];
													  $notification_title = $row['notification_title'];
													  $notification_content = $row['notification_content'];
													  $notification_date = $row['notification_date'];
													  $demo_end_date_replacment = str_replace("%demo-eind-datum%","$demo_end_date","$notification_content");
													

											echo"
												<div class='listview__item'>
													<label class='custom-control custom-control--char todo__item'>
														<input class='custom-control-input'>
														<span class='custom-control--char__helper'><i class='bg-amber'>F</i></span>
														<div class='todo__info'>
															<span><h3>$notification_title</h3></span><br /><br />
															<span>$demo_end_date_replacment</span>
															<br /><br />
															<small>Datum: $notification_date</small>
														</div>

														<div class='listview__attrs'>
															<span>#ikwilfactureren.nl</span>
														</div>
													</label>

													<div class='actions listview__actions'>
														<div class='dropdown actions__item'>
															<i class='zmdi zmdi-more-vert' data-toggle='dropdown'></i>
															<div class='dropdown-menu dropdown-menu-right'>
																<a class='dropdown-item' href=''>Mark as completed</a>
																<a class='dropdown-item' href=''>Delete</a>
															</div>
														</div>
													</div>
												</div>
										   ";}
												} 	
											else {
													echo"<div class='alert alert-danger alert-dismissable' role='alert'><i class='zmdi zmdi-comment-alt-text zmdi-hc-f'></i>
													<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> U heeft nog geen notificaties.</div>";
												 }
									?>

									
									
                                    

                                   

                                  
                                </div>
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