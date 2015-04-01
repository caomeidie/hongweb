<div class="pageContent">
	<form method="post" action="?r=userstyle/add" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="97">
		<dl>
			<dt>类型名：</dt>
			<dd>
		        <input name="StyleForm[stylename]" id="StyleForm_stylename" type="text"  class="required" />
		    </dd>
		</dl>
		<dl>
			<dt>角色权限：</dt>
			<dd>
			    <div>
    			    <?php foreach ($roles as $id=>$role): ?>
    			    <?php if(($roles[$id+1]['parent_role_id'] === $role['role_id']) || ($id==0)):?>
    			    <?php echo '<div class="role_list">'.$role['role_desc'].'<br>'; ?>
    			    <?php endif;?>
    			    <input name="StyleForm[roles][]" type="checkbox" value=<?php echo $role['role_id']?> <?php if($role['related_role_id']): ?> related="<?php echo $role['related_role_id']; ?>" <?php endif;?> /><?php echo $role['role_desc']?>
    			    <?php if(($roles[$id+1]['parent_role_id'] !== $role['parent_role_id']) && ($roles[$id+1]['parent_role_id'] !== $role['role_id']) || ($id==0)) :?>
    			    <?php echo "</div><br>"; ?>
    			    <?php endif;?>    			    
    			    <?php endforeach;?>
			    </div>
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
<script>
$(":checkbox").click(function(){
    var val = $(this).val();
    var firstOne = $(this).parent(".role_list").find(":checkbox").first();
    if(val == 1){
        if($(this).attr("checked") == 'checked'){
        	$(":checkbox").each(function(){
        	    $(this).attr("checked", "checked");
            });
        }else{
        	$(":checkbox").each(function(){
        	    $(this).attr("checked", false);
            });
        }
    }else if(val == $(this).parent(".role_list").find(":checkbox").first().val()){
    	if($(this).attr("checked") == 'checked'){
        	$(this).nextAll().each(function(){
        		$(this).attr("checked", "checked");
            });
        }else{
        	$(this).nextAll().each(function(){
        		$(this).attr("checked", false);
            });
        }
    }else{
        var related = $(this).attr('related');
    	if(related){
    		if($(this).attr("checked") == "checked"){
            	if($(".role_list").find(":checked[value='"+related+"']").length <= 0){
            		$(this).attr("checked", false);
            		alert("有相关联的权限未开启，请先开启！");
            	}
    		}else{
    			firstOne.attr("checked", false);
    		}
        }else{
        	if($(this).attr("checked") != "checked"){
            	if(confirm("如果取消当前选项，则与之相关联的选项也将被取消，是否继续？")){
            	    $(".role_list").find("[related='"+$(this).val()+"']").each(function(){
            	        $(this).attr("checked", false);
                	});
            	    firstOne.attr("checked", false);
                }else{
                	$(this).attr("checked", "checked");
                }
            }
        }
    }

    var countThisAll = $(this).parent(".role_list").find(":checkbox").length;
    var countThisChk = $(this).parent(".role_list").find(":checked").length;
    if(firstOne.attr("checked") != 'checked' && countAll == countChk+1){
    	firstOne.attr("checked", 'checked');
    }

    if($(".role_list").find(":checkbox").length == $(".role_list").find(":checked").length+1){
    	$(".role_list").find("[value='1']").attr("checked", 'checked');
    }  
});
</script>