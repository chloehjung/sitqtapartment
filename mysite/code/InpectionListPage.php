<?php

use Dompdf\Dompdf;
use Dompdf\Options;

class InspectionListPage extends Page{
  private static $db = array(
    'unitNum'=>'Text'
	);

}

class InspectionListPage_Controller extends Page_Controller{
  private static $allowed_actions = array(
    'view',
    'delete',
    'unit',
    'mailpdf',
    'downloadpdf'
  );

  public function GetAllInspections($unit = null){
    $id = $this->request->Param('ID');
    if ($id !=null){
      return Inspection::get()->filter(array('Unit.UnitNum'=>$id))->sort('InspectionDate','DESC');
    }
    return Inspection::get()->sort('InspectionDate','DESC');
  }

  public function unit(){
    $id = $this->request->Param('ID');

    return $this->customise(array(
      'InspectionByUnit' => $id
    ))->renderWith(array("UnitTemplate","Page"));
  }


  public function delete(){
    //debugging
    // echo '<pre>';

    // print_r($this->request);
    if(!Member::CurrentUser()->inGroup('Administrators')){
      return $this->httpError(403, 'You do not have authority to delete');
    }

    $id = $this->request->Param('ID');
    $inspectionToDelete = Inspection::get()->byID($id);
    $inspectionToDelete->delete();
    $this->redirect(InspectionListPage::get()->first()->Link());

  }

  public function view(){
    $id = $this->request->Param('ID');
    $viewDetails = Inspection::get()->byID($id);
    return $this->customise(new ArrayData(array(
      'Inspection' => $viewDetails
    )))->renderWith(array("ViewTemplate","Page"));
  }

  public function mailpdf(){
    $id = $this->request->Param('ID');
    $viewDetails = Inspection::get()->byID($id);
    $dompdf = new Dompdf();
    $dompdf->output();
    $dompdf->loadHTML($this->customise(new ArrayData(array(
      'Inspection' => $viewDetails
    )))->renderWith("pdfTemplate"));
    $dompdf->set_option('isRemoteEnabled', TRUE);
    $dompdf->set_option('debugKeepTemp', TRUE);
    $dompdf->set_option('isHtml5ParserEnabled', TRUE);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    $unit = Unit::get()->byID($viewDetails->UnitID);
    $emailTo = $unit->getStudentEmails();

    $from = 'no-reply@mysite.com';
    $to = $emailTo;
    $subject = 'Inspection result for Unit'.$id.' on '.$viewDetails->InspectionDate;
    $body = 'Hi there, Please see the file attached.';
    $email = new Email($from, $to, $subject, $body);
    $email->attachFileFromString($dompdf->output(), 'Unit'.$id.$viewDetails->InspectionDate.'.pdf');
    $email->send();

    $this->redirectBack();
    // return $dompdf->stream();
  }

  public function downloadpdf(){
    $id = $this->request->Param('ID');
    $viewDetails = Inspection::get()->byID($id);
    $dompdf = new Dompdf();
    $dompdf->output();
    $dompdf->loadHTML($this->customise(new ArrayData(array(
      'Inspection' => $viewDetails
    )))->renderWith("pdfTemplate"));
    $dompdf->set_option('isRemoteEnabled', TRUE);
    $dompdf->set_option('debugKeepTemp', TRUE);
    $dompdf->set_option('isHtml5ParserEnabled', TRUE);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('Unit'.$id.'-'.$viewDetails->InspectionDate.'.pdf');
  }

  public function init() {
		parent::init();
		if (! Member::currentUser()){
			Security::permissionFailure();
		}
	}


}
