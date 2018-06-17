<?php
session_start();
include_once '../../dbconnect.php';


if (isset($_SESSION['usr_id'])) {
    
} else {
    header('Location: login.php');
}
//User_id uit de sessie halen
$user_id = $_SESSION['usr_id'];
?>
<?php

	//selecteer alle gebruikers die toegang hebben tot de volledige website
	$invoice_id = $_GET["invoice_id"];
	$sql = "SELECT * FROM ikwil_user_info WHERE user_user_id = '$user_id'";
	$result = mysqli_query($con, $sql);

	while($row = $result->fetch_assoc()) {
		
	$user_logo_pad = $row['user_logo_pad'];
    $user_bg_pad = $row['user_bg_pad'];
		
	$user_address = $row['user_address'];
	$user_zipcode = $row['user_zipcode'];
	$user_city = $row['user_city'];
	$user_website = $row['user_website'];
	$user_email = $row['user_email'];
	$user_telephone = $row['user_telephone'];
		
	$user_kvk = $row['user_kvk'];
	$user_btw = $row['user_btw'];
	$user_notes = $row['user_notes'];	
	}


	//selecteer alle gebruikers die toegang hebben tot de volledige website
	$invoice_id = $_GET["invoice_id"];
	$sql = "SELECT * FROM ikwil_invoicing WHERE invoice_id = '$invoice_id'";
	$result = mysqli_query($con, $sql);

	while($row = $result->fetch_assoc()) {
		
 			 $invoice_id = $row['invoice_id'];
			 $invoice_number = $row['invoice_number'];
             $invoice_name = $row['invoice_name'];
             $invoice_address = $row['invoice_address'];
             $invoice_city = $row['invoice_city'];
             $invoice_zipcode = $row['invoice_zipcode'];
		 	 $invoice_btw = $row['invoice_btw'];

             $invoice_item_1 = $row['invoice_item_1'];
             $invoice_item_2 = $row['invoice_item_2'];
             $invoice_item_3 = $row['invoice_item_3'];
             $invoice_item_4 = $row['invoice_item_4'];
             $invoice_item_5 = $row['invoice_item_5'];

             $invoice_price_1 = $row['invoice_price_1'];
             $invoice_price_2 = $row['invoice_price_2'];
             $invoice_price_3 = $row['invoice_price_3'];
             $invoice_price_4 = $row['invoice_price_4'];
             $invoice_price_5 = $row['invoice_price_5'];
			 $invoice_price_1_print = number_format($invoice_price_1 , 2, ',', '.');
			 $invoice_price_2_print = number_format($invoice_price_2 , 2, ',', '.');
			 $invoice_price_3_print = number_format($invoice_price_3 , 2, ',', '.');
			 $invoice_price_4_print = number_format($invoice_price_4 , 2, ',', '.');
		     $invoice_price_5_print = number_format($invoice_price_5 , 2, ',', '.');

             $invoice_status = $row['invoice_status'];
             $invoice_date = $row['invoice_date'];
             $invoice_person_id = $row['invoice_person_id'];
             $invoice_user_id = $row['invoice_user_id'];
			 

             $tax = "0.21";
             $invoice_subtotal = $invoice_price_1 + $invoice_price_2 + $invoice_price_3 + $invoice_price_4 + $invoice_price_5;
             $invoice_tax = $invoice_subtotal * $tax;
             $invoice_total = $invoice_subtotal + $invoice_tax ;
		
			 $invoice_total_print = number_format($invoice_total , 2, ',', '.');
			 $invoice_tax_print = number_format($invoice_tax , 2, ',', ' ');
			 $invoice_subtotal_print = number_format($invoice_subtotal , 2, ',', '.');
		
		
		 $zero = "0,00";
		
		 if ($invoice_price_1_print == $zero) { $invoice_price_1_print = ""; } else {  } ;
		 if ($invoice_price_2_print == $zero) { $invoice_price_2_print = ""; } else {  } ;
		 if ($invoice_price_3_print == $zero) { $invoice_price_3_print = ""; } else {  } ;
		 if ($invoice_price_4_print == $zero) { $invoice_price_4_print = ""; } else {  } ;
		 if ($invoice_price_5_print == $zero) { $invoice_price_5_print = ""; } else {  } ;
		
		$user_notes_replacement = str_replace("%bedrag%","$invoice_total_print","$user_notes");

	}?>
