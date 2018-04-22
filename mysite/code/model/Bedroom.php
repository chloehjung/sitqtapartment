<?php

class Bedroom extends DataObject{
  public static $db = array(
    'Floor' => 'Boolean',
    'Walls' => 'Boolean',
    'WindowSills' => 'Boolean',
    'Windows' => 'Boolean',
    'Wardrobes' => 'Boolean',
    'SkirtingBoards' => 'Boolean',
    'Blinds' => 'Boolean',
    'Toilets' => 'Boolean',
    'Shower' => 'Boolean',
    'BathroomFloor' => 'Boolean',
    'BasinVanityUnit' => 'Boolean',
    'Comment' => 'text'
  );
  public static $summary_fields = array(
    'Floor',
    'Walls',
    'WindowSills',
    'Windows',
    'Wardrobes',
    'SkirtingBoards',
    'Blinds',
    'Toilets',
    'Shower',
    'BathroomFloor',
    'BasinVanityUnit',
    'Comment'
  );

}
