<?php

class UnitListPage extends Page{
  public function init() {
		parent::init();
		if (! Member::currentUser()){
			Security::permissionFailure();
		}
	}
}

class UnitListPage_Controller extends Page_Controller{
  private static $allowed_actions = array (
		'Form',
    'getUnit'
	);
  function Form(){
    $fields=FieldList::create(
      DropdownField::create('UnitID','UnitNum',singleton('Unit')->dbObject('UnitNum')->enumValues())
    );

    $actions = FieldList::create(
      FormAction::create('getUnit', 'Go')
    );
    return Form::create($this, 'Form', $fields, $actions);
  }
  function getUnit($data,$form){
    return $this->redirect('list/inspection-list/unit/'.$data[UnitID].'/');
  }

  public function init() {
		parent::init();
		if (! Member::currentUser()){
			Security::permissionFailure();
		}
	}

}
