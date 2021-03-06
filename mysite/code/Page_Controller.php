<?php

class Page_Controller extends ContentController
{
    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * );
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = array(
    );

    public function init()
    {
        parent::init();
        // if (! Member::currentUser()){
      	// 	return Security::permissionFailure($this);
      	// }
        // You can include any CSS or JS required by your project here.
        // See: http://doc.silverstripe.org/framework/en/reference/requirements
    }

    public function StatusMessage() {
    	if(Session::get('ActionMessage')) {
    		$message = Session::get('ActionMessage');
    		$status = Session::get('ActionStatus');

    		Session::clear('ActionStatus');
    		Session::clear('ActionMessage');

        $str='';
        $str.='<div class="message-'.$status.'">';
        $str.='<p>'.$message.'</p></div>';
        return $str;
    	}

    	return false;
    }
}
