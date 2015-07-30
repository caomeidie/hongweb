<div class="pageContent">
	<form method="post" action="?r=goodstype/add" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>类型名称：</dt>
			<dd>
		        <input name="TypeForm[name]" id="TypeForm_name" type="text"  class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>关联规格：</dt>
			<dd>
			    <?php if($spec_list):?>
			    <?php foreach($spec_list as $spec):?>
		        <input name="TypeForm[spec][]" id="TypeForm_spec" type="checkbox" value="<?php echo $spec['spec_id']?>" /><span style="font-weight: bold;"><?php echo $spec['spec_name']?>：</span><?php echo implode('，', unserialize($spec['spec_value']));?></br>
		        <?php endforeach;?>
		        <?php endif;?>
		    </dd>
		</dl>
		<dl>
			<dt>关联属性：</dt>
			<dd>
			    <?php if($attr_list):?>
			    <?php foreach($attr_list as $attr):?>
		        <input name="TypeForm[attr][]" id="TypeForm_attr" type="checkbox" value="<?php echo $attr['attr_id']?>" /><span style="font-weight: bold;"><?php echo $attr['attr_name']?>：</span><?php echo implode('，', unserialize($attr['attr_value']));?></br>
		        <?php endforeach;?>
		        <?php endif;?>
		    </dd>
		</dl>
		<dl>
			<dt>关联品牌：</dt>
			<dd>
			    <?php if($brand_list):?>
			    <?php foreach($brand_list as $brand):?>
		        <input name="TypeForm[brand][]" id="TypeForm_brand" type="checkbox" value="<?php echo $brand['brand_id']?>" /><?php echo $brand['brand_name']?>
		        <?php endforeach;?>
		        <?php endif;?>
		    </dd>
		</dl>
		<dl>
			<dt>索引：</dt>
			<dd>
			    <input name="TypeForm[sort]" id="TypeForm_sort" type="text" >
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