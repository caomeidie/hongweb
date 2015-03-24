/**
 * @author Henry Lee
 */
$(function(){
	/*全选*/
	$(".all").live('click',function(){
		if($('tbody :checked').length != $('tbody').find(':checkbox').length){
	    	$('tbody').find(':checkbox').each(function(){
		    	$(this).attr('checked',true);	    	    
		    });
		}else{
			$('tbody').find(':checkbox').each(function(){
		    	$(this).attr('checked',false);	    	    
		    });
		};
	});
})