<?php

class StoreController extends UserBaseController
{
    public function actionIndex()
	{
		$model = new Store();
        $pagination['count'] = $model->storeCount();
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $model->storeList('store_sort DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('store_list', array('list'=>$list, 'pagination'=>$pagination));
	}
	
	public function actionAdd()
	{
	    $model = new Store();
	    if(isset($_POST['StoreForm']))
	    {
	        $model->store_title = $_POST['StoreForm']['aname'];
	        $model->store_url = $_POST['StoreForm']['url'];
	        $model->store_show = $_POST['StoreForm']['isshow'];
	        $model->store_sort = $_POST['StoreForm']['sort'];
	        $model->store_content = $_POST['StoreForm']['content'];
	        $model->store_time = time();
	        if($model->addStore()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }
	    $this->renderPartial('store_add',array('model'=>$model));
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
	
	    if(isset($_POST['StoreForm']))
	    {
	        $model->store_title = $_POST['StoreForm']['aname'];
	        $model->ac_id = $_POST['StoreForm']['ac_id'];
	        $model->store_url = $_POST['StoreForm']['url'];
	        $model->store_show = $_POST['StoreForm']['isshow'];
	        $model->store_sort = $_POST['StoreForm']['sort'];
	        $model->store_content = $_POST['StoreForm']['content'];
	        $model->store_time = time();
	        if($model->editStore($store_id)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $ac_model=new StoreClass();
	        $ac = $ac_model->getAllAC();
	        $store_info = $model->findAllByPk($store_id);
	        $this->renderPartial('store_edit',array('store_info'=>$store_info[0], 'ac'=>$ac));
	    }
	}
}