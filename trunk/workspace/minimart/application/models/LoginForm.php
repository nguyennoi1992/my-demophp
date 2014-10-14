<?php
class Model_LoginForm extends Zend_Form
{
	public function init()
	{
		$email = $this->createElement('text','email');
		$email->setAttrib('class', 'form-control');
		$email->setLabel('Email: *')
		->setRequired(true);
		
		$password = $this->createElement('password','password');
		$password->setAttrib('class', 'form-control');
		$password->setLabel('Password: *')
		->setRequired(true);
		
		$signin = $this->createElement('submit','signin');
		$signin->setAttrib('class', 'btn btn-success');
		$signin->setLabel('Đăng nhập')
		->setIgnore(true);
		
		$this->addElements(array(
				$email,
				$password,
				$signin,
		));
	}
}