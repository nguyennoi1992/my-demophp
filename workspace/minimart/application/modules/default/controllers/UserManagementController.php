<?php
class UserManagementController extends Zend_Controller_Action {
	public function init(){
		$baseurl = $this->_request->getbaseurl ();
		$this->view->headLink ()->appendStylesheet ( $baseurl . "/templates/client/css/styles.css" );
      
        $this->view->headscript ()->appendFile ( $baseurl . "/templates/client/js/jquery.js", "text/javascript" );
        $this->view->headscript ()->appendFile ( $baseurl . "/templates/client/js/jquery-2.1.1.min.js", "text/javascript" );
	}
	public function indexAction(){
		$model=new Model_DBCommon();
		$sql='CALL SPC_GET_LIST_USER_INFO()';
		$listUserInfor=$model->execQuery($sql);
		$this->view->listUser=$listUserInfor;
		//print_r($listUserInfor);
	}
}