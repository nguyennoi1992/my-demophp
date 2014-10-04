<?php
class IndexController extends Zend_Controller_Action {
    public function init() {
    	echo "init";
       // $this->_sess=new Zend_Session_Namespace();
        /* Initialize action controller here */
    }

    public function indexAction() {
        echo "index";
       
    }
    
}

