<?php

class Unit extends DataObject{
  private static $db=[
    'UnitNum'=>'Enum("1,2,3,4,5,6,7,8,9")'
  ];

  public static $has_many=[
    'StudentEmails'=>'StudentEmail',
    'Inspections'=>'Inspection'
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();
    $fields->addFieldToTab('Root.Main',
      new GridField(
        'StudentEmails',
        'Student Email',
        $this->StudentEmails(),
        GridFieldConfig_RecordEditor::create()
      ));
    return $fields;
  }
  private static $summary_fields = array(
    'UnitNum' => 'UnitNum'
  );

  public function getStudentEmails(){
    $unitNum = $this->UnitNum;
    $str = "";
    $emails= StudentEmail::get()->filter(array(
      'UnitID'=>$unitNum
    ));
    foreach($emails as $email) {
      $str .= $email->Email;
      $str .= ", ";
    }
    // echo $str;
    return $str;
  }

  public function getStudentNames(){
    $unitNum = $this->UnitNum;
    $str = "";
    $emails= StudentEmail::get()->filter(array(
      'UnitID'=>$unitNum
    ));
    foreach($emails as $email) {
      $str .= $email->Name;
      $str .= "<br>";
    }
    // echo $str;
    return $str;
  }

  public function getStudentEmailsWithSpace(){
    $unitNum = $this->UnitNum;
    $str = "";
    $emails= StudentEmail::get()->filter(array(
      'UnitID'=>$unitNum
    ));
    foreach($emails as $email) {
      $str .= $email->Email;
      $str .= "<br>";
    }
    // echo $str;
    return $str;
  }

}
