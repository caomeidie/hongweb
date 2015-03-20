
<div class="pageContent">
	<form method="post" action="?r=users/add" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>用户名：</dt>
			<dd>
		        <input name="UsersForm[username]" id="UsersForm_username" type="text"  class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>密码：</dt>
			<dd>
			    <input name="UsersForm[password]" id="UsersForm_password" type="password"  class="required alphanumeric" minlength="6" maxlength="20" />
			</dd>
		</dl>
		<dl>
			<dt>确认密码：</dt>
			<dd>
			    <input name="UsersForm[checkpwd]" id="UsersForm_checkpwd" type="password"  class="required" equalto="#UsersForm_password" />
		</dd>
		</dl>
		<dl>
			<dt>Email：</dt>
			<dd>
			    <input name="UsersForm[email]" id="UsersForm_email" type="text" class="email">
		</dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
			    <input name="UsersForm[phone]" id="UsersForm_phone" type="text"  class="phone">
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
