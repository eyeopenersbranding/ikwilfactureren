<?php
session_start();
include_once '../dbconnect.php';

if (isset($_SESSION['usr_id'])) {
    
} else {
    header('Location: login.php');
}
?>
<?php
  //Come to action when submit button is activated.
    if(isset($_POST['submit'])&& (!empty($_POST)) && $_SERVER['REQUEST_METHOD'] == 'POST'){

	//Post all data from input fields
	$user_intro1 = $_POST['user_intro1'];
	$user_id = $_POST['user_id'];

		
	include '../dbconnect.php';

	$sql = "UPDATE ikwil_user_info SET user_intro1 = '$user_intro1' WHERE user_user_id = '$user_id'";	
	$result = mysqli_query($con, $sql);
		
    header("Location: ../add-person.php");
}
	
?>
