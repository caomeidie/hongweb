<?php

class SettingController extends UserBaseController
{
	public function actionIndex()
	{
	    $model = new Setting();
        $list = $model->settingList();
		$this->renderPartial('base', array('setting_list'=>$list, 'model'=>$model));
	}
	
	public function actionSave()
	{
	    require_once  dirname(Yii::app()->basePath).'/../framework/utils/upload.php';
	    $model = new Setting();	    
	    
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['name']),'setting_key=:key',array(':key'=>'site_name'));
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['phone']),'setting_key=:key',array(':key'=>'site_phone'));
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['email']),'setting_key=:key',array(':key'=>'site_email'));
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['icp']),'setting_key=:key',array(':key'=>'icp_number'));
	    if(!empty($_FILES['attach']['tmp_name'])){
    	    $file = new upload();
    	    $file->set_dir('../data/upload/file/','{y}/{m}');
    	    $file->set_thumb(100,80);
    	    $file->set_watermark('../data/sys/watermark.png',6,90);
    	    $fs = $file->execute();
	        
	        $res[] = $model->updateAll(array('setting_val'=>$fs[0]['dir'].$fs[0]['name']),'setting_key=:key',array(':key'=>'site_logo'));
	    }	    
	    
	    $result = false;
	    
	    foreach ($res as $val){
	        $result = $result || $val;
	    }
        if($result){
            echo $this->message("编辑成功");
        }else{
            echo $this->message("编辑失败", "300");
        }
        exit;
	}
	
	public function actionEmail()
	{
	    $model = new Setting();
	    $list = $model->settingList(2);
	    $this->renderPartial('email', array('setting_list'=>$list, 'model'=>$model));
	}
	
	public function actionSaveEmail()
	{
	    $model = new Setting();
	     
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['open']),'setting_key=:key',array(':key'=>'email_enable'));
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['host']),'setting_key=:key',array(':key'=>'email_host'));
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['port']),'setting_key=:key',array(':key'=>'email_port'));
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['addr']),'setting_key=:key',array(':key'=>'email_addr'));
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['user']),'setting_key=:key',array(':key'=>'email_user'));
	    $res[] = $model->updateAll(array('setting_val'=>$_POST['pass']),'setting_key=:key',array(':key'=>'email_pass'));
	    
	    $result = false;
	    foreach ($res as $val){
	        $result = $result || $val;
	    }
        if($result){
            echo $this->message("编辑成功");
        }else{
            echo $this->message("编辑失败", "300");
        }
        exit;
	}
}