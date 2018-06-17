<?php
/**
 * Admin Dashboard, alle kpi's voor ikwilfactureren.nl worden hier weergegeven.
 * @Admin-dashboard-cabinet
 * @author Carlos Keijzers
 */
$Page_id="dashboard";
session_start();
include_once 'dbconnect.php';


if (isset($_SESSION['usr_id'])) {
    
} else {
    header('Location: login.php');
}

include 'page_includes/ikwil_redirect_core.php';

if ($user_role == $admin) {
    
} else {
 header('Location: index.php');
}







//======================================================================
// Aantal actieve gebruikers uit database halen
//======================================================================

//Aantal actieve gebruikers uit de database halen en tellen.
$sql = "SELECT status FROM ikwil_users WHERE status = 'Actief'";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['status'];
			{
			$total_active_users = count($count);
			}
		} else{

	$total_active_users = "0";
	}

//======================================================================
// Aantal inactieve gebruikers uit database halen
//======================================================================

//Aantal inactieve gebruikers uit database halen
$sql = "SELECT status FROM ikwil_users WHERE status = 'Inactief'";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['status'];
			{
			$total_inactive_users = count($count);
			}
		} else{

	$total_inactive_users = "0";
	}


//======================================================================
// Aantal verkochte basis producten
//======================================================================

//Aantal verkochte basis producten
$sql = "SELECT status FROM ikwil_users WHERE role = '0'";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['status'];
			{
			$total_basic_sold = count($count);
			}
		} else{

	$total_basic_sold = "0";
	}


//======================================================================
// Aantal verkochte extra producten
//======================================================================

//Aantal verkochte extra producten
$sql = "SELECT status,licence_start_date FROM ikwil_users WHERE role = '1' AND NOT licence_start_date = '0' ";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['status'];
			{
			$total_extra_sold = count($count);
			}
		} else{

	$total_extra_sold = "0";
	}

//======================================================================
// Aantal lopende trials
//======================================================================

//Aantal lopende trials
$sql = "SELECT demo_start_date FROM ikwil_users WHERE NOT demo_start_date = '0'";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['demo_start_date'];
			{
			$total_in_trial = count($count);
			}
		} else{

	$total_in_trial = "0";
	}


//======================================================================
// Aantal accounts ingevoerd door admin
//======================================================================

//Aantal accounts ingevoerd door admin
$sql = "SELECT email_token FROM ikwil_users WHERE email_token = '1'";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['email_token'];
			{
			$total_accounts_sponsored = count($count);
			}
		} else{

	$total_accounts_sponsored = "0";
	}

//======================================================================
// Totaal aantal gemaakte facturen
//======================================================================

//Totaal aantal gemaakte facturen
$sql = "SELECT invoice_id FROM ikwil_invoicing";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['invoice_id'];
			{
			$total_invoices = count($count);
			}
		} else{

	$total_invoices = "0";
	}

//======================================================================
// Totaal aantal gemaakte offertes
//======================================================================

//Totaal aantal gemaakte offertes
$sql = "SELECT quotation_id FROM ikwil_quotations";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['quotation_id'];
			{
			$total_quotations = count($count);
			}
		} else{

	$total_quotations = "0";
	}



//======================================================================
// Totaal aantal bedrijven
//======================================================================

//Totaal aantal bedrijven
$sql = "SELECT company_id FROM ikwil_companies";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['company_id'];
			{
			$total_companies = count($count);
			}
		} else{

	$total_companies = "0";
	}


//======================================================================
// Totaal aantal contactpersonen
//======================================================================

//Totaal aantal contactpersonen
$sql = "SELECT person_id FROM ikwil_persons";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['person_id'];
			{
			$total_persons = count($count);
			}
		} else{

	$total_persons = "0";
	}

//======================================================================
// Totaal aantal projecten
//======================================================================

//Totaal aantal projecten
$sql = "SELECT project_id FROM ikwil_projects";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['project_id'];
			{
			$total_projects = count($count);
			}
		} else{

	$total_projects = "0";
	}

//======================================================================
// Totaal aantal leads
//======================================================================

//Totaal aantal leads
$sql = "SELECT lead_id FROM ikwil_leads";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['lead_id'];
			{
			$total_leads = count($count);
			}
		} else{

	$total_leads = "0";
	}

//======================================================================
// Totaal aantal afspraken
//======================================================================

//Totaal aantal afspraken
$sql = "SELECT appointment_id FROM ikwil_appointments";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['appointment_id'];
			{
			$total_appointments = count($count);
			}
		} else{

	$total_appointments = "0";
	}


//======================================================================
// Totaal aantal bijlage
//======================================================================

