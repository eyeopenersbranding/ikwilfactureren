required<?php
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
      $required = array('person_name','person_surname','person_gender');

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
				$required_fields = "missing_fields";
                  // Redirect to the right URL
                  header("Location: ../add-person.php?error_message=$required_fields");

        die();

               } else {

            //Post all data from input fields
            $person_name = $_POST['person_name'];
            $person_surname = $_POST['person_surname'];
            $person_address = $_POST['person_address'];
            $person_zipcode = $_POST['person_zipcode'];
            $person_city = $_POST['person_city'];
            $person_phonenumber = $_POST['person_phonenumber'];
            $person_mobilephonenumber = $_POST['person_mobilephonenumber'];
            $person_email = $_POST['person_email'];
            $person_gender = $_POST['person_gender'];
            $person_profession = $_POST['person_profession'];
            $person_birthdate = $_POST['person_birthdate'];
            $person_notes = $_POST['person_notes'];
            $person_user_id = $_POST['person_user_id'];

            include '../dbconnect.php';

			$sql = "INSERT INTO ikwil_persons (person_name, person_surname, person_address, person_zipcode, person_city, person_phonenumber, person_mobilephonenumber, person_email, person_gender, person_profession, person_birthdate, person_notes, person_user_id) 
			VALUES ('$person_name', '$person_surname','$person_address', '$person_zipcode', '$person_city', '$person_phonenumber', '$person_mobilephonenumber', '$person_email', '$person_gender', '$person_profession', '$person_birthdate', '$person_notes', '$person_user_id')";	
			$result = mysqli_query($con, $sql);

			if ($result === TRUE) 
			{	
				// success post with session.
              $_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
				<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Persoon succesvol aangemaakt.</div>";
    			// Redirect to the right URL.
              header("Location: ../customers.php");
			} 
			else 
			{
    			echo "errorr";
			}
		}
	}

?>
