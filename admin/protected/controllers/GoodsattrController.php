<?php

class GoodsattrController extends UserBaseController
{
public function actionIndex()
	{
		$model = new GoodsAttr();
		$condition = array('attr_id'=>array('>=', 1));
        $pagination['count'] = $model->countAttr($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $model->getAttrList($condition,'attr_sort DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('attr_list', array('list'=>$list, 'pagination'=>$pagination));
	}

    public function actionAdd()
	{
	    $model = new GoodsAttr();
	    if($_POST)
	    {
	        $model->attr_name = $_POST['AttrForm']['name'];
	        $model->attr_sort = $_POST['AttrForm']['sort'];
	        $model->attr_value = serialize(explode(',', trim($_POST['AttrForm']['value'])));
	        
	        if($model->save()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }
	    
	    $this->renderPartial('attr_add',array('model'=>$model));
	}
	
	public function actionEdit()
	{
	    $attr_id = Yii::app()->request->getParam('uid');
	    $model=new GoodsAttr();
	
	    if(isset($_POST['AttrForm']))
	    {
	        $model->attr_id = $attr_id;
	        $model->attr_name = $_POST['AttrForm']['name'];
	        $model->attr_sort = $_POST['AttrForm']['sort'];
	        $model->attr_value = serialize(explode(',', trim($_POST['AttrForm']['value'])));
	        if($model->updateByPk($attr_id, $model->attributes)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $attr_info = $model->findByPk($attr_id);
	        $this->renderPartial('attr_edit',array('attr_info'=>$attr_info));
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
	    }
	}

	public function actionDel()
	{
	    $attr_id = Yii::app()->request->getParam('check') ? Yii::app()->request->getParam('check') : Yii::app()->request->getParam('uid');
	    $model = new GoodsAttr();
	    $attr_arr = explode(',', $attr_id);
	    if(count($attr_arr) <= 1){
	        if($model->deleteByPk($attr_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $model->deleteAll("attr_id IN(".$attr_id.")"))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
}