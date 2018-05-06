<?php

class StudentEmail extends DataObject{
  private static $db = array(
    'Name'=>'Text',
    'Email'=>'Text'
  );

  private static $has_one = [
    'Unit'=>'Unit'
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->replaceField('Email',new EmailField('Email'));
    return $fields;
  }

  private static $summary_fields = array(
    'Name'=>'Name',
    'Email' => 'Email'
  );

}
