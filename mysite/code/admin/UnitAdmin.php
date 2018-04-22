<?php

class UnitAdmin extends ModelAdmin{
  private static $managed_models = array(
    'Unit',
    'StudentEmail'
  );
  private static $url_segment = 'unitAdmin';
  private static $menu_titles = 'unit';
}
