<?php
$Page_id="end-of-trial";
session_start();
include_once 'dbconnect.php';


if (isset($_SESSION['usr_id'])) {
    
} else {
    header('Location: login.php');

}

include 'page_includes/ikwil_redirect_core.php';

	
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
                    <h1><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i>Beste <?php echo $_SESSION['usr_name'];  ?> <?php echo $_SESSION['usr_surname'];  ?>, uw proefperiode is verlopen </h1>
					<hr>
                </header>                                         
                                            
                                      
      
            
                       
					 <div class="row price-table price-table--basic">
                        <div class="col-md-3">
                            <div class="price-table__item">
                                <header class="price-table__header bg-light-blue">
                                    <div class="price-table__title">Starter</div>
                                    <div class="price-table__desc">Pellentesque ornare lacinia venenatis vestibulum</div>
                                </header>
                                <div class="price-table__price color-light-blue">
                                    $36,30|
                                    <small>maand</small>
                                </div>
                                <ul class="price-table__info">
                                    <li>In dapibus ipsum sit amet leo</li>
                                    <li>Vestibulum ut mauris tellus donec</li>
                                    <li>Purna lectus venenatis felis nonsemper</li>
                                    <li>Aliquam erat volutpat hasellus ultri</li>
                                </ul>
                                <a href="" class="price-table__action bg-light-blue">Select Plan</a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="price-table__item">
                                <header class="price-table__header bg-red">
                                    <div class="price-table__title">Extra</div>
                                    <div class="price-table__desc">Nullam dolor nibh ultricies vehicula utelit ornaresred</div>
                                </header>
                                <div class="price-table__price color-red">
                                    $68,00 |
                                    <small>maand</small>
                                </div>
                                <ul class="price-table__info">
                                    <li>Morbi leo risus porta acconseetur</li>
                                    <li>Nullam quis risus eget urna mollis ornare</li>
                                    <li>Purna lectus venenatis felis nonsemper</li>
                                    <li>Aenean ellentesque ornare sem lacinia</li>
                                </ul>
                                <a href="" class="price-table__action bg-red">Select Plan</a>
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