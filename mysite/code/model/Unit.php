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
    $fields->addFieldToTab('Root.Main',
      new GridField(
        'Inspections',
        'Inspections',
        $this->Inspections(),
        GridFieldConfig_RecordViewer::create()
      ));
    return $fields;
  }
  private static $summary_fields = array(
    'UnitNum' => 'UnitNum'
  );

}
