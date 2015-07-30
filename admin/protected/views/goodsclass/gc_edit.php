<div class="pageContent">
	<form method="post" action="?r=goodsclass/edit&uid=<?php echo $gc_info['gc_id']; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>分类名称：</dt>
			<dd>
		        <input name="ClassForm[name]" id="ClassForm_name" type="text" value="<?php echo $gc_info['gc_name']; ?>" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>上级分类：</dt>
			<dd>
		        <select name="ClassForm[gc]" id="ClassForm_gc">
			    <option value="0">请选择...</option>
			    <?php if($gc_list):?>
			    <?php foreach($gc_list as $gc):?>
			    <?php if($gc_info['gc_id'] != $gc['val']['gc_id']):?>
		        <option value="<?php echo $gc['val']['gc_id']?>" <?php if($gc_info['gc_parent_id'] == $gc['val']['gc_id']):?>selected<?php endif;?>><?php echo $gc['html'].$gc['val']['gc_name']?></option>
		        <?php endif;?>
		        <?php endforeach;?>
		        <?php endif;?>
		        </select>
		    </dd>
		</dl>
		<dl>
			<dt>关联类型：</dt>
			<dd>
			    <select name="ClassForm[type]" id="ClassForm_type">
			    <option value="0">请选择...</option>
			    <?php if($type_list):?>
			    <?php foreach($type_list as $type):?>
		        <option value="<?php echo $type['type_id']?>" <?php if($gc_info['type_id'] == $type['type_id']):?>selected<?php endif;?>><?php echo $type['type_name']?></option>
		        <?php endforeach;?>
		        <?php endif;?>
		        </select>
		    </dd>
		</dl>
		<dl>
			<dt>显示：</dt>
			<dd>
			    <input type="radio" name="ClassForm[show]" id="ClassForm_show" value="1" <?php if($gc_info['gc_show'] == 1):?> checked <?php endif;?>>是
			    <input type="radio" name="ClassForm[show]" id="ClassForm_show" value="0" <?php if($gc_info['gc_show'] == 0):?> checked <?php endif;?>>否
		    </dd>
		</dl>
		<dl>
			<dt>索引：</dt>
			<dd>
			    <input name="ClassForm[sort]" id="ClassForm_sort" type="text" value="<?php echo $gc_info['gc_sort']; ?>" >
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