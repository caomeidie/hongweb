<?php

class StoregradeController extends UserBaseController
{
    public function actionIndex()
	{
		$sg_model = new StoreGrade();
		$condition = array('sg_id'=>array('>=', 1));
        $pagination['count'] = $sg_model->countSG($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $sg_model->getSGList($condition,'sg_sort DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('storegrade_list', array('list'=>$list, 'pagination'=>$pagination));
	}
	
	public function actionAdd()
	{
	    $sg_model = new StoreGrade();
	    if(isset($_POST['SGForm']))
	    {
	        $sg_model->sg_name = $_POST['SGForm']['sg_name'];
	        $sg_model->sg_sort = $_POST['SGForm']['sg_sort'];
	        if($sg_model->addSG()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }
	    $this->renderPartial('storegrade_add',array('model'=>$sg_model));
	}
	
    public function actionDel()
    {
        $sg_id = Yii::app()->request->getParam('uid');
        $sg_model = new StoreGrade();
        $sg_arr = explode(',', $sg_id);
        if(count($sg_arr) <= 1){
            if($sg_model->dropOneSG($sg_id))
                $result = $this->message("删除成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }else{
            if($count = $sg_model->dropAllSG($sg_id))
                $result = $this->message("删除{$count}条成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }
        echo $result;
    }
	
	public function actionEdit()
	{
	    $sg_id = Yii::app()->request->getParam('uid');
	    $model=new StoreGrade();
	
	    if(isset($_POST['SGForm']))
	    {
	        $model->attributes=$_POST['SGForm'];
	        if($model->editSG($sg_id)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $sg_info = $model->findAllByPk($sg_id);
	        $this->renderPartial('storegrade_edit',array('storegrade'=>$sg_info[0]));
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
}