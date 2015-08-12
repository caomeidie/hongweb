<?php

class GoodsbrandController extends UserBaseController
{
    public function actionIndex()
	{
		$model = new GoodsBrand();
		$condition[1] = array('=', 1);
        $pagination['count'] = $model->brandCount($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $model->brandList($condition, 'brand_sort DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('brand_list', array('list'=>$list, 'pagination'=>$pagination));
	}
	
	public function actionAdd()
	{
	    $model = new GoodsBrand();
	    if($_POST)
	    {
	        $model->brand_name = $_POST['name'];
	        $model->brand_sort = $_POST['sort'];
	        $model->brand_type = $_POST['type'];
	        if(!empty($_FILES['attach']['tmp_name'])){
	            $file = new upload();
	            $file->set_dir('../data/upload/file/','{y}/{m}');
	            $file->set_thumb(100,80);
	            $file->set_watermark('../data/sys/watermark.png',6,90);
	            $fs = $file->execute();
	            
	            $model->brand_pic = $fs[0]['dir'].$fs[0]['name'];
	        }
	        if($model->save()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }
	    
	    $this->renderPartial('brand_add',array('model'=>$model));
	}
	
	public function actionDel()
	{
	    $brand_id = Yii::app()->request->getParam('check');
	    $model = new GoodsBrand();
	    $brand_arr = explode(',', $brand_id);
	    if(count($brand_arr) <= 1){
	        if($model->deleteByPk($brand_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $model->deleteAll("brand_id IN(".$brand_id.")"))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
	
	public function actionEdit()
	{
	    $brand_id = Yii::app()->request->getParam('sid');
	    $model=new GoodsBrand();
	
	    if($_POST)
	    {
	        $model->brand_id = $brand_id;
	        $model->brand_name = $_POST['name'];
	        $model->brand_sort = $_POST['sort'];
	        $model->brand_type = $_POST['type'];
	        if(!empty($_FILES['attach']['tmp_name'])){
	            $file = new upload();
	            $file->set_dir('../data/upload/file/','{y}/{m}');
	            $file->set_thumb(100,80);
	            $file->set_watermark('../data/sys/watermark.png',6,90);
	            $fs = $file->execute();
	            
	            $model->brand_pic = $fs[0]['dir'].$fs[0]['name'];
	        }
	        if($model->updateByPk($brand_id, $model->attributes)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $brand_info = $model->findByPk($brand_id);
	        $this->renderPartial('brand_edit',array('brand_info'=>$brand_info,'model'=>$model));
	    }
	}
}