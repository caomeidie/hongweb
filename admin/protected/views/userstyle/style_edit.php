<div class="pageContent">
	<form method="post" action="?r=userstyle/edit&sid=<?php echo $style['style_id']; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>类型名：</dt>
			<dd>
		        <input name="UserStyle[style_value]" id="UserStyle_style_value" type="text" value="<?php echo $style['style_value']; ?>" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>角色权限：</dt>
			<dd>
			    <div>
			        <?php $style['roles'] = unserialize($style['roles']); ?>
			        
    			    <?php foreach ($roles as $id=>$role): ?>
    			    <?php if(($roles[$id+1]['parent_role_id'] === $role['role_id']) || ($id==0)):?>
    			    <?php echo "<div>".$role['role_desc']."<br>"; ?>
    			    <?php endif;?>
    			    <input name="UserStyle[roles][]" type="checkbox" <?php if(in_array($role['role_id'], $style['roles'])): ?> checked="checked" <?php endif;?> value=<?php echo $role['role_id']?> <?php if($role['related_role_id']): ?> related="<?php echo $role['related_role_id']; ?>" <?php endif;?> /><?php echo $role['role_desc']?>
    			    <?php if(($roles[$id+1]['parent_role_id'] !== $role['parent_role_id']) && ($roles[$id+1]['parent_role_id'] !== $role['role_id']) || ($id==0)) :?>
    			    <?php echo "</div><br>"; ?>
    			    <?php endif;?>    			    
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