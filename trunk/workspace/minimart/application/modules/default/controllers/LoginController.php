<?php

class LoginController extends Zend_Controller_Action
{

    private $_model;

    public function init ()
    {
        session_destroy();
        // Initialize action controller here
        $this->_model = new Model_DAO();
    }

    public function indexAction ()
    {
        // $messageUser='';
        // $messagePassword='';
      /*  $user = '';
        $password = '';
        $result = '';
        $this->view->message = '';
        if ($this->_request->getPost('user_id') == '') {
            $messageUser = 'a';
        } else {
            $user = $this->_request->getPost('user_id');
        }
        if ($this->_request->getPost('password') == '') {
            $messagePassword = 'a';
        } else {
            $password = $this->_request->getPost('password');
        }
        $result = $this->_model->executeSql('SPC_VALIDATE', array(
                $user,
                $password
        ));
        
        
       // print_r($result);
        if ($result[0][0]['code'] >= 1) {
            $_SESSION['permission']=$result[0][0]['code'];
            $_SESSION['userId']=$user;
            
            // $this->view -> message = "successfull";
            $userInfor=$this->_model->executeSql('SPC_GET_USER_BY_ID',array($user));
            $_SESSION['userId']=$userInfor[0][0]['user_id'];
            $_SESSION['userName']=$userInfor[0][0]['user_name'];
            $_SESSION['groupId']=$userInfor[0][0]['group_id'];
            if( $_SESSION['permission']==3){
            	$this->_redirect('S31');
            }else if($_SESSION['permission']==4){
            	$this->_redirect('S41');
            }else{
            	$this->_redirect('S112123');
            }
            die();
        }
        else if ($result[0][0]['code'] == -1)
            $this->view->message = "Error pass";
        else if ($result[0][0]['code'] == 0)
            $this->view->message = "Error user";*/
    }
}
