<?php
include dirname(__FILE__) . '/../../ASEngine/AS.php';

if (! app('login')->isLoggedIn()) {
    redirect("login.php");
}

$currentUser = app('current_user'); ?>
<?php
    $quotation_id = $_GET["id"];
    $userId = ASSession::get('user_id');
    $db = app('db');

    $result = $db->select(
    "SELECT * FROM `as_user_details` WHERE `user_id` = :id",
    array ("id" => $userId)
    );

      foreach($result as $row)
      {
      $user_logo_pad = $row['user_logo_pad'];
      $user_bg_pad = $row['user_bg_pad'];
    }

		//Je eigen id
		$result = $db->select(
		"SELECT * FROM `ivy_quotations` WHERE `quotation_id` = :id",
		array ("id" => $quotation_id)
		);

		if ($result)
		{

			foreach($result as $row)

			$quotation_id = $row['quotation_id'];
			$quotation_name = $row['quotation_name'];
			$quotation_address = $row['quotation_address'];
			$quotation_city = $row['quotation_city'];
			$quotation_zipcode = $row['quotation_zipcode'];

			$quotation_item_1 = $row['quotation_item_1'];
			$quotation_item_2 = $row['quotation_item_2'];
			$quotation_item_3 = $row['quotation_item_3'];
			$quotation_item_4 = $row['quotation_item_4'];
			$quotation_item_5 = $row['quotation_item_5'];

			$quotation_price_1 = $row['quotation_price_1'];
			$quotation_price_2 = $row['quotation_price_2'];
			$quotation_price_3 = $row['quotation_price_3'];
			$quotation_price_4 = $row['quotation_price_4'];
			$quotation_price_5 = $row['quotation_price_5'];

			$quotation_date = $row['quotation_date'];
			$quotation_person_id = $row['quotation_person_id'];
			$quotation_user_id = $row['quotation_user_id'];

			$tax = "0.21";
			$quotation_subtotal = $quotation_price_1 + $quotation_price_2 + $quotation_price_3 + $quotation_price_4 + $quotation_price_5;
			$quotation_tax = $quotation_subtotal * $tax;
			$quotation_total = $quotation_subtotal + $quotation_tax ;
		}
			else
			{
			echo"<h2>Oeps, er is iets misgegaan</h2>";
			die;
			}

	?>
<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Offerte '.$quotation_name.'');

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
			'.$quotation_name.'<br />
			'.$quotation_address.'<br />
			'.$quotation_zipcode.' '.$quotation_city.'<br />
		</th>
			<th> </th>
		<th align="left">
		<b>Datum: <br />
		Offertenummer: <br />
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
		'.$quotation_date.' <br />
		'.$quotation_id.' <br />
		Bredaseweg 108-A <br />
		4902 NS Oosterhout <br />
		www.eyeopenersbranding.nl <br />
		info@eyeopenersbranding.nl <br />
		085 0021134<br />
		<br />
		67118232 <br />
		NL221144985B02 <br />
		</th>
	</tr>
</table>
<br /><br /><br /><br /><br /><br />

<table border="0" cellspacing="5" cellpadding="0">
	<tr>
		<th align="left"><strong><h2>OFFERTE</h2></strong></th>
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
		'.$quotation_item_1.'<br />
		'.$quotation_item_2.'<br />
		'.$quotation_item_3.'<br />
		'.$quotation_item_4.'<br />
		'.$quotation_item_5.'<br />
		</th>
		<th align="right">
		'.$quotation_price_1.'<br />
		'.$quotation_price_2.'<br />
		'.$quotation_price_3.'<br />
		'.$quotation_price_4.'<br />
		'.$quotation_price_5.'<br />
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
		'.$quotation_subtotal.'<br />
		'.$quotation_tax.'<br />
		<strong>'.$quotation_total.'</strong>
		</th>
	</tr>

</table>

<table border="0" cellspacing="5" cellpadding="0">
	<tr>
		<th align="left">
		<strong><br />
		Hierbij ontvangt u van ons een vrijblijvende prijsopgave<br /> voor het leveren van de bovenstaande producten en diensten.<br />
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
