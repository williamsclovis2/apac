<?php
// require 'core/init.php';
// require 'core/FPDF/fpdf.php';

/**
 *
 */
class myPDF extends FPDF
{
  function header() {
//    $this->Image( LOGO_COMPANY, 130,6,50);
  }

  function footer() {
    $this->SetY(-15);
    $this->SetFont('cambria','B',14);
    $this->Cell(0,15,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    $this->Ln();
  }

  function viewTable() {

#Repport Divulgation
    $this->Cell(280,5,'',0,3,'C');
    $this->SetFont('arial','B',12);
    $this->Cell(280,6,'',0,4,'C');
    $this->Cell(280,6,'',0,4,'C');
    $this->Cell(290,2,'Liste des Agents',0,1,'C');
    $this->Ln();
    $this->SetFont('Times','',12);
    $this->Ln();

    $this->cell(285,5,'',0,1,'C');
    $this->SetFont('arial','B',12);
    $this->Cell(20,7,'No',1,0,'C');
    $this->Cell(60,7,' Matricule',1,0,'C');
    $this->Cell(60,7,'Noms',1,0,'C');
    $this->Cell(50,7,'Email',1,0,'C');
    $this->Cell(50,7,'Telephone',1,0,'C');
    $this->Cell(40,7,'Service',1,1,'C');

    $this->Cell(20,7,'',1,0,'C');
    $this->Cell(60,7,'',1,0,'C');
    $this->Cell(60,7,'',1,0,'C');
    $this->Cell(50,7,'',1,0,'C');
    $this->Cell(50,7,'',1,0,'C');
    $this->Cell(40,7,'',1,1,'C');

  }



}
  $pdf=new myPDF();
  $pdf->AliasNbPages();
  $pdf->AddPage('L','A4',0);
  $pdf->viewTable();
  $pdf->Output();


 ?>
