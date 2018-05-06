<?php

class UnitPage extends Page{

}

class UnitPage_Controller extends Page_Controller{
  public function init() {
    parent::init();
    if (! Member::currentUser()){
      Security::permissionFailure();
    }
  }

  public function getUnits(){
    return Unit::get();
  }
}
