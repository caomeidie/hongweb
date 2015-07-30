<?php

class StoreController extends UserBaseController
{
    public function actionIndex()
	{
		$model = new Store();
		$condition[1] = array('=', 1);
		if($s = Yii::app()->request->getParam('s')){
		    switch ($s){
		        case 'close':
		            $condition = array_merge($condition, array('store_state'=>array('=', 0)));
		            break;
		    }
		}
        $pagination['count'] = $model->storeCount($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $model->storeList($condition, 'store_time DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('store_list', array('list'=>$list, 'pagination'=>$pagination));
	}
	
	public function actionAdd()
	{
	    $model = new Store();
	    if($_POST)
	    {
	        $model->store_name = $_POST['name'];
	        $model->store_pass = md5($_POST['pass']);
	        $model->grade_id = $_POST['storegrade'];
	        $model->store_owner_card = $_POST['idcard'];
	        $model->store_owner_name = $_POST['name_auth'];
	        $model->area_id = 1;
	        $model->store_address = $_POST['addr'];
	        $model->store_zip = $_POST['zip'];
	        $model->store_mobile = $_POST['mobile'];
	        $model->store_state = $_POST['state'];
	        $model->store_time = time();
	        if(!empty($_FILES['attach']['tmp_name'])){
	            $file = new upload();
	            $file->set_dir('../data/upload/file/','{y}/{m}');
	            $file->set_thumb(100,80);
	            $file->set_watermark('../data/sys/watermark.png',6,90);
	            $fs = $file->execute();
	            
	            $model->store_logo = $fs[0]['dir'].$fs[0]['name'];
	        }
	        if($model->addStore()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }
	    $sg_model = new StoreGrade();
	    $condition = array('sg_id'=>array('>=', 1));
	    $sg = $sg_model->getSGList($condition,'sg_sort DESC');
	    $this->renderPartial('store_add',array('model'=>$model, 'sg'=>$sg));
	}
	
	public function actionDel()
	{
	    $store_id = Yii::app()->request->getParam('sid');
	    $model = new Store();
	    $store_arr = explode(',', $store_id);
	    if(count($store_arr) <= 1){
	        if($model->storeDropOne($store_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $model->storeDropAll($store_id))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
	
	public function actionEdit()
	{
	    $store_id = Yii::app()->request->getParam('sid');
	    $model=new Store();
	
	    if($_POST)
	    {
	        $model->store_id = $store_id;
	        $model->store_name = $_POST['name'];
	        $model->store_pass = md5($_POST['pass']);
	        $model->grade_id = $_POST['storegrade'];
	        $model->store_owner_card = $_POST['idcard'];
	        $model->store_owner_name = $_POST['name_auth'];
	        $model->area_id = 1;
	        $model->store_address = $_POST['addr'];
	        $model->store_zip = $_POST['zip'];
	        $model->store_mobile = $_POST['mobile'];
	        $model->store_state = $_POST['state'];
	        $model->store_time = time();
	        if(!empty($_FILES['attach']['tmp_name'])){
	            $file = new upload();
	            $file->set_dir('../data/upload/file/','{y}/{m}');
	            $file->set_thumb(100,80);
	            $file->set_watermark('../data/sys/watermark.png',6,90);
	            $fs = $file->execute();
	            
	            $model->store_logo = $fs[0]['dir'].$fs[0]['name'];
	        }
	        if($model->updateByPk($store_id, $model->attributes)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $sg_model = new StoreGrade();
    	    $condition = array('sg_id'=>array('>=', 1));
    	    $sg = $sg_model->getSGList($condition,'sg_sort DESC');
	        $store_info = $model->findAllByPk($store_id);
	        $this->renderPartial('store_edit',array('store_info'=>$store_info[0], 'sg'=>$sg));
	    }
	}
}