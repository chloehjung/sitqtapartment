<?php

class Lounge extends DataObject{
  public static $db = array(
    'LoungeFloor' => 'Boolean',
    'Couches' => 'Boolean',
    'WindowSills' => 'Boolean',
    'LoungeWindows' => 'Boolean',
    'LoungeWalls' => 'Boolean',
    'LoungeSkirtingBoards' => 'Boolean',
    'TableChairs' => 'Boolean',
    'Blinds' => 'Boolean',
    'FrontPorchLanding' => 'Boolean',
    'LoungeComment' => 'Text',
  );
  public static $summary_fields=array(
    'LoungeFloor',
    'Couches',
    'WindowSills',
    'LoungeWindows',
    'LoungeWalls',
    'LoungeSkirtingBoards',
    'TableChairs',
    'Blinds',
    'FrontPorchLanding',
    'LoungeComment',
  );

  // public function getFrontEndFields(){
  //   $fields = FieldList::create(
  //     CheckboxSetField::create('Lounge', '', [
  //       'LoungeFloor'=>'Lounge Floor',
  //       'Couches'=>'Couches',
  //       'WindowSills'=>'Window Sills',
  //       'LoungeWindows'=>'Lounge Windows',
  //       'LoungeWalls'=>'Lounge Walls',
  //       'LoungeSkirtingBoards'=>'Lounge Skirting Boards',
  //       'TableChairs'=>'Table/Chairs',
  //       'Blinds'=>'Blinds',
  //       'FrontPorchLanding'=>'Front Porch Landing',
  //     ]),
  //     TextareaField::create(
  //       'LoungeComment',
  //       'LoungeComment'
  //     )
  //   );
  //   return $fields;
  // }
}
