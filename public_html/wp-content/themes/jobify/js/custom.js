	function mainmenu(){
	jQuery("#menu-main-menu-1 li").hover(function(){
	jQuery(this).find('ul:first').stop();
	jQuery(this).find('ul:first').slideDown("slow");
	},function(){
	jQuery(this).find('ul:first').stop();
	jQuery(this).find('ul:first').slideUp("slow");
	});
	}

jQuery(document).ready(function($){
	mainmenu();
	$('#search_checkbox, #custom_job_type').click(function(e){
		if( e.target == this ){ 
			$(this).find('.slide_check').stop(true).slideDown();
		}
		else{
			var the_class = $(e.target).attr('class');
			if (the_class == 'active_checkbox'){
				var content = $(e.target).html();
				$('.categ_span:contains("' + content + '")').click();
				$(e.target).remove();
			}
		}
	});




	



	
	$('#search_checkbox, #custom_job_type').mouseleave(function(){
		$(this).find('.slide_check').stop(true).slideUp();
	});

	$('.categ_span').click(function(){
		$(this).parent().find('span input').click();
		var txt = $(this).html();

		$('#search_checkbox .checkbox_label').hide();
		$('#search_checkbox').append('<div class="active_checkbox">' + txt + '</div>');
		});

	$('.active_checkbox').click(function(e){
		e.stopPropagation();
		var content = $(this).html();
		alert(content);
		$('.categ_span:contains("' + content + '")').hide();
	});


	

	$('.prod_row').click(function(){
		$('.prod_row').removeClass('package_selected');
		$(this).addClass('package_selected');
		var prod_id = $(this).find('input').val();
		$('.pack_add .button-secondary').attr('href','/?add-to-cart=' + prod_id);
		
	});

	    //----------Hover poza 1 begins--------------

    $('.left_side').hover(
    	function(){
    	$('#poza-overlay1').addClass('overlay-transition1');
    	$("#poza1 img").addClass('poza-transition1');
    	console.log('in');

    }, function(){
    	$('#poza-overlay1').removeClass('overlay-transition1');
    	$("#poza1 img").removeClass('poza-transition1');

    });
    //----------Hover poza 1 ends----------------

     //----------Hover poza 2 begins--------------
    $('.right_side').hover(
    	function(){
    	$('#poza-overlay2').addClass('overlay-transition2');
    	$("#poza2 img").addClass('poza-transition2');

    }, function(){
    	$('#poza-overlay2').removeClass('overlay-transition2');
    	$("#poza2 img").removeClass('poza-transition2');

    });
    //----------Hover poza 2 ends----------------

});
