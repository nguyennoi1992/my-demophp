<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
    protected function _initAutoload(){
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
                'basePath' => APPLICATION_PATH,
                'namespace' => '',
                'resourceTypes' => array(
                        'model' => array(
                                'path' => 'models/',
                                'namespace' => 'Model_'
                        )
                )
        ));
        Zend_Loader_Autoloader::getInstance()->registerNamespace('PHPExcel_');
       
        Zend_Session::start();
        
        Zend_Layout::startMvc();
        $front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new Zend_Controller_Plugin_ErrorHandler(array(
                                'module'     => 'error',
                                'controller' => 'error',
                                'action'     => 'error'
        )));
        
    }
    protected function _initDatabase(){
    	$db=$this->getPluginResource('db')->getDbAdapter();
    	Zend_Registry::set('db',$db);
    }
}

