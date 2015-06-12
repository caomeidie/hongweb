
<div class="pageContent">
	<form method="post" action="?r=admin/edit&uid=<?php echo $admin['admin_id']; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>管理员名：</dt>
			<dd>
		        <input name="Admin[adminname]" id="Admin_adminname" type="text"  class="required" value="<?php echo $admin['adminname']; ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>管理员类型：</dt>
			<dd>
		        <select name="Admin[style_id]" id="Admin_style_id" class="required">
		            <?php foreach($styles as $val):?>
		            <option value="<?php echo $val['style_id']?>" <?php if($admin['style_id'] == $val['style_id']):?>selected<?php endif;?>><?php echo $val['style_value']?></option>
		            <?php endforeach;?>
		        </select>
		    </dd>
		</dl>
		<dl>
			<dt>Email：</dt>
			<dd>
			    <input name="Admin[email]" id="Admin_email" type="text" class="email" value="<?php echo $admin['email']; ?>"/>
		</dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
			    <input name="Admin[phone]" id="Admin_phone" type="text"  class="phone" value="<?php echo $admin['phone']; ?>"/>
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
