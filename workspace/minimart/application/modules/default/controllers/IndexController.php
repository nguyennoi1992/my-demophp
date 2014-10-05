<?php
class IndexController extends Zend_Controller_Action {
    public function init() {
       // $this->_sess=new Zend_Session_Namespace();
        /* Initialize action controller here */
    	$model = new Model_DBCommon();
        //$query=$model->getSql('SPC_GET_LIST_USER');
        $resuilt=$model->selectDB('test','id');
      
        print_r($resuilt);
       // echo "query:".$query;
       
    }

    public function indexAction() {
        echo "ok";
    }
    
}