//Totaal aantal bijlage
$sql = "SELECT attachment_id FROM ikwil_attachments";
$result = mysqli_query($con, $sql);

if ($result)
	{
	 $count = array();
	
		foreach($result as $row)
			
		$count[] = $row['attachment_id'];
			{
			$total_attachments = count($count);
			}
		} else{

	$total_attachments = "0";
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
                    <h1>Dashboard | ikwilfactureren.nl</h1>
                </header>
                                         
                                            
                                      
                <div class="card">
					<!-- Sessie notification laten zien -->
					<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
					<!-- Sessie notification leeg maken -->
					<?php unset($_SESSION['notification']); ?>
					
                    <div class="card-header">
                    </div>

                    <div class="card-block">
						
		
				<h1>Administrator informatie</h1>
				<br>
						
				 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Aantal registraties</h2>
                                <small class="card-subtitle">Vestibulum purus quam scelerisque, mollis nonummy metus</small>
                            </div>

                            <div class="card-block">
                                <div class="flot-chart flot-curved-line"></div>
                                <div class="flot-chart-legends flot-chart-legends--curved"></div>
                            </div>
                        </div>
                    </div>
                </div>
						
				<div class="row quick-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-light-blue">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_active_users ?></h2>
                                <small>Totaal aantal actieve accounts</small>
                            </div>

                          
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-red">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_inactive_users ?></h2>
                                <small>Totaal aantal inactieve accounts</small>
                            </div>

                          
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-green">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_basic_sold ?> | €<?php $total_money_basic = $total_basic_sold * $price_basic; echo $total_money_basic ?></h2>
                                <small>Totaal verkocht | Basis</small>
                            </div>

                         
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-green">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_extra_sold ?> | €<?php $total_money_extra = $total_extra_sold * $price_extra; echo $total_money_extra ?></h2>
                                <small>Totaal verkocht | Extra</small>
                            </div>

                           
                        </div>
                    </div>
                </div>
						
						
			
				<div class="row quick-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-red">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_in_trial ?></h2>
                                <small>Totaal aantal trials</small>
                            </div>

                          
                        </div>
                    </div>
					
					<div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-purple">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_accounts_sponsored ?></h2>
                                <small>Totaal accounts door admin</small>
                            </div>

                          
                        </div>
                    </div>

                </div>
						
						
						
						
						
						
						
						
						
				<h1>Gebruikers informatie</h1>
				<br>
				<div class="row quick-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-light-blue">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_invoices ?></h2>
                                <small>Totaal aantal facturen</small>
                            </div>

                          
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-amber">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_quotations ?></h2>
                                <small>Totaal aantal offertes</small>
                            </div>

                          
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-purple">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_companies ?></h2>
                                <small>Totaal aantal bedrijven</small>
                            </div>

                         
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-green">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_persons ?></h2>
                                <small>Totaal aantal contactpersonen</small>
                            </div>

                           
                        </div>
                    </div>
                </div>
				
				<div class="row quick-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-light-blue">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_projects ?></h2>
                                <small>Totaal aantal projecten</small>
                            </div>

                          
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-amber">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_leads ?></h2>
                                <small>Totaal aantal leads</small>
                            </div>

                          
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-purple">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_appointments ?></h2>
                                <small>Totaal aantal afspraken</small>
                            </div>

                         
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item bg-green">
                            <div class="quick-stats__info">
                                <h2><?php echo $total_attachments ?></h2>
                                <small>Totaal aantal bijlage</small>
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
		
		   <!-- Vendors -->
        <script src="app_data/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="app_data/vendors/bower_components/tether/dist/js/tether.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="app_data/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="app_data/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="app_data/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>
        <script src="app_data/vendors/bower_components/Waves/dist/waves.min.js"></script>

        <script src="app_data/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="app_data/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="app_data/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="app_data/vendors/bower_components/jqvmap/dist/jquery.vmap.min.js"></script>
        <script src="app_data/vendors/bower_components/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="app_data/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <script src="app_data/vendors/bower_components/salvattore/dist/salvattore.min.js"></script>
        <script src="app_data/vendors/jquery.sparkline/jquery.sparkline.min.js"></script>
        <script src="app_data/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="app_data/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
		  <!-- Charts and maps-->
        <script src="app_data/demo/js/flot-charts/curved-line.js"></script>
        <script src="app_data/demo/js/flot-charts/line.js"></script>
        <script src="app_data/demo/js/flot-charts/chart-tooltips.js"></script>
        <script src="app_data/demo/js/other-charts.js"></script>
        <script src="app_data/demo/js/jqvmap.js"></script>
		

        <!-- App functions and actions -->
        <script src="app_data/js/app.min.js"></script>
    </body>
</html>