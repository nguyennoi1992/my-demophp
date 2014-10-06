<?php
class IndexController extends Zend_Controller_Action {
    public function init() {
       // $this->_sess=new Zend_Session_Namespace();
        /* Initialize action controller here */
        $model = new Model_DBCommon();
        //$query=$model->getSql('SPC_GET_LIST_USER');
        // $resuilt=$model->selectDB('test','id');

        // print_r($resuilt);
       // echo "query:".$query;

        $baseurl = $this->_request->getbaseurl ();
        $this->_model = new Model_DAO();
        $baseurl = $this->_request->getbaseurl ();
        Zend_Registry::set('baseurl', $baseurl);
        
        $this->view->baseurl = $baseurl;
        $this->view->icon_vn=$baseurl."/templates/client/images/icon_vn.png";
        $this->view->icon_ja=$baseurl."/templates/client/images/icon_ja.png";
        $this->view->icon_en=$baseurl."/templates/client/images/icon_en.png";

        echo $this->view->headLink ()->appendStylesheet ( $baseurl."/templates/default/script/styleNews.css" );
        echo $this->view->headLink ()->appendStylesheet ( $baseurl."/templates/default/script/boxy.css" );       
        echo $this->view->headLink ()->appendStylesheet ( $baseurl."/templates/default/script/styleNews.css" );
        echo $this->view->headLink ()->appendStylesheet ( $baseurl."/templates/default/script/fancybox.css" );       

        echo $this->view->headscript ()->appendFile ( $baseurl."/templates/default/js/jquery.js", "text/javascript" );
        echo $this->view->headscript ()->appendFile ( $baseurl."/templates/default/js/fancybox.js", "text/javascript" );
        echo $this->view->headscript ()->appendFile ( $baseurl."/templates/default/js/common.js", "text/javascript" );
        echo $this->view->headscript ()->appendFile ( $baseurl."/templates/includes/js/common.js", "text/javascript" );
        echo $this->view->headscript ()->appendFile ( $baseurl."/templates/includes/js/swfobject.js", "text/javascript" );

    }

    public function indexAction() {
        // echo "ok";
    }
    
}

