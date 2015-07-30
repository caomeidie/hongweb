<?php

class GoodstypeController extends UserBaseController
{
    public function actionIndex()
	{
		$model = new GoodsType();
		$condition = array('type_id'=>array('>=', 1));
        $pagination['count'] = $model->countType($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $model->getTypeList($condition,'type_sort DESC', $pagination['perpage'], $pagination['offset']);
        
        $spec_model = new GoodsSpec();
        $spec_list = $spec_model->getSpecList(array('spec_id'=>array('>=', 1)));
        
        $attr_model = new GoodsAttr();
        $attr_list = $attr_model->getAttrList(array('attr_id'=>array('>=', 1)));
        
        $brand_model = new GoodsBrand();
        $brand_list = $brand_model->brandList(array('brand_id'=>array('>=', 1)));
        
		$this->renderPartial('type_list', array('list'=>$list, 'pagination'=>$pagination, 'spec_list'=>$spec_list, 'attr_list'=>$attr_list, 'brand_list'=>$brand_list));
	}

	public function actionAdd()
	{
	    $model = new GoodsType();
	    if($_POST)
	    {
	        $model->type_name = $_POST['TypeForm']['name'];
	        $model->type_spec = $_POST['TypeForm']['spec'] ? serialize($_POST['TypeForm']['spec']) : '';
	        $model->type_attr = $_POST['TypeForm']['attr'] ?serialize($_POST['TypeForm']['attr']) : '';
	        $model->type_brand = $_POST['TypeForm']['brand'] ? serialize($_POST['TypeForm']['brand']) : '';
	        $model->type_sort = $_POST['TypeForm']['sort'];
	         
	        if($model->save()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }
	    
	    $brand_model = new GoodsBrand();
	    $brand_list = $brand_model->brandList(array('brand_id'=>array('>=', 1)));
	    
	    $spec_model = new GoodsSpec();
	    $spec_list = $spec_model->getSpecList(array('spec_id'=>array('>=', 1)));
	    
	    $attr_model = new GoodsAttr();
	    $attr_list = $attr_model->getAttrList(array('attr_id'=>array('>=', 1)));
	    
	    $this->renderPartial('type_add',array('model'=>$model, 'brand_list'=>$brand_list, 'spec_list'=>$spec_list, 'attr_list'=>$attr_list));
	}
	
	public function actionEdit()
	{
	    $type_id = Yii::app()->request->getParam('uid');
	    $model=new GoodsType();
	
	    if(isset($_POST['TypeForm']))
	    {
	        $model->type_id = $type_id;
	        $model->type_name = $_POST['TypeForm']['name'];
	        $model->type_spec = $_POST['TypeForm']['spec'] ? serialize($_POST['TypeForm']['spec']) : '';
	        $model->type_attr = $_POST['TypeForm']['attr'] ?serialize($_POST['TypeForm']['attr']) : '';
	        $model->type_brand = $_POST['TypeForm']['brand'] ? serialize($_POST['TypeForm']['brand']) : '';
	        $model->type_sort = $_POST['TypeForm']['sort'];
	        
	        if($model->updateByPk($type_id, $model->attributes)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $type_info = $model->findByPk($type_id);
	        
	        $brand_model = new GoodsBrand();
	        $condition = array('brand_id'=>array('>=', 1));
	        $brand_list = $brand_model->brandList($condition);
	         
	        $spec_model = new GoodsSpec();
	        $condition = array('spec_id'=>array('>=', 1));
	        $spec_list = $spec_model->getSpecList($condition);
	         
	        $attr_model = new GoodsAttr();
	        $condition = array('attr_id'=>array('>=', 1));
	        $attr_list = $attr_model->getAttrList($condition);
	        
	        $this->renderPartial('type_edit',array('type_info'=>$type_info, 'brand_list'=>$brand_list, 'spec_list'=>$spec_list, 'attr_list'=>$attr_list));
	    }
	}
	
	public function actionDel()
	{
	    $type_id = Yii::app()->request->getParam('uid');
	    $model = new GoodsType();
	    $type_arr = explode(',', $type_id);
	    if(count($type_arr) <= 1){
	        if($model->deleteByPk($type_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $model->deleteAll("type_id IN(".$type_id.")"))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
}