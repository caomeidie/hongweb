<div class="pageContent">
	<form method="post" action="?r=member/edit&uid=<?php echo $member['member_id']; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>会员名：</dt>
			<dd>
		        <input name="MemberForm[member_name]" id="MemberForm_member_name" type="text"  class="required" value="<?php echo $member['member_name']; ?>" />
		    </dd>
		</dl>
		<dl>
			<dt>手机号：</dt>
			<dd>
			    <input name="MemberForm[member_mobile]" id="MemberForm_member_mobile" type="text"  class="phone" value="<?php echo $member['member_mobile']; ?>">
		    </dd>
		</dl>
		<dl>
			<dt>Email：</dt>
			<dd>
			    <input name="MemberForm[member_email]" id="MemberForm_member_email" type="text" class="email" value="<?php echo $member['member_email']; ?>">
		    </dd>
		</dl>
		<dl>
			<dt>真实姓名：</dt>
			<dd>
			    <input name="MemberForm[member_truename]" id="MemberForm_member_truename" type="text" value="<?php echo $member['member_truename']; ?>">
		    </dd>
		</dl>
		<dl>
			<dt>身份证号：</dt>
			<dd>
			    <input name="MemberForm[member_idcard]" id="MemberForm_member_idcard" type="text" value="<?php echo $member['member_idcard']; ?>">
		    </dd>
		</dl>
		<dl>
			<dt>性别：</dt>
			<dd>
			    <input name="MemberForm[member_sex]" type="radio" value=0 <?php if($member['member_sex'] == 0):?>checked<?php endif;?> >保密
			    <input name="MemberForm[member_sex]" type="radio" value=1 <?php if($member['member_sex'] == 1):?>checked<?php endif;?>>男
			    <input name="MemberForm[member_sex]" type="radio" value=2 <?php if($member['member_sex'] == 2):?>checked<?php endif;?>>女
		    </dd>
		</dl>
		<dl>
			<dt>生日：</dt>
			<dd>
			    <input name="MemberForm[member_birthday]" id="MemberForm_member_birthday" type="text" value="<?php echo $member['member_birthday']; ?>">
		    </dd>
		</dl>
		<dl>
			<dt>是否屏蔽：</dt>
			<dd>
			    <input name="MemberForm[member_state]" type="radio" value=1 <?php if($member['member_state'] == 1):?>checked<?php endif;?>>否
			    <input name="MemberForm[member_state]" type="radio" value=0 <?php if($member['member_state'] == 0):?>checked<?php endif;?>>是
		    </dd>
		</dl>
		<dl>
			<dt>是否VIP：</dt>
			<dd>
			    <input name="MemberForm[member_vip]" type="radio" value=0 <?php if($member['member_vip'] == 0):?>checked<?php endif;?>>否
			    <input name="MemberForm[member_vip]" type="radio" value=1 <?php if($member['member_vip'] == 1):?>checked<?php endif;?>>是
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
