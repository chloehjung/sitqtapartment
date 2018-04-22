<?php

class Kitchen extends DataObject{
  public static $db = array(
    'Oven' => 'Boolean',
    'HobHotPlates' => 'Boolean',
    'OvenExtractorHood' => 'Boolean',
    'Microwave' => 'Boolean',
    'Sink' => 'Boolean',
    'BenchTops' => 'Boolean',
    'DishWasher' => 'Boolean',
    'CupboardsDraws' => 'Boolean',
    'KitchenWalls' => 'Boolean',
    'RubbishBin' => 'Boolean',
    'KitchenFloor' => 'Boolean',
    'KitchenWindows' => 'Boolean',
    'Refrigerator' => 'Boolean',
    'KitchenSkirtingBoards' => 'Boolean',
    'LaundryStorageCuboards' => 'Boolean',
    'KitchenComment' => 'Text',
  );
  public static $summary_fileds = array(
      'Oven',
      'HobHotPlates',
      'Microwave',
      'Sink',
      'BenchTops',
      'DishWasher',
      'CupboardsDraws',
      'KitchenWalls',
      'RubbishBin',
      'KitchenFloor',
      'KithcenWindows',
      'Refrigerator',
      'KitchenSkirtingBoards',
      'LaundryStorageCuboards',
      'KitchenComment',
    );


}
