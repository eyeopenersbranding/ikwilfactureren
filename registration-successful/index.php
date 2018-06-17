<?php session_start();

if (isset($_SESSION['usr_id'])) {
	
	$user_id = $_SESSION['usr_id']; 
    
} else {
 

}

$empty = "empty";

if(empty($user_id)){
	
	$user_id = "empty";
}

else{$hide_button = "hide";} 
						  ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>ikwilfactureren.nl - Zelf facturen sturen en offertes maken</title>

    <!-- CSS  -->
    <link href="../min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="../min/custom-min.css" type="text/css" rel="stylesheet" >
</head>
<body id="top" class="scrollspy">

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>


<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">
                <h2 class="center header text_h2"> Bevestig uw  <span class="span_h2"> e-mailadres </span></h2>
				<div class="col s12">
					<p class="center"><strong>Bijna klaar…</strong><br />
					U hoeft nog slechts uw e-mail adres te bevestigen.<br />
						We hebben u zojuist een email gestuurd. naar <strong><?php $email = $_GET["email"]; echo "$email"; ?></strong> <br />
					Klik op de link in dat bericht om de aanmelding te voltooien.<br /><br />
						Ga terug naar <a href="../index.php">ikwilfactureren.nl</a><br /><br />
					<?php if ( $empty == $user_id) { ?>
					<a href="../app/login.php"><button type="submit" class="btn btn-primary waves-effect">Inloggen</button></a>
						<?php } else { ?>
				<?php } ?>
					</p>
				</div>
            </div>
        </div>
    </div>
</div>



    <!--  Scripts-->
    <script src="min/plugin-min.js"></script>
    <script src="min/custom-min.js"></script>

    </body>
</html>
