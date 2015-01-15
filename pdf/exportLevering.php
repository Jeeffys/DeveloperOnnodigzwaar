<?php
require('fpdf.php');
require('../../classes/general.class.php');
require('../../includes/functions.php');

$levering_id = $_GET['levering_id'];

class PDF extends FPDF
{
// Page header
function Header()
{
    $this->Ln(4);
    // Logo
    $this->Image('http://www.securityxpert.nl/uploads/images/Gallery/Evenementen-Sport/MHCN-Logo.jpg',10,10,20,20);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    $this->Cell(25);
    $this->SetTextColor(0,150,201);
    $this->Cell(0,8,'Voorraadbeheer',0,0,'L');
    $this->SetFont('Arial','B',10);
    $this->Cell(0,10,'Levering #'.$_GET['levering_id'].'',0,0,'R');
    $this->Ln(1);
    $this->SetFont('Arial','I',8);
    $this->Cell(25);
    $this->SetTextColor(243,131,32);
    $this->Cell(0,15,'Mixed Hockey Club Nieuwegein',0,0,'L');
    $this->SetTextColor(0,0,0);
    // Line break
    $this->Ln(22);
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
$pdf->SetFont('Arial', 'B', 7);
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetWidths(array(190));
    $pdf->row(array($leverancier->getName($levering->getLeverancier($levering_id)).' - '. date("d-m-Y", strtotime($levering->getDatum($_GET['levering_id'])))));
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetWidths(array(60, 70, 60));
    $pdf->row(array('Lev. Artnum','Productnaam', 'Aantal'));
    foreach($levering->getLeveringItems($levering_id) as $key => $value) {
        $pdf->SetFont('Arial', '', 8);
        $pdf->row(array($product->getLevArtnum($value['product_id']), $product->getName($value['product_id']), $value['aantal']." (".$value['aantal'] * $product->getVerpakking($value['product_id'])." stuks)"));
    }
$pdf->AliasNbPages();
$pdf->Output();
?>