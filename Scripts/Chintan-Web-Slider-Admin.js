function addSliderJ(number)
{
	jQuery('.Table_Data_chintan_web1').css('display','none');
	jQuery('.JAddSlider').addClass('JAddSliderAnim');
	jQuery('.Table_Data_chintan_web2').css('display','block');
	jQuery('.JSaveSlider').addClass('JSaveSliderAnim');
	jQuery('.JCanselSlider').addClass('JCanselSliderAnim');
	jQuery('.chintan_web_Slider_ID').html('[Chintan_Web_Slider id="'+number+'"]');
	jQuery('.JMBSL').html('&lt;?php echo do_shortcode(&apos;[Chintan_Web_Slider id="'+number+'"]&apos;);?&gt;');
	Chintan_Web_Slider_Editor();
	
}
function canselSliderJ() { location.reload(); }

function chintan_web_Video_Src_Clicked()
{
	var count = 0;
	var zInt = setInterval(function(){
		var code = jQuery('#chintan_web_videoSrc_1').val();
		if(code.indexOf('https://www.youtube.com/')>0)
		{
			if(code.indexOf('list')>0 || code.indexOf('index')>0)
			{
				if(code.indexOf('embed')>0)
				{
					var Chintan_Web_Codes1=code.split('[embed]');
					var Chintan_Web_Codes2=Chintan_Web_Codes1[1].split('[/embed]');
					var Chintan_Web_Codes3=Chintan_Web_Codes2[0].split('www.youtube.com/watch?v=');
					if(Chintan_Web_Codes3[1].length != 11) { Chintan_Web_Codes3[1] = Chintan_Web_Codes3[1].substr(0,11); }

					jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Codes3[1]);
					jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Codes3[1]+'/mqdefault.jpg');
					jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Codes3[1]);

					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
				}
				else
				{
					var Chintan_Web_Codes1 = code.split('<a href="https://www.youtube.com/');
					var Chintan_Web_Codes2= Chintan_Web_Codes1[1].split("=");
					var Chintan_Web_Code_Src = Chintan_Web_Codes2[1].split('&');

					jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Code_Src[0]);
					jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Code_Src[0]+'/mqdefault.jpg');
					jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Code_Src[0]);
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
				}
			}
			else if(code.indexOf('embed')>0)
			{
				var Chintan_Web_Codes1=code.split('[embed]');
				var Chintan_Web_Codes2=Chintan_Web_Codes1[1].split('[/embed]');
				if(Chintan_Web_Codes2[0].indexOf('watch?')>0)
				{
					var Chintan_Web_Codes3=Chintan_Web_Codes2[0].split('=');
					
					jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Codes3[1]);
					jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Codes3[1]+'/mqdefault.jpg');
					jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Codes3[1]);
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
				}
				else
				{
					var Chintan_Web_Code_Src=Chintan_Web_Codes2[0];
					var Chintan_Web_Im_Src=Chintan_Web_Code_Src.split('embed/');

					jQuery('#chintan_web_videoSrc_2').val(Chintan_Web_Code_Src);
					jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Im_Src[1]+'/mqdefault.jpg');
					jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Im_Src[1]);
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
				}
			}
			else
			{
				var Chintan_Web_Codes1 = code.split('<a href="https://www.youtube.com/');
				var Chintan_Web_Codes2= Chintan_Web_Codes1[1].split('=');
				if(Chintan_Web_Codes2.length >= 5)
				{
					var Chintan_Web_Code_Src = Chintan_Web_Codes2[3].split('&');
				}
				else
				{
					var Chintan_Web_Code_Src = Chintan_Web_Codes2[1].split('">https://');
				}
				jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Code_Src[0]+'/mqdefault.jpg');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Code_Src[0]);
				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
		}
		else if(code.indexOf('https://youtu.be/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var Chintan_Web_Codes1=code.split('[embed]');
				var Chintan_Web_Codes2=Chintan_Web_Codes1[1].split('[/embed]');
				var Chintan_Web_Codes3=Chintan_Web_Codes2[0].split('youtu.be/');
				if(Chintan_Web_Codes3[1].length != 11) { Chintan_Web_Codes3[1] = Chintan_Web_Codes3[1].substr(0,11); }

				jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Codes3[1]);
				jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Codes3[1]+'/mqdefault.jpg');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Codes3[1]);

				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
			else
			{
				var Chintan_Web_Codes1 = code.split('<a href="https://youtu.be/');
				var Chintan_Web_Code_Src = Chintan_Web_Code_Src[1].split('">https://');
				if(Chintan_Web_Code_Src[0].length != 11) { Chintan_Web_Code_Src[0] = Chintan_Web_Code_Src[0].substr(0,11); }
				jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Code_Src[0]+'/mqdefault.jpg');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Code_Src[0]);

				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
		}
		else if(code.indexOf('vimeo.com')>0)
		{

			if(code.indexOf('embed')>0)
			{
				var Chintan_Web_Codes1=code.split('[embed]https://vimeo.com/');
				var Chintan_Web_Code_Src=Chintan_Web_Codes1[1].split('[/embed]');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://vimeo.com/'+Chintan_Web_Code_Src[0]);
				if(Chintan_Web_Code_Src[0].length>9)
				{
					var Real_Chintan_Web_Code_Src=Chintan_Web_Code_Src[0].split('/');
					Chintan_Web_Code_Src[0]=Real_Chintan_Web_Code_Src[2];
				}
				jQuery('#chintan_web_videoSrc_2').val('https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0]);
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Chintan_Web_ImgSlider_Vimeo', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {

					if(count == 0){
						jQuery('#chintan_web_imgSrc_2').val(response);
					}
					
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
					count++
				});
			}
			else if(code.indexOf('player')>0)
			{
				var Chintan_Web_Codes1 = code.split('<a href="https://player.vimeo.com/video/');
				var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('">https://');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://vimeo.com/'+Chintan_Web_Code_Src[0]);
				if(Chintan_Web_Code_Src[0].length>9)
				{
					var Real_Chintan_Web_Code_Src=Chintan_Web_Code_Src[0].split('/');
					Chintan_Web_Code_Src[0]=Real_Chintan_Web_Code_Src[2];
				}
				jQuery('#chintan_web_videoSrc_2').val('https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0]);
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Chintan_Web_ImgSlider_Vimeo', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					if(count == 0){
						jQuery('#chintan_web_imgSrc_2').val(response);
					}
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
					count++
				});
			}
			else
			{
				var Chintan_Web_Codes1 = code.split('<a href="https://vimeo.com/');
				var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('">https://');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://vimeo.com/'+Chintan_Web_Code_Src[0]);
				if(Chintan_Web_Code_Src[0].length>9)
				{
					var Real_Chintan_Web_Code_Src=Chintan_Web_Code_Src[0].split('/');
					Chintan_Web_Code_Src[0]=Real_Chintan_Web_Code_Src[2];
				}
				jQuery('#chintan_web_videoSrc_2').val('https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0]);
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Chintan_Web_ImgSlider_Vimeo', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					if(count == 0){
						jQuery('#chintan_web_imgSrc_2').val(response);
					}
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
					count++
				});
			}
		}
		else if(code.indexOf('.mp4')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var Chintan_Web_Codes1=code.split('[embed]');
				var Chintan_Web_Code_Src=Chintan_Web_Codes1[1].split('[/embed]');
				jQuery('#Chintan_Web_SlVid_Vid_1').val(Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_videoSrc_2').val(Chintan_Web_Code_Src[0]);
				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
			else if(code.indexOf('video')>0)
			{
				var Chintan_Web_Codes1 = code.split('mp4="');
				var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('"]');
				jQuery('#Chintan_Web_SlVid_Vid_1').val(Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_videoSrc_2').val(Chintan_Web_Code_Src[0]);
				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
			else
			{
				var Chintan_Web_Codes1 = code.split('<a href="');
				var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('">');
				jQuery('#Chintan_Web_SlVid_Vid_1').val(Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_videoSrc_2').val(Chintan_Web_Code_Src[0]);
				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
		}
		else if(code.indexOf('vevo.com')>0)
		{
			var Chintan_Web_Codes1 = code.split('<a href="');
			var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('">');
			var Chintan_Web_Code_Src1 = Chintan_Web_Code_Src[0].split('/');
			jQuery('#chintan_web_videoSrc_2').val('http://cache.vevo.com/assets/html/embed.html?video='+Chintan_Web_Code_Src1[Chintan_Web_Code_Src1.length-1]+'&autoplay=1');
			jQuery('#Chintan_Web_SlVid_Vid_1').val('http://cache.vevo.com/assets/html/embed.html?video='+Chintan_Web_Code_Src1[Chintan_Web_Code_Src1.length-1]+'&autoplay=1');
			if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
		}
	},100)
}

function chintan_web_Img_Src_Clicked()
{
	var zInt = setInterval(function(){
		var code = jQuery('#chintan_web_imgSrc_1').val();
		if(code.indexOf('img')>0)
		{
			var s=code.split('src="');
			var src=s[1].split('"');
			jQuery('#chintan_web_imgSrc_2').val(src[0]);
			if(jQuery('#chintan_web_imgSrc_2').val().length>0) { jQuery('#chintan_web_imgSrc_1').val(''); clearInterval(zInt); }
		}
	},100)
}
function chintan_web_Res()
{
	jQuery('.JSlInput2,.JSlInputVideo2').val('');
	jQuery('#chintan_web_imgSrc_2').val('');
	jQuery('.jChB').attr('checked',false);
	tinymce.get('JSliderImageDesc').setContent('');
}
function checkVideoOrNot(str){
	if(str == "" || str == undefined || str == "undefined"){
		return "";
	}else{
		return "<i class='chintan_web chintan_web-play'></i>";
	}
}
function rw_return_admin_html(n, title, imgSrc, vSrc, link, newTab){
	return '<tr id="tr_'+n+'"><td name="number_name_'+n+'" id="number_name_'+n+'" >'+n+'</td><td id="JAdd_Img_'+n+'"><div class="rw_admin_imgVideo">'+checkVideoOrNot(vSrc)+'<img src="'+imgSrc+'" id="JAdd_Img_Src_'+n+'" name="JAdd_Img_Src_'+n+'" style="height:60px;"></div></td><td id="JAdd_Title_'+n+'" name="JAdd_Title_'+n+'">'+title+'</td><td id="tdClone_'+n+'"><i class="jIcFileso chintan_web chintan_web-files-o" onclick="jambCloneId('+n+')"></i></td><td id="tdEdit_'+n+'"><i class="jIcPencil chintan_web chintan_web-pencil" onclick="jambEditId('+n+')"></i></td><td id="tdDelete_'+n+'"><i class="jIcDel chintan_web chintan_web-trash" onclick="jambDelId('+n+')"></i><input type="text" style="display:none;" class="add_title" id="JADD_Tit_'+n+'" name="JADD_Tit_'+n+'" value="'+title+'"/><input type="text" style="display:none;" class="add_description" id="JAdd_Description_'+n+'" name="JAdd_Description_'+n+'" value=""/><input type="text" style="display:none;" class="add_video" id="JAdd_video_'+n+'" name="JAdd_video_'+n+'" value="'+vSrc+'"/><input type="text" style="display:none;" class="add_img" id="JAdd_src_'+n+'" name="JAdd_src_'+n+'" value="'+imgSrc+'"/><input type="text" style="display:none" class="add_link" id="JADD_Link_'+n+'" name="JADD_Link_'+n+'" value="'+link+'"><input type="text" style="display:none;" class="NewTab" id="JAdd_NewTab_'+n+'" name="JAdd_NewTab_'+n+'" value="'+newTab+'"/></td></tr>';
		
}
function descAndCountNumber(n, desc){
	jQuery('#JAdd_Description_'+n).val(desc);
	jQuery('#JumboHidNum').val(n);
}
function chintan_web_Save()
{
	var JumboHidNum = jQuery('#JumboHidNum').val();
	var JSliderImageTitle = jQuery('#JSliderImageTitle').val();
	var chintan_web_imgSrc_2 = jQuery('#chintan_web_imgSrc_2').val();
	var chintan_web_videoSrc_2 = jQuery('#chintan_web_videoSrc_2').val();
	var JSliderImageLink = jQuery('#JSliderImageLink').val();
	var JSliderImageDesc = tinymce.get('JSliderImageDesc').getContent();
	var JNewTab = jQuery('#JNewTab').attr('checked');
	var html = rw_return_admin_html(parseInt(parseInt(JumboHidNum)+1), JSliderImageTitle, chintan_web_imgSrc_2, chintan_web_videoSrc_2, JSliderImageLink, JNewTab);
	jQuery('.chintan_web_SaveSl_Table3').append(html);
	descAndCountNumber(parseInt(parseInt(JumboHidNum)+1), JSliderImageDesc);
	chintan_web_Res();
}
function jambEditId(editNumber)
{
	chintan_web_Res();
	var title = jQuery('#JAdd_Title_'+editNumber).text();
	var src = jQuery('#JAdd_Img_Src_'+editNumber).attr('src');
	var videoSrc = jQuery('#JAdd_video_'+editNumber).val();
	var description = jQuery('#JAdd_Description_'+editNumber).val();
	var link = jQuery('#JADD_Link_'+editNumber).val();
	var newTab = jQuery('#JAdd_NewTab_'+editNumber).val();
	jQuery('#JumboHidUpd').val(editNumber);
	jQuery('.JSVBut').hide();
	jQuery('.JUPBut').show();
	jQuery('#JSliderImageTitle').val(title);
	jQuery('#chintan_web_imgSrc_2').val(src);
	jQuery('#chintan_web_videoSrc_2').val(videoSrc);
	tinymce.get('JSliderImageDesc').setContent(description);
	jQuery('#JSliderImageLink').val(link);
	if(newTab=='checked') { jQuery('#JNewTab').attr('checked',true); } else { jQuery('#JNewTab').attr('checked',false); }
}
function chintan_web_Update()
{
	updateNumber=jQuery('#JumboHidUpd').val();
	var src = jQuery('#chintan_web_imgSrc_2').val();
	var videoSrc = jQuery('#chintan_web_videoSrc_2').val();
	var title = jQuery('#JSliderImageTitle').val();
	var description = tinymce.get('JSliderImageDesc').getContent();
	var link = jQuery('#JSliderImageLink').val();
	var newTab = jQuery('#JNewTab').attr('checked');
	jQuery('#JAdd_Img_Src_'+updateNumber).attr('src',src);
	jQuery('#JADD_Tit_'+updateNumber).val(title);
	jQuery('#JAdd_Title_'+updateNumber).text(title);
	jQuery('#JAdd_src_'+updateNumber).val(src);
	jQuery('#JAdd_video_'+updateNumber).val(videoSrc);
	jQuery('#JAdd_Description_'+updateNumber).val(description);
	jQuery('#JADD_Link_'+updateNumber).val(link);
	jQuery('#JAdd_NewTab_'+updateNumber).val(newTab);
	jQuery('.JSVBut').show();
	jQuery('.JUPBut').hide();
	if(jQuery('#JAdd_Img_'+updateNumber+' div i')){
		jQuery('#JAdd_Img_'+updateNumber+' div i').remove();
	}
	jQuery('#JAdd_Img_'+updateNumber+' div').append(checkVideoOrNot(jQuery('#chintan_web_videoSrc_2').val()));
	chintan_web_Res();
}
function rw_sortNumbering(el,n){
	jQuery(el).attr('id','tr_'+n);
	jQuery(el).find('td:nth-child(1)').html(n);
	jQuery(el).find('td:nth-child(1)').attr('name','number_name_'+n);
	jQuery(el).find('td:nth-child(1)').attr('id','number_name_'+n);
	jQuery(el).find('td:nth-child(2)').attr('id','JAdd_Img_'+n);
	jQuery(el).find('td:nth-child(2) img').attr('id','JAdd_Img_Src_'+n);
	jQuery(el).find('td:nth-child(2) img').attr('name','JAdd_Img_Src_'+n);
	jQuery(el).find('td:nth-child(3)').attr('id','JAdd_Title_'+n);
	jQuery(el).find('td:nth-child(3)').attr('name','JAdd_Title_'+n);
	jQuery(el).find('td:nth-child(4)').attr('id','tdClone_'+n);
	jQuery(el).find('td:nth-child(4) i').attr('onclick','jambCloneId('+n+')');
	jQuery(el).find('td:nth-child(5)').attr('id','tdEdit_'+n);
	jQuery(el).find('td:nth-child(5) i').attr('onclick','jambEditId('+n+')');
	jQuery(el).find('td:nth-child(6)').attr('id','tdDelete_'+n);
	jQuery(el).find('td:nth-child(6) i').attr('onclick','jambDelId('+n+')');
	jQuery(el).find('.add_title').attr('id','JADD_Tit_'+n);
	jQuery(el).find('.add_title').attr('name','JADD_Tit_'+n);
	jQuery(el).find('.add_description').attr('id','JAdd_Description_'+n);
	jQuery(el).find('.add_description').attr('name','JAdd_Description_'+n);
	jQuery(el).find('.add_img').attr('id','JAdd_src_'+n);
	jQuery(el).find('.add_img').attr('name','JAdd_src_'+n);
	jQuery(el).find('.add_video').attr('id','JAdd_video_'+n);
	jQuery(el).find('.add_video').attr('name','JAdd_video_'+n);
	jQuery(el).find('.add_link').attr('id','JADD_Link_'+n);
	jQuery(el).find('.add_link').attr('name','JADD_Link_'+n);
	jQuery(el).find('.NewTab').attr('id','JAdd_NewTab_'+n);
	jQuery(el).find('.NewTab').attr('name','JAdd_NewTab_'+n);
}
function jambCloneId(CloneNumber)
{
	var title = jQuery('#JAdd_Title_'+CloneNumber).text();
	var src = jQuery('#JAdd_Img_Src_'+CloneNumber).attr('src');
	var videoSrc = jQuery('#JAdd_video_'+CloneNumber).val();
	var description = jQuery('#JAdd_Description_'+CloneNumber).val();
	var link = jQuery('#JADD_Link_'+CloneNumber).val();
	var newTab = jQuery('#JAdd_NewTab_'+CloneNumber).val();
	var JumboHidNum = jQuery('#JumboHidNum').val();
	var html = rw_return_admin_html(parseInt(parseInt(JumboHidNum)+1), title, src, videoSrc, link, newTab);	
	jQuery('#tr_'+CloneNumber).after(html);
	descAndCountNumber(parseInt(parseInt(JumboHidNum)+1), description);
	jQuery('.chintan_web_SaveSl_Table3 tr').each(function(){
		rw_sortNumbering(this,parseInt(parseInt(jQuery(this).index())+1));
	})
}
function jambDelId(removeNumber)
{
	var RWSIRSI = removeNumber;
	jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeIn();
	jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeIn();
	jQuery('.Chintan_Web_SliderIm_Relative_No').click(function(){
		jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
		jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
		RWSIRSI = null;
	})
	jQuery('.Chintan_Web_SliderIm_Relative_Yes').click(function(){
		if(RWSIRSI != null)
		{
			jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
			jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
			jQuery('#tr_'+removeNumber).remove();
			jQuery('#JumboHidNum').val(jQuery('#JumboHidNum').val()-1);
			jQuery('.chintan_web_SaveSl_Table3 tr').each(function(){
				rw_sortNumbering(this,parseInt(parseInt(jQuery(this).index())+1));
			})
		}
		RWSIRSI = null;
	})
}
function chintan_webSortable()
{
	jQuery('.chintan_web_SaveSl_Table3 tbody').sortable({
		update: function( event, ui ){
			jQuery(this).find('tr').each(function(i){
				rw_sortNumbering(this,(i+1));
			});
		}
	})
}
function chintan_web_Edit_Sl(number)
{
	jQuery('.Table_Data_chintan_web1').css('display','none');
	jQuery('.JAddSlider').addClass('JAddSliderAnim');
	jQuery('.Table_Data_chintan_web2').css('display','block');
	jQuery('.JUpdateSlider').addClass('JSaveSliderAnim');
	jQuery('.JCanselSlider').addClass('JCanselSliderAnim');
	jQuery('#upd_id').val(number);
	jQuery('.chintan_web_Slider_ID').html('[Chintan_Web_Slider id="'+number+'"]');
	jQuery('.JMBSL').html('&lt;?php echo do_shortcode(&apos;[Chintan_Web_Slider id="'+number+'"]&apos;);?&gt;');
	Chintan_Web_Slider_Editor();
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'chintan_web_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: number, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var arr=Array();
		var spl=response.split('=>');
		for(var i=3;i<spl.length;i++)
		{
			arr[arr.length]=spl[i].split('[')[0].trim(); 
		}
		arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();
		jQuery('.JSliderName').val(arr[0]);
		jQuery('.JSType').val(arr[1]);
		jQuery('#JumboHidNum').val(arr[2]);
	})
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'chintan_web_Edit_ImDescTit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: number, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var data = JSON.parse(response);
		var data1 = data[0];
		var data2 = data[1];
		for (var i = 0; i < data1.length; i++){
			if(data2[i]) {
				data1[i]['Sl_Video_Url'] = data2[i]['Sl_Video_Url']
			}
		}
		for(var i=0;i<data1.length;i++) {
			var html = rw_return_admin_html((i+1), data1[i]['SL_Img_Title'], data1[i]['Sl_Img_Url'], data1[i]['Sl_Video_Url'], data1[i]['Sl_Link_Url'], data1[i]['Sl_Link_NewTab']);
			jQuery('.chintan_web_SaveSl_Table3').append(html);
			jQuery('#JAdd_Description_'+(i+1)).val(data1[i]['Sl_Img_Description']);
		}
	})
}
function chintan_web_Delete_Sl(number)
{
	var RWSIRS = number;
	jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeIn();
	jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeIn();
	jQuery('.Chintan_Web_SliderIm_Relative_No').click(function(){
		jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
		jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
		RWSIRS = null;
	})
	jQuery('.Chintan_Web_SliderIm_Relative_Yes').click(function(){
		if(RWSIRS != null)
		{
			jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
			jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
			var ajaxurl = object.ajaxurl;
			var data = {
				action: 'chintan_web_Del', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: number, // translates into $_POST['foobar'] in PHP
			};
			jQuery.post(ajaxurl, data, function(response) { location.reload(); })
		}
		RWSIRS = null;
	})
}
function chintan_web_Copy_Sl(number)
{
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'chintan_web_Copy_Sl', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: number, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) { location.reload(); })
}
function Chintan_Web_Slider_Editor()
{
	tinymce.init({
		selector: '#JSliderImageDesc',
		menubar: false,
		statusbar: false,
		height: 250,
		plugins: [
			'advlist autolink lists link image charmap print preview hr',
			'searchreplace wordcount code media ',
			'insertdatetime media save table contextmenu directionality',
			'paste textcolor colorpicker textpattern imagetools codesample'
		],
		toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink image media code | insertdatetime preview | forecolor backcolor",
		toolbar3: "table | hr | subscript superscript | charmap | print | codesample ",
		fontsize_formats: '8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px',
		
	});
}function addSliderJ(number)
{
	jQuery('.Table_Data_chintan_web1').css('display','none');
	jQuery('.JAddSlider').addClass('JAddSliderAnim');
	jQuery('.Table_Data_chintan_web2').css('display','block');
	jQuery('.JSaveSlider').addClass('JSaveSliderAnim');
	jQuery('.JCanselSlider').addClass('JCanselSliderAnim');
	jQuery('.chintan_web_Slider_ID').html('[Chintan_Web_Slider id="'+number+'"]');
	jQuery('.JMBSL').html('&lt;?php echo do_shortcode(&apos;[Chintan_Web_Slider id="'+number+'"]&apos;);?&gt;');
	Chintan_Web_Slider_Editor();
	
}
function canselSliderJ() { location.reload(); }