<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Factuur '.$invoice_name.'');

// disable header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();

// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = '../../uploads/bgs/'.$user_bg_pad.'';
$pdf->Image($img_file, 0, 130, 210, 170, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// create some HTML content


$html = '
<table border="0" cellspacing="0" cellpadding="0">
	<tr style="text-align:left;">
		<th><img src="../../uploads/logos/'.$user_logo_pad.'" border="0"  />
		</th>
		<th> </th>
</tr>
</table>

<table border="0" cellspacing="0" cellpadding="0">
<br />
<br />
<br />
<br />
</table>


<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<th>
			'.$invoice_name.'<br />
			'.$invoice_address.'<br />
			'.$invoice_zipcode.' '.$invoice_city.'<br />
			BTW: '.$invoice_btw.'<br />
		</th>
			<th> </th>
		<th align="left">
		<b>Datum: <br />
		Factuurnummer: <br />
		Adres: <br /><br />
		Website: <br />
		E-mail: <br />
		Telefoon: <br />
		<br />
		KVK: <br />
		BTW: <br />
		</b>

		</th>
		<th>
		'.$invoice_date.' <br />
		'.$invoice_number.' <br />
		'.$user_address.' <br />
		'.$user_zipcode.' '.$user_city.'<br />
		www.eyeopenersbranding.nl <br />
		info@eyeopenersbranding.nl <br />
		085 0021134<br />
		<br />
		'.$user_kvk .'<br />
		'.$user_btw.' <br />
		</th>
	</tr>
</table>
<br /><br /><br /><br /><br /><br />

<table border="0" cellspacing="5" cellpadding="0">
	<tr>
		<th align="left"><strong><h2>FACTUUR</h2></strong></th>
	</tr>
</table>

<table border="0" cellspacing="5" cellpadding="0">
	<tr>
		<th align="left"><strong>Omschrijving</strong></th>
		<th align="right"><strong>Prijs EUR</strong></th>
	</tr>
	<hr><tr><th></th></tr>
	<tr>
		<th align="left">
		'.$invoice_item_1.'<br />
		'.$invoice_item_2.'<br />
		'.$invoice_item_3.'<br />
		'.$invoice_item_4.'<br />
		'.$invoice_item_5.'<br />
		</th>
		<th align="right">
		'.$invoice_price_1_print.'<br />
		'.$invoice_price_2_print.'<br />
		'.$invoice_price_3_print.'<br />
		'.$invoice_price_4_print.'<br />
		'.$invoice_price_5_print.'<br />
		</th>
	</tr>
</table>


<table border="0" cellspacing="3" cellpadding="0">
<hr><tr><th></th></tr>
</table>


<table border="0" cellspacing="3" cellpadding="0">
<br />
<br />
<br />
<br />
<br />
	<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th>
			<strong>Subtotaal</strong> <br />
			<strong>21% BTW</strong> <br />
			<strong>Totaal</strong>
		</th>
		<th>
		€<br />
		€<br />
		<strong>€</strong>
		</th>
		<th align="right">
		'.$invoice_subtotal_print.'<br />
		'.$invoice_tax_print.'<br />
		<strong>'.$invoice_total_print.'</strong>
		</th>
	</tr>

</table>

<table border="0" cellspacing="5" cellpadding="0">
	<tr>
		<th align="left">
		<strong><br />
		'.$user_notes_replacement.'<br />
		</strong>

		</th>

	</tr>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('invoice_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
