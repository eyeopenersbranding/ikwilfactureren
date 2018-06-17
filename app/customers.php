<?php
$Page_id="persons";
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
				<?php if ($intro1 == $show_intro) { ?>
					<div class="jumbotron jumbotron-fluid">
						<div class="container">
							<h1 class="display-3">Voilà, en nu op naar succes!</h1>
							<p class="lead">Maak nu gelijk uw eerste contactpersoon aan.<br>
							</p>
							 <form action='IKWIL_Engine/IKWILintro_functions.php' method='post' enctype='multipart/form-data'>
								<input type="hidden" name="user_id" value="<?php echo "$user_id" ?>" />
								 <input type="hidden" name="user_intro1" value="0" />
								<button type="submit" name="submit" class="btn btn-success"> Ok, ik begrijp het</button>
							  </form>
							<br />
							<i class="zmdi zmdi-long-arrow-down zmdi-hc-fw"></i>
						</div>
					</div>
				<?php } else { ?>
				<?php } ?>
                <header>
                    <h1><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i> Mijn klanten</h1>
					<hr>
                </header>                                         
                                            
                                      
                <div class="card">
					<!-- Sessie notification laten zien -->
					<?php echo isset($_SESSION['notification']) ? $_SESSION['notification'] : " "; ?>
					<!-- Sessie notification leeg maken -->
					<?php session_destroy(); unset($_SESSION['notification']); ?>
					
                    <div class="card-header">
						<a href="add-person.php"><button type="button" class="btn btn-primary waves-effect"><i class="zmdi zmdi-plus zmdi-hc-fw"></i> Contactpersoon toevoegen</button></a>
                    </div>

                    <div class="card-block">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr>
                                        <th>Naam</th>
                                        <th>Telefoonnummer</th>
                                        <th>E-mail</th>
                                        <th>Plaats</th>
                                    </tr>
                                </thead>
                                <tbody>		
								<?php 
                                   
                                        //selecteer alle gebruikers die toegang hebben tot de volledige website
                                        $sql = "SELECT * FROM ikwil_persons WHERE person_user_id = '$user_id'";
                                        $result = mysqli_query($con, $sql);
									
										if($result -> num_rows >0){
                                        
                                        while($row = $result->fetch_assoc()) {
											  $no_result = "-";
											  $person_id = $row['person_id'];	  
											  $person_name = $row['person_name'];
											  $person_surname = $row['person_surname'];
											
											  $person_mobilephonenumber = $row['person_mobilephonenumber'];
											  $person_mobilephonenumber = str_replace("0", $no_result, $person_mobilephonenumber);
											
											  $person_email = $row['person_email'];
											
											  $person_city = $row['person_city'];
									echo"
                                   		<tr>
											<td><a href='customer-card.php?customer_id=$person_id'>$person_name $person_surname</a></td>
											<td>$person_mobilephonenumber</td>
											<td><a href='mailto:$person_email'>$person_email</a></td>
											<td>$person_city</td>
                                    	</tr>
                                   ";}
										} 	
									else {
											echo"<div class='alert alert-danger alert-dismissable' role='alert'><i class='zmdi zmdi-comment-alt-text zmdi-hc-f'></i>
											<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> U heeft nog geen contactpersonen.</div>";
										 }
											?>
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