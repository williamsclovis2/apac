<?php
/**
 *
 */
class myPDF extends FPDF
{

  function header() {
//    $this->Image(LOGO_HA, 130,6,50);
  }

  function footer() {
    $this->SetY(-15);
    $this->SetFont('cambria','B',14);
    $this->Cell(0,15,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    $this->Ln();
  }

  function viewTable() {
    $UserTable              = new \User;
    $session_user           = new \User;
    $App                    = new \App;
    $CDVServiceTable        = new \CDVServices;

    if($session_user->isLoggedIn()){
    	$session_user_data = $session_user->data();
    	$session_user_ID   = $session_user_data->id;

      $_Dictionary       = new \Properties($session_user_data->language);
    }

    if(!Input::checkInput('_id', 'get', 1) || !is_numeric(Input::get('_id', 'get'))):
      Redirect::to(404);
    endif;

    $_encryptedID_       = Input::get('_id', 'get');
    $_ID                 = (int)Hash::decryptToken($_encryptedID_);

    $UserTable->select("WHERE id =? LIMIT 1", array($_ID));
    if($UserTable->count()):
      foreach($UserTable->data() as $user_):
      endforeach;
    else:
      Redirect::to(404);
    endif;

#Report Agent Information
    $this->Cell(280,5,'',0,3,'C');
    $this->SetFont('arial','B',12);
    $this->Cell(280,6,'',0,4,'C');
    $this->Cell(280,6,'',0,4,'C');
    $this->Cell(290,2,'INFORMATION ABOUT AGENT',0,1,'C');
    $this->Ln();
    $this->SetFont('arial','B',12);
    $this->Ln();

    $this->Cell(280,5,'',0,4,'C');
    $this->Cell(50,2,'ABOUT AGENT',0,1,'L');
    $this->cell(285,5,'',0,1,'C');
    $this->SetFont('arial','',12);
    // $this->Cell(140,7,' Matricule',1,0,'C');
    // $this->Cell(140,7,'',1,1,'C');

    $this->SetFont('arial','',12);
    $this->Cell(140,7, ' '. $_Dictionary->string('names'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7, $user_->firstname.' '.$user_->lastname.' '.$user_->surname ,1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' Sex',1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7, $user_->gender,1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '. $_Dictionary->words('date of birth'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7, date_format(date_create($user_->date_of_birth), 'd/m/Y'),1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '. $_Dictionary->string('marital-status'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7, $_Dictionary->words($App->findMaritalStatus($user_->marital_status_id, 'name')),1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '. $_Dictionary->string('nationality'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7,'Congolese',1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' Niveau d\'Etude',1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7,'',1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '. $_Dictionary->string('id-number'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7, $user_->id_number,1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '.$_Dictionary->string('services'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7, $CDVServiceTable->find($user_->service_id, 'name'),1,1,'L');

    // $this->SetFont('arial','',12);
    // $this->Cell(140,7,'Bureau',1,0,'L');
    // $this->SetFont('arial','B',12);
    // $this->Cell(140,7,'',1,1,'L');
    //
    // $this->SetFont('arial','',12);
    // $this->Cell(140,7,'Fonction',1,0,'L');
    // $this->SetFont('arial','B',12);
    // $this->Cell(140,7,'',1,1,'L');

    $this->Cell(280,9,'',0,4,'C');
    $this->Cell(80,2,'CONTACT AND ADDRESS OF THE AGENT',0,1,'L');
    $this->cell(285,5,'',0,1,'L');
    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '. $_Dictionary->words('email'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7, $user_->email,1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '.$_Dictionary->words('telephone 1/ 2'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7,$user_->telephone_1.'/ '.$user_->telephone_1,1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '.$_Dictionary->words('province/ city'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7,'',1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '.$_Dictionary->words('commune'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7,'',1,1,'L');

    $this->SetFont('arial','',12);
    $this->Cell(140,7,' '.$_Dictionary->words('district/ avenue/ No.'),1,0,'L');
    $this->SetFont('arial','B',12);
    $this->Cell(140,7, $user_->district.'/ '.$user_->avenue.'/ '.$user_->house_number,1,1,'L');

  }

}
  $pdf = new \myPDF();
  $pdf->AliasNbPages();
  $pdf->AddPage('L','A4',0);
  $pdf->viewTable();
  $pdf->Output();


 ?>
