<?php
/**
 * Data config bestand. Alle algemene variable zijn hier in meegenomen.
 * @Data-config-cabinet
 * @author Carlos Keijzers
 */

$set_trial_time = "30"; //dagen
$price_basic = "36.30"; //euro, admin dashboard rekent met deze waardes
$price_extra = "68"; //euro, admin dashboard rekent met deze waardes

//======================================================================
// Melding registratie /inloggen / wachtwoord vergeten
//======================================================================

$error_notification['wrong_credentials'] = 'Sorry, dat was geen geldige login. Probeer opnieuw. Als je je wachtwoord vergeten bent, kan je het altijd resetten.';
$error_notification['registration_email_error'] = 'Please Enter Valid Email ID hoer';
$error_notification['registration_password_error'] = 'Password must be minimum of 6 characters hoer';
$error_notification['registration_name_error'] = 'Name must contain only alphabets and space';
$error_notification['registration_surname_error'] = 'Name must contain only alphabets and space';
$error_notification['registration_cpassword_error'] = "Password and Confirm Password doesn't match";

$success_notification['registration_success'] = "Registratie succesvol, u kunt nu inloggen.";







?>