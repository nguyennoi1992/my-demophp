<?php
class IndexController extends Zend_Controller_Action {

    /*
     *
     *
     */
    
    public function init() {
       // $this->_sess=new Zend_Session_Namespace();
        /* Initialize action controller here */
        // $model = new Model_DBCommon();
        //$query=$model->getSql('SPC_GET_LIST_USER');
        // $resuilt=$model->selectDB('test','id');

        // print_r($resuilt);
       // "query:".$query;

        
        $this->_model = new Model_DAO();
        $baseurl = $this->_request->getbaseurl ();
        Zend_Registry::set('baseurl', $baseurl);


        $this->view->baseurl = $baseurl;
        $this->view->icon_vn=$baseurl . "/templates/client/images/icon_vn.png";
        $this->view->icon_ja=$baseurl . "/templates/client/images/icon_ja.png";
        $this->view->icon_en=$baseurl . "/templates/client/images/icon_en.png";

        $this->view->headLink ()->appendStylesheet ( $baseurl . "/templates/default/script/styleNews.css" );
        $this->view->headLink ()->appendStylesheet ( $baseurl . "/templates/default/script/boxy.css" );       
        $this->view->headLink ()->appendStylesheet ( $baseurl . "/templates/default/script/styleNews.css" );
        $this->view->headLink ()->appendStylesheet ( $baseurl . "/templates/default/script/fancybox.css" );       
        $this->view->headLink ()->appendStylesheet ( $baseurl . "/templates/default/script/bootstrap.min.css" );       

        $this->view->headscript ()->appendFile ( $baseurl . "/templates/default/js/analytics.js", "text/javascript" );
        $this->view->headscript ()->appendFile ( $baseurl . "/templates/default/js/jquery.js", "text/javascript" );
        $this->view->headscript ()->appendFile ( $baseurl . "/templates/default/js/fancybox.js", "text/javascript" );
        $this->view->headscript ()->appendFile ( $baseurl . "/templates/default/js/common.js", "text/javascript" );
        echo $baseurl;
        $this->view->headscript ()->appendFile ( $baseurl . "/templates/default/js/bootstrap.min.js", "text/javascript" );
        $this->view->headscript ()->appendFile ( $baseurl . "/templates/default/js/common_002.js", "text/javascript" );
        $this->view->headscript ()->appendFile ( $baseurl . "/templates/includes/js/common.js", "text/javascript" );
        $this->view->headscript ()->appendFile ( $baseurl . "/templates/includes/js/swfobject.js", "text/javascript" );

    }

    /*
     *
     *
     */

    public function indexAction() {
        $model = new Model_DBCommon();
        $this->view->model_ = new Model_DBCommon();
        $this->view->data_category=$model->execQuery('CALL GET_ALL_CATEGORY');
        // $this->view->data_product_type=$model->execQuery('CALL GET_PRODUC_TYPE_BY_CATEGORY_ID(0)');
    }
    
}

