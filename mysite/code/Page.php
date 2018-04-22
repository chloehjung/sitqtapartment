<?php

class Page extends SiteTree
{
    private static $db = array(
      'Icon'=>'Text'
    );

    private static $has_one = array(
    );

    public function getCMSFields(){
      $fields = parent::getCMSFields();
      $fields->addFieldToTab('Root.Main',new TextField('Icon'),'Content');
      return $fields;
    }
}
