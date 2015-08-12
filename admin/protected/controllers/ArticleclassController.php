<?php

class ArticleclassController extends UserBaseController
{
	public function actionIndex()
	{
		$ac_model = new ArticleClass();
        $pagination['count'] = $ac_model->ACCount();
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $ac_list = $ac_model->ACList('ac_sort DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('articleclass_list', array('list'=>$ac_list, 'pagination'=>$pagination));
	}
	
	public function actionAdd()
	{
	    $model = new ArticleClass();
        if(isset($_POST['ACForm']))
        {
            $model->ac_name = $_POST['ACForm']['acname'];
            $model->ac_code = $_POST['ACForm']['accode'];
            $model->ac_parent_id = $_POST['ACForm']['parent_id'];
            $model->ac_sort = $_POST['ACForm']['acsort'];
            if($model->addAC()){
                $result = $this->message("添加成功");
            }else{
                $result = $this->message("添加失败", "300");
            }
            echo $result;
            exit;
        }
        $ac = $model->getAllAC();
        $this->renderPartial('articleclass_add',array('model'=>$model, 'ac'=>$ac));
	}
	
	public function actionDel()
	{
	    $ac_id = Yii::app()->request->getParam('check');
	    $AC_model = new ArticleClass();
	    $ac_arr = explode(',', $ac_id);
	    if(count($ac_arr) <= 1){
	        if($AC_model->deleteByPk($ac_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $AC_model->deleteAll("ac_id IN(".$ac_id.")"))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
	
	public function actionEdit()
	{
	    $ac_id = Yii::app()->request->getParam('sid');
	
	    if(isset($_POST['ACForm']))
	    {
	        $model=new ArticleClass();
	        $model->ac_id = $ac_id;
	        $model->ac_name = $_POST['ACForm']['acname'];
            $model->ac_code = $_POST['ACForm']['accode'];
            $model->ac_parent_id = $_POST['ACForm']['parent_id'];
            $model->ac_sort = $_POST['ACForm']['acsort'];
	        if($model->updateByPk($ac_id, $model->attributes)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $model=new ArticleClass();
	        $ac_info = $model->findByPk($ac_id);
	        $ac = $model->getAllAC();
	        $this->renderPartial('articleclass_edit',array('ac_info'=>$ac_info, 'ac'=>$ac));
	    }
	}
}