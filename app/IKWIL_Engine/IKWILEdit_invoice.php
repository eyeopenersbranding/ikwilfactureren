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
      $required = array('invoice_id');

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
                  header("Location: ../invoice-card.php");

        die();

               } else {

             //Post data van de input velden
			$invoice_id = $_POST['invoice_id'];
			$invoice_name = $_POST['invoice_name'];
            $invoice_number = $_POST['invoice_number'];
            $invoice_address = $_POST['invoice_address'];
            $invoice_zipcode = $_POST['invoice_zipcode'];
            $invoice_city = $_POST['invoice_city'];

            $invoice_item_1 = $_POST['invoice_item_1'];
            $invoice_item_2 = $_POST['invoice_item_2'];
            $invoice_item_3 = $_POST['invoice_item_3'];
            $invoice_item_4 = $_POST['invoice_item_4'];
            $invoice_item_5 = $_POST['invoice_item_5'];

            $invoice_price_1 = $_POST['invoice_price_1'];
            $invoice_price_2 = $_POST['invoice_price_2'];
            $invoice_price_3 = $_POST['invoice_price_3'];
            $invoice_price_4 = $_POST['invoice_price_4'];
            $invoice_price_5 = $_POST['invoice_price_5'];

            $invoice_date = $_POST['invoice_date'];
			$invoice_status = $_POST['invoice_status'];
   
  

            include '../dbconnect.php';

			$sql = "UPDATE ikwil_invoicing SET invoice_name = '$invoice_name', invoice_number = '$invoice_number', invoice_address = '$invoice_address', invoice_zipcode = '$invoice_zipcode', invoice_city = '$invoice_city', invoice_item_1 = '$invoice_item_1', invoice_item_2 = '$invoice_item_2', invoice_item_3 = '$invoice_item_3', invoice_item_4 = '$invoice_item_4', invoice_item_5 = '$invoice_item_5', invoice_price_1 = '$invoice_price_1', invoice_price_2 = '$invoice_price_2', invoice_price_3 = '$invoice_price_3', invoice_price_4 = '$invoice_price_4', invoice_price_5 = '$invoice_price_5', invoice_date = '$invoice_date', invoice_status = '$invoice_status' WHERE invoice_id = '$invoice_id'";	
			$result = mysqli_query($con, $sql);

			if ($result === TRUE) 
			{	
				// success post with session.
              $_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
				<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Factuur succesvol aangepast.</div>";
    			// Redirect to the right URL.
              header("Location: ../invoice-card.php?invoice_id=$invoice_id");
			} 
			else 
			{
    			echo "errorr";
			}
		}
	}

?>
