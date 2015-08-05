<style type="text/css" media="screen">
.my-uploadify-button {
	background:none;
	border: none;
	text-shadow: none;
	border-radius:0;
}

.uploadify:hover .my-uploadify-button {
	background:none;
	border: none;
}

.fileQueue {
	width: 400px;
	height: 150px;
	overflow: auto;
	border: 1px solid #E5E5E5;
	margin-bottom: 10px;
}
</style>
<div class="pageContent">
	<form method="post" action="?r=goods/add" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<input type="hidden" name="GoodsForm[gc_id]" value="<?php echo $gc_id;?>">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>商品名称：</dt>
			<dd>
		        <input name="GoodsForm[goods_name]" id="GoodsForm_goods_name" type="text" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>商品货号：</dt>
			<dd>
		        <input name="GoodsForm[goods_num]" id="GoodsForm_goods_num" type="text" />
		    </dd>
		</dl>
		<?php if(isset($type_id)):?>
		    <?php if($spec_info):?>
		    <dl>
    			<dt>商品规格：</dt>
    			<dd><?php $spec_num = 1;?>
    		        <?php foreach($spec_info as $spec):?>
    		            <div class="spec spec<?php echo $spec_num;?>" mrtype="<?php echo $spec_num;?>" value="<?php echo $spec['spec_id'];?>"><strong><?php echo $spec['spec_name'];?>:</strong>
    		                <?php $spec_arr = unserialize($spec['spec_value']);?>
    		                <?php foreach ($spec_arr as $key=>$val):?>
    		                    <input type="checkbox" name="GoodsForm[goods_spec][]" value="<?php echo $key;?>" value_name="<?php echo $val;?>" spec_id="<?php echo $spec['spec_id'];?>" /><?php echo $val;?>
    		                <?php endforeach;?>
    		            </div>
    		            <?php $spec_num++;?>
    		        <?php endforeach;?>
    		    </dd>
    		</dl>
		    <?php endif;?>
		    
		    <?php if($attr_info):?>
		    <dl>
    			<dt>商品属性：</dt>
    			<dd>
    		        <?php foreach($attr_info as $attr):?>
    		            <div style="height: 30px;"><strong><?php echo $attr['attr_name'];?>:</strong>
    		                <?php $attr_arr = unserialize($attr['attr_value']);?>
    		                <select name="GoodsForm[goods_attr]" id="GoodsForm_goods_attr" style="float: none;">
    		                    <option value="0">其他</option>
    		                <?php foreach ($attr_arr as $key=>$val):?>
    		                    <option value="<?php echo $key;?>"><?php echo $val;?></option>
    		                <?php endforeach;?>
    		                </select>
    		            </div>
    		        <?php endforeach;?>
    		    </dd>
    		</dl>
		    <?php endif;?>
		    
		    <?php if($brand_info):?>
		    <dl>
    			<dt>商品品牌：</dt>
    			<dd>
    		        <select name="GoodsForm[goods_brand]" id="GoodsForm_goods_brand">
    		            <option value="0">其他</option>
    		        <?php foreach($brand_info as $brand):?>
    		            <option value="<?php echo $brand['brand_id'];?>"><?php echo $brand['brand_name'];?></option>
    		        <?php endforeach;?>
    		        </select>
    		    </dd>
    		</dl>
		    <?php endif;?>
		    <dl id="mix_type">
		        
		    </dl>
		<?php endif;?>
		<dl>
			<dt>商品价格：</dt>
			<dd>
		        <input name="GoodsForm[goods_price]" id="GoodsForm_goods_price" type="text" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>商品库存：</dt>
			<dd>
		        <input name="GoodsForm[goods_storage]" id="GoodsForm_goods_storage" type="text" class="required" />
		    </dd>
		</dl>
		<dl>
		    <dt>商品图片：</dt>
			<dd>
        		<input id="testFileInput" type="file" name="attach[]" 
            		uploaderOption="{
            			swf:'<?php echo Yii::app()->request->baseUrl; ?>/js/dwz/uploadify/uploadify.swf',
            			uploader:'?r=goods/upload',
            			formData:{PHPSESSID:'xxx', ajax:1},
            			buttonText:'上传图片',
            			fileSizeLimit:'200KB',
            			fileTypeDesc:'*.jpg;*.jpeg;*.gif;*.png;',
            			fileTypeExts:'*.jpg;*.jpeg;*.gif;*.png;',
            			auto:true,
            			multi:true,
            			onUploadSuccess:uploadifySuccess
            		}"
            	/>
		    </dd>
		    <dd id="image">
		    </dd>
		</dl>
		<dl>
			<dt>上架：</dt>
			<dd>
			    <input type="radio" name="GoodsForm[goods_show]" id="GoodsForm_goods_show" value="1" checked >是
			    <input type="radio" name="GoodsForm[goods_show]" id="GoodsForm_goods_show" value="0" >否
		    </dd>
		</dl>
		<dl>
			<dt>推荐：</dt>
			<dd>
			    <input type="radio" name="GoodsForm[goods_recommend]" id="GoodsForm_goods_recommend" value="1" checked >是
			    <input type="radio" name="GoodsForm[goods_recommend]" id="GoodsForm_goods_recommend" value="0" >否
		    </dd>
		</dl>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>
