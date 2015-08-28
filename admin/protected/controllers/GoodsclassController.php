<?php

class GoodsclassController extends UserBaseController
{
    public function actionIndex()
	{
		$model = new GoodsClass();
		$condition = array('gc_id'=>array('>=', 1));
        $list = $model->getGCList($condition,'gc_id DESC');
	    $arr_list = array();
    	foreach ($list as $key=>$val){
    	    $arr_list[$key] = $val->attributes;
    	}
    	ksort($arr_list);
        $list_tree = self::treeList($arr_list);
		$this->renderPartial('gc_list', array('list_tree'=>$list_tree));
	}

    public function actionAdd()
	{
	    $model = new GoodsClass();
	    if($_POST)
	    {
	        $model->gc_name = $_POST['ClassForm']['name'];
	        $model->gc_parent_id = $_POST['ClassForm']['gc'];
	        $model->type_id = $_POST['ClassForm']['type'];
	        $model->gc_show = $_POST['ClassForm']['show'];
	        $model->gc_sort = $_POST['ClassForm']['sort'];
	        
	        if($model->save()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }

	    $type_model = new GoodsType();
	    $type_list = $type_model->getTypeList(array('type_id'=>array('>=', 1)));
	    
	    $gc_model = new GoodsClass();
	    $gc_list = $gc_model->getGCList(array('gc_id'=>array('>=', 1)));
	    $arr_list = array();
	    foreach ($gc_list as $key=>$val){
	        $arr_list[$key] = $val->attributes;
	    }
	    ksort($arr_list);
	    $list_tree = self::treeList($arr_list);
	     
	    $this->renderPartial('gc_add',array('model'=>$model, 'type_list'=>$type_list, 'gc_list'=>$list_tree));
	}
	
	public function actionEdit()
	{
	    $gc_id = Yii::app()->request->getParam('uid');
	    $model=new GoodsClass();
	
	    if(isset($_POST['ClassForm']))
	    {
	        $model->gc_id = $gc_id;
	        $model->gc_name = $_POST['ClassForm']['name'];
	        $model->gc_parent_id = $_POST['ClassForm']['gc'];
	        $model->type_id = $_POST['ClassForm']['type'];
	        $model->gc_show = $_POST['ClassForm']['show'];
	        $model->gc_sort = $_POST['ClassForm']['sort'];
	        
	        if($model->updateByPk($gc_id, $model->attributes)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $gc_info = $model->findByPk($gc_id);
	        
	        $type_model = new GoodsType();
	        $type_list = $type_model->getTypeList(array('type_id'=>array('>=', 1)));
	         
	        $gc_model = new GoodsClass();
	        $gc_list = $gc_model->getGCList(array('gc_id'=>array('>=', 1)));
	        $arr_list = array();
	        foreach ($gc_list as $key=>$val){
	            $arr_list[$key] = $val->attributes;
	        }
	        ksort($arr_list);
	        $list_tree = self::treeList($arr_list);
	        
	        $this->renderPartial('gc_edit',array('gc_info'=>$gc_info, 'type_list'=>$type_list, 'gc_list'=>$list_tree));
	    }
	}
	
	public function actionDel()
	{
	    $gc_id = Yii::app()->request->getParam('check') ? Yii::app()->request->getParam('check') : Yii::app()->request->getParam('uid');
	    $model = new GoodsClass();
	    $gc_arr = explode(',', $gc_id);
	    if(count($gc_arr) <= 1){
	        if($model->deleteByPk($gc_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $model->deleteAll("gc_id IN(".$gc_id.")"))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
	
	private function treeArray($lists){
	    $tree = array();
	    
	    foreach($lists as $list){
	        if(isset($lists[$list['gc_parent_id']])){
	            $lists[$list['gc_parent_id']]['son'][] = &$lists[$list['gc_id']];
	        }else{
	            $tree[] = &$lists[$list['gc_id']];
	        }
	    }
	    return $tree;
	}
	
	private function treeList($lists, $pid=0, $level=0, $html='--'){
	    static $tree = array();
	    foreach($lists as $list){
	        if($list['gc_parent_id'] == $pid){
	            $t['html'] = str_repeat($html, $level);
	            $t['val'] = $list;
	            $tree[] = $t;
	            self::treeList($lists, $list['gc_id'], $level+1);
	        }
	    }
	    return $tree;
	}
}