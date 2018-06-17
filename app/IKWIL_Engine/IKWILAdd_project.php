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
                  header("Location: ../add-project.php");

        die();

               } else {

            //Post all data from input fields
            $project_name = $_POST['project_name'];
            $project_time = $_POST['project_time'];
            $project_finished = $_POST['project_finished'];
            $project_notes = $_POST['project_notes'];
			
			setlocale(LC_ALL, 'nl_NL');
            $project_date = date("j-m-Y");
			
            $project_person_id = $_POST['project_person_id'];
            $project_company_id = $_POST['project_company_id'];
        
            include '../dbconnect.php';

			$sql = "INSERT INTO ikwil_projects(project_name, project_time, project_finished, project_notes, project_date, project_person_id, project_company_id, project_user_id) 
			VALUES ('$project_name', '$project_time','$project_finished', '$project_notes', '$project_date', '$project_person_id', '$project_company_id', '$user_id')";	
			$result = mysqli_query($con, $sql);

			if ($result === TRUE) 
			{	
				// success post with session.
              $_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
				<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Persoon succesvol aangemaakt.</div>";
    			// Redirect to the right URL.
              header("Location: ../projects.php");
			} 
			else 
			{
    			echo "errorr";
			}
		}
	}

?>
