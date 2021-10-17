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
  }

  function viewTable() {

#Repport Divulgation
    $this->SetFont('arial','B',11);
    $this->Cell(190,6,'',0,4,'C');
    $this->Cell(190,16,'',0,4,'C');
    $this->Cell(190,5,'IUCN Africa Protected Areas Congress',0,1,'C');
    $this->SetFont('arial','',11);
    $this->Cell(190,5,'March 7th to 12th 2021, Kigali, Rwanda',0,1,'C');
    $this->SetFont('arial','',11);
    $this->Cell(190,5,'Email: info@apacongress.africa',0,1,'C');
    $this->Ln();
    $this->SetFont('arial','B',18);
    $this->Cell(190,5,'Invoice',0,1,'C');
    $this->Ln();
    $this->cell(190,0,'',1,1,'L');
    $this->Ln();
    $this->SetFont('arial','',11);
    $this->Cell(190,11,'Kambale Mulwahali Clovis',0,1,'L');
    $this->Cell(190,1,'Cube communications Ltd',0,1,'L');
    $this->Cell(190,11,'Kigali',0,1,'L');
    $this->Cell(190,1,'Rwanda',0,1,'L');
    $this->Cell(190,11,'+190784701793',0,1,'L');
    $this->Cell(190,1,'clovismul@gmail.com',0,1,'L');
    $this->SetFont('arial','B',11);
    $this->Cell(190,15,'Registration number : 14578562',0,1,'L');
    $this->SetFont('arial','',11);
    $this->Cell(135,5,'Invoice number: [BTAPAC0001]',0,0,'L');
    $this->Cell(0,5,'Invoice Date: [BTAPAC0001]',0,1,'C');
    $this->cell(100,5,'',0,1,'L');
    $this->SetFont('arial','B',11);
    $this->Cell(100,7,'Description ',1,0,'L');
    $this->Cell(90,7,'Amount ',1,1,'R');

    $this->Cell(100,40,'',1,0,'L');
    $this->Cell(90,40,'',1,1,'L');

    $this->Cell(100,7,'Total ',1,0,'R');
    $this->Cell(90,7,'$190 ',1,1,'L');

    $this->SetFont('arial','B',12);
    $this->Cell(190,12,'Payment Options',0,1,'L');
    $this->cell(190,0,'',1,1,'L');
    $this->Ln();
    $this->SetFont('arial','',10);
    $this->Cell(190,11,'Payments can be made in either US$ of RWF. There are three payment options:',0,1,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(190,1,'1.	By debit/credit card ',0,1,'L');
    $this->SetFont('arial','',10);
    $this->Cell(190,11,'- Payment is accepted by VISA and/or MasterCard credit card and can be made directly ',0,1,'L');
    $this->Cell(190,1,'- online through the registration system. ',0,1,'L');
   
    $this->Cell(190,11,'Upon completion of the registration process, your debit or credit card is charged immediately, and you ',0,1,'L');
    $this->Cell(190,1,' will receive a balance zero invoice (receipt) by e-mail. Please note that your monthly card statement will',0,1,'L');
    $this->Cell(190,11,' indicate payment made to the "Inaugural IUCN Africa Protected Areas Congress 2022".',0,1,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(190,11,'2.	By bank transfer:',0,1,'L');
    $this->SetFont('arial','',10);
    $this->Cell(190,1,'- You must quote as a reference your Registration number, first and last names.',0,1,'L');
    $this->Cell(190,11,'- Bank transfers are accepted in US$ or RWF only and the payee must cover all bank charges for the payment',0,1,'L');
    $this->Cell(190,1,'- Bank fees are the sole responsibility of the registrant and should be paid in addition to the registration fees. ',0,1,'L');
    
    $this->Cell(190,11,'- All bank transfers must clearly state the name of the participant and the invoice number,',0,1,'L');
    $this->Cell(190,1,' as unidentified bank transfers cannot be processed.',0,1,'L');
   
    $this->SetFont('arial','B',10);
    $this->Cell(190,20,'',0,1,'L');
    $this->Cell(190,12,'BANK TRANSFER DETAILS:',0,1,'L');
    $this->SetFont('arial','',10);
    $this->Cell(190,1,'Bank Name: ECOBANK RWANDA PLC ',0,1,'L');
    $this->Cell(190,11,'Bank Address: KN# AV4, AVENUE DE LA PAIX, P.O. BOX 3268, KIGALI, RWANDA ',0,1,'L');
    $this->Cell(190,1,'Swift Code: ECOCRWRW ',0,1,'L');
    $this->Cell(190,11,'Branch name: Main Branch (Headquarters)',0,1,'L');
    $this->Cell(190,1,'Beneficiary Name (on account): IUCN  APAC ',0,1,'L');
    $this->Cell(190,11,'Account number (USD): 6775017613',0,1,'L');
    $this->Cell(190,1,'Transfer reference: [Name and Invoice Number]',0,1,'L');
    $this->Cell(190,1,'',0,1,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(190,13,'3.	Mobile Money Transfer',0,1,'L');
    $this->SetFont('arial','B',10);
    $this->Cell(190,1,'Important Information:',0,1,'L');
    $this->SetFont('arial','',10);
    $this->Cell(190,11,'Payment must to be received within 15 days after completing the registration form; otherwise the registration  ',0,1,'L');
    $this->Cell(190,1,'will be cancelled. ',0,1,'L');
    $this->Cell(190,11,'Payments by bank transfer will only be possible until 15th January 2022. After this date, registrations can only',0,1,'L');
    $this->Cell(190,1,'be made with credit card payment. No cash payments can be accepted at the venue registration desk.',0,1,'L');
    $this->Cell(190,11,'For details on cancellation and refund, refer to the policy document.',0,1,'L');

  }



}
  $pdf=new myPDF();
  $pdf->AliasNbPages();
  $pdf->AddPage('P','A4',0);
  $pdf->viewTable();
  $pdf->Output();


 ?>
