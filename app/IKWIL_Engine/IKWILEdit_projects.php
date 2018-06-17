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
      $required = array('project_name');

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
                  header("Location: ../project-card.php");

        die();

               } else {

            //Post all data from input fields
			$project_id = $_POST['project_id'];
            $project_name = $_POST['project_name'];
            $project_time = $_POST['project_time'];
            $project_finished = $_POST['project_finished'];
            $project_notes = $_POST['project_notes'];
			
			
			
	
            

            include '../dbconnect.php';
			
			$project_notes = $con->real_escape_string($project_notes);

			$sql = "UPDATE ikwil_projects SET project_name = '$project_name', project_time = '$project_time', project_finished = '$project_finished', project_notes = '$project_notes' WHERE project_id = '$project_id'";	
			$result = mysqli_query($con, $sql);

			if ($result === TRUE) 
			{	
				// success post with session.
              $_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
				<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Project succesvol aangepast.</div>";
    			// Redirect to the right URL.
              header("Location: ../project-card.php?project_id=$project_id");
			} 
			else 
			{
    			echo "errorr";
			}
		}
	}

?>
