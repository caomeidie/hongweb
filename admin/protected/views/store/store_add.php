<div class="pageContent">
	<form method="post" name="StoreForm" action="?r=store/add" class="pageForm required-validate" onsubmit="return iframeCallback(this, navTabAjaxDone);" enctype="multipart/form-data">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>店铺名称：</dt>
			<dd>
		        <input name="name" id="name" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>登陆密码：</dt>
			<dd>
		        <input name="pass" id="pass" type="password" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺Logo：</dt>
			<dd>
			<input type="file" name="attach[]" id="attach" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺等级：</dt>
			<dd>
			    <select name="storegrade" id="storegrade" class="valid">
                <option value="0">请选择...</option>
			    <?php foreach ($sg as $val): ?> 
                    <option value="<?php echo $val['sg_id'];?>">&nbsp;&nbsp;<?php echo $val['sg_name'];?></option>
			    <?php endforeach;?>
			    </select>
		    </dd>
		</dl>
		<dl>
			<dt>店主姓名：</dt>
			<dd>
		        <input name="name_auth" id="name_auth" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>身份号：</dt>
			<dd>
		        <input name="idcard" id="idcard" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺地址：</dt>
			<dd>
		        <input name="addr" id="addr" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>邮政编码：</dt>
			<dd>
		        <input name="zip" id="zip" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
		        <input name="mobile" id="mobile" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>店铺状态：</dt>
			<dd>
		        <input name="state" id="state" value="1" type="radio" checked />开启
		        <input name="state" id="state" value="0" type="radio" />关闭
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