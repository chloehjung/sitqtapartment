<?php

use Dompdf\Dompdf;

class Inspection extends DataObject {
  public static $db = array(
    'InspectionDate' => 'date',
    'SmokeAlarms' => 'Boolean',
    'DamageRepair' => 'varchar(255)'
  );

  public static $summary_fileds = array(
    'Unit',
    'InspectionDate',
    'SmokeAlarms',
    'DamageRepair'
  );

  public static $has_one = array(
    'Unit'=>'Unit',
    'Lounge'=>'Lounge',
    'Kitchen'=>'Kitchen',
    'Bedroom1'=>'Bedroom',
    'Bedroom2'=>'Bedroom',
    'Bedroom3'=>'Bedroom'
  );

  public static $many_many = array(
    'UploadedPics'=>'Image'
  );

  public function GetPictures(){
    return $this->UploadedPics;
  }

  public function EditLink(){
    return Controller::join_links(
    DetailEditPage::get()->first()->link(),
    "edit/",
    $this->ID
    );

  }

  public function DeleteLink(){
    return Controller::join_links(
    InspectionListPage::get()->first()->link(),
    "delete/",
    $this->ID
    );

  }


  public function ListRoomCleaning($room){
    $fields =array_keys($this->$room()->db());
    $value =$this->$room()->db();
    $str = '';
    $str .= '<table class="styled-table">';
    foreach($fields as $field){
      $str .= '<tr>';
      preg_match_all('/((?:^|[A-Z])[a-z]+)/',$field,$fieldName);
      $spaceSeparated = implode(" ", $fieldName[0]);
      if($this->$room()->$field) {
        // print_r($value[$field]);
        if($value[$field]=="Boolean"){
          $str .= '<td >'.$spaceSeparated.'</td><td style="color:red;">Needs cleaning</td>';

        }
      }
      else{
        if($value[$field]=="Boolean"){
          $str .= '<td>'.$spaceSeparated.'</td><td>Clean </td>';
        }
      }
      $str .= '</tr>';
    }
    $str .= '</table>';
    return $str;
  }


  public function ListKitchenCleaning(){
    $fields = array_keys($this->Kitchen()->db());
    $value = $this->Kitchen()->db();
    // print_r($value);
    $str = '';
    $str .= '<table class="styled-table">';
    foreach($fields as $field){
      $str .= '<tr>';
      preg_match_all('/((?:^|[A-Z])[a-z]+)/',$field,$fieldName);
      $spaceSeparated = implode(" ", $fieldName[0]);
      if($this->Kitchen()->$field) {

        if($value[$field]=="Boolean"){
          $str .= '<td >'.$spaceSeparated.'</td><td style="color:red;">Needs cleaning</td>';
        }
      }
      else{
        if($value[$field]=="Boolean"){
          $str .= '<td>'.$spaceSeparated.'</td><td>Clean </td>';
        }
      }
      $str .= '</tr>';
    }
    $str .= '</table>';
    return $str;
  }

  public function ListLoungeCleaning(){
    $fields = array_keys($this->Lounge()->db());
    $value = $this->Lounge()->db();
    // print_r($value);
    $str = '';
    $str .= '<table class="styled-table">';
    foreach($fields as $field){
      $str .= '<tr>';
      preg_match_all('/((?:^|[A-Z])[a-z]+)/',$field,$fieldName);
      $spaceSeparated = implode(" ", $fieldName[0]);
      if($this->Lounge()->$field) {
        if($value[$field]=="Boolean"){
          $str .= '<td >'.$spaceSeparated.'</td><td style="color:red;">Needs cleaning</td>';
        }
      }
      else{
        if($value[$field]=="Boolean"){
          $str .= '<td>'.$spaceSeparated.'</td><td>Clean </td>';

        }
      }
      $str .= '</tr>';
    }
    $str .= '</table>';
    return $str;
  }

  public function IsAdmin(){
    False;
    if(Member::currentUser()->inGroup('Inspection-admin')){
      return True;
    }
  }

}
