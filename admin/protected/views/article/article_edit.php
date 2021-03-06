<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dwz/hong.style.js" type="text/javascript"></script>
<div class="pageContent">
	<form method="post" action="?r=article/edit&sid=<?php echo $article_info['article_id']; ?>" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>标题：</dt>
			<dd>
		        <input name="ArticleForm[aname]" id="ArticleForm_aname" type="text" value="<?php echo $article_info['article_title'];?>" class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>所属分类：</dt>
			<dd>
			    <select name="ArticleForm[ac_id]" id="ArticleForm_ac_id" class="valid">
                <option value="0">请选择...</option>
			    <?php foreach ($ac as $id=>$val): ?> 
                    <option value="<?php echo $id;?>" <?php if($id == $article_info['ac_id']):?>selected<?php endif;?>>&nbsp;&nbsp;<?php echo $val['ac_name'];?></option>
			    <?php endforeach;?>
			    </select>
			</dd>
		</dl>
		<dl>
			<dt>链接：</dt>
			<dd>
		        <input name="ArticleForm[url]" id="ArticleForm_url" value="<?php echo $article_info['article_url'];?>" type="text" />
		    </dd>
		</dl>
		<dl>
			<dt>是否显示：</dt>
			<dd>
			    <input type="radio" name="ArticleForm[isshow]" value="1" id="ArticleForm_isshow" <?php if($article_info['article_show']):?>checked<?php endif;?> >显示
			    <input type="radio" name="ArticleForm[isshow]" value="0" id="ArticleForm_isshow" <?php if(!$article_info['article_show']):?>checked<?php endif;?>>隐藏
		    </dd>
		</dl>
		<dl>
			<dt>排序：</dt>
			<dd>
		        <input name="ArticleForm[sort]" id="ArticleForm_sort" type="text" value="<?php echo $article_info['article_sort'];?>"  />
		    </dd>
		</dl>
		<dl>
			<dt>文章内容：</dt>
			<dd>
		        <textarea class="editor" id="ArticleForm_content" name="ArticleForm[content]" rows="20" cols="100" upLinkUrl="upload.php" upLinkExt="zip,rar,txt" upImgUrl="data/upload.php" upImgExt="jpg,jpeg,gif,png" upFlashUrl="upload.php" upFlashExt="swf" upMediaUrl="upload.php" upMediaExt:"avi"><?php echo $article_info['article_content'];?></textarea>
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