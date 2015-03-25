
<div class="pageContent">
	<form method="post" action="?r=users/edit&uid=<?php echo $user['user_id']; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>用户名：</dt>
			<dd>
		        <input name="Users[username]" id="Users_username" type="text"  class="required" value="<?php echo $user['username']; ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>Email：</dt>
			<dd>
			    <input name="Users[email]" id="Users_email" type="text" class="email" value="<?php echo $user['email']; ?>"/>
		</dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
			    <input name="Users[phone]" id="Users_phone" type="text"  class="phone" value="<?php echo $user['phone']; ?>"/>
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
