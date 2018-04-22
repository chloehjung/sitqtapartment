<?php

use Dompdf\Dompdf;


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
    'pdf'
  );
  public function GetAllInspections($unit = null){
    $id = $this->request->Param('ID');
    if ($id !=null){
      return Inspection::get()->filter(array('Unit.UnitNum'=>$id));
    }
    return Inspection::get();
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

  public function pdf(){
    $id = $this->request->Param('ID');
    $viewDetails = Inspection::get()->byID($id);
    $dompdf = new Dompdf();
    $dompdf->loadHTML($this->customise(new ArrayData(array(
      'Inspection' => $viewDetails
    )))->renderWith("pdfTemplate"));
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    return $dompdf->stream();
  }

  public function init() {
		parent::init();
		if (! Member::currentUser()){
			Security::permissionFailure();
		}
	}


}
