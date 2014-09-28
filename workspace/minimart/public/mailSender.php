<?php

require_once 'croninit.php';

$emailSender= new EmailSender();
$emailSender->indexAction();
class EmailSender{
	public function __construct(){
	}
	public function indexAction() {
		//$this->sendMail();
		$date=date('Y-m-d');
		$model=new Model_DAO();
		$listEmail=$model->executeSql('SPC_GET_LIST_EMAIL_PROMPT',array($date));
		$listEmail=$listEmail[0];
		//print_r($listEmail);
		$countSendOK=0;
		foreach ($listEmail as $email){
			$i=$this->sendMail($email['email'],$date);
			$countSendOK=$countSendOK+$i;
			//echo $email['email'];
		}
		echo $countSendOK." email send ok";
	}
	public function sendMail($email,$date) {
	
		//Initialize needed variables
		$your_name = 'Thanh';
		$your_email = 'thanhnv@ans-asia.com'; //Or your_email@gmail.com for Gmail
		$your_password = 'ANS80fdyhjj';
		$send_to_name = 'My Friend';
		$send_to_email = $email;
		$smtpHost='210.224.185.227';
		//SMTP server configuration
		$smtpConf = array(
				'auth' => 'login',
				'username' => $your_email,
				'password' => $your_password
		);
		$transport = new Zend_Mail_Transport_Smtp($smtpHost, $smtpConf);
	
		//Create email
		$mail = new Zend_Mail('UTF-8');
		$mail->setFrom($your_email, $your_name);
		$mail->addTo($send_to_email, $send_to_name);
		
		$mail->setSubject('[Daily Report] Nháº¯c nhá»Ÿ thÃ nh viÃªn bÃ¡o cÃ¡o cÃ´ng viá»‡c hÃ ng ngÃ y.');
		$mail->setBodyText('Báº¡n chÆ°a bÃ¡o cÃ¡o vÃ o ngÃ y '.$date.' .');
	
		//Send
		
		try {
			$mail->send($transport);
			return 1;
		}
		catch (Exception $e) {
			return 0;
		}
	
		//Return boolean indicating success or failure
		//return $sent;
	
	}
	
	
}
