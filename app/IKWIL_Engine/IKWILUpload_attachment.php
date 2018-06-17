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
  $attachment_person_id = $_POST['attachment_person_id'];

    //Come to action when submit button is activated.
    if(isset($_POST['btn-upload']))
    {

      //Define Required fields
      $required = array('attachment_title');

      // The engine that checks if the fields are filled.
      $error = false;
      foreach($required as $field) {
      if (empty($_POST[$field])) {
      $error = true;

      }
  }

        if ($error) {

          // error post with session.
          $_SESSION['error'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
                                <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Voeg naam en bestand toe.</div>
                                ";

                  // Redirect to the right URL
                  header("Location: ../customer-card.php?customer_id=$attachment_person_id");

        die();

           } else {


             $maxsize    = 5242880;
             $targetfolder = "uploads/attachments/";
             $pad = "../";
             $uniqid = uniqid();
             $targetfolder = $targetfolder. $uniqid  . basename( $_FILES['file']['name']) ;
             if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {

               if($attachment_person_id > 0){

               // success post with session.
               $_SESSION['success'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
                                     <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Let op, bestand te groot. Maximaal 5 MB.</div>
                                     ";
               // Redirect to the right URL.
               header("Location: ../customer-card.php?customer_id=$attachment_person_id");
             }

             elseif ($attachment_company_id > 0) {

               // success post with session.
               $_SESSION['success'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
                                     <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Let op, bestand te groot. Maximaal 5 MB.</div>
                                     ";
               // Redirect to the right URL.
               header("Location: ../company-card.php?customer_id=$attachment_company_id");
             }

             elseif ($attachment_project_id > 0) {
               // success post with session.
               $_SESSION['success'] = "<div class='alert alert-danger alert-dismissable' role='alert'>
                                     <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Let op, bestand te groot. Maximaal 5 MB.</div>
                                     ";
               // Redirect to the right URL.
               header("Location: ../project-card.php?customer_id=$attachment_project_id");
             }

             die();
             }
             $ok=1;

             $file_type=$_FILES['file']['type'];

             if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {

             if(move_uploaded_file($_FILES['file']['tmp_name'],$pad .$targetfolder))

             {



            //Post all data from input fields
            $attachment_title = $_POST['attachment_title'];
            $attachment_person_id = $_POST['attachment_person_id'];
            $attachment_company_id = $_POST['attachment_company_id'];
            $attachment_project_id = $_POST['attachment_project_id'];


            mysqli_query($con, "INSERT INTO ikwil_attachments(attachment_title,attachment_file,attachment_type,attachment_person_id,attachment_company_id,attachment_project_id,project_user_id) VALUES('" . $attachment_title . "', '" . $targetfolder . "', '" . $file_type . "', '" . $attachment_person_id . "', '" . $attachment_company_id. "', '" . $attachment_project_id . "', '" . $user_id . "')");

              if($attachment_person_id > 0){

              // success post with session.
              $_SESSION['success'] = "<div class='alert alert-success alert-dismissable' role='alert'>
                                    <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Bijlage succesvol aangemaakt.</div>
                                    ";
              // Redirect to the right URL.
              header("Location: ../customer-card.php?customer_id=$attachment_person_id");
            }

            elseif ($attachment_company_id > 0) {

              // success post with session.
              $_SESSION['success'] = "<div class='alert alert-success alert-dismissable' role='alert'>
                                    <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Bijlage succesvol aangemaakt.</div>
                                    ";
              // Redirect to the right URL.
              header("Location: ../company-card.php?customer_id=$attachment_company_id");
            }

            elseif ($attachment_project_id > 0) {
              // success post with session.
              $_SESSION['success'] = "<div class='alert alert-success alert-dismissable' role='alert'>
                                    <i class='fa fa-exclamation-triangle' aria-hidden='true'></i> Bijlage succesvol aangemaakt.</div>
                                    ";
              // Redirect to the right URL.
              header("Location: ../project-card.php?project_id=$attachment_project_id");
            }
          }

          else {

          echo "Problem uploading file";

          }

          }

          else {

          echo "You may only upload PDFs, JPEGs or GIF files.<br>";

          }


      }

  }

?>
