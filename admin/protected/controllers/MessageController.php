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
	    
	    $email_test = trim($_POST['addr_test']);
	    $subject	= iconv('UTF-8','GB2312',"这是".Yii::app()->name."测试邮件，收到此邮件说明邮箱服务已经配置成功！");
	    $site_url	= Yii::app()->name;
	    $site_title = Yii::app()->name;
	    $message = iconv('UTF-8','GB2312','<p>'.'来自:'."<a href='".$site_url."' target='_blank'>".$site_title.'</a>'.'。发送状态:成功!'.'</p>');
		
		if (class_exists('Email')){
			$obj_email = new Email();
			$obj_email->set('email_server',$email_host);
			$obj_email->set('email_port',$email_port);
			$obj_email->set('email_user',$email_user);
			$obj_email->set('email_password',$email_pass);
			$obj_email->set('email_from',$email_addr);
            $obj_email->set('site_name',$site_title);
			$result = $obj_email->send($email_test,$subject,$message);
	    }else{
	        $result = @mail($email_test,$subject,$message);
	    }
        if ($result === false){
            $message = array('status'=>'0');
        }else {
            $message = array('status'=>'1');
        }
        echo json_encode($message);
	}
}