function chintan_web_Video_Src_Clicked()
{
	var count = 0;
	var zInt = setInterval(function(){
		var code = jQuery('#chintan_web_videoSrc_1').val();
		if(code.indexOf('https://www.youtube.com/')>0)
		{
			if(code.indexOf('list')>0 || code.indexOf('index')>0)
			{
				if(code.indexOf('embed')>0)
				{
					var Chintan_Web_Codes1=code.split('[embed]');
					var Chintan_Web_Codes2=Chintan_Web_Codes1[1].split('[/embed]');
					var Chintan_Web_Codes3=Chintan_Web_Codes2[0].split('www.youtube.com/watch?v=');
					if(Chintan_Web_Codes3[1].length != 11) { Chintan_Web_Codes3[1] = Chintan_Web_Codes3[1].substr(0,11); }

					jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Codes3[1]);
					jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Codes3[1]+'/mqdefault.jpg');
					jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Codes3[1]);

					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
				}
				else
				{
					var Chintan_Web_Codes1 = code.split('<a href="https://www.youtube.com/');
					var Chintan_Web_Codes2= Chintan_Web_Codes1[1].split("=");
					var Chintan_Web_Code_Src = Chintan_Web_Codes2[1].split('&');

					jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Code_Src[0]);
					jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Code_Src[0]+'/mqdefault.jpg');
					jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Code_Src[0]);
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
				}
			}
			else if(code.indexOf('embed')>0)
			{
				var Chintan_Web_Codes1=code.split('[embed]');
				var Chintan_Web_Codes2=Chintan_Web_Codes1[1].split('[/embed]');
				if(Chintan_Web_Codes2[0].indexOf('watch?')>0)
				{
					var Chintan_Web_Codes3=Chintan_Web_Codes2[0].split('=');
					
					jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Codes3[1]);
					jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Codes3[1]+'/mqdefault.jpg');
					jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Codes3[1]);
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
				}
				else
				{
					var Chintan_Web_Code_Src=Chintan_Web_Codes2[0];
					var Chintan_Web_Im_Src=Chintan_Web_Code_Src.split('embed/');

					jQuery('#chintan_web_videoSrc_2').val(Chintan_Web_Code_Src);
					jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Im_Src[1]+'/mqdefault.jpg');
					jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Im_Src[1]);
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
				}
			}
			else
			{
				var Chintan_Web_Codes1 = code.split('<a href="https://www.youtube.com/');
				var Chintan_Web_Codes2= Chintan_Web_Codes1[1].split('=');
				if(Chintan_Web_Codes2.length >= 5)
				{
					var Chintan_Web_Code_Src = Chintan_Web_Codes2[3].split('&');
				}
				else
				{
					var Chintan_Web_Code_Src = Chintan_Web_Codes2[1].split('">https://');
				}
				jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Code_Src[0]+'/mqdefault.jpg');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Code_Src[0]);
				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
		}
		else if(code.indexOf('https://youtu.be/')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var Chintan_Web_Codes1=code.split('[embed]');
				var Chintan_Web_Codes2=Chintan_Web_Codes1[1].split('[/embed]');
				var Chintan_Web_Codes3=Chintan_Web_Codes2[0].split('youtu.be/');
				if(Chintan_Web_Codes3[1].length != 11) { Chintan_Web_Codes3[1] = Chintan_Web_Codes3[1].substr(0,11); }

				jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Codes3[1]);
				jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Codes3[1]+'/mqdefault.jpg');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Codes3[1]);

				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
			else
			{
				var Chintan_Web_Codes1 = code.split('<a href="https://youtu.be/');
				var Chintan_Web_Code_Src = Chintan_Web_Code_Src[1].split('">https://');
				if(Chintan_Web_Code_Src[0].length != 11) { Chintan_Web_Code_Src[0] = Chintan_Web_Code_Src[0].substr(0,11); }
				jQuery('#chintan_web_videoSrc_2').val('https://www.youtube.com/embed/'+Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_imgSrc_2').val('http://img.youtube.com/vi/'+Chintan_Web_Code_Src[0]+'/mqdefault.jpg');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://www.youtube.com/watch?v='+Chintan_Web_Code_Src[0]);

				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
		}
		else if(code.indexOf('vimeo.com')>0)
		{

			if(code.indexOf('embed')>0)
			{
				var Chintan_Web_Codes1=code.split('[embed]https://vimeo.com/');
				var Chintan_Web_Code_Src=Chintan_Web_Codes1[1].split('[/embed]');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://vimeo.com/'+Chintan_Web_Code_Src[0]);
				if(Chintan_Web_Code_Src[0].length>9)
				{
					var Real_Chintan_Web_Code_Src=Chintan_Web_Code_Src[0].split('/');
					Chintan_Web_Code_Src[0]=Real_Chintan_Web_Code_Src[2];
				}
				jQuery('#chintan_web_videoSrc_2').val('https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0]);
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Chintan_Web_ImgSlider_Vimeo', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {

					if(count == 0){
						jQuery('#chintan_web_imgSrc_2').val(response);
					}
					
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
					count++
				});
			}
			else if(code.indexOf('player')>0)
			{
				var Chintan_Web_Codes1 = code.split('<a href="https://player.vimeo.com/video/');
				var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('">https://');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://vimeo.com/'+Chintan_Web_Code_Src[0]);
				if(Chintan_Web_Code_Src[0].length>9)
				{
					var Real_Chintan_Web_Code_Src=Chintan_Web_Code_Src[0].split('/');
					Chintan_Web_Code_Src[0]=Real_Chintan_Web_Code_Src[2];
				}
				jQuery('#chintan_web_videoSrc_2').val('https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0]);
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Chintan_Web_ImgSlider_Vimeo', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					if(count == 0){
						jQuery('#chintan_web_imgSrc_2').val(response);
					}
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
					count++
				});
			}
			else
			{
				var Chintan_Web_Codes1 = code.split('<a href="https://vimeo.com/');
				var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('">https://');
				jQuery('#Chintan_Web_SlVid_Vid_1').val('https://vimeo.com/'+Chintan_Web_Code_Src[0]);
				if(Chintan_Web_Code_Src[0].length>9)
				{
					var Real_Chintan_Web_Code_Src=Chintan_Web_Code_Src[0].split('/');
					Chintan_Web_Code_Src[0]=Real_Chintan_Web_Code_Src[2];
				}
				jQuery('#chintan_web_videoSrc_2').val('https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0]);
				var ajaxurl = object.ajaxurl;
				var data = {
				action: 'Chintan_Web_ImgSlider_Vimeo', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: 'https://player.vimeo.com/video/'+Chintan_Web_Code_Src[0], // translates into $_POST['foobar'] in PHP
				};
				jQuery.post(ajaxurl, data, function(response) {
					if(count == 0){
						jQuery('#chintan_web_imgSrc_2').val(response);
					}
					if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
					count++
				});
			}
		}
		else if(code.indexOf('.mp4')>0)
		{
			if(code.indexOf('embed')>0)
			{
				var Chintan_Web_Codes1=code.split('[embed]');
				var Chintan_Web_Code_Src=Chintan_Web_Codes1[1].split('[/embed]');
				jQuery('#Chintan_Web_SlVid_Vid_1').val(Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_videoSrc_2').val(Chintan_Web_Code_Src[0]);
				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
			else if(code.indexOf('video')>0)
			{
				var Chintan_Web_Codes1 = code.split('mp4="');
				var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('"]');
				jQuery('#Chintan_Web_SlVid_Vid_1').val(Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_videoSrc_2').val(Chintan_Web_Code_Src[0]);
				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
			else
			{
				var Chintan_Web_Codes1 = code.split('<a href="');
				var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('">');
				jQuery('#Chintan_Web_SlVid_Vid_1').val(Chintan_Web_Code_Src[0]);
				jQuery('#chintan_web_videoSrc_2').val(Chintan_Web_Code_Src[0]);
				if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
			}
		}
		else if(code.indexOf('vevo.com')>0)
		{
			var Chintan_Web_Codes1 = code.split('<a href="');
			var Chintan_Web_Code_Src = Chintan_Web_Codes1[1].split('">');
			var Chintan_Web_Code_Src1 = Chintan_Web_Code_Src[0].split('/');
			jQuery('#chintan_web_videoSrc_2').val('http://cache.vevo.com/assets/html/embed.html?video='+Chintan_Web_Code_Src1[Chintan_Web_Code_Src1.length-1]+'&autoplay=1');
			jQuery('#Chintan_Web_SlVid_Vid_1').val('http://cache.vevo.com/assets/html/embed.html?video='+Chintan_Web_Code_Src1[Chintan_Web_Code_Src1.length-1]+'&autoplay=1');
			if(jQuery('#chintan_web_videoSrc_2').val().length>0){ clearInterval(zInt); jQuery('#chintan_web_videoSrc_1').val(''); }
		}
	},100)
}

function chintan_web_Img_Src_Clicked()
{
	var zInt = setInterval(function(){
		var code = jQuery('#chintan_web_imgSrc_1').val();
		if(code.indexOf('img')>0)
		{
			var s=code.split('src="');
			var src=s[1].split('"');
			jQuery('#chintan_web_imgSrc_2').val(src[0]);
			if(jQuery('#chintan_web_imgSrc_2').val().length>0) { jQuery('#chintan_web_imgSrc_1').val(''); clearInterval(zInt); }
		}
	},100)
}
function chintan_web_Res()
{
	jQuery('.JSlInput2,.JSlInputVideo2').val('');
	jQuery('#chintan_web_imgSrc_2').val('');
	jQuery('.jChB').attr('checked',false);
	tinymce.get('JSliderImageDesc').setContent('');
}
function checkVideoOrNot(str){
	if(str == "" || str == undefined || str == "undefined"){
		return "";
	}else{
		return "<i class='chintan_web chintan_web-play'></i>";
	}
}
function rw_return_admin_html(n, title, imgSrc, vSrc, link, newTab){
	return '<tr id="tr_'+n+'"><td name="number_name_'+n+'" id="number_name_'+n+'" >'+n+'</td><td id="JAdd_Img_'+n+'"><div class="rw_admin_imgVideo">'+checkVideoOrNot(vSrc)+'<img src="'+imgSrc+'" id="JAdd_Img_Src_'+n+'" name="JAdd_Img_Src_'+n+'" style="height:60px;"></div></td><td id="JAdd_Title_'+n+'" name="JAdd_Title_'+n+'">'+title+'</td><td id="tdClone_'+n+'"><i class="jIcFileso chintan_web chintan_web-files-o" onclick="jambCloneId('+n+')"></i></td><td id="tdEdit_'+n+'"><i class="jIcPencil chintan_web chintan_web-pencil" onclick="jambEditId('+n+')"></i></td><td id="tdDelete_'+n+'"><i class="jIcDel chintan_web chintan_web-trash" onclick="jambDelId('+n+')"></i><input type="text" style="display:none;" class="add_title" id="JADD_Tit_'+n+'" name="JADD_Tit_'+n+'" value="'+title+'"/><input type="text" style="display:none;" class="add_description" id="JAdd_Description_'+n+'" name="JAdd_Description_'+n+'" value=""/><input type="text" style="display:none;" class="add_video" id="JAdd_video_'+n+'" name="JAdd_video_'+n+'" value="'+vSrc+'"/><input type="text" style="display:none;" class="add_img" id="JAdd_src_'+n+'" name="JAdd_src_'+n+'" value="'+imgSrc+'"/><input type="text" style="display:none" class="add_link" id="JADD_Link_'+n+'" name="JADD_Link_'+n+'" value="'+link+'"><input type="text" style="display:none;" class="NewTab" id="JAdd_NewTab_'+n+'" name="JAdd_NewTab_'+n+'" value="'+newTab+'"/></td></tr>';
		
}
function descAndCountNumber(n, desc){
	jQuery('#JAdd_Description_'+n).val(desc);
	jQuery('#JumboHidNum').val(n);
}
function chintan_web_Save()
{
	var JumboHidNum = jQuery('#JumboHidNum').val();
	var JSliderImageTitle = jQuery('#JSliderImageTitle').val();
	var chintan_web_imgSrc_2 = jQuery('#chintan_web_imgSrc_2').val();
	var chintan_web_videoSrc_2 = jQuery('#chintan_web_videoSrc_2').val();
	var JSliderImageLink = jQuery('#JSliderImageLink').val();
	var JSliderImageDesc = tinymce.get('JSliderImageDesc').getContent();
	var JNewTab = jQuery('#JNewTab').attr('checked');
	var html = rw_return_admin_html(parseInt(parseInt(JumboHidNum)+1), JSliderImageTitle, chintan_web_imgSrc_2, chintan_web_videoSrc_2, JSliderImageLink, JNewTab);
	jQuery('.chintan_web_SaveSl_Table3').append(html);
	descAndCountNumber(parseInt(parseInt(JumboHidNum)+1), JSliderImageDesc);
	chintan_web_Res();
}
function jambEditId(editNumber)
{
	chintan_web_Res();
	var title = jQuery('#JAdd_Title_'+editNumber).text();
	var src = jQuery('#JAdd_Img_Src_'+editNumber).attr('src');
	var videoSrc = jQuery('#JAdd_video_'+editNumber).val();
	var description = jQuery('#JAdd_Description_'+editNumber).val();
	var link = jQuery('#JADD_Link_'+editNumber).val();
	var newTab = jQuery('#JAdd_NewTab_'+editNumber).val();
	jQuery('#JumboHidUpd').val(editNumber);
	jQuery('.JSVBut').hide();
	jQuery('.JUPBut').show();
	jQuery('#JSliderImageTitle').val(title);
	jQuery('#chintan_web_imgSrc_2').val(src);
	jQuery('#chintan_web_videoSrc_2').val(videoSrc);
	tinymce.get('JSliderImageDesc').setContent(description);
	jQuery('#JSliderImageLink').val(link);
	if(newTab=='checked') { jQuery('#JNewTab').attr('checked',true); } else { jQuery('#JNewTab').attr('checked',false); }
}
function chintan_web_Update()
{
	updateNumber=jQuery('#JumboHidUpd').val();
	var src = jQuery('#chintan_web_imgSrc_2').val();
	var videoSrc = jQuery('#chintan_web_videoSrc_2').val();
	var title = jQuery('#JSliderImageTitle').val();
	var description = tinymce.get('JSliderImageDesc').getContent();
	var link = jQuery('#JSliderImageLink').val();
	var newTab = jQuery('#JNewTab').attr('checked');
	jQuery('#JAdd_Img_Src_'+updateNumber).attr('src',src);
	jQuery('#JADD_Tit_'+updateNumber).val(title);
	jQuery('#JAdd_Title_'+updateNumber).text(title);
	jQuery('#JAdd_src_'+updateNumber).val(src);
	jQuery('#JAdd_video_'+updateNumber).val(videoSrc);
	jQuery('#JAdd_Description_'+updateNumber).val(description);
	jQuery('#JADD_Link_'+updateNumber).val(link);
	jQuery('#JAdd_NewTab_'+updateNumber).val(newTab);
	jQuery('.JSVBut').show();
	jQuery('.JUPBut').hide();
	if(jQuery('#JAdd_Img_'+updateNumber+' div i')){
		jQuery('#JAdd_Img_'+updateNumber+' div i').remove();
	}
	jQuery('#JAdd_Img_'+updateNumber+' div').append(checkVideoOrNot(jQuery('#chintan_web_videoSrc_2').val()));
	chintan_web_Res();
}
function rw_sortNumbering(el,n){
	jQuery(el).attr('id','tr_'+n);
	jQuery(el).find('td:nth-child(1)').html(n);
	jQuery(el).find('td:nth-child(1)').attr('name','number_name_'+n);
	jQuery(el).find('td:nth-child(1)').attr('id','number_name_'+n);
	jQuery(el).find('td:nth-child(2)').attr('id','JAdd_Img_'+n);
	jQuery(el).find('td:nth-child(2) img').attr('id','JAdd_Img_Src_'+n);
	jQuery(el).find('td:nth-child(2) img').attr('name','JAdd_Img_Src_'+n);
	jQuery(el).find('td:nth-child(3)').attr('id','JAdd_Title_'+n);
	jQuery(el).find('td:nth-child(3)').attr('name','JAdd_Title_'+n);
	jQuery(el).find('td:nth-child(4)').attr('id','tdClone_'+n);
	jQuery(el).find('td:nth-child(4) i').attr('onclick','jambCloneId('+n+')');
	jQuery(el).find('td:nth-child(5)').attr('id','tdEdit_'+n);
	jQuery(el).find('td:nth-child(5) i').attr('onclick','jambEditId('+n+')');
	jQuery(el).find('td:nth-child(6)').attr('id','tdDelete_'+n);
	jQuery(el).find('td:nth-child(6) i').attr('onclick','jambDelId('+n+')');
	jQuery(el).find('.add_title').attr('id','JADD_Tit_'+n);
	jQuery(el).find('.add_title').attr('name','JADD_Tit_'+n);
	jQuery(el).find('.add_description').attr('id','JAdd_Description_'+n);
	jQuery(el).find('.add_description').attr('name','JAdd_Description_'+n);
	jQuery(el).find('.add_img').attr('id','JAdd_src_'+n);
	jQuery(el).find('.add_img').attr('name','JAdd_src_'+n);
	jQuery(el).find('.add_video').attr('id','JAdd_video_'+n);
	jQuery(el).find('.add_video').attr('name','JAdd_video_'+n);
	jQuery(el).find('.add_link').attr('id','JADD_Link_'+n);
	jQuery(el).find('.add_link').attr('name','JADD_Link_'+n);
	jQuery(el).find('.NewTab').attr('id','JAdd_NewTab_'+n);
	jQuery(el).find('.NewTab').attr('name','JAdd_NewTab_'+n);
}
function jambCloneId(CloneNumber)
{
	var title = jQuery('#JAdd_Title_'+CloneNumber).text();
	var src = jQuery('#JAdd_Img_Src_'+CloneNumber).attr('src');
	var videoSrc = jQuery('#JAdd_video_'+CloneNumber).val();
	var description = jQuery('#JAdd_Description_'+CloneNumber).val();
	var link = jQuery('#JADD_Link_'+CloneNumber).val();
	var newTab = jQuery('#JAdd_NewTab_'+CloneNumber).val();
	var JumboHidNum = jQuery('#JumboHidNum').val();
	var html = rw_return_admin_html(parseInt(parseInt(JumboHidNum)+1), title, src, videoSrc, link, newTab);	
	jQuery('#tr_'+CloneNumber).after(html);
	descAndCountNumber(parseInt(parseInt(JumboHidNum)+1), description);
	jQuery('.chintan_web_SaveSl_Table3 tr').each(function(){
		rw_sortNumbering(this,parseInt(parseInt(jQuery(this).index())+1));
	})
}
function jambDelId(removeNumber)
{
	var RWSIRSI = removeNumber;
	jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeIn();
	jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeIn();
	jQuery('.Chintan_Web_SliderIm_Relative_No').click(function(){
		jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
		jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
		RWSIRSI = null;
	})
	jQuery('.Chintan_Web_SliderIm_Relative_Yes').click(function(){
		if(RWSIRSI != null)
		{
			jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
			jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
			jQuery('#tr_'+removeNumber).remove();
			jQuery('#JumboHidNum').val(jQuery('#JumboHidNum').val()-1);
			jQuery('.chintan_web_SaveSl_Table3 tr').each(function(){
				rw_sortNumbering(this,parseInt(parseInt(jQuery(this).index())+1));
			})
		}
		RWSIRSI = null;
	})
}
function chintan_webSortable()
{
	jQuery('.chintan_web_SaveSl_Table3 tbody').sortable({
		update: function( event, ui ){
			jQuery(this).find('tr').each(function(i){
				rw_sortNumbering(this,(i+1));
			});
		}
	})
}
function chintan_web_Edit_Sl(number)
{
	jQuery('.Table_Data_chintan_web1').css('display','none');
	jQuery('.JAddSlider').addClass('JAddSliderAnim');
	jQuery('.Table_Data_chintan_web2').css('display','block');
	jQuery('.JUpdateSlider').addClass('JSaveSliderAnim');
	jQuery('.JCanselSlider').addClass('JCanselSliderAnim');
	jQuery('#upd_id').val(number);
	jQuery('.chintan_web_Slider_ID').html('[Chintan_Web_Slider id="'+number+'"]');
	jQuery('.JMBSL').html('&lt;?php echo do_shortcode(&apos;[Chintan_Web_Slider id="'+number+'"]&apos;);?&gt;');
	Chintan_Web_Slider_Editor();
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'chintan_web_Edit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: number, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var arr=Array();
		var spl=response.split('=>');
		for(var i=3;i<spl.length;i++)
		{
			arr[arr.length]=spl[i].split('[')[0].trim(); 
		}
		arr[arr.length-1]=arr[arr.length-1].split(')')[0].trim();
		jQuery('.JSliderName').val(arr[0]);
		jQuery('.JSType').val(arr[1]);
		jQuery('#JumboHidNum').val(arr[2]);
	})
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'chintan_web_Edit_ImDescTit', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: number, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) {
		var data = JSON.parse(response);
		var data1 = data[0];
		var data2 = data[1];
		for (var i = 0; i < data1.length; i++){
			if(data2[i]) {
				data1[i]['Sl_Video_Url'] = data2[i]['Sl_Video_Url']
			}
		}
		for(var i=0;i<data1.length;i++) {
			var html = rw_return_admin_html((i+1), data1[i]['SL_Img_Title'], data1[i]['Sl_Img_Url'], data1[i]['Sl_Video_Url'], data1[i]['Sl_Link_Url'], data1[i]['Sl_Link_NewTab']);
			jQuery('.chintan_web_SaveSl_Table3').append(html);
			jQuery('#JAdd_Description_'+(i+1)).val(data1[i]['Sl_Img_Description']);
		}
	})
}
function chintan_web_Delete_Sl(number)
{
	var RWSIRS = number;
	jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeIn();
	jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeIn();
	jQuery('.Chintan_Web_SliderIm_Relative_No').click(function(){
		jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
		jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
		RWSIRS = null;
	})
	jQuery('.Chintan_Web_SliderIm_Relative_Yes').click(function(){
		if(RWSIRS != null)
		{
			jQuery('.Chintan_Web_SliderIm_Fixed_Div').fadeOut();
			jQuery('.Chintan_Web_SliderIm_Absolute_Div').fadeOut();
			var ajaxurl = object.ajaxurl;
			var data = {
				action: 'chintan_web_Del', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
				foobar: number, // translates into $_POST['foobar'] in PHP
			};
			jQuery.post(ajaxurl, data, function(response) { location.reload(); })
		}
		RWSIRS = null;
	})
}
function chintan_web_Copy_Sl(number)
{
	var ajaxurl = object.ajaxurl;
	var data = {
		action: 'chintan_web_Copy_Sl', // wp_ajax_my_action / wp_ajax_nopriv_my_action in ajax.php. Can be named anything.
		foobar: number, // translates into $_POST['foobar'] in PHP
	};
	jQuery.post(ajaxurl, data, function(response) { location.reload(); })
}
function Chintan_Web_Slider_Editor()
{
	tinymce.init({
		selector: '#JSliderImageDesc',
		menubar: false,
		statusbar: false,
		height: 250,
		plugins: [
			'advlist autolink lists link image charmap print preview hr',
			'searchreplace wordcount code media ',
			'insertdatetime media save table contextmenu directionality',
			'paste textcolor colorpicker textpattern imagetools codesample'
		],
		toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink image media code | insertdatetime preview | forecolor backcolor",
		toolbar3: "table | hr | subscript superscript | charmap | print | codesample ",
		fontsize_formats: '8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px',
		
	});
}