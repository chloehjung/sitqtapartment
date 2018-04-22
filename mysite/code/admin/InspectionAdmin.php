<?php

class InspectionAdmin extends ModelAdmin{
  private static $managed_models = array(
    'Inspection',
    'Bedroom',
    'Kitchen',
    'Lounge'
  );
  private static $url_segment = 'roominspection';
  private static $menu_titles = 'Room';

}
