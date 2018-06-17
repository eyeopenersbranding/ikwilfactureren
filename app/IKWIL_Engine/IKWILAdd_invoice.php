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
      $required = array('invoice_number');

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
                  header("Location: ../add-invoice.php");

        die();

               } else {

            //Post all data from input fields
			$invoice_number = $_POST['invoice_number'];
            $invoice_name = $_POST['invoice_name'];
            $invoice_address = $_POST['invoice_address'];
            $invoice_zipcode = $_POST['invoice_zipcode'];
            $invoice_city = $_POST['invoice_city'];
			$invoice_btw = $_POST['invoice_btw'];
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

            $invoice_status= $_POST['invoice_status'];
			
			setlocale(LC_ALL, 'nl_NL');
            $invoice_date = date("j-m-Y");
			
            $invoice_person_id = $_POST['invoice_person_id'];
            $invoice_company_id = $_POST['invoice_company_id'];
			

            include '../dbconnect.php';

			$sql = "INSERT INTO ikwil_invoicing (invoice_number, invoice_name, invoice_address, invoice_zipcode, invoice_city, invoice_btw, invoice_item_1, invoice_item_2, invoice_item_3, invoice_item_4, invoice_item_5, invoice_price_1, invoice_price_2, invoice_price_3, invoice_price_4, invoice_price_5, invoice_status, invoice_date, invoice_person_id, invoice_company_id, invoice_user_id) 
			VALUES ('$invoice_number', '$invoice_name', '$invoice_address', '$invoice_zipcode', '$invoice_city', '$invoice_btw', '$invoice_item_1', '$invoice_item_2', '$invoice_item_3', '$invoice_item_4', '$invoice_item_5', '$invoice_price_1', '$invoice_price_2', '$invoice_price_3', '$invoice_price_4', '$invoice_price_5', '$invoice_status', '$invoice_date', '$invoice_person_id', '$invoice_company_id', '$user_id')";	
			$result = mysqli_query($con, $sql);

			if ($result === TRUE) 
			{	
				// success post with session.
              $_SESSION['notification'] = "<div class='alert alert-success alert-dismissable' role='alert'>
				<i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Factuur succesvol aangemaakt.</div>";
    			// Redirect to the right URL.
              header("Location: ../invoices.php");
			} 
			else 
			{
    			echo "errorr";
			}
		}
	}

?>
