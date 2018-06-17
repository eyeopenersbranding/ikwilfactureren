<?php
session_start();
include_once '../dbconnect.php';

if (isset($_SESSION['usr_id'])) {
    
} else {
    header('Location: login.php');
}
?>
<?php
    //Functie voor het verwijderen van een persoon
    if(isset($_POST['delete_person'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){
				
    $person_id = $_POST['person_id'];
    $company_id = $_POST['company_id'];
		
	//Verwijder het persoon
	$sql = "DELETE FROM ikwil_persons WHERE person_id = $_POST[person_id]";
	$result = mysqli_query($con, $sql);
		
	//Verwijder afspraken van persoon
	$sql1 = "DELETE FROM ikwil_appointments WHERE appointment_person_id = $_POST[person_id]";	
	$result = mysqli_query($con, $sql1);
	
	//Verwijder projecten van persoon
	$sql2 = "DELETE FROM ikwil_projects WHERE project_person_id = $_POST[person_id]";	
	$result = mysqli_query($con, $sql2);
		
	//Verwijder offertes van persoon
	$sql3 = "DELETE FROM ikwil_quotations WHERE quotation_person_id = $_POST[person_id]";	
	$result = mysqli_query($con, $sql3);
		
	//Verwijder facturen van persoon
	$sql4 = "DELETE FROM ikwil_invoicing WHERE invoice_person_id = $_POST[person_id]";	
	$result = mysqli_query($con, $sql4);
	
	//Verwijder bijlages van persoon
	$sql5 = "DELETE FROM ikwil_attachments WHERE attachment_person_id = $_POST[person_id]";	
	$result = mysqli_query($con, $sql5);
	
	//Verwijder het bedrijf
	$sql7 = "DELETE FROM ikwil_companies WHERE company_person_id = $_POST[person_id]";	
	$result = mysqli_query($con, $sql7);
		
	//Verwijder projecten met het bedrijf
	$sql8 = "DELETE FROM ikwil_projects WHERE project_company_id = $_POST[company_id]";	
	$result = mysqli_query($con, $sql8);
		
	//Verwijder offertes van het bedrijf
	$sql9 = "DELETE FROM ikwil_quotations WHERE quotation_company_id = $_POST[company_id]";	
	$result = mysqli_query($con, $sql9);
	
	//Verwijder facturen van het bedrijf
	$sql10 = "DELETE FROM ikwil_invoicing WHERE invoice_company_id = $_POST[company_id]";	
	$result = mysqli_query($con, $sql10);

	// success post with session.
	$_SESSION['notification'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
	<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Persoon succesvol verwijderd.</div>";
		header('Location: ../index.php');
		
	}

    //Functie voor het verwijderen van een account
    if(isset($_POST['delete_account'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){
				
    $account_id = $_POST['account_id'];
		
	//Verwijder het acccount
	$sql = "DELETE FROM ikwil_users WHERE id = $_POST[account_id]";
	$result = mysqli_query($con, $sql);
		
	//Verwijder de account info
	$sql = "DELETE FROM ikwil_user_info WHERE user_user_id = $_POST[account_id]";
	$result = mysqli_query($con, $sql);
		
	//Verwijder alle offertes
	$sql = "DELETE FROM ikwil_quotations WHERE quotation_user_id = $_POST[account_id]";
	$result = mysqli_query($con, $sql);
		
	//Verwijder alle facturen
	$sql = "DELETE FROM ikwil_invoicing WHERE invoice_user_id = $_POST[account_id]";
	$result = mysqli_query($con, $sql);
		
	//Verwijder alle Projecten
	$sql = "DELETE FROM ikwil_projects WHERE project_user_id = $_POST[account_id]";
	$result = mysqli_query($con, $sql);
		
	//Verwijder alle personen
	$sql = "DELETE FROM ikwil_persons WHERE person_user_id = $_POST[account_id]";
	$result = mysqli_query($con, $sql);
		
	//Verwijder alle leads
	$sql = "DELETE FROM ikwil_leads WHERE lead_user_id = $_POST[account_id]";
	$result = mysqli_query($con, $sql);
		
	//Verwijder alle bedrijven
	$sql = "DELETE FROM ikwil_companies WHERE company_user_id = $_POST[account_id]";
	$result = mysqli_query($con, $sql);
		

		

	// success post with session.
	$_SESSION['notification'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
	<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Account succesvol verwijderd.</div>";
		header('Location: ../admin.php');
		
	}


    //Functie voor het verwijderen van een bedrijf
    if(isset($_POST['delete_company'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){
				
    $company_id = $_POST['company_id'];
		
	//Verwijder het bedrijf
	$sql7 = "DELETE FROM ikwil_companies WHERE company_id = $_POST[company_id]";	
	$result = mysqli_query($con, $sql7);
		
	//Verwijder projecten met het bedrijf
	$sql8 = "DELETE FROM ikwil_projects WHERE project_company_id = $_POST[company_id]";	
	$result = mysqli_query($con, $sql8);
		
	//Verwijder offertes van het bedrijf
	$sql9 = "DELETE FROM ikwil_quotations WHERE quotation_company_id = $_POST[company_id]";	
	$result = mysqli_query($con, $sql9);
	
	//Verwijder facturen van het bedrijf
	$sql10 = "DELETE FROM ikwil_invoicing WHERE invoice_company_id = $_POST[company_id]";	
	$result = mysqli_query($con, $sql10);

	// success post with session.
	$_SESSION['notification'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
	<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Bedrijf succesvol verwijderd.</div>";
		header('Location: ../companies.php');
	
	
	}

 //Functie voor het verwijderen van een bedrijf
    if(isset($_POST['delete_invoice'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){
				
    $invoice_id = $_POST['invoice_id'];
		
	//Verwijder het bedrijf
	$sql = "DELETE FROM ikwil_invoicing WHERE invoice_id = $_POST[invoice_id]";	
	$result = mysqli_query($con, $sql);

	// success post with session.
	$_SESSION['notification'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
	<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Factuur succesvol verwijderd.</div>";
		header('Location: ../invoices.php');
	
	
	}

 //Functie voor het verwijderen van een project
    if(isset($_POST['delete_project'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){
				
    $project_id = $_POST['project_id'];
	
		//selecteer de bijlage paden
		$sql = "SELECT * FROM ikwil_attachments WHERE attachment_project_id = '$project_id'";
		$result = mysqli_query($con, $sql);

			if($result -> num_rows >0){

			while($row = $result->fetch_assoc()) {

			 $attachment_file = $row['attachment_file'];
				
			array mysql_fetch_row ( resource $result );
	

			}
			die();	

		} 

			else {
			  die(); echo "erorr";
		}

		
	$files = array('uploads/attachments/5a4249d4b702420160222162918.pdf', 'uploads/attachments/5a4249e1678f6inkomstenverklaring.pdf', 'uploads/attachments/5a4249f0832f720160222162918.pdf',);

	foreach ($files as $file) {
	  if ( @unlink ( "../".$file ) ) {
		echo 'The file <strong><span style="color:green;">' . $file . '</span></strong> was deleted!<br />';
	  } else {
		echo 'Couldn\'t delete the file <strong><span style="color:red;">' . $file . '</span></strong>!<br />';
	  }
	}
die();
		
	//Verwijder het bedrijf
	$sql = "DELETE FROM ikwil_projects WHERE project_id = $_POST[project_id]";	
	$result = mysqli_query($con, $sql);
		
	//Verwijder het bedrijf
	$sql = "DELETE FROM ikwil_attachments WHERE attachment_project_id = $_POST[project_id]";	
	$result = mysqli_query($con, $sql);
		
		
		
		
		
		
		

	// success post with session.
	$_SESSION['notification'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
	<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Project succesvol verwijderd.</div>";
		header('Location: ../projects.php');
	
	
	}

 //Functie voor het verwijderen van een bijlage
    if(isset($_POST['delete_attachment'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$project_id = $_POST['project_id'];
    $attachment_id = $_POST['attachment_id'];
	$attachment_file = $_POST['attachment_file'];
		
	 unlink("../$attachment_file");
		
	//Verwijder het bedrijf
	$sql = "DELETE FROM ikwil_attachments WHERE attachment_id = $_POST[attachment_id]";	
	$result = mysqli_query($con, $sql);

	// success post with session.
	$_SESSION['notification'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
	<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Bijlage succesvol verwijderd.</div>";
		header("Location: ../project-card.php?project_id=$project_id");
	
	
	}



	
?>
