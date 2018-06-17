<?php
session_start();
include_once '../dbconnect.php';

if (isset($_SESSION['usr_id'])) {
    
} else {
    header('Location: login.php');
}
//User_id uit de sessie halen
$user_id = $_SESSION['usr_id'];
?>
<?php
    //Come to action when submit button is activated.
    if(isset($_POST['submit'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){

      //Define Required fields
      $required = array('company_name');

      // The engine that checks if the fields are filled.
      $error = false;
      foreach($required as $field) {
      if (empty($_POST[$field])) {
      $error = true;

      }
  }

        if ($error) {

          // error post with session.
          $_SESSION['notification'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
                                <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Vul de verplichte velden aan.</div>
                                ";

                  // Redirect to the right URL
                  header("Location: ../company-card.php");

        die();

               } else {

            //Post all data from input fields
			$company_id = $_POST['company_id'];
            $company_name = $_POST['company_name'];
            $company_address = $_POST['company_address'];
            $company_zipcode = $_POST['company_zipcode'];
            $company_city = $_POST['company_city'];
            $company_phonenumber = $_POST['company_phonenumber'];
            $company_email = $_POST['company_email'];
            $company_website = $_POST['company_website'];
            $company_kvk = $_POST['company_kvk'];
			$company_btw = $_POST['company_btw'];
            $company_notes = $_POST['company_notes'];
            

            include '../dbconnect.php';

			$sql = "UPDATE ikwil_companies SET company_name = '$company_name', company_address = '$company_address', company_zipcode = '$company_zipcode', company_city = '$company_city', company_phonenumber = '$company_phonenumber', company_email = '$company_email', company_website = '$company_website', company_kvk = '$company_kvk', company_btw = '$company_btw', company_notes = '$company_notes' WHERE company_id = '$company_id'";	
			$result = mysqli_query($con, $sql);

			if ($result === TRUE) 
			{	
				// success post with session.
              $_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
				<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Klantkaart succesvol aangepast.</div>";
    			// Redirect to the right URL.
              header("Location: ../company-card.php?company_id=$company_id");
			} 
			else 
			{
    			echo "errorr";
			}
		}
	}

?>
