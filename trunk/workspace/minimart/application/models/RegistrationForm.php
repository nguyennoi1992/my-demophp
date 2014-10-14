<?php
class Model_RegistrationForm extends Zend_Form
{
	public function init()
	{
		$email = $this->createElement('text','email');
		$email->setAttrib('class', 'form-control');
		$email->setLabel('Địa chỉ email: *')
		->setRequired(true);
		
		$password = $this->createElement('password','password');
		$password->setAttrib('class', 'form-control');
		$password->setLabel('Mật khẩu: *')
		->setRequired(true);
		
		$confirmPassword = $this->createElement('password','confirmPassword');
		$confirmPassword->setAttrib('class', 'form-control');
		$confirmPassword->setLabel('Nhập lại mật khẩu: *')
		->setRequired(false);
		
		$file = $this->createElement('file','image_link');
		$file->setLabel('Ảnh đại diện (nếu có):')
		->setRequired(false);
		
		$username = $this->createElement('text','username');
		$username->setAttrib('class', 'form-control');
		$username->setLabel('Họ và tên: *')
		->setRequired(true);
		
		$gender = $this->createElement('radio', 'gender', array(
		    'label'=>'Giới tính',
		    'multiOptions'=>array(
		        '1' => 'Nam',
		        '0' => 'Nữ',
		    ),	
		));
		$gender->setAttrib('checked','checked');
		
		$city = $this->createElement('select','city',
				array(
						'label'        => 'Tỉnh/tp:',
						'value'        => '0',
						'multiOptions' => array(
								'0'    => 'Hà Nội',
								'1'   => 'TP HCM',
								'2'  => 'Vĩnh Phúc',
						),
				)
		);
		$city->setAttrib('class', 'form-control');
		
		$address = $this->createElement('text','address');
		$address->setAttrib('class', 'form-control');
		$address->setLabel('Địa chỉ:')
		->setRequired(false);
		
		$phone = $this->createElement('text','phone');
		$phone->setAttrib('class', 'form-control');
		$phone->setLabel('Điện thoại di động:')
		->setRequired(false);
		
		$register = $this->createElement('submit','register');
		$register->setAttrib('class', 'btn btn-success');
		$register->setLabel('Đăng ký')
		->setIgnore(true);
		
		$this->addElements(array(
				$email,
				$password,
				$confirmPassword,
				$file,
				$username,
				$gender,
				$city,
				$address,
				$phone,
				$register
		));
	}
}