<?php
require('fpdf.php');
require('../../classes/general.class.php');
require('../../includes/functions.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('http://www.securityxpert.nl/uploads/images/Gallery/Evenementen-Sport/MHCN-Logo.jpg',10,6,20,20);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    $this->Cell(25);
    $this->SetTextColor(0,150,201);
    $this->Cell(0,8,'Voorraadbeheer',0,0,'L');
    $this->SetFont('Arial','B',10);
    $this->Cell(0,10,'Bestellijst',0,0,'R');
    $this->Ln(1);
    $this->SetFont('Arial','I',8);
    $this->Cell(25);
    $this->SetTextColor(243,131,32);
    $this->Cell(0,15,'Mixed Hockey Club Nieuwegein',0,0,'L');
    $this->SetTextColor(0,0,0);
    $this->Cell(0,15,'Week: '.date("W").'',0,0,'R');

    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',6);
    // Page number
    $this->Cell(0,0,'Pagina '.$this->PageNo().' van de {nb}',0,0,'L');
    $this->Cell(0,0,'Geprint op: '.date('d M Y H:i:s').' door '.$_SESSION['loggedin'].'',0,0,'R');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 8);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(20, 50, 30, 30, 30, 30));
$pdf->row(array('Artnum Lev.','Productnaam', 'Minimale voorraad', 'Huidige voorraad', 'Minimaal bestellen', 'Leverancier'));
$pdf->SetFont('Arial', '', 8);
foreach($product->getToOrder() as $key => $value) {
    $pdf->Row(array($value['leverancier_artnum'],$value['product_naam'],$value['product_minimaal'],$value['product_voorraad'],bestel_aantal($value['product_voorraad'], $value['product_minimaal'], $value['product_verpakking']),$leverancier->getName($value['leverancier_id'])));
}
$pdf->AliasNbPages();
$pdf->Output();
?>