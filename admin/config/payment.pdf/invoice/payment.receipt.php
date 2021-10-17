<?php
// require 'core/init.php';
// require 'core/FPDF/fpdf.php';

/**
 *
 */
class myPDF extends FPDF
{
  function header() {
    $this->Image( VIEW_LOGO_APAC, 80,6,40);
  }

  function footer() {
    $this->SetY(-15);
    $this->SetFont('cambria','B',14);
    $this->Cell(0,15,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    $this->Ln();
  }

  function viewTable() {

#Repport Divulgation
    $this->SetFont('arial','B',12);
    $this->Cell(190,6,'',0,4,'C');
    $this->Cell(190,16,'',0,4,'C');
    $this->Cell(190,5,'IUCN Africa Protected Areas Congress',0,1,'C');
    $this->SetFont('arial','',11);
    $this->Cell(190,5,'March 7th to 12th 2021, Kigali, Rwanda',0,1,'C');
    $this->SetFont('arial','',10);
    $this->Cell(190,5,'Email: info@apacongress.africa',0,1,'C');
    $this->Ln();
    $this->SetFont('arial','B',18);
    $this->Cell(190,5,'Receipt',0,1,'C');
    $this->Ln();
    $this->cell(190,0,'',1,1,'L');
    $this->Ln();
    $this->SetFont('arial','',10);
    $this->Cell(190,11,'Kambale Mulwahali Clovis',0,1,'L');
    $this->Cell(190,1,'Cube communications Ltd',0,1,'L');
    $this->Cell(190,11,'Kigali',0,1,'L');
    $this->Cell(190,1,'Rwanda',0,1,'L');
    $this->Cell(190,11,'+190784701793',0,1,'L');
    $this->Cell(190,1,'clovismul@gmail.com',0,1,'L');
    $this->SetFont('arial','B',10);
    $this->Cell(190,15,'Receipt number: [RTAPAC0001]',0,1,'L');
   
    $this->cell(100,5,'',0,1,'L');
    $this->SetFont('arial','B',10);
    $this->Cell(100,7,'Description ',1,0,'L');
    $this->Cell(90,7,'Amount ',1,1,'R');
    $this->SetFont('arial','b',10);
    $this->Cell(100,40,'description',1,0,'L');
    $this->Cell(90,40,'',1,1,'L');

    $this->Cell(100,7,'Total ',1,0,'R');
    $this->Cell(90,7,'$190 ',1,0,'L');
    

  }



}
  $pdf=new myPDF();
  $pdf->AliasNbPages();
  $pdf->AddPage('P','A4',0);
  $pdf->viewTable();
  $pdf->Output();


 ?>
