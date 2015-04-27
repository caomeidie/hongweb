<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dwz/hong.style.js" type="text/javascript"></script>
<div class="pageContent">
	<form method="post" action="?r=articleclass/add" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>分类名称：</dt>
			<dd>
		        <input name="ACForm[acname]" id="ACForm_acname" type="text" value="<?php echo $ac_info['ac_name'];?>" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>分类代码：</dt>
			<dd>
		        <input name="ACForm[accode]" id="ACForm_accode" type="text"  value="<?php echo $ac_info['ac_code'];?>" />
		    </dd>
		</dl>
		<dl>
			<dt>上级分类：</dt>
			<dd>
			    <select name="ACForm[parent_id]" id="ACForm_parent_id" class="valid">
                <option value="0">请选择...</option>
			    <?php foreach ($ac as $id=>$val): ?> 
                    <?php if($id != $ac_info['ac_id']):?><option value="<?php echo $id;?>" <?php if($id == $ac_info['ac_parent_id']):?>selected<?php endif;?>>&nbsp;&nbsp;<?php echo $val['ac_name'];?></option><?php endif;?>
			    <?php endforeach;?>
			    </select>
			</dd>
		</dl>
		<dl>
			<dt>排序：</dt>
			<dd>
		        <input name="ACForm[acsort]" id="ACForm_acsort" type="text" value="255" class="required" value="<?php echo $ac_info['ac_sort'];?>" />
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