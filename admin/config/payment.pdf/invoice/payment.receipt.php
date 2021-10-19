<?php
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

    if(!Input::checkInput('request', 'get', 1) OR !Input::checkInput('authtoken_', 'get', 1))
      Redirect::to(404);

    $_AUTH_TOKEN_ =   Input::get('authtoken_', 'get');

    if(!is_integer(($_PAYMENT_ID_   = Hash::decryptAuthToken($_AUTH_TOKEN_))))
        Redirect::to('');

    if(!($_PARTICIPANT_DATA_ = FutureEventController::getEventParticipantPaymentDataByID($_PAYMENT_ID_)))
        Redirect::to('');

    # Receipt
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
    $this->Cell(190, 11, $_PARTICIPANT_DATA_->participant_firstname.' '.$_PARTICIPANT_DATA_->participant_lastname ,0,1,'L');
    $this->Cell(190,1,'Cube communications Ltd',0,1,'L');
    $this->Cell(190,11, $_PARTICIPANT_DATA_->participant_city==''?'N/A':$_PARTICIPANT_DATA_->participant_city ,0,1,'L');
    $this->Cell(190,1, $_PARTICIPANT_DATA_->participant_country==''?'N/A':$_PARTICIPANT_DATA_->participant_country ,0,1,'L');
    $this->Cell(190,11,'+'. $_PARTICIPANT_DATA_->participant_telephone==''?'N/A':$_PARTICIPANT_DATA_->participant_telephone,0,1,'L');
    $this->Cell(190,1, $_PARTICIPANT_DATA_->participant_email==''?'N/A':$_PARTICIPANT_DATA_->participant_email,0,1,'L');
    $this->SetFont('arial','B',10);
    $this->Cell(190,15,'Receipt number: '.$_PARTICIPANT_DATA_->payment_receipt_id,0,1,'L');
   
    $this->cell(100,5,'',0,1,'L');
    $this->SetFont('arial','B',11);
    $this->Cell(140,7,'Description ',1,0,'L');
    $this->Cell(50,7,'Amount ',1,1,'R');

    $this->MultiCell(140,7, 'IUCN Africa Protected Areas  Congress (APAC) Registration fee '.$_PARTICIPANT_DATA_->participation_type_name.' '.$_PARTICIPANT_DATA_->participation_subtype_name."              \n  \n" ,1,'L');

    $this->Cell(140,7,'Total ',1,0,'R');
    $this->Cell(50,7, $_PARTICIPANT_DATA_->participation_subtype_currency.' '.$_PARTICIPANT_DATA_->participation_subtype_price ,1,1,'R');
    

  }



}
  $pdf=new myPDF();
  $pdf->AliasNbPages();
  $pdf->AddPage('P','A4',0);
  $pdf->viewTable();
  $pdf->Output();


 ?>
