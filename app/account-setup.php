<?php
$Page_id="account-setup";
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

    		<header class="header">
    <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
        <div class="navigation-trigger__inner">
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
            <i class="navigation-trigger__line"></i>
        </div>
    </div>

    <div class="header__logo hidden-sm-down">
		<a href="index.php"><h3 style="color: #ffffff;">IKWILFACTUREREN.NL</h3></a>
    </div>
	<ul class="top-nav">
    

        <li class="dropdown hidden-xs-down">
            <a href="" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="logout.php" class="dropdown-item"><i class="zmdi zmdi-power zmdi-hc-fw"></i> Uitloggen</a>
            </div>
        </li>

     
    </ul>

</header>

            <section class="content ">
                <div class="content__inner content__inner--sm ">	
						<div class="card col-sm-8 ">
													<br>
											<div class="alert alert-warning alert-dismissible fade show">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h3 style="color: #ffffff;">Bijna klaar!</h3>
												<p>Van harte welkom <?php echo $_SESSION['usr_name'];  ?> <?php echo $_SESSION['usr_surname'];  ?>! Voordat u facturen kunt sturen hebben nog wat bedrijfsgegevens nodig.</p>
											</div>
								<!-- Sessie notification laten zien -->
								<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
								<!-- Sessie notification leeg maken -->
								<?php unset($_SESSION['notification']); ?>

								<div class="card-block">
									<form action='IKWIL_Engine/IKWILSetup.php' method='post' enctype='multipart/form-data'>
									<input type="hidden" name="person_user_id" value="<?php echo "$user_id" ?>" />
									<h4 class="card-block__title mb-4">*Verplichte velden</h4>
									<br>

									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_company_name" class="form-control" placeholder="Bedrijfsnaam*">
										<i class="form-group__bar"></i>
									</div>

									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_address" class="form-control" placeholder="Straat + Huisnummer*">
										<i class="form-group__bar"></i>
									</div>

									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_zipcode" class="form-control" placeholder="Postcode*">
										<i class="form-group__bar"></i>
									</div>

									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_city" class="form-control" placeholder="Plaats*">
										<i class="form-group__bar"></i>
									</div>

									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_telephone" class="form-control" placeholder="Telefoonnummer*">
										<i class="form-group__bar"></i>
									</div>
									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_email" class="form-control" placeholder="E-mail*">
										<i class="form-group__bar"></i>
									</div>

									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_website" class="form-control" placeholder="Website*">
										<i class="form-group__bar"></i>
									</div>

									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_kvk" class="form-control" placeholder="KVK nummer*">
										<i class="form-group__bar"></i>
									</div>

									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_btw" class="form-control" placeholder="BTW nummer*">
										<i class="form-group__bar"></i>
									</div>

									<div class="form-group form-group--float form-group--centered">
										<input type="text" name="user_bank" class="form-control" placeholder="IBAN Bankrekeningnummer*">
										<i class="form-group__bar"></i>
									</div>

									<div class="form-group form-group--float form-group--centered">
									<button type="submit" name="submit" class="btn btn-primary waves-effect"><i class="zmdi zmdi-check zmdi-hc-fw"></i> Ik wil facturen sturen</button>
									</div>

									</form>
									</div>                   
							</div>
					</div>
				
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