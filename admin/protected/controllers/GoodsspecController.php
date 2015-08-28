<?php

class GoodsspecController extends UserBaseController
{
    public function actionIndex()
	{
		$model = new GoodsSpec();
		$condition = array('spec_id'=>array('>=', 1));
        $pagination['count'] = $model->countSpec($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $model->getSpecList($condition,'spec_sort DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('spec_list', array('list'=>$list, 'pagination'=>$pagination));
	}

    public function actionAdd()
	{
	    $model = new GoodsSpec();
	    if($_POST)
	    {
	        $model->spec_name = $_POST['SpecForm']['name'];
	        $model->spec_sort = $_POST['SpecForm']['sort'];
	        $model->spec_value = serialize(explode(',', trim($_POST['SpecForm']['value'])));
	        
	        if($model->save()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }
	    
	    $this->renderPartial('spec_add',array('model'=>$model));
	}
	
	public function actionEdit()
	{
	    $spec_id = Yii::app()->request->getParam('uid');
	    $model=new GoodsSpec();
	
	    if(isset($_POST['SpecForm']))
	    {
	        $model->spec_id = $spec_id;
	        $model->spec_name = $_POST['SpecForm']['name'];
	        $model->spec_sort = $_POST['SpecForm']['sort'];
	        $model->spec_value = serialize(explode(',', trim($_POST['SpecForm']['value'])));
	        if($model->updateByPk($spec_id, $model->attributes)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $spec_info = $model->findByPk($spec_id);
	        $this->renderPartial('spec_edit',array('spec_info'=>$spec_info));
	    }
	}
	
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	        if(Yii::app()->request->isAjaxRequest)
	            echo $error['message'];
	        else
	            echo "<script>alert('请不要乱操作123！')</script>";
	        //$this->render('error', $error);
	    }
	}

	public function actionDel()
	{
	    $spec_id = Yii::app()->request->getParam('check') ? Yii::app()->request->getParam('check') : Yii::app()->request->getParam('uid');
	    $model = new GoodsSpec();
	    $spec_arr = explode(',', $spec_id);
	    if(count($spec_arr) <= 1){
	        if($model->deleteByPk($spec_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $model->deleteAll("spec_id IN(".$spec_id.")"))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
}