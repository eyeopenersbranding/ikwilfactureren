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

                  // Redirect to the right URL
                  header("Location: ../add-person.php");

        die();

               } else {

            //Post all data from input fields
			$person_id = $_POST['person_id'];
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
            

            include '../dbconnect.php';

			$sql = "UPDATE ikwil_persons SET person_name = '$person_name', person_surname = '$person_surname', person_address = '$person_address', person_zipcode = '$person_zipcode', person_city = '$person_city', person_phonenumber = '$person_phonenumber', person_mobilephonenumber = '$person_mobilephonenumber', person_email = '$person_email', person_gender = '$person_gender', person_profession = '$person_profession', person_birthdate = '$person_birthdate', person_notes = '$person_notes' WHERE person_id = '$person_id'";	
			$result = mysqli_query($con, $sql);

			if ($result === TRUE) 
			{	
				// success post with session.
              $_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
				<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Klantkaart succesvol aangepast.</div>";
    			// Redirect to the right URL.
              header("Location: ../customer-card.php?customer_id=$person_id");
			} 
			else 
			{
    			echo "errorr";
			}
		}
	}

?>
