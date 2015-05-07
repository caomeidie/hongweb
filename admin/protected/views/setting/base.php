<div class="pageContent">
	<form method="post" name="SettingForm" action="?r=setting/save" class="pageForm required-validate" enctype="multipart/form-data">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>网站名称：</dt>
			<dd>
		        <input name="name" id="SettingForm_name" type="text" value="<?php echo $setting_list['site_name']['setting_val'];?>" />
		    </dd>
		</dl>
		<dl>
			<dt>网站Logo：</dt>
			<dd>
			<input type="file" name="attach[]" id="SettingForm_logo" />
		        <img alt="" src="<?php echo $setting_list['site_logo']['setting_val'];?>">
		    </dd>
		</dl>
		<dl>
			<dt>ICP证书号：</dt>
			<dd>
			    <input name="icp" id="SettingForm_icp" value="<?php echo $setting_list['icp_number']['setting_val'];?>" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>联系电话：</dt>
			<dd>
		        <input name="phone" id="SettingForm_phone" type="text" value="<?php echo $setting_list['site_phone']['setting_val'];?>"  />
		    </dd>
		</dl>
		<dl>
			<dt>电子邮件：</dt>
			<dd>
		        <input name="email" id="SettingForm_email" type="text" value="<?php echo $setting_list['site_email']['setting_val'];?>"  />
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