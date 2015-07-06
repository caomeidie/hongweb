<div class="pageContent">
	<form method="post" action="?r=storegrade/edit&uid=<?php echo $storegrade['sg_id']; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>店铺等级名称：</dt>
			<dd>
		        <input name="SGForm[sg_name]" id="SGForm_sg_name" type="text"  class="required" value="<?php echo $storegrade['sg_name']; ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>索引：</dt>
			<dd>
			    <input name="SGForm[sg_sort]" id="SGForm_sg_sort" type="text" value="<?php echo $storegrade['sg_sort']; ?>" >
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
