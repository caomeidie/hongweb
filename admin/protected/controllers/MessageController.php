<?php

class MessageController extends UserBaseController
{
	public function actionTestEmail()
	{
		$email_host = trim($_POST['email_host']);
		$email_port = trim($_POST['email_port']);
		$email_addr = trim($_POST['email_addr']);
		$email_user = trim($_POST['email_user']);
		$email_pass = trim($_POST['email_pass']);

		$email_test = trim($_POST['email_test']);
		$subject	= "这是测试邮件，您收到此邮件说明邮箱服务已经配置成功！";
		$site_url	= Yii::app()->name;

        $site_title = Yii::app()->name;
        $message = '<p>发送给：'."<a href='".$site_url."' target='_blank'>".$site_title.'</a>测试邮件发送成功</p>';
		
		if (class_exists('Email')){
			$obj_email = new Email();
			$obj_email->set('email_server',$email_host);
			$obj_email->set('email_port',$email_port);
			$obj_email->set('email_user',$email_user);
			$obj_email->set('email_password',$email_pass);
			$obj_email->set('email_from',$email_addr);
            $obj_email->set('site_name',Yii::app()->name);
			$result = $obj_email->send($email_test,$subject,$message);
            if ($result === false){
                $message = "发送测试邮件失败";
                if (strtoupper(CHARSET) == 'GBK'){
                    $message = Language::getUTF8($message);
                }
            }else {
                $message = "发送测试邮件成功";
                if (strtoupper(CHARSET) == 'GBK'){
                    $message = Language::getUTF8($message);
                }
            }
            echo json_encode($message);
	    }
	}
}