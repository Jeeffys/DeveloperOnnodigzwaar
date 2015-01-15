<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{

    //Vars
    $datum = date('Y', strtotime('-1 year')).'-'.date('Y');
    $crebonummer = '00003';
    $kwalificatie = 'XXXXXX';

    //Koptekst
    $this->SetFont('Arial','B',5);
    $this->SetTextColor(0,0,0);
    $this->Cell(0,15,'BEOORDELINGSFORMULIEREN '.$datum.' / CREBONUMMER '.$crebonummer.' - KWALIFICATIE '.$kwalificatie.'',0,0,'L');
    $this->Ln();
    $this->SetFillColor(255, 255, 255);
    $this->SetDrawColor(0, 0, 0);
    $this->SetWidths(array(70, 70));
    $this->row(array('Datum afname beoordeling','Examennummer/naam kandidaat'));
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
$pdf->AliasNbPages();
$pdf->Output();
?>