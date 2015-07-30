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
		<dl>
		    <input id="testFileInput2" type="file" name="image2" 
        		uploaderOption="{
        			swf:'<?php echo Yii::app()->request->baseUrl; ?>/js/dwz/uploadify/uploadify.swf',
        			uploader:'demo/common/ajaxDone.html',
        			formData:{PHPSESSID:'xxx', ajax:1},
        			queueID:'fileQueue',
        			buttonImage:'<?php echo Yii::app()->request->baseUrl; ?>/images/uploadify/img/add.jpg',
        			buttonClass:'my-uploadify-button',
        			width:102,
        			auto:false
        		}"
        	/>
        	
        	<div id="fileQueue" class="fileQueue"></div>
        	
        	<input type="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/uploadify/img/upload.jpg" onclick="$('#testFileInput2').uploadify('upload', '*');"/>
        	<input type="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/uploadify/img/cancel.jpg" onclick="$('#testFileInput2').uploadify('cancel', '*');"/>
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