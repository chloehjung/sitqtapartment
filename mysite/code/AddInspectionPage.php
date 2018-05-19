<?php

class AddInspectionPage extends Page{

}

class AddInspectionPage_Controller extends Page_Controller{
  private static $allowed_actions = array (
		'Form',
    'AddInspection'
	);
  function Form(){
      DateField::set_default_config('showcalendar', true);


      $fields=FieldList::create(
        DropdownField::create('UnitID','UnitNum',singleton('Unit')->dbObject('UnitNum')->enumValues()),
        $date = new DateField('InspectionDate', 'Inspection Date')
      );
      $fields->OuterClass = 'form-group row';
      $date->setConfig('dateformat', 'dd MMM y');
      $date->setValue(date('jS M Y'));
      //default date??
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
      // $fieldsLounge = new CompositeField($fieldsLounge);
      // $fieldsLounge->OuterClass = '';


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
      // $fieldsKitchen = new CompositeField($fieldsKitchen);
      // $fieldsKitchen->OuterClass = '';

      $fieldsbr1 = singleton('Bedroom')->getFrontEndFields();

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
      // $fieldsbr1 = new CompositeField($fieldsbr1);
      // $fieldsbr1->OuterClass = '';

      $fieldsbr2 = singleton('Bedroom')->getFrontEndFields();
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
      $fields->insertAfter('DamageRepair', LiteralField::create('divider','<div id="details"></div>'));


      $actions = FieldList::create(
        FormAction::create('AddInspection', 'Add')
      );
      // echo '<pre>';
      // print_r($fields);
      $required = new RequiredFields(array(
        'InspectionDate', 'UnitNum'
      ));
      return Form::create($this, 'Form', $fields, $actions, $required);

  }
  function AddInspection($data, $form){
    // print_r($data);
    // die();
    $inspection = new Inspection();
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
    // Session::set('ActionStatus', 'success');
    // Session::set('ActionMessage', 'Inspection Added');
    $form->addErrorMessage('Form','Inspection Added', 'good');
    $this->redirectBack();
  }

  public function init() {
		parent::init();
		if (! Member::currentUser()){
			Security::permissionFailure($this);
		}
	}
}
