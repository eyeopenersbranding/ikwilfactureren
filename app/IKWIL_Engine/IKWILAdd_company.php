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
                  header("Location: ../add-company.php");

        die();

               } else {
			
            //Post all data from input fields
            $company_name = $_POST['company_name'];
            $company_address = $_POST['company_address'];
            $company_zipcode = $_POST['company_zipcode'];
            $company_city = $_POST['company_city'];
            $company_phonenumber = $_POST['company_phonenumber'];
            $company_email = $_POST['company_email'];
            $company_kvk = $_POST['company_kvk'];
			$company_btw = $_POST['company_btw'];
            $company_website = $_POST['company_website'];
            $company_notes = $_POST['company_notes'];
            $company_person_id = $_POST['company_person_id'];
			$company_user_id = $user_id;

            include '../dbconnect.php';

			$sql = "INSERT INTO ikwil_companies (company_name, company_address, company_zipcode, company_city, company_phonenumber, company_email, company_kvk, company_btw, company_website, company_notes, company_person_id, company_user_id) 
			VALUES ('$company_name', '$company_address', '$company_zipcode', '$company_city', '$company_phonenumber', '$company_email', '$company_kvk', '$company_btw', '$company_website', '$company_notes', '$company_person_id', '$company_user_id')";	
			$result = mysqli_query($con, $sql);

			if ($result === TRUE) 
			{	
				// success post with session.
              $_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
				<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Bedrijf succesvol aangemaakt.</div>";
    			// Redirect to the right URL.
              header("Location: ../companies.php");
			} 
			else 
			{
    			echo "errorr";
			}
		}
	}

?>
