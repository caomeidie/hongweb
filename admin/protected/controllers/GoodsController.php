<?php

class GoodsController extends UserBaseController
{
	public function actionIndex()
	{
		$model = new Goods();
		$condition = array('goods_id'=>array('>=', 1));
		if($s = Yii::app()->request->getParam('s')){
		    switch ($s){
		        case 'notshow':
		            $condition = array_merge($condition, array('goods_show'=>array('=', 0)));
		            break;
		        case 'runout':
		            $condition = array_merge($condition, array('goods_storage'=>array('=', 0)));
		            break;
		    }
		}
        $pagination['count'] = $model->countGoods($condition);
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $model->getGoodsListFull($condition, 'goods_add_time DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('goods_list', array('list'=>$list, 'pagination'=>$pagination));
	}
	
	public function actionAdd()
	{
	    $model = new Goods();
	    if(isset($_POST['GoodsForm']))
	    {
	        $max_price = 0.00;
	        $min_price = 0.00;
	        if(isset($_POST['GoodsForm']['price_spec'])){
	            sort($_POST['GoodsForm']['price_spec']);
	            $min_price = $_POST['GoodsForm']['price_spec'][0];
	            $max_price = $_POST['GoodsForm']['price_spec'][count($_POST['GoodsForm']['price_spec'])-1];
	        }
	        if(isset($_POST['GoodsForm']['storage_spec'])){
	            $storage = array_sum($_POST['GoodsForm']['storage_spec']);
	        }
	        $model->goods_name = $_POST['GoodsForm']['goods_name'];
	        $model->gc_id = $_POST['GoodsForm']['gc_id'];
	        $model->goods_num = $_POST['GoodsForm']['goods_num'];
	        $model->goods_price = $_POST['GoodsForm']['goods_price'] ? $_POST['GoodsForm']['goods_price'] : $min_price;
	        $model->goods_max_price = $max_price;
	        $model->goods_min_price = $min_price;
	        $model->goods_storage = $_POST['GoodsForm']['goods_storage'] ? $_POST['GoodsForm']['goods_storage'] : $storage;
	        $model->goods_show = $_POST['GoodsForm']['goods_show'];
	        $model->goods_recommend = $_POST['GoodsForm']['goods_recommend'];
	        $model->goods_image = $_POST['GoodsForm']['image'][0];
	        $model->brand_id = $_POST['GoodsForm']['goods_brand'];
	        $model->spec_open = $_POST['GoodsForm']['goods_price'] ? 0 : 1;
	        $model->attr_open = $_POST['GoodsForm']['goods_attr'] ? 1 : 0;
	        $model->goods_status = 1;
	        $model->goods_add_time = time();
	        $model->goods_starttime = time();
	        if($model->save()){
	            $goods_id = $model->goods_id;
	            /*存储商品图片*/
	            if($_POST['GoodsForm']['image']){
	                $atta_model = new Attachment();
	                foreach ($_POST['GoodsForm']['image'] as $image){
	                    $thumb_arr  = explode('/', $image);
	                    $thumb_arr[count($thumb_arr)-1] = 'thumb_'.$thumb_arr[count($thumb_arr)-1];
	                    $thumb = implode($thumb_arr, '/');
	                    $_atta_model = clone $atta_model;
	                    $_atta_model->related_id = $goods_id;
	                    $_atta_model->atta_name = $image;
	                    $_atta_model->atta_thumb = $thumb;
	                    $_atta_model->atta_type = 'goods';
	                    $_atta_model->add_time = time();
	                    
	                    $_atta_model->save();
	                }
	            }
	            /*存储商品规格、属性*/
	            if(isset($_POST['GoodsForm']['price_spec'])){
	                $svalue_model = new GoodsSpecValue();
	                $storage_count = 0;
	                $max_price = 0.00;
	                $min_price = 0.00;
	                foreach ($_POST['GoodsForm']['price_spec'] as $skey=>$svalue){
                        $seri_arr = explode('-', $_POST['GoodsForm']['specs'][$skey]);
                        $_svalue_model = clone $svalue_model;
                        $_svalue_model->goods_id = $goods_id;
                        $_svalue_model->spec_goods_seri = serialize($seri_arr);
                        $_svalue_model->spec_goods_price = $svalue;
                        $_svalue_model->spec_goods_storage = $_POST['GoodsForm']['storage_spec'][$skey];
                        $_svalue_model->spec_salenum = 0;
                        
                        $_svalue_model->save();
	                }
	            }	            
	            
	            if(isset($_POST['GoodsForm']['goods_attr'])){
	                $avalue_model = new GoodsAttrValue();
	                foreach ($_POST['GoodsForm']['goods_attr'] as $avalue){
	                    if($avalue != 0){
	                        $avalue_arr = explode('_', $avalue);
	                        $_avalue_model = clone $avalue_model;
	                        $_avalue_model->goods_id = $goods_id;
	                        $_avalue_model->attr_id = $avalue_arr[0];
	                        $_avalue_model->attr_value = $avalue_arr[1];
	                        
	                        $_avalue_model->save();
	                    }
	                }
	            }
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
            	    $spec_info = $spec_model->findAll('spec_id IN '.$spec_cond, array('index'=>'spec_id'));
            	    
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
	    $goods_id = Yii::app()->request->getParam('uid');
	    $model = new Goods();
	    $goods_arr = explode(',', $goods_id);
	    if(count($goods_arr) <= 1){
	        if($model->deleteByPk($goods_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $model->deleteAll("goods_id IN(".$goods_id.")"))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
	
	public function actionEdit()
	{
	    $goods_id = Yii::app()->request->getParam('uid');
	    $model=new Goods();
	
	    if(isset($_POST['GoodsForm']))
	    {
	        $max_price = 0.00;
	        $min_price = 0.00;
	        if(isset($_POST['GoodsForm']['price_spec'])){
	            sort($_POST['GoodsForm']['price_spec']);
	            $min_price = $_POST['GoodsForm']['price_spec'][0];
	            $max_price = $_POST['GoodsForm']['price_spec'][count($_POST['GoodsForm']['price_spec'])-1];
	        }
	        if(isset($_POST['GoodsForm']['storage_spec'])){
	            $storage = array_sum($_POST['GoodsForm']['storage_spec']);
	        }
	        $model->goods_id = $goods_id;
	        $model->goods_name = $_POST['GoodsForm']['goods_name'];
	        $model->gc_id = $_POST['GoodsForm']['gc_id'];
	        $model->goods_num = $_POST['GoodsForm']['goods_num'];
	        $model->goods_price = $_POST['GoodsForm']['goods_price'] ? $_POST['GoodsForm']['goods_price'] : $min_price;
	        $model->goods_max_price = $max_price;
	        $model->goods_min_price = $min_price;
	        $model->goods_storage = $_POST['GoodsForm']['goods_storage'] ? $_POST['GoodsForm']['goods_storage'] : $storage;
	        $model->goods_show = $_POST['GoodsForm']['goods_show'];
	        $model->goods_recommend = $_POST['GoodsForm']['goods_recommend'];
	        $model->goods_image = $_POST['GoodsForm']['image'][0];
	        $model->brand_id = $_POST['GoodsForm']['goods_brand'];
	        $model->spec_open = $_POST['GoodsForm']['goods_price'] ? 0 : 1;
	        $model->attr_open = $_POST['GoodsForm']['goods_attr'] ? 1 : 0;
	        $model->goods_status = 1;
	        $model->goods_add_time = time();
	        $model->goods_starttime = time();
	        if($model->updateByPk($goods_id, $model->attributes)){
	            /*存储商品图片*/
	            if($_POST['GoodsForm']['image']){
	                $atta_model = new Attachment();
	                $atta_model->deleteAllByAttributes(array('related_id'=>$goods_id));
	                foreach ($_POST['GoodsForm']['image'] as $image){
	                    $thumb_arr  = explode('/', $image);
	                    $thumb_arr[count($thumb_arr)-1] = 'thumb_'.$thumb_arr[count($thumb_arr)-1];
	                    $thumb = implode($thumb_arr, '/');
	                    $_atta_model = clone $atta_model;
	                    $_atta_model->related_id = $goods_id;
	                    $_atta_model->atta_name = $image;
	                    $_atta_model->atta_thumb = $thumb;
	                    $_atta_model->atta_type = 'goods';
	                    $_atta_model->add_time = time();
	                    
	                    $_atta_model->save();
	                }
	            }
	            /*存储商品规格、属性*/
	            if(isset($_POST['GoodsForm']['price_spec'])){
	                $svalue_model = new GoodsSpecValue();
	                $svalue_model->deleteAllByAttributes(array('goods_id'=>$goods_id));
	                $storage_count = 0;
	                $max_price = 0.00;
	                $min_price = 0.00;
	                foreach ($_POST['GoodsForm']['price_spec'] as $skey=>$svalue){
	                    $seri_arr = explode('-', $_POST['GoodsForm']['specs'][$skey]);
	                    $_svalue_model = clone $svalue_model;
	                    $_svalue_model->goods_id = $goods_id;
	                    $_svalue_model->spec_goods_seri = serialize($seri_arr);
	                    $_svalue_model->spec_goods_price = $svalue;
	                    $_svalue_model->spec_goods_storage = $_POST['GoodsForm']['storage_spec'][$skey];
	                    $_svalue_model->spec_salenum = 0;
	            
	                    $_svalue_model->save();
	                }
	            }
	             
	            if(isset($_POST['GoodsForm']['goods_attr'])){
	                $avalue_model = new GoodsAttrValue();
	                $avalue_model->deleteAllByAttributes(array('goods_id'=>$goods_id));
	                foreach ($_POST['GoodsForm']['goods_attr'] as $avalue){
	                    if($avalue != 0){
	                        $avalue_arr = explode('_', $avalue);
	                        $_avalue_model = clone $avalue_model;
	                        $_avalue_model->goods_id = $goods_id;
	                        $_avalue_model->attr_id = $avalue_arr[0];
	                        $_avalue_model->attr_value = $avalue_arr[1];
	                         
	                        $_avalue_model->save();
	                    }
	                }
	            }
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $goods_model=new Goods();
	        $goods_info = $model->findByPk($goods_id);
	        
	        $atta_model = new Attachment();
	        $goods_image = $atta_model->findAllByAttributes(array('related_id'=>$goods_id));
	            
	        $attr_value_model = new GoodsAttrValue();
	        $goods_avalue = $attr_value_model->findAllByAttributes(array("goods_id"=>$goods_id));
	        
	        $spec_value_model = new GoodsSpecValue();
	        $goods_svalue = $spec_value_model->findAllByAttributes(array("goods_id"=>$goods_id));
	        
	        if($goods_svalue){
	            foreach($goods_svalue as $key=>$val){
	                $goods_svalue[$key]['spec_goods_seri'] = unserialize($val['spec_goods_seri']);
	            }
	        }
	        
	        
	        $gc_id = $goods_info['gc_id'];
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
	            $spec_info = $spec_model->findAll(array('condition'=>'spec_id IN '.$spec_cond,'index'=>'spec_id'));
	             
	            $brand_arr = unserialize($type_info['type_brand']);
	            $brand_cond = '';
	            foreach($brand_arr as $brand){
	                $brand_cond .= $brand.',';
	            }
	            $brand_cond = '('.substr($brand_cond, 0, strlen($brand_cond)-1).')';
	            $brand_model = new GoodsBrand();
	            $brand_info = $brand_model->findAll('brand_id IN '.$brand_cond);
	             
	            $this->renderPartial('goods_edit', array('goods_info'=>$goods_info, 'gc_id'=>$gc_id, 'type_id'=>$gc_info['type_id'], 'attr_info'=>$attr_info, 'spec_info'=>$spec_info, 'brand_info'=>$brand_info, 'goods_avalue'=>$goods_avalue, 'goods_svalue'=>$goods_svalue, 'goods_image'=>$goods_image));
	        }else{
	            $this->renderPartial('goods_edit', array('goods_info'=>$goods_info, 'gc_id'=>$gc_id, 'goods_image'=>$goods_image));
	        }
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