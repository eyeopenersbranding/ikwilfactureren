<?php

//USER_ID uit de sessie halen
$user_id = $_SESSION['usr_id'];



//======================================================================
// Activatie redirect
//======================================================================

//Geen activatie = forceer naar activatie pagina
$sql = "SELECT * FROM ikwil_users WHERE id = '$user_id'";
$result = mysqli_query($con, $sql);


while($row = $result->fetch_assoc()) {
	
	$account_confirmed = $row['account_confirmed'];
	$email = $row['email'];
	$account_confirmed_ok = "1";
	
	if ($account_confirmed == $account_confirmed_ok) {
  
	} else {

		header("Location: ../registration-successful/index.php?email=$email"); 
	die();	
	}
}

//======================================================================
// Account definieren om te bepalen welke extra's geladen mogen worden
//======================================================================

//Selecteer de role om vervolgens het account de categoriseren.
$sql = "SELECT role,demo_start_date FROM ikwil_users WHERE id = '$user_id'";
$result = mysqli_query($con, $sql);

while($row = $result->fetch_assoc()) {
	
//Het recht van de gebruiker
$user_role = $row['role'];
	
//Startdatum van de demo ophalen
$demo_start_date = $row['demo_start_date'];
  
} 

//Waarde voor de rechten vastleggen
$admin = "2";
$extra = "1";
$basis = "0";

//======================================================================
// Proefperiode bepaler
//======================================================================

//Bepalen van de einddatum van de proefperiode
$demo_end_date = date('j-m-Y', strtotime($demo_start_date. ' + 30 days'));


//======================================================================
// Nog geen setup doorlopen voor de gegevens? Ga naar de setup!
//======================================================================

$stop_account_loop = "account-setup";

if ($Page_id == $stop_account_loop) {
  
	} else {

	//Start demo wanneer er geen user_info regel aanwezig is.
			$sql = "SELECT * FROM ikwil_user_info WHERE user_user_id = '$user_id'";
			$result = mysqli_query($con, $sql);

			if($result -> num_rows >0){

			while($row = $result->fetch_assoc()) {

			}

			} else {
			 header('Location: account-setup.php');	
			}
				
	
	
	}

//======================================================================
// Intro unit starten wanneer nodig
//======================================================================

//Bepalen of de intro unit gestart moet worden.
$sql = "SELECT user_intro1 FROM ikwil_user_info WHERE user_user_id = '$user_id'";
$result = mysqli_query($con, $sql);

while($row = $result->fetch_assoc()) {

$intro1 = $row['user_intro1'];
	
$show_intro = "1";
}
?>