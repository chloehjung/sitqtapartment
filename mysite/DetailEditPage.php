<?php

class DetailEditPage extends Page{

}

#we want all css and fields used on this page
class DetailEditPage_Controller extends Page_Controller{
  private static $allowed_actions = array (
    'edit',
		'Form',
    'EditDetail'
	);
  public function edit(){
    if(!Member::CurrentUser()->inGroup('Administrators')){
      return $this->httpError(403, 'You do not have authority to edit');
    }
      return $this;

  }
  public function Form(){
    DateField::set_default_config('showcalendar', true);

    $id = $this->request->Param('ID');
    if(!$id){
      $id = $this->request->postVar('ID');
    }
    $inspection = Inspection::get()->byID($id);
    $loungeid = $inspection->LoungeID;
    $lounge = Lounge::get()->byID($loungeid);
    $kitchenid = $inspection->KitchenID;
    $kitchen = Kitchen::get()->byID($kitchenid);
    $bdrm1id = $inspection->Bedroom1ID;
    $bdrm1 = Bedroom::get()->byID($bdrm1id);
    $bdrm2id = $inspection->Bedroom2ID;
    $bdrm2 = Bedroom::get()->byID($bdrm2id);
    $bdrm3id = $inspection->Bedroom3ID;
    $bdrm3 = Bedroom::get()->byID($bdrm3id);
    $fields=FieldList::create(
      DropdownField::create('UnitID','UnitNum',singleton('Unit')->dbObject('UnitNum')->enumValues()),
      $date = new DateField('InspectionDate', 'Inspection Date')
    );
      $date->setConfig('dateformat', 'dd MMM y');
    $fields->OuterClass = 'form-group row';
    $fieldsLounge = singleton('Lounge')->getFrontEndFields();
    foreach($fieldsLounge as $field){
      $field->OuterClass = 'form-group col-md-3';
    }
    $fieldsLounge->insertAfter('LoungeComment',UploadField::create('LoungePics', 'LoungePics')
                                              ->setFolderName('Lounge Pictures')
                                              ->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif')));
    $fieldsLounge->fieldByName('LoungePics')->OuterClass = 'form-group col-md-12';
    $fieldsLounge->fieldByName('LoungeComment')->OuterClass = 'form-group col-md-12 bottom-comment';
    $fieldsLounge->insertBefore('LoungeFloor', LiteralField::create('divider','<div class="row blue-border">'));
    $fieldsLounge->insertBefore('LoungeFloor', HeaderField::create('2', 'Lounge'));
    $fieldsLounge->insertAfter('LoungePics', LiteralField::create('divider','</div>'));

    $fieldsKitchen = singleton('Kitchen')->getFrontEndFields();
    foreach($fieldsKitchen as $field){
      $field->OuterClass = 'form-group col-md-3';
    }
    $fieldsKitchen->insertAfter('KitchenComment',UploadField::create('KitchenPics', 'KitchenPics')
                                                ->setFolderName('Kitchen Pictures')
                                                ->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif')));
    $fieldsKitchen->fieldByName('KitchenPics')->OuterClass = 'form-group col-md-12';
    $fieldsKitchen->fieldByName('KitchenComment')->OuterClass = 'form-group col-md-12 bottom-comment';
    $fieldsKitchen->insertBefore('Oven', LiteralField::create('divider','<div class="row blue-border">'));
    $fieldsKitchen->insertBefore('Oven', HeaderField::create('2', 'Kitchen areas'));
    $fieldsKitchen->insertAfter('KitchenPics', LiteralField::create('divider','</div>'));

    $fieldsbr1 = singleton('Bedroom')->getFrontEndFields();
    $fieldsbr1->setValues($bdrm1->toMap());
    foreach($fieldsbr1 as $field){
      $field->Name = "BR1[".$field->Name."]";
      $field->OuterClass = 'form-group col-md-3';
    }
    $fieldsbr1->insertAfter('BR1[Comment]',UploadField::create('Bedroom1Pics', 'Bedroom1Pics')
                                              ->setFolderName('Bedroom1 Pictures')
                                              ->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif')));
    $fieldsbr1->fieldByName('Bedroom1Pics')->OuterClass = 'form-group col-md-12';
    $fieldsbr1->fieldByName('BR1[Comment]')->OuterClass = 'form-group col-md-12 bottom-comment';
    $fieldsbr1->insertBefore('BR1[Floor]', LiteralField::create('divider','<div class="row blue-border">'));
    $fieldsbr1->insertBefore('BR1[Floor]', HeaderField::create('2', 'Bedroom 1'));
    $fieldsbr1->insertAfter('Bedroom1Pics', LiteralField::create('divider','</div>'));

    $fieldsbr2 = singleton('Bedroom')->getFrontEndFields();
    $fieldsbr2->setValues($bdrm2->toMap());
    foreach($fieldsbr2 as $field){
      $field->Name = "BR2[".$field->Name."]";
      $field->OuterClass = 'form-group col-md-3';
    }
    $fieldsbr2->insertAfter('BR2[Comment]',UploadField::create('Bedroom2Pics', 'Bedroom2Pics')
                                              ->setFolderName('Bedroom2 Pictures')
                                              ->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif')));
    $fieldsbr2->fieldByName('Bedroom2Pics')->OuterClass = 'form-group col-md-12';
    $fieldsbr2->fieldByName('BR2[Comment]')->OuterClass = 'form-group col-md-12 bottom-comment';
    $fieldsbr2->insertBefore('BR2[Floor]', LiteralField::create('divider','<div class="row blue-border">'));
    $fieldsbr2->insertBefore('BR2[Floor]', HeaderField::create('2', 'Bedroom 2'));
    $fieldsbr2->insertAfter('Bedroom2Pics', LiteralField::create('divider','</div>'));

    $fieldsbr3 = singleton('Bedroom')->getFrontEndFields();
    $fieldsbr3->setValues($bdrm3->toMap());

    foreach($fieldsbr3 as $field){
      $field->Name = "BR3[".$field->Name."]";
      $field->OuterClass = 'form-group col-md-3';
    }
    $fieldsbr3->insertAfter('BR3[Comment]',UploadField::create('Bedroom3Pics', 'Bedroom3Pics')
                                              ->setFolderName('Bedroom3 Pictures')
                                              ->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif')));
    $fieldsbr3->fieldByName('Bedroom3Pics')->OuterClass = 'form-group col-md-12';
    $fieldsbr3->fieldByName('BR3[Comment]')->OuterClass = 'form-group col-md-12 bottom-comment';
    $fieldsbr3->insertBefore('BR3[Floor]', LiteralField::create('divider','<div class="row blue-border">'));
    $fieldsbr3->insertBefore('BR3[Floor]', HeaderField::create('2', 'Bedroom 3'));
    $fieldsbr3->insertAfter('Bedroom3Pics', LiteralField::create('divider','</div>'));

    $fields->merge($fieldsLounge);
    $fields->merge($fieldsKitchen);
    $fieldsbr1->merge($fieldsbr2);
    $fieldsbr1->merge($fieldsbr3);
    $fields ->merge($fieldsbr1);
    $fields->push(new CheckboxField('SmokeAlarms', 'Smoke alarm needs fixed?'));
    $fields->push(new TextareaField('DamageRepair','Any damages & repairs'));

    if($inspection){
      $fields->push(HiddenField::create('ID', '', $id));
      $fields->setValues($inspection->toMap());
      $fields->setValues($lounge->toMap());
      $fields->setValues($kitchen->toMap());
      $fields->fieldByName('LoungePics')->setValue(null, $inspection);
      $fields->fieldByName('KitchenPics')->setValue(null, $inspection);
      $fields->fieldByName('Bedroom1Pics')->setValue(null, $inspection);
      $fields->fieldByName('Bedroom2Pics')->setValue(null, $inspection);
      $fields->fieldByName('Bedroom3Pics')->setValue(null, $inspection);

      //set values on lounge and kitchen etc...

      // $picField = $fields->fieldByName('Pic');
      // $picField->setValue(null, $car);
    }

    $actions = FieldList::create(
      FormAction::create('EditDetail', 'Edit')
    );
    $form =  Form::create($this, 'Form', $fields, $actions);
    return $form;
  }

  function EditDetail($data, $form){
    //die('<pre>'.print_r($data, true));
    $inspection = Inspection::get()->byID($data['ID']);
    $form->saveInto($inspection);
    $inspection->write();
    $lounge = new Lounge();
    $lounge ->update($data);
    $lounge->write();
    $kitchen = new Kitchen();
    $kitchen->update($data);
    $kitchen->write();
    $bedroom1 = new Bedroom();
    $bedroom1 ->update($data['BR1']);
    $bedroom1 ->write();
    // print_r($bedroom1);
    // die();
    $bedroom2 = new Bedroom();
    $bedroom2 ->update($data['BR2']);
    $bedroom2 ->write();

    $bedroom3 = new Bedroom();
    $bedroom3 ->update($data['BR3']);
    $bedroom3 ->write();
    $inspection->LoungeID=$lounge->ID;
    $inspection->KitchenID=$kitchen->ID;
    $inspection->Bedroom1ID = $bedroom1->ID;
    $inspection->Bedroom2ID = $bedroom2->ID;
    $inspection->Bedroom3ID = $bedroom3->ID;
    $inspection->write();
    $this->redirect(InspectionListPage::get()->first()->Link());
  }

  public function init() {
		parent::init();
		if (! Member::currentUser()){
			Security::permissionFailure();
		}
	}

}
