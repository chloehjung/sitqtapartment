<?php

class HomePage extends Page{

}

class HomePage_Controller extends Page_Controller{
  public function init() {
    parent::init();
    if (! Member::currentUser()){
      return Security::permissionFailure();
    }
  }
}
