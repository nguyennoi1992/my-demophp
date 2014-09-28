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
        
    }
}

