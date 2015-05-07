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
	    
	    $file = new upload();
	    $file->set_dir('../data/upload/file/','{y}/{m}');
	    $file->set_thumb(100,80);
	    $file->set_watermark('../data/sys/watermark.png',6,90);
	    $fs = $file->execute();
	    	    
	    $res = $model->updateAll(array('setting_val'=>$_POST['name']),'setting_key=:key',array(':key'=>'site_name')) ? true : false;
	    $res = $model->updateAll(array('setting_val'=>$fs[0]['dir'].$fs[0]['name']),'setting_key=:key',array(':key'=>'site_logo')) ? ($res && true) : ($res && false);
	    $res = $model->updateAll(array('setting_val'=>$_POST['phone']),'setting_key=:key',array(':key'=>'site_phone')) ? ($res && true) : ($res && false);
	    $res = $model->updateAll(array('setting_val'=>$_POST['email']),'setting_key=:key',array(':key'=>'site_email')) ? ($res && true) : ($res && false);
	    $res = $model->updateAll(array('setting_val'=>$_POST['icp']),'setting_key=:key',array(':key'=>'icp_number')) ? ($res && true) : ($res && false);

        if($res){
            $result = $this->message("添加成功");
        }else{
            $result = $this->message("添加失败", "300");
        }
        echo $result;
        exit;
	}
}