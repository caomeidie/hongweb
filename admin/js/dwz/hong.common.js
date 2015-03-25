/**
 * @author Henry Lee
 */
$(function(){
	/*全选*/
	$(".all").live('click',function(){
		href = href.replace(/{(\w+)}/, '');
		var user_id='';
		if($('.gridTbody :checked').length != $('.gridTbody').find(':checkbox').length){
	    	$('.gridTbody').find(':checkbox').each(function(){
		    	$(this).attr('checked',true);
		    	if(user_id==''){
					user_id += $(this).val();
				}else{
					user_id = user_id+','+$(this).val(); 
				}
		    });
		}else{
			$('.gridTbody').find(':checkbox').each(function(){
		    	$(this).attr('checked',false);
		    	user_id='{sid_user}';
		    });
		};
		$("#delete").attr('href', href+user_id);
	});
		
	$('.gridTbody').find(':checkbox').live('click', function(){
		href = href.replace(/{(\w+)}/, '');
		var user_id='';
		if($('.gridTbody :checked').length <= 0){
			user_id='{sid_user}';
		}
		$('.gridTbody :checked').each(function(){
			if(user_id==''){
				user_id += $(this).val();
			}else{
				user_id = user_id+','+$(this).val(); 
			}
		});
		$("#delete").attr('href', href+user_id);
	});
})