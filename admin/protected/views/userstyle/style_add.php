<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dwz/hong.style.js" type="text/javascript"></script>
<div class="pageContent">
	<form method="post" action="?r=userstyle/add" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>类型名：</dt>
			<dd>
		        <input name="StyleForm[stylename]" id="StyleForm_stylename" type="text"  class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>角色权限：</dt>
			<dd>
			    <div>
    			    <?php foreach ($roles as $id=>$role): ?>    			    
    			    <?php if(($role['parent_role_id'] !=0 && $roles[$role['parent_role_id']]['parent_role_id'] == 0) || $role['parent_role_id'] == 0):?>
    			    <div class="role_list"><?php echo $role['role_desc']; ?><br>
    			    <?php endif;?>
    			    <input name="StyleForm[roles][]" type="checkbox" value=<?php echo $role['role_id']?> <?php if($role['related_role_id']): ?> related="<?php echo $role['related_role_id']; ?>" <?php endif;?> /><?php echo $role['role_desc']?>
    			    <?php endforeach;?>
			    </div>
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