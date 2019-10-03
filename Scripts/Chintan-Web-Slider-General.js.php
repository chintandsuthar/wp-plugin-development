<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<script>
	function addSliderJ2()
	{
		jQuery('.Table_Data_chintan_web1_2').css('display','none');
		jQuery('.JAddSlider2').addClass('JAddSlider2Anim');
		jQuery('.Table_Data_chintan_web2_2').css('display','block');
		jQuery('.JSaveSlider2').addClass('JSaveSlider2Anim');
		jQuery('.JCanselSlider2').addClass('JCanselSlider2Anim');
		jQuery('.chintan_web_SaveSl_Table_2_1').show();
		jQuery( 'input.alpha-color-picker' ).alphaColorPicker();
		jQuery('.wp-color-result').attr('title','Select');
		jQuery('.wp-color-result').attr('data-current','Selected');
		stugel_rw("NSL"); stugel_rw_lt("NSL");
	}
	function stugel_rw(str)
	{
		if(jQuery("#Chintan_Web_"+str+"_L_T").val() == "Type 1") { jQuery(".Loder_1_Option").show(); } else { jQuery(".Loder_1_Option").hide(); }
	}
	function stugel_rw_lt(str)
	{
		if(jQuery("#Chintan_Web_"+str+"_LT_T").val() == "Type 1") { jQuery(".rw_text_color").hide(); jQuery(".rw_text_color1").show(); }
		else if(jQuery("#Chintan_Web_"+str+"_LT_T").val() == "Type 2") { jQuery(".rw_text_color").hide(); jQuery(".rw_text_color2").show(); }
		else if(jQuery("#Chintan_Web_"+str+"_LT_T").val() == "Type 3") { jQuery(".rw_text_color").hide(); jQuery(".rw_text_color3").show(); }
		else { jQuery(".rw_text_color").hide(); }
	}
	function change_rw_tr(str) { stugel_rw(str); }
	function change_rw_ltt(str) { stugel_rw_lt(str); }
	function canselSliderJ2() { location.reload(); }
	function Chintan_PS_Buttons_Clicked()
	{
		var chintan_web_slider_type=jQuery('#chintan_web_slider_type').val();
		jQuery('.chintan_web_SaveSl_Table_2').hide();
		if(chintan_web_slider_type=='Slider Navigation') { jQuery('.chintan_web_SaveSl_Table_2_1').show(); stugel_rw("NSL"); stugel_rw_lt("NSL"); }
		else if(chintan_web_slider_type=='Content Slider') { jQuery('.chintan_web_SaveSl_Table_2_2').show(); stugel_rw("ContSl"); stugel_rw_lt("ContSl"); }
		else if(chintan_web_slider_type=='Fashion Slider') { jQuery('.chintan_web_SaveSl_Table_2_3').show(); stugel_rw("FSl"); stugel_rw_lt("FSl"); }
		else if(chintan_web_slider_type=='Circle Thumbnails') { jQuery('.chintan_web_SaveSl_Table_2_4').show(); stugel_rw("CircleSl"); stugel_rw_lt("CircleSl"); }
		else if(chintan_web_slider_type=='Slider Carousel') { jQuery('.chintan_web_SaveSl_Table_2_5').show(); stugel_rw("CarSl"); stugel_rw_lt("CarSl"); }
		else if(chintan_web_slider_type=='Flexible Slider') { jQuery('.chintan_web_SaveSl_Table_2_6').show(); stugel_rw("FlexibleSl"); stugel_rw_lt("FlexibleSl"); }
		else if(chintan_web_slider_type=='Dynamic Slider') { jQuery('.chintan_web_SaveSl_Table_2_7').show(); stugel_rw("DynamicSl"); stugel_rw_lt("DynamicSl"); }
		else if(chintan_web_slider_type=='Thumbnails Slider & Lightbox') { jQuery('.chintan_web_SaveSl_Table_2_8').show(); stugel_rw("ThSl"); stugel_rw_lt("ThSl"); }
		else if(chintan_web_slider_type=='Accordion Slider') { jQuery('.chintan_web_SaveSl_Table_2_9').show(); stugel_rw("AccSl"); stugel_rw_lt("AccSl"); }
		else if(chintan_web_slider_type=='Animation Slider') { jQuery('.chintan_web_SaveSl_Table_2_10').show(); stugel_rw("AnimSl"); stugel_rw_lt("AnimSl"); }
	}
	function chintan_web_Edit_Sl2(chintan_web_Slider_ID)
	{
		jQuery(".rw_loading_c").show();
		var ajaxurl = object.ajaxurl;
		var data = {
		action: 'chintan_web_Edit_Option', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: chintan_web_Slider_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) {
			var data = JSON.parse(response)
			console.log(data)
			jQuery("input[name='chintan_web_Slider_UP_ID']").val(data[0][0]['chintanideo_EN_ID']);
			for(i=0;i<data.length;i++)
			{
				for(var key in data[i][0])
				{
					if( data[i][0][key] == 'true' || data[i][0][key] == 'on' ) { jQuery("#"+key).attr('checked',true); }
					else if( data[i][0][key] == 'false' || data[i][0][key] == '' || data[i][0][key] == 'none' ) { jQuery("#"+key).attr('checked',false); }
					else { jQuery("#"+key).val(data[i][0][key]); }
					if(jQuery("."+key).val()) { jQuery("."+key).val(data[i][0][key]); }
				}
			}
			var answer = data[0][0]['chintan_web_slider_type'];
			if(answer=='Slider Navigation') { jQuery('.chintan_web_SaveSl_Table_2_1').show(); stugel_rw("NSL"); stugel_rw_lt("NSL"); }
			else if(answer=='Content Slider') { jQuery('.chintan_web_SaveSl_Table_2_2').show(); stugel_rw("ContSl"); stugel_rw_lt("ContSl"); }
			else if(answer=='Fashion Slider') { jQuery('.chintan_web_SaveSl_Table_2_3').show(); stugel_rw("FSl"); stugel_rw_lt("FSl"); }
			else if(answer=='Circle Thumbnails') { jQuery('.chintan_web_SaveSl_Table_2_4').show(); stugel_rw("CircleSl"); stugel_rw_lt("CircleSl"); }
			else if(answer=='Slider Carousel') { jQuery('.chintan_web_SaveSl_Table_2_5').show(); stugel_rw("CarSl"); stugel_rw_lt("CarSl"); }
			else if(answer=='Flexible Slider') { jQuery('.chintan_web_SaveSl_Table_2_6').show(); stugel_rw("FlexibleSl"); stugel_rw_lt("FlexibleSl"); }
			else if(answer=='Dynamic Slider') { jQuery('.chintan_web_SaveSl_Table_2_7').show(); stugel_rw("DynamicSl"); stugel_rw_lt("DynamicSl"); }
			else if(answer=='Thumbnails Slider & Lightbox') { jQuery('.chintan_web_SaveSl_Table_2_8').show(); stugel_rw("ThSl"); stugel_rw_lt("ThSl"); }
			else if(answer=='Accordion Slider') { jQuery('.chintan_web_SaveSl_Table_2_9').show(); stugel_rw("AccSl"); stugel_rw_lt("AccSl"); }
			else if(answer=='Animation Slider') { jQuery('.chintan_web_SaveSl_Table_2_10').show(); stugel_rw("AnimSl"); stugel_rw_lt("AnimSl"); }
			jQuery('#chintan_web_slider_type').hide();
			rangeSlider();
			jQuery( 'input.alpha-color-picker' ).alphaColorPicker();
			jQuery('.wp-color-result').attr('title','Select');
			jQuery('.wp-color-result').attr('data-current','Selected');
			jQuery(".rw_loading_c").hide();
		})
		setTimeout(function(){
			jQuery('.Table_Data_chintan_web1_2').css('display','none');
			jQuery('.JAddSlider2').addClass('JAddSlider2Anim');
			jQuery('.Table_Data_chintan_web2_2').css('display','block');
			jQuery('.JUpdateSlider2').addClass('JSaveSlider2Anim');
			jQuery('.JCanselSlider2').addClass('JCanselSlider2Anim');
		},500)
	}
	function chintan_web_Delete_Sl2(chintan_web_Slider_ID)
	{
		var RWSIRSO = chintan_web_Slider_ID;
		jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeIn();
		jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeIn();
		jQuery('.Chintan_Web_SliderIm_Relative_No').click(function(){
			jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
			jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
			RWSIRSO = null;
		})
		jQuery('.Chintan_Web_SliderIm_Relative_Yes').click(function(){
			if(RWSIRSO != null)
			{
				jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
				jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
				var ajaxurl = object.ajaxurl;
				var data = {
					action: 'chintan_web_Del_Option', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
					foobar: chintan_web_Slider_ID, // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) { location.reload(); })
			}
			RWSIRSO = null;
		})
	}
	function chintan_web_Copy_Sl2(chintan_web_Slider_ID)
	{
		var ajaxurl = object.ajaxurl;
		var data = {
			action: 'chintan_web_Copy_Sl2', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
			foobar: chintan_web_Slider_ID, // translates into $_POST['foobar'] in PHP
		};
		jQuery.post(ajaxurl, data, function(response) { location.reload(); })
	}
	var rangeSlider = function()
	{
		var slider = jQuery('.range-slider'), range = jQuery('.range-slider__range'), value = jQuery('.range-slider__value');
		slider.each(function()
		{
			value.each(function()
			{
				var value = jQuery(this).prev().attr('value');
				jQuery(this).html(value);
			});
			range.on('input', function()
			{
				jQuery(this).next(value).html(this.value);
			});
		});
	};
	rangeSlider();
</script>