<div class="pageContent">
	选择商品分类：
	<form method="post" action="?r=goods/add&step=two" class="pageForm required-validate" onsubmit="return navTabSearch(this);">
		<div class="pageFormContent nowrap" layoutH="97">
		    <select name="goodsclass" id="goodsclass">
		    <?php if($gc_list):?>
		    <?php foreach($gc_list as $gc):?>
	        <option value="<?php echo $gc['val']['gc_id']?>"><?php echo $gc['html'].$gc['val']['gc_name']?></option>
	        <?php endforeach;?>
	        <?php endif;?>
	        </select>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">下一步</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>