<script type="text/javascript">
function uploadifySuccess(file, data, response){
	data = eval ("(" + data + ")");
	if(data['statusCode'] == 200){
		var time = new Date().getTime();
		$("#image").append('<div class="'+time+'"><input type="hidden" name="GoodsForm[image][]" value="'+data['message']+'" /><img src="'+data['message']+'" width="60px" height="60px" /><a class="drop_img" value="'+time+'">删除</a></div>');
	}else{
	    alert(data['message']);
	}
}
$("#image").on('click',".drop_img",function(){
	var val = $(this).attr('value');
	$("."+val+"").remove();
})

var count_spec = $(".spec").size();

$(".spec :checkbox").click(function(){
	var mrtype = $(this).parent().attr('mrtype');
	var mrtype_count = 0;
    for(var i = 1; i <= count_spec; i++){
        if(i != mrtype){
            var count_box = $(".spec"+i).find(":checked").size();
            if(count_box == 0){
                break;
            }
        	mrtype_count++;
        }
    }

    if(mrtype_count >= count_spec-1){
        var j = 0;
        var spec_arr = new Array();
        while(j < count_spec){
        	spec_arr[j] = new Array();
        	var index = j+1;
        	var k = 0;
        	$(".spec"+index).find(":checked").each(function(){
            	var value = $(this).val();
            	spec_arr[j][k] = new Array();
        		//spec_arr[j][k]['value'] = ".spec"+index+"_"+value;
            	spec_arr[j][k]['value'] = value;
        		spec_arr[j][k]['spec_id'] = $(this).attr('spec_id');
        		spec_arr[j][k]['name'] = $(this).attr('value_name');
        		k++;
            });
        	j++;
        }

        var final_arr = new Array();
        var temp_arr = new Array();
        var mix_arr = new Array();
        var y = 0;
        for(var n=0; n<spec_arr.length; n++){
            for(var m=0; m<spec_arr[n].length; m++){
            	//alert(spec_arr[n][m]['value']);
            	//$("#mix_type").append();
            	if(n == 0){
            		mix_arr[y] = spec_arr[n][m]['spec_id']+'.'+spec_arr[n][m]['value'];
            	}else{
            		temp_arr = [];
            	    temp_arr = mix_arr;
            	    mix_arr = [];
            	    for(var x=0; x<temp_arr.length; x++){
            	    	mix_arr[x] = temp_arr[x]+'-'+spec_arr[n][m]['spec_id']+'.'+spec_arr[n][m]['value'];
            	    	//alert(mix_arr[x]);
                	}
                }
                y++;
            }
            y++;
        }
        
        for(var n=0; n<mix_arr.length; n++){
            alert(mix_arr[n]);
        }
        
        /*for(var n=0; n<spec_arr.length; n++){
            for(var x=0; x<spec_arr[n].length; x++){
            	final_arr[y] = spec_arr[n]['value'];
            	y++;
            }
            y++;
        }*/
        //alert(final_arr[0]);
        /*for(var z=0; z<final_arr.length; z++){
            alert(final_arr[z]);
        } */     
    }
})
</script>