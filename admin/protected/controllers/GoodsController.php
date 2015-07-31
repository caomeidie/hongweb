<?php

class GoodsController extends UserBaseController
{
	public function actionIndex()
	{
		$model = new Goods();
        $pagination['count'] = $model->goodsCount();
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $model->goodsList('goods_sort DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('goods_list', array('list'=>$list, 'pagination'=>$pagination));
	}
	
	public function actionAdd()
	{
	    $model = new Goods();
	    if(isset($_POST['GoodsForm']))
	    {
	        $model->goods_name = $_POST['GoodsForm']['goods_name'];
	        $model->gc_id = $_POST['GoodsForm']['gc_id'];
	        $model->goods_num = $_POST['GoodsForm']['goods_num'];
	        $model->goods_price = $_POST['GoodsForm']['goods_price'];
	        $model->goods_storage = $_POST['GoodsForm']['goods_storage'];
	        $model->goods_show = $_POST['GoodsForm']['goods_show'];
	        $model->goods_recommend = $_POST['GoodsForm']['goods_recommend'];
	        $model->goods_image = $_POST['GoodsForm']['image'][0];
	        $model->brand_id = 0;
	        $model->type_id = 0;
	        $model->spec_open = 0;
	        $model->attr_open = 0;
	        $model->goods_status = 1;
	        $model->goods_add_time = time();
	        $model->goods_starttime = time();
	        if($model->save()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }
	    if(!$_GET['step']){
    	    $gc_model = new GoodsClass();
    	    $condition = array('gc_id'=>array('>=', 1));
            $list = $gc_model->getGCList($condition,'gc_id DESC');
    	    $arr_list = array();
        	foreach ($list as $key=>$val){
        	    $arr_list[$key] = $val->attributes;
        	}
        	ksort($arr_list);
            $list_tree = self::treeList($arr_list);
    	    $this->renderPartial('goods_add_one',array('model'=>$model, 'gc_list'=>$list_tree));
	        
	    }else{
	        if(isset($_POST['goodsclass']))
	        {   
	            $gc_id = $_POST['goodsclass'];
	            $gc_model = new GoodsClass();
	            $gc_info = $gc_model->findByPk($gc_id);
        	    if($gc_info['type_id']){            	    
            	    $type_model = new GoodsType();
            	    $type_info = $type_model->findByPk($gc_info['type_id']);
            	    
            	    $attr_arr = unserialize($type_info['type_attr']);
            	    $attr_cond = '';
            	    foreach($attr_arr as $attr){
            	        $attr_cond .= $attr.',';
            	    }
            	    $attr_cond = '('.substr($attr_cond, 0, strlen($attr_cond)-1).')';
            	    $attr_model = new GoodsAttr();
            	    $attr_info = $attr_model->findAll('attr_id IN '.$attr_cond);
            	            	    
            	    $spec_arr = unserialize($type_info['type_spec']);
            	    $spec_cond = '';
            	    foreach($spec_arr as $spec){
            	        $spec_cond .= $spec.',';
            	    }
            	    $spec_cond = '('.substr($spec_cond, 0, strlen($spec_cond)-1).')';
            	    $spec_model = new GoodsSpec();
            	    $spec_info = $spec_model->findAll('spec_id IN '.$spec_cond);
            	    
            	    $brand_arr = unserialize($type_info['type_brand']);
            	    $brand_cond = '';
            	    foreach($brand_arr as $brand){
            	        $brand_cond .= $brand.',';
            	    }
            	    $brand_cond = '('.substr($brand_cond, 0, strlen($brand_cond)-1).')';
            	    $brand_model = new GoodsBrand();
            	    $brand_info = $brand_model->findAll('brand_id IN '.$brand_cond);
            	    
        	        $this->renderPartial('goods_add_two', array('gc_id'=>$gc_id, 'type_id'=>$gc_info['type_id'], 'attr_info'=>$attr_info, 'spec_info'=>$spec_info, 'brand_info'=>$brand_info));        	        
        	    }else{
        	        $this->renderPartial('goods_add_two', array('gc_id'=>$gc_id));
        	    }
	        }else{
	            $result = $this->message("添加失败");
	            echo $result;
	            exit;
	        }
	        
	    }
	}
	
	public function actionDel()
	{
	    $goods_id = Yii::app()->request->getParam('sid');
	    $model = new Goods();
	    $goods_arr = explode(',', $goods_id);
	    if(count($goods_arr) <= 1){
	        if($model->goodsDropOne($goods_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $model->goodsDropAll($goods_id))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
	
	public function actionEdit()
	{
	    $goods_id = Yii::app()->request->getParam('sid');
	    $model=new Goods();
	
	    if(isset($_POST['GoodsForm']))
	    {
	        $model->goods_title = $_POST['GoodsForm']['aname'];
	        $model->goods_id = $_POST['GoodsForm']['goods_id'];
	        $model->goods_url = $_POST['GoodsForm']['url'];
	        $model->goods_show = $_POST['GoodsForm']['isshow'];
	        $model->goods_sort = $_POST['GoodsForm']['sort'];
	        $model->goods_content = $_POST['GoodsForm']['content'];
	        $model->goods_time = time();
	        if($model->editGoods($goods_id)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $goods_model=new GoodsClass();
	        $goods = $goods_model->getAllAC();
	        $goods_info = $model->findAllByPk($goods_id);
	        $this->renderPartial('goods_edit',array('goods_info'=>$goods_info[0], 'goods'=>$goods));
	    }
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
	
	public function actionUpload(){
	    if($_FILES){
	        $file = new upload();
	        $file->set_dir('../data/upload/goods/','{y}/{m}');
	        $file->set_thumb(100,80);
	        $file->set_watermark('../data/sys/watermark.png',6,90);
	        $fs = $file->execute();
	        
	        if($fs[0]){
	            $atta_model = new Attachment();
	            $atta_model->atta_name = $fs[0]['dir'].$fs[0]['name'];
	            $atta_model->atta_thumb = $fs[0]['dir'].$fs[0]['thumb'];
	            $atta_model->atta_type = 'goods';
	            $atta_model->add_time = time();	            
	            $atta_model->save();
	            
	            $result = $this->message($fs[0]['dir'].$fs[0]['name'], "200");	            
	        }else{
	            $result = $this->message("上传失败", "300");
	        }
	        echo $result;
	    }
	}
}