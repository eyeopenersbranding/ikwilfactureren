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
    if(isset($_POST['submit_basic_info'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){

      //Define Required fields
      $required = array('user_company_name','user_address','user_zipcode');

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
                  header("Location: ../profile-settings.php");

        die();

               } else {

            //Post all data from input fields
			$user_company_name = $_POST['user_company_name'];
            $user_address = $_POST['user_address'];
            $user_zipcode = $_POST['user_zipcode'];
            $user_city = $_POST['user_city'];
            $user_telephone = $_POST['user_telephone'];
            $user_website = $_POST['user_website'];
            $user_email = $_POST['user_email'];
            $user_btw = $_POST['user_btw'];
            $user_kvk = $_POST['user_kvk'];
            $user_bank = $_POST['user_bank'];
            $user_notes = $_POST['user_notes'];
			$user_id = $_POST['user_id'];

            

            include '../dbconnect.php';

			$sql = "UPDATE ikwil_user_info SET user_company_name = '$user_company_name', user_address = '$user_address', user_zipcode = '$user_zipcode', user_city = '$user_city', user_telephone = '$user_telephone', user_website = '$user_website', user_email = '$user_email', user_btw = '$user_btw', user_kvk = '$user_kvk', user_bank = '$user_bank', user_notes = '$user_notes' WHERE user_user_id = '$user_id'";	
			$result = mysqli_query($con, $sql);

			if ($result === TRUE) 
			{	
				// success post with session.
              $_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
				<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Profiel succesvol aangepast.</div>";
    			// Redirect to the right URL.
              header("Location: ../profile-settings.php");
			} 
			else 
			{
    			echo "errorr";
			}
		}
	}

?>
