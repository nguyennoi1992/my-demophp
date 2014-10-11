<?php
class AccountController extends Zend_Controller_Action {
	public function newAction()
	{
		//$users = new Users();
		$form = new Model_Account();
		$this->view->form=$form;
		/*if($this->getRequest()->isPost()){
			if($form->isValid($_POST)){
				$data = $form->getValues();
				if($data['password'] != $data['confirmPassword']){
					$this->view->errorMessage = "Password and confirm password don’t match.";
					return;
				}
				unset($data['confirmPassword']);
				//$users->insert($data);
				$this->_redirect('account/new');
			}
		}*/
	}
}