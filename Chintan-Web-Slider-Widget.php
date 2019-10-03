<?php
	class Chintan_Web_Photo_Slider extends WP_Widget
	{
		function __construct()
		{
			$params=array('name'=>'Chintan-Web Slider','description'=>'This is the widget of Chintan-Web Slider plugin');
			parent::__construct('Chintan_Web_Photo_Slider','',$params);
		}
		function form($instance)
		{
			$defaults = array('Chintan_Web_Slider'=>'');
			$instance = wp_parse_args((array)$instance, $defaults);

			$Chintan_Web_Slider = $instance['Chintan_Web_Slider'];
			?>
			<div>
				<p>
					Slider Title:
					<select name="<?php echo $this->get_field_name('Chintan_Web_Slider');?>" class="widefat">
						<?php
							global $wpdb;

							$table_name = $wpdb->prefix . "chintan_web_photo_slider_manager";
							$Chintan_Web_Slider=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id > %d", 0));

							foreach ($Chintan_Web_Slider as $Chintan_Web_Slider1)
							{
								?> <option value="<?php echo $Chintan_Web_Slider1->id;?>"> <?php echo $Chintan_Web_Slider1->Slider_Title;?> </option> <?php 
							}
						?>
					</select>
				</p>
			</div>
			<?php
		}
		function widget($args,$instance)
		{
			extract($args);
			$Chintan_Web_Slider = empty($instance['Chintan_Web_Slider']) ? '' : $instance['Chintan_Web_Slider'];

			global $wpdb;

			$table_name   = $wpdb->prefix . "chintan_web_photo_slider_manager";
			$table_name1  = $wpdb->prefix . "chintan_web_photo_slider_instal";
			$table_name1_1  = $wpdb->prefix . "chintan_web_photo_slider_instal_video";
			$table_name2  = $wpdb->prefix . "chintan_web_slider_effects_data";
			$table_name5  = $wpdb->prefix . "chintan_web_slider_effect1";
			
			$table_name5_Loader  = $wpdb->prefix . "chintan_web_slider_effect1_loader";
			



			require_once( 'Chintan-Web-Slider-Check.php' );

			$Chintan_Web_Slider_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $Chintan_Web_Slider));
			$Chintan_Web_Slider_Images=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE Sl_Number = %s order by id", $Chintan_Web_Slider));
			$Chintan_Web_Slider_Videos=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1_1 WHERE Sl_Number = %s order by id", $Chintan_Web_Slider));
			$Chintan_Web_Slider_Effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE slider_name = %s", $Chintan_Web_Slider_Manager[0]->Slider_Type));
			
			if($Chintan_Web_Slider_Effects[0]->slider_type=='Slider Navigation')
			{
				$Chintan_Web_Slider_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE chintan_web_slider_ID = %s", $Chintan_Web_Slider_Effects[0]->id));
				$Chintan_Web_Slider_Effect_Loader=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5_Loader WHERE chintan_web_slider_ID = %s", $Chintan_Web_Slider_Effects[0]->id));
			}
			

			if($Chintan_Web_Slider_Effect[0]->chintan_CS_BIB=='true'){ $chintan_CS_BIB = 'true'; }else{ $chintan_CS_BIB = 'false'; }
			if($Chintan_Web_Slider_Effect[0]->chintan_CS_P=='true'){ $chintan_CS_P = 'true'; }else{ $chintan_CS_P = 'false'; }
			// if($Chintan_Web_Slider_Effect[0]->chintan_CS_Loop=='true'){ $chintan_CS_Loop = 'true'; }else{ $chintan_CS_Loop = 'false'; }
			if($Chintan_Web_Slider_Effect[0]->chintan_CS_Video_TShow=='true'){ $chintan_CS_Video_TShow = 'block'; }else{ $chintan_CS_Video_TShow = 'none'; }
			if($Chintan_Web_Slider_Effect[0]->chintan_CS_Video_DShow=='true'){ $chintan_CS_Video_DShow = 'block'; }else{ $chintan_CS_Video_DShow = 'none'; }
			// if($Chintan_Web_Slider_Effect[0]->chintan_CS_Video_Show=='true'){ $chintan_CS_Video_Show = $Chintan_Web_Slider_Effect[0]->chintan_CS_Video_W; }else{ $chintan_CS_Video_Show = '0'; }
			if($chintan_CS_Video_Show == '0'){ $padLeft = '0'; }else{ $padLeft = '10'; }
			if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 1){ $Chintan_PS_Left_Icon='chintan_web chintan_web-angle-double-left'; $Chintan_PS_Right_Icon='chintan_web chintan_web-angle-double-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 2){ $Chintan_PS_Left_Icon='chintan_web chintan_web-angle-left'; $Chintan_PS_Right_Icon='chintan_web chintan_web-angle-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 3){ $Chintan_PS_Left_Icon='chintan_web chintan_web-arrow-circle-left'; $Chintan_PS_Right_Icon='chintan_web chintan_web-arrow-circle-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 4){ $Chintan_PS_Left_Icon='chintan_web chintan_web-arrow-circle-o-left'; $Chintan_PS_Right_Icon='chintan_web chintan_web-arrow-circle-o-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 5){ $Chintan_PS_Left_Icon='chintan_web chintan_web-arrow-left'; $Chintan_PS_Right_Icon='chintan_web chintan_web-arrow-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 6){ $Chintan_PS_Left_Icon='chintan_web chintan_web-caret-left'; $Chintan_PS_Right_Icon='chintan_web chintan_web-caret-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 7){ $Chintan_PS_Left_Icon='chintan_web chintan_web-caret-square-o-left';	$Chintan_PS_Right_Icon='chintan_web chintan_web-caret-square-o-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 8){ $Chintan_PS_Left_Icon='chintan_web-chevron-circle-left'; $Chintan_PS_Right_Icon='chintan_web-chevron-circle-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 9){ $Chintan_PS_Left_Icon='chintan_web chintan_web-chevron-left'; $Chintan_PS_Right_Icon='chintan_web chintan_web-chevron-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 10){ $Chintan_PS_Left_Icon='chintan_web chintan_web-hand-o-left'; $Chintan_PS_Right_Icon='chintan_web chintan_web-hand-o-right'; }
			else if($Chintan_Web_Slider_Effect[0]->chintan_CS_Icon == 11){ $Chintan_PS_Left_Icon='chintan_web chintan_web-long-arrow-left'; $Chintan_PS_Right_Icon='chintan_web chintan_web-long-arrow-right';}
			if($Chintan_Web_Slider_Effect[0]->chintan_CS_Video_ArrShow=='true'){ $chintan_CS_Video_ArrShow = 'inline-block'; }else{ $chintan_CS_Video_ArrShow = 'none'; }
				
			?>
			<?php if($Chintan_Web_Slider_Effects[0]->slider_type=='Slider Navigation'){ ?>
				<link rel="stylesheet" href="<?php echo plugins_url('/Style/flexslider.css',__FILE__);?>" />
				<link rel="stylesheet" href="<?php echo plugins_url('/Style/Chintan-Web-Slider-Widget.css',__FILE__);?>" />
				<?php
					$text=$Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT;
					$text_array=str_split($text);
					$str_sum=0;
					$anim_sum=0.75;
				?>
				<style type="text/css">
					<?php if(!empty($Chintan_Web_Slider_Effect_Loader)){ ?>
					.center_content<?php echo $Chintan_Web_Slider;?>
					{
						position:relative;
						overflow:visible;
						top:50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
						-moz-transform:translateY(-50%);
						-o-transform:translateY(-50%);
					}
					#RW_Load_Content_Navigation<?php echo $Chintan_Web_Slider;?>
					{
						margin:20px auto !important;
						background-color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_BgC;?> !important;
						z-index:999;
						width:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_W;?>px;
						height:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_H;?>px;
						max-width:100% !important;
					}
					<?php if($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_S == "small") { ?>
						.RW_Loader_Frame_Navigation<?php echo $Chintan_Web_Slider;?> { width:45px !important; height:45px !important; }
						.loader_Navigation1<?php echo $Chintan_Web_Slider;?>
						{
							border-top: 3px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T1_C;?> !important;
							border-bottom: 3px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T1_C;?> !important;
						}
						.loader_Navigation2<?php echo $Chintan_Web_Slider;?>
						{
							border-top: 3px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T2_C;?> !important;
							border-bottom: 3px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T2_C;?> !important;
						}
						.loader_Navigation3<?php echo $Chintan_Web_Slider;?>
						{
							border-top:12px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T3_C;?> !important; 
							border-bottom:12px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T3_C;?> !important; 
							border-right:12px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T3_C;?> !important;
							width:50% !important;
							height:50%!important;
						}
					<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_S == "middle") { ?>
						.RW_Loader_Frame_Navigation<?php echo $Chintan_Web_Slider;?> { width:60px !important; height:60px !important; }
						.loader_Navigation1<?php echo $Chintan_Web_Slider;?>
						{
							border-top: 4px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T1_C;?> !important;
							border-bottom: 4px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T1_C;?> !important;
						}
						.loader_Navigation2<?php echo $Chintan_Web_Slider;?>
						{
							border-top: 4px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T2_C;?> !important;
							border-bottom: 4px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T2_C;?> !important;
						}
						.loader_Navigation3<?php echo $Chintan_Web_Slider;?>
						{
							border-top:17px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T3_C;?> !important; 
							border-bottom:17px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T3_C;?> !important; 
							border-right:17px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T3_C;?> !important;
							width:55% !important;
							height:55%!important;
						}
					<?php } else { ?>
						.RW_Loader_Frame_Navigation<?php echo $Chintan_Web_Slider;?> { width:80px !important; height:80px !important; }
						.loader_Navigation1<?php echo $Chintan_Web_Slider;?>
						{
							border-top: 5px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T1_C;?> !important;
							border-bottom: 5px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T1_C;?> !important;
						}
						.loader_Navigation2<?php echo $Chintan_Web_Slider;?>
						{
							border-top: 5px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T2_C;?> !important;
							border-bottom: 5px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T2_C;?> !important;
						}
						.loader_Navigation3<?php echo $Chintan_Web_Slider;?>
						{
							border-top:25px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T3_C;?> !important; 
							border-bottom:25px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T3_C;?> !important; 
							border-right:25px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T3_C;?> !important;
							width:60% !important;
							height:60%!important;
						}
					<?php } ?>
					.RW_Loader_Frame_Navigation 
					{ 
						position:relative;
						left:50%;
						width:80px;
						height:80px;
						transform:translateX(-50%);
						-webkit-transform:translateX(-50%);
						-ms-transform:translateX(-50%);
						-moz-transform:translateX(-50%);
						-o-transform:translateX(-50%);
					}
					.RW_Loader_Text_Navigation<?php echo $Chintan_Web_Slider;?>
					{
						position:relative;
						text-align:center;
						margin-top:10px;
						font-size: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FS;?>px !important;
						font-family:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FF;?> !important;
						color: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_C;?> !important;
					}
					.loader_Navigation1,.loader_Navigation2,.loader_Navigation3,.loader_Navigation4
					{
						position:absolute;
						border:5px solid transparent;
						border-radius:50%;
					}
					.loader_Navigation1<?php echo $Chintan_Web_Slider;?>
					{
						box-sizing:border-box;
						-webkit-box-sizing:border-box;
						-ms-box-sizing:border-box;
						-moz-box-sizing:border-box;
						-o-box-sizing:border-box;
					}
					.loader_Navigation2<?php echo $Chintan_Web_Slider;?>
					{
						-webkit-box-sizing:border-box;
						-ms-box-sizing:border-box;
						-moz-box-sizing:border-box;
						-o-box-sizing:border-box;
						top:50%;
						left:50%;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
					}
					.loader_Navigation3<?php echo $Chintan_Web_Slider;?>
					{
						width:60%;
						height:60%;
						top:50%;
						left:50%;
						box-sizing:border-box;
						-webkit-box-sizing:border-box;
						-ms-box-sizing:border-box;
						-moz-box-sizing:border-box;
						-o-box-sizing:border-box;
						transform:translateY(-50%) translateX(-50%);
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						animation:clockLoadingmin 1s linear 500;
						-webkit-animation:clockLoadingmin 1s linear 500;
						-ms-animation:clockLoadingmin 1s linear 500;
						-moz-animation:clockLoadingmin 1s linear 500;
						-o-animation:clockLoadingmin 1s linear 500;
					}
					.loader_Navigation1
					{
						width:100%;
						height:100%;
						animation:clockLoading 1s linear 500;
						-webkit-animation:clockLoading 1s linear 500;
						-ms-animation:clockLoading 1s linear 500;
						-moz-animation:clockLoading 1s linear 500;
						-o-animation:clockLoading 1s linear 500;
					}
					.loader_Navigation2
					{
						width:80%;
						height:80%;
						animation:anticlockLoading 1s linear 500;
						-webkit-animation:anticlockLoading 1s linear 500;
						-ms-animation:anticlockLoading 1s linear 500;
						-moz-animation:anticlockLoading 1s linear 500;
						-o-animation:anticlockLoading 1s linear 500;
					}
					@keyframes clockLoading { from { transform:rotate(0deg); } to { transform:rotate(360deg); } }
					@keyframes anticlockLoading { from { transform:translateY(-50%) translateX(-50%) rotate(0deg); } to { transform:translateY(-50%) translateX(-50%) rotate(-360deg); } }
					@keyframes clockLoadingmin { from { transform:translateY(-50%) translateX(-50%) rotate(0deg); } to { transform:translateY(-50%) translateX(-50%) rotate(360deg);} }
					@-moz-keyframes clockLoading { from { -moz-transform:rotate(0deg); } to { -moz-transform:rotate(360deg); } }
					@-moz-keyframes anticlockLoading { from { -moz-transform:translateY(-50%) translateX(-50%) rotate(0deg); } to { -moz-transform:translateY(-50%) translateX(-50%) rotate(-360deg); } }
					@-moz-keyframes clockLoadingmin { from { -moz-transform:translateY(-50%) translateX(-50%) rotate(0deg); } to { -moz-transform:translateY(-50%) translateX(-50%) rotate(360deg);} }
					@-webkit-keyframes clockLoading { from { -webkit-transform:rotate(0deg); } to { -webkit-transform:rotate(360deg); } }
					@-webkit-keyframes anticlockLoading { from { -webkit-transform:translateY(-50%) translateX(-50%) rotate(0deg); } to { -webkit-transform:translateY(-50%) translateX(-50%) rotate(-360deg); } }
					@-webkit-keyframes clockLoadingmin { from { -webkit-transform:translateY(-50%) translateX(-50%) rotate(0deg); } to { -webkit-transform:translateY(-50%) translateX(-50%) rotate(360deg);} }
					/*Second Loader*/
					.overlay-loader<?php echo $Chintan_Web_Slider;?> { display: block; margin: auto; width: 97px; height: 60px; position: relative; top: 0; left: 0; right: 0; bottom: 0; }
					<?php if($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_S == "small") { ?>
						.overlay-loader<?php echo $Chintan_Web_Slider;?> { height: 40px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> { width: 49px !important; height: 49px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(2) { width: 3px !important; height: 3px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(3) { width: 9px !important; height: 9px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(4) { width: 14px !important; height: 14px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(5) { width: 19px !important; height: 19px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(6) { width: 24px !important; height: 24px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(7) { width: 28px !important; height: 28px !important; }
					<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_S == "middle") { ?>
						.overlay-loader<?php echo $Chintan_Web_Slider;?> { height: 50px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> { width: 67px !important; height: 67px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(2) { width: 8px !important; height: 8px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(3) { width: 14px !important; height: 14px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(4) { width: 20px !important; height: 20px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(5) { width: 26px !important; height: 26px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(6) { width: 32px !important; height: 32px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(7) { width: 38px !important; height: 38px !important; }
					<?php } else { ?>
						.loader<?php echo $Chintan_Web_Slider;?> { width: 97px !important; height: 97px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(2) { width: 12px !important; height: 12px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(3) { width: 18px !important; height: 18px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(4) { width: 23px !important; height: 23px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(5) { width: 31px !important; height: 31px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(6) { width: 39px !important; height: 39px !important; }
						.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(7) { width: 49px !important; height: 49px !important; }
					<?php } ?>
					.loader<?php echo $Chintan_Web_Slider;?> 
					{
						position: absolute;
						top: 0;
						left: 0;
						right: 0;
						bottom: 0;
						margin: auto;
						width: 97px;
						height: 97px;
						animation-name: rotateAnim;
						-o-animation-name: rotateAnim;
						-ms-animation-name: rotateAnim;
						-webkit-animation-name: rotateAnim;
						-moz-animation-name: rotateAnim;
						animation-duration: 0.4s;
						-o-animation-duration: 0.4s;
						-ms-animation-duration: 0.4s;
						-webkit-animation-duration: 0.4s;
						-moz-animation-duration: 0.4s;
						animation-iteration-count: infinite;
						-o-animation-iteration-count: infinite;
						-ms-animation-iteration-count: infinite;
						-webkit-animation-iteration-count: infinite;
						-moz-animation-iteration-count: infinite;
						animation-timing-function: linear;
						-o-animation-timing-function: linear;
						-ms-animation-timing-function: linear;
						-webkit-animation-timing-function: linear;
						-moz-animation-timing-function: linear;
					}
					.loader<?php echo $Chintan_Web_Slider;?> div 
					{
						width: 8px;
						height: 8px;
						border-radius: 50%;
						border: 1px solid <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_C;?>; 
						position: absolute;
						top: 2px;
						left: 0;
						right: 0;
						bottom: 0;
						margin: auto;
					}
					.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(odd) { border-top: none; border-left: none; }
					.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(even) { border-bottom: none; border-right: none; }
					.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(2) { border-width: 2px; left: 0px; top: -4px; width: 12px; height: 12px; }
					.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(3) { border-width: 2px; left: -1px; top: 3px; width: 18px; height: 18px; }
					.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(4) { border-width: 3px; left: -1px; top: -4px; width: 23px; height: 23px; }
					.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(5) { border-width: 3px; left: -1px; top: 4px; width: 31px; height: 31px; }
					.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(6) { border-width: 4px; left: 0px; top: -4px; width: 39px; height: 39px; }
					.loader<?php echo $Chintan_Web_Slider;?> div:nth-child(7) { border-width: 4px; left: 0px; top: 6px; width: 49px; height: 49px; }
					@keyframes rotateAnim { from { transform: rotate(360deg); } to { transform: rotate(0deg); } }
					@-o-keyframes rotateAnim { from { -o-transform: rotate(360deg); } to { -o-transform: rotate(0deg); } }
					@-ms-keyframes rotateAnim { from { -ms-transform: rotate(360deg); } to { -ms-transform: rotate(0deg); } }
					@-webkit-keyframes rotateAnim { from { -webkit-transform: rotate(360deg); } to { -webkit-transform: rotate(0deg); } }
					@-moz-keyframes rotateAnim { from { -moz-transform: rotate(360deg); } to { -moz-transform: rotate(0deg); } }
					/*Third Loader*/
					<?php if($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_S == "small") { ?>
						.windows8<?php echo $Chintan_Web_Slider;?> { width: 45px !important; height:45px !important; }
						.windows8<?php echo $Chintan_Web_Slider;?> .wBall { width: 42px !important; height: 42px !important; }
					<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_S == "middle") { ?>
						.windows8<?php echo $Chintan_Web_Slider;?> { width: 60px !important; height:60px !important; }
						.windows8<?php echo $Chintan_Web_Slider;?> .wBall { width: 56px !important; height: 56px !important; }
					<?php } else { ?>
						.windows8<?php echo $Chintan_Web_Slider;?> { width: 78px !important; height:78px !important; }
						.windows8<?php echo $Chintan_Web_Slider;?> .wBall { width: 74px !important; height: 74px !important; }
					<?php } ?>
					.windows8<?php echo $Chintan_Web_Slider;?> { position: relative; width: 78px; height:78px; margin:auto; }
					.windows8<?php echo $Chintan_Web_Slider;?> .wBall 
					{
						position: absolute;
						width: 74px;
						height: 74px;
						opacity: 0;
						transform: rotate(225deg);
						-o-transform: rotate(225deg);
						-ms-transform: rotate(225deg);
						-webkit-transform: rotate(225deg);
						-moz-transform: rotate(225deg);
						animation: orbit 6.96s infinite;
						-o-animation: orbit 6.96s infinite;
						-ms-animation: orbit 6.96s infinite;
						-webkit-animation: orbit 6.96s infinite;
						-moz-animation: orbit 6.96s infinite;
					}
					.windows8<?php echo $Chintan_Web_Slider;?> .wBall .wInnerBall
					{
						position: absolute;
						width: 10px;
						height: 10px;
						background: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_C;?>; 
						left:0px;
						top:0px;
						border-radius: 10px;
					}
					.windows8<?php echo $Chintan_Web_Slider;?> #wBall_1 
					{
						animation-delay: 1.52s;
						-o-animation-delay: 1.52s;
						-ms-animation-delay: 1.52s;
						-webkit-animation-delay: 1.52s;
						-moz-animation-delay: 1.52s;
					}
					.windows8<?php echo $Chintan_Web_Slider;?> #wBall_2 
					{
						animation-delay: 0.3s;
						-o-animation-delay: 0.3s;
						-ms-animation-delay: 0.3s;
						-webkit-animation-delay: 0.3s;
						-moz-animation-delay: 0.3s;
					}
					.windows8<?php echo $Chintan_Web_Slider;?> #wBall_3 
					{
						animation-delay: 0.61s;
						-o-animation-delay: 0.61s;
						-ms-animation-delay: 0.61s;
						-webkit-animation-delay: 0.61s;
						-moz-animation-delay: 0.61s;
					}
					.windows8<?php echo $Chintan_Web_Slider;?> #wBall_4 
					{
						animation-delay: 0.91s;
						-o-animation-delay: 0.91s;
						-ms-animation-delay: 0.91s;
						-webkit-animation-delay: 0.91s;
						-moz-animation-delay: 0.91s;
					}
					.windows8<?php echo $Chintan_Web_Slider;?> #wBall_5 
					{
						animation-delay: 1.22s;
						-o-animation-delay: 1.22s;
						-ms-animation-delay: 1.22s;
						-webkit-animation-delay: 1.22s;
						-moz-animation-delay: 1.22s;
					}
					@keyframes orbit 
					{
						0% { opacity: 1; z-index:99; transform: rotate(180deg); animation-timing-function: ease-out; }
						7% { opacity: 1; transform: rotate(300deg); animation-timing-function: linear; origin:0%; }
						30% { opacity: 1; transform:rotate(410deg); animation-timing-function: ease-in-out; origin:7%; }
						39% { opacity: 1; transform: rotate(645deg); animation-timing-function: linear; origin:30%; }
						70% { opacity: 1; transform: rotate(770deg); animation-timing-function: ease-out; origin:39%; }
						75% { opacity: 1; transform: rotate(900deg); animation-timing-function: ease-out; origin:70%; }
						76% { opacity: 0; transform: rotate(900deg); }
						100% { opacity: 0; transform: rotate(900deg); }
					}
					@-o-keyframes orbit 
					{
						0% { opacity: 1; z-index:99; -o-transform: rotate(180deg); -o-animation-timing-function: ease-out; }
						7% { opacity: 1; -o-transform: rotate(300deg); -o-animation-timing-function: linear; -o-origin:0%; }
						30% { opacity: 1; -o-transform:rotate(410deg); -o-animation-timing-function: ease-in-out; -o-origin:7%; }
						39% { opacity: 1; -o-transform: rotate(645deg); -o-animation-timing-function: linear; -o-origin:30%; }
						70% { opacity: 1; -o-transform: rotate(770deg); -o-animation-timing-function: ease-out; -o-origin:39%; }
						75% { opacity: 1; -o-transform: rotate(900deg); -o-animation-timing-function: ease-out; -o-origin:70%; }
						76% { opacity: 0; -o-transform:rotate(900deg); }
						100% { opacity: 0; -o-transform: rotate(900deg); }
					}
					@-ms-keyframes orbit 
					{
						0% { opacity: 1; z-index:99; -ms-transform: rotate(180deg); -ms-animation-timing-function: ease-out; }
						7% { opacity: 1; -ms-transform: rotate(300deg); -ms-animation-timing-function: linear; -ms-origin:0%; }
						30% { opacity: 1; -ms-transform:rotate(410deg); -ms-animation-timing-function: ease-in-out; -ms-origin:7%; }
						39% { opacity: 1; -ms-transform: rotate(645deg); -ms-animation-timing-function: linear; -ms-origin:30%; }
						70% { opacity: 1; -ms-transform: rotate(770deg); -ms-animation-timing-function: ease-out; -ms-origin:39%; }
						75% { opacity: 1; -ms-transform: rotate(900deg); -ms-animation-timing-function: ease-out; -ms-origin:70%; }
						76% { opacity: 0; -ms-transform:rotate(900deg); }
						100% { opacity: 0; -ms-transform: rotate(900deg); }
					}
					@-webkit-keyframes orbit 
					{
						0% { opacity: 1; z-index:99; -webkit-transform: rotate(180deg); -webkit-animation-timing-function: ease-out; }
						7% { opacity: 1; -webkit-transform: rotate(300deg); -webkit-animation-timing-function: linear; -webkit-origin:0%; }
						30% { opacity: 1; -webkit-transform:rotate(410deg); -webkit-animation-timing-function: ease-in-out; -webkit-origin:7%; }
						39% { opacity: 1; -webkit-transform: rotate(645deg); -webkit-animation-timing-function: linear; -webkit-origin:30%; }
						70% { opacity: 1; -webkit-transform: rotate(770deg); -webkit-animation-timing-function: ease-out; -webkit-origin:39%; }
						75% { opacity: 1; -webkit-transform: rotate(900deg); -webkit-animation-timing-function: ease-out; -webkit-origin:70%; }
						76% { opacity: 0; -webkit-transform:rotate(900deg); }
						100% { opacity: 0; -webkit-transform: rotate(900deg); }
					}
					@-moz-keyframes orbit 
					{
						0% { opacity: 1; z-index:99; -moz-transform: rotate(180deg); -moz-animation-timing-function: ease-out; }
						7% { opacity: 1; -moz-transform: rotate(300deg); -moz-animation-timing-function: linear; -moz-origin:0%; }
						30% { opacity: 1; -moz-transform:rotate(410deg); -moz-animation-timing-function: ease-in-out; -moz-origin:7%; }
						39% { opacity: 1; -moz-transform: rotate(645deg); -moz-animation-timing-function: linear; -moz-origin:30%; }
						70% { opacity: 1; -moz-transform: rotate(770deg); -moz-animation-timing-function: ease-out; -moz-origin:39%; }
						75% { opacity: 1; -moz-transform: rotate(900deg); -moz-animation-timing-function: ease-out; -moz-origin:70%; }
						76% { opacity: 0; -moz-transform:rotate(900deg); }
						100% { opacity: 0; -moz-transform: rotate(900deg); }
					}
					/*Fourth loader*/
					<?php if($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_S == "small") { ?>
						.cssload-thecube<?php echo $Chintan_Web_Slider;?> { width: 30px !important; height: 30px !important; }
					<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_S == "middle") { ?>
						.cssload-thecube<?php echo $Chintan_Web_Slider;?> { width: 40px !important; height: 40px !important; }
					<?php } else { ?>
						.cssload-thecube<?php echo $Chintan_Web_Slider;?> { width: 50px !important; height: 50px !important; }
					<?php } ?>
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> 
					{
						width: 50px;
						height: 50px;
						margin: 20px auto;
						position: relative;
						transform: rotateZ(45deg);
						-o-transform: rotateZ(45deg);
						-ms-transform: rotateZ(45deg);
						-webkit-transform: rotateZ(45deg);
						-moz-transform: rotateZ(45deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-cube 
					{
						position: relative;
						transform: rotateZ(45deg);
						-o-transform: rotateZ(45deg);
						-ms-transform: rotateZ(45deg);
						-webkit-transform: rotateZ(45deg);
						-moz-transform: rotateZ(45deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-cube 
					{
						float: left;
						width: 50%;
						height: 50%;
						position: relative;
						transform: scale(1.1);
						-o-transform: scale(1.1);
						-ms-transform: scale(1.1);
						-webkit-transform: scale(1.1);
						-moz-transform: scale(1.1);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-cube:before 
					{
						content: "";
						position: absolute;
						top: 0;
						left: 0;
						width: 100%;
						height: 100%;
						background-color: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_C;?>; 
						animation: cssload-fold-thecube 2.76s infinite linear both;
						-o-animation: cssload-fold-thecube 2.76s infinite linear both;
						-ms-animation: cssload-fold-thecube 2.76s infinite linear both;
						-webkit-animation: cssload-fold-thecube 2.76s infinite linear both;
						-moz-animation: cssload-fold-thecube 2.76s infinite linear both;
						transform-origin: 100% 100%;
						-o-transform-origin: 100% 100%;
						-ms-transform-origin: 100% 100%;
						-webkit-transform-origin: 100% 100%;
						-moz-transform-origin: 100% 100%;
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c2 
					{
						transform: scale(1.1) rotateZ(90deg);
						-o-transform: scale(1.1) rotateZ(90deg);
						-ms-transform: scale(1.1) rotateZ(90deg);
						-webkit-transform: scale(1.1) rotateZ(90deg);
						-moz-transform: scale(1.1) rotateZ(90deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c3 
					{
						transform: scale(1.1) rotateZ(180deg);
						-o-transform: scale(1.1) rotateZ(180deg);
						-ms-transform: scale(1.1) rotateZ(180deg);
						-webkit-transform: scale(1.1) rotateZ(180deg);
						-moz-transform: scale(1.1) rotateZ(180deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c4 
					{
						transform: scale(1.1) rotateZ(270deg);
						-o-transform: scale(1.1) rotateZ(270deg);
						-ms-transform: scale(1.1) rotateZ(270deg);
						-webkit-transform: scale(1.1) rotateZ(270deg);
						-moz-transform: scale(1.1) rotateZ(270deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c2:before 
					{
						animation-delay: 0.35s;
						-o-animation-delay: 0.35s;
						-ms-animation-delay: 0.35s;
						-webkit-animation-delay: 0.35s;
						-moz-animation-delay: 0.35s;
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c3:before 
					{
						animation-delay: 0.69s;
						-o-animation-delay: 0.69s;
						-ms-animation-delay: 0.69s;
						-webkit-animation-delay: 0.69s;
						-moz-animation-delay: 0.69s;
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c4:before 
					{
						animation-delay: 1.04s;
						-o-animation-delay: 1.04s;
						-ms-animation-delay: 1.04s;
						-webkit-animation-delay: 1.04s;
						-moz-animation-delay: 1.04s;
					}
					@keyframes cssload-fold-thecube 
					{
						0%, 10% { transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}
					@-o-keyframes cssload-fold-thecube 
					{
						0%, 10% { -o-transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { -o-transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { -o-transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}
					@-ms-keyframes cssload-fold-thecube 
					{
						0%, 10% { -ms-transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { -ms-transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { -ms-transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}
					@-webkit-keyframes cssload-fold-thecube 
					{
						0%, 10% { -webkit-transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { -webkit-transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { -webkit-transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}
					@-moz-keyframes cssload-fold-thecube 
					{
						0%, 10% { -moz-transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { -moz-transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { -moz-transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}
					/*First Text*/
					.cssload-loader<?php echo $Chintan_Web_Slider;?> 
					{
						width: 244px;
						height: 49px;
						line-height: 49px;
						text-align: center;
						position: relative;
						left: 50%;
						transform: translate(-50%, 0%);
						-o-transform: translate(-50%, 0%);
						-ms-transform: translate(-50%, 0%);
						-webkit-transform: translate(-50%, 0%);
						-moz-transform: translate(-50%, 0%);
						font-family: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FF;?> !important;
						text-transform: none !important;
						font-weight: 900;
						font-size:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FS;?>px !important;
						color: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_C;?> !important;
						letter-spacing: 0.2em;
						margin-top:10px;
					}
					.cssload-loader<?php echo $Chintan_Web_Slider;?>::before, .cssload-loader<?php echo $Chintan_Web_Slider;?>::after 
					{
						content: "";
						display: block;
						width: 15px;
						height: 15px;
						background: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T2_BC;?> !important;
						position: absolute;
						animation: cssload-load 0.81s infinite alternate ease-in-out;
						-o-animation: cssload-load 0.81s infinite alternate ease-in-out;
						-ms-animation: cssload-load 0.81s infinite alternate ease-in-out;
						-webkit-animation: cssload-load 0.81s infinite alternate ease-in-out;
						-moz-animation: cssload-load 0.81s infinite alternate ease-in-out;
					}
					.cssload-loader<?php echo $Chintan_Web_Slider;?>::before { top: 0; }
					.cssload-loader<?php echo $Chintan_Web_Slider;?>::after { bottom: 0; }
					@keyframes cssload-load { 0% { left: 0; height: 29px; width: 15px; } 50% { height: 8px; width: 39px; } 100% { left: 229px; height: 29px; width: 15px; } }
					@-o-keyframes cssload-load { 0% { left: 0; height: 29px; width: 15px; } 50% { height: 8px; width: 39px; } 100% { left: 229px; height: 29px; width: 15px; } }
					@-ms-keyframes cssload-load { 0% { left: 0; height: 29px; width: 15px; } 50% { height: 8px; width: 39px; } 100% { left: 229px; height: 29px; width: 15px; } }
					@-moz-keyframes cssload-load { 0% { left: 0; height: 29px; width: 15px; } 50% { height: 8px; width: 39px; } 100% { left: 229px; height: 29px; width: 15px; } }
					@-webkit-keyframes cssload-load { 0% { left: 0; height: 29px; width: 15px; } 50% { height: 8px; width: 39px; } 100% { left: 229px; height: 29px; width: 15px; } }
					/*Second*/
					#inTurnFadingTextG<?php echo $Chintan_Web_Slider;?> { width:100%; margin:auto; text-align:center; }
					.inTurnFadingTextG<?php echo $Chintan_Web_Slider;?>
					{
						font-size: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FS;?>px !important;
						font-family:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FF;?> !important;
						color: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_C;?> !important;
						text-decoration:none;
						font-weight:normal;
						font-style:normal;
						display:inline-block;
						animation-name:bounce_inTurnFadingTextG;
						-o-animation-name:bounce_inTurnFadingTextG;
						-ms-animation-name:bounce_inTurnFadingTextG;
						-webkit-animation-name:bounce_inTurnFadingTextG;
						-moz-animation-name:bounce_inTurnFadingTextG;
						animation-duration:2.09s;
						-o-animation-duration:2.09s;
						-ms-animation-duration:2.09s;
						-webkit-animation-duration:2.09s;
						-moz-animation-duration:2.09s;
						animation-iteration-count:infinite;
						-o-animation-iteration-count:infinite;
						-ms-animation-iteration-count:infinite;
						-webkit-animation-iteration-count:infinite;
						-moz-animation-iteration-count:infinite;
						animation-direction:normal;
						-o-animation-direction:normal;
						-ms-animation-direction:normal;
						-webkit-animation-direction:normal;
						-moz-animation-direction:normal;
					}
					<?php foreach($text_array as $key=>$v) { ?>
						#inTurnFadingTextG<?php echo $Chintan_Web_Slider;?>_<?php Print $key+1;?>
						{
							animation-delay:<?php Print $anim_sum;?>s !important;
							-o-animation-delay:<?php Print $anim_sum;?>s !important;
							-ms-animation-delay:<?php Print $anim_sum;?>s !important;
							-webkit-animation-delay:<?php Print $anim_sum;?>s !important;
							-moz-animation-delay:<?php Print $anim_sum;?>s !important;
						}
						<?php $anim_sum=$anim_sum+0.15;?>
					<?php } ?>
					@keyframes bounce_inTurnFadingTextG 
					{
						0% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T2_AnC;?>; }
						100% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_C;?> !important; }
					}
					@-o-keyframes bounce_inTurnFadingTextG 
					{
						0% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T2_AnC;?>; }
						100% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_C;?> !important; }
					}
					@-ms-keyframes bounce_inTurnFadingTextG 
					{
						0% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T2_AnC;?>; }
						100% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_C;?> !important; }
					}
					@-moz-keyframes bounce_inTurnFadingTextG 
					{
						0% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T2_AnC;?>; }
						100% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_C;?> !important; }
					}
					@-webkit-keyframes bounce_inTurnFadingTextG 
					{
						0% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T2_AnC;?>; }
						100% { color:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_C;?> !important; }
					}
					/*Third text*/
					.cssload-preloader<?php echo $Chintan_Web_Slider;?> { position: relative; top: 0px; left: 0px; right: 0px; bottom: 0px; z-index: 10; }
					.cssload-preloader<?php echo $Chintan_Web_Slider;?> > .cssload-preloader<?php echo $Chintan_Web_Slider;?>-box 
					{
						position: relative;
						display:inline-block;
						margin-left:10px;
						margin-top:20px;
						height: 29px;
						left:50%;
						transform:translateX(-50%) !important;
						-webkit-transform:translateX(-50%) !important;
						-ms-transform:translateX(-50%) !important;
						-moz-transform:translateX(-50%) !important;
						-o-transform:translateX(-50%) !important;
						perspective: 195px;
						-o-perspective: 195px;
						-ms-perspective: 195px;
						-webkit-perspective: 195px;
						-moz-perspective: 195px;
					}
					.cssload-preloader<?php echo $Chintan_Web_Slider;?> .cssload-preloader<?php echo $Chintan_Web_Slider;?>-box > div 
					{
						position: relative;
						width: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FS*2;?>px;
						height: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FS*2;?>px;
						background: rgb(204,204,204);
						float: left;
						text-align: center;
						line-height: 2;
						font-size: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FS;?>px !important;
						font-family:<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FF;?> !important;
						color: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_C;?> !important;
					}
					<?php foreach($text_array as $key=>$v) { ?>
						.cssload-preloader<?php echo $Chintan_Web_Slider;?> .cssload-preloader<?php echo $Chintan_Web_Slider;?>-box > div:nth-child(<?php Print $key+1;?>) 
						{
							background: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?> !important;
							margin-right: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_FS;?>px !important;
							animation: cssload-movement<?php echo $Chintan_Web_Slider;?> 690ms ease <?php Print $str_sum;?>ms infinite alternate;
							-o-animation: cssload-movement<?php echo $Chintan_Web_Slider;?> 690ms ease <?php Print $str_sum;?>ms infinite alternate;
							-ms-animation: cssload-movement<?php echo $Chintan_Web_Slider;?> 690ms ease <?php Print $str_sum;?>ms infinite alternate;
							-webkit-animation: cssload-movement<?php echo $Chintan_Web_Slider;?> 690ms ease <?php Print $str_sum;?>ms infinite alternate;
							-moz-animation: cssload-movement<?php echo $Chintan_Web_Slider;?> 690ms ease <?php Print $str_sum;?>ms infinite alternate;
						}
						<?php $str_sum=$str_sum+86.25;?>
					<?php } ?>
					@keyframes cssload-movement<?php echo $Chintan_Web_Slider;?> 
					{
						from { transform: scale(1.0) translateY(0px) rotateX(0deg); box-shadow: 0 0 0 rgba(0,0,0,0); }
						to 
						{
							transform: scale(1.5) translateY(-24px) rotateX(45deg);
							box-shadow: 0 24px 39px <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?>;
							background: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?> !important;
						}
					}
					@-o-keyframes cssload-movement<?php echo $Chintan_Web_Slider;?> 
					{
						from { -o-transform: scale(1.0) translateY(0px) rotateX(0deg); -o-box-shadow: 0 0 0 rgba(0,0,0,0); }
						to 
						{
							-o-transform: scale(1.5) translateY(-24px) rotateX(45deg);
							-o-box-shadow: 0 24px 39px <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?>;
							background: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?> !important;
						}
					}
					@-ms-keyframes cssload-movement<?php echo $Chintan_Web_Slider;?> 
					{
						from { -ms-transform: scale(1.0) translateY(0px) rotateX(0deg); -ms-box-shadow: 0 0 0 rgba(0,0,0,0); }
						to 
						{
							-ms-transform: scale(1.5) translateY(-24px) rotateX(45deg);
							-ms-box-shadow: 0 24px 39px <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?>;
							background: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?> !important;
						}
					}
					@-webkit-keyframes cssload-movement<?php echo $Chintan_Web_Slider;?> 
					{
						from { -webkit-transform: scale(1.0) translateY(0px) rotateX(0deg); -webkit-box-shadow: 0 0 0 rgba(0,0,0,0); }
						to 
						{
							-webkit-transform: scale(1.5) translateY(-24px) rotateX(45deg);
							-webkit-box-shadow: 0 24px 39px <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?>;
							background: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?> !important;
						}
					}
					@-moz-keyframes cssload-movement<?php echo $Chintan_Web_Slider;?> 
					{
						from { -moz-transform: scale(1.0) translateY(0px) rotateX(0deg); -moz-box-shadow: 0 0 0 rgba(0,0,0,0); }
						to 
						{
							-moz-transform: scale(1.5) translateY(-24px) rotateX(45deg);
							-moz-box-shadow: 0 24px 39px <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?>;
							background: <?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T3_BgC;?> !important;
						}
					}

				<?php } else { ?>
					.center_content<?php echo $Chintan_Web_Slider;?>
					{
						position:relative;
						overflow:visible;
						top:50%;
						transform:translateY(-50%);
						-webkit-transform:translateY(-50%);
						-ms-transform:translateY(-50%);
						-moz-transform:translateY(-50%);
						-o-transform:translateY(-50%);
					}
					#RW_Load_Content_Navigation<?php echo $Chintan_Web_Slider;?>
					{
						margin:20px auto !important;
						background-color:transparent !important;
						z-index:999;
						width:500px;
						height:350px;
						max-width:100% !important;
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> { width: 30px !important; height: 30px !important; }
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> 
					{
						width: 50px;
						height: 50px;
						margin: 20px auto;
						position: relative;
						transform: rotateZ(45deg);
						-o-transform: rotateZ(45deg);
						-ms-transform: rotateZ(45deg);
						-webkit-transform: rotateZ(45deg);
						-moz-transform: rotateZ(45deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-cube 
					{
						position: relative;
						transform: rotateZ(45deg);
						-o-transform: rotateZ(45deg);
						-ms-transform: rotateZ(45deg);
						-webkit-transform: rotateZ(45deg);
						-moz-transform: rotateZ(45deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-cube 
					{
						float: left;
						width: 50%;
						height: 50%;
						position: relative;
						transform: scale(1.1);
						-o-transform: scale(1.1);
						-ms-transform: scale(1.1);
						-webkit-transform: scale(1.1);
						-moz-transform: scale(1.1);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-cube:before 
					{
						content: "";
						position: absolute;
						top: 0;
						left: 0;
						width: 100%;
						height: 100%;
						background-color: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBS;?>; 
						animation: cssload-fold-thecube 2.76s infinite linear both;
						-o-animation: cssload-fold-thecube 2.76s infinite linear both;
						-ms-animation: cssload-fold-thecube 2.76s infinite linear both;
						-webkit-animation: cssload-fold-thecube 2.76s infinite linear both;
						-moz-animation: cssload-fold-thecube 2.76s infinite linear both;
						transform-origin: 100% 100%;
						-o-transform-origin: 100% 100%;
						-ms-transform-origin: 100% 100%;
						-webkit-transform-origin: 100% 100%;
						-moz-transform-origin: 100% 100%;
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c2 
					{
						transform: scale(1.1) rotateZ(90deg);
						-o-transform: scale(1.1) rotateZ(90deg);
						-ms-transform: scale(1.1) rotateZ(90deg);
						-webkit-transform: scale(1.1) rotateZ(90deg);
						-moz-transform: scale(1.1) rotateZ(90deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c3 
					{
						transform: scale(1.1) rotateZ(180deg);
						-o-transform: scale(1.1) rotateZ(180deg);
						-ms-transform: scale(1.1) rotateZ(180deg);
						-webkit-transform: scale(1.1) rotateZ(180deg);
						-moz-transform: scale(1.1) rotateZ(180deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c4 
					{
						transform: scale(1.1) rotateZ(270deg);
						-o-transform: scale(1.1) rotateZ(270deg);
						-ms-transform: scale(1.1) rotateZ(270deg);
						-webkit-transform: scale(1.1) rotateZ(270deg);
						-moz-transform: scale(1.1) rotateZ(270deg);
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c2:before 
					{
						animation-delay: 0.35s;
						-o-animation-delay: 0.35s;
						-ms-animation-delay: 0.35s;
						-webkit-animation-delay: 0.35s;
						-moz-animation-delay: 0.35s;
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c3:before 
					{
						animation-delay: 0.69s;
						-o-animation-delay: 0.69s;
						-ms-animation-delay: 0.69s;
						-webkit-animation-delay: 0.69s;
						-moz-animation-delay: 0.69s;
					}
					.cssload-thecube<?php echo $Chintan_Web_Slider;?> .cssload-c4:before 
					{
						animation-delay: 1.04s;
						-o-animation-delay: 1.04s;
						-ms-animation-delay: 1.04s;
						-webkit-animation-delay: 1.04s;
						-moz-animation-delay: 1.04s;
					}
					@keyframes cssload-fold-thecube 
					{
						0%, 10% { transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}
					@-o-keyframes cssload-fold-thecube 
					{
						0%, 10% { -o-transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { -o-transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { -o-transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}
					@-ms-keyframes cssload-fold-thecube 
					{
						0%, 10% { -ms-transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { -ms-transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { -ms-transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}
					@-webkit-keyframes cssload-fold-thecube 
					{
						0%, 10% { -webkit-transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { -webkit-transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { -webkit-transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}
					@-moz-keyframes cssload-fold-thecube 
					{
						0%, 10% { -moz-transform: perspective(136px) rotateX(-180deg); opacity: 0; }
						25%, 75% { -moz-transform: perspective(136px) rotateX(0deg); opacity: 1; }
						90%, 100% { -moz-transform: perspective(136px) rotateY(180deg); opacity: 0; }
					}

				<?php } ?>




					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview img,.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview img
					{
						box-shadow:none !important;
						-moz-box-shadow:none !important;
						-webkit-box-shadow:none !important;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?>
					{
						margin:20px auto !important;
						width:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_W;?>px;
						height:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_H;?>px;
						max-width:100% !important;
					}
					<?php if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArHEff=='slide out'){ ?>
						/* general style */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview 
						{
							width: 360px;
							height:100% !important;
							position: absolute;
							top:0;
							left:-<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
							z-index:100;
							-webkit-transition: all 0.3s ease-out !important;
							-moz-transition: all 0.3s ease-out !important;
							transition: all 0.3s ease-out !important;
							opacity:0;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview .alt 
						{
							position: absolute;
							top:0;
							background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TBgC;?> !important;
							width: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW*2;?>px;
							height:100% !important;
							color: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TC;?>;
							text-indent:0;
							<?php if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TUp=='true'){ ?>
								text-transform: uppercase !important;
							<?php }else{?>
								text-transform: none !important;
							<?php }?>
							text-align:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TTA;?>;
							padding: 0px 5px;
							font-family: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TFF;?>;
							-webkit-box-sizing: border-box;
							-moz-box-sizing: border-box;
							-o-box-sizing: border-box;
						}
						/* next button */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview { right:-<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px; left:auto; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt { left:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW*2;?>px; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt { right:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW*2;?>px; }
						/* hover style */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev:hover .preview { left:0; opacity:1; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next:hover .preview { right:0; opacity:1; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview img 
						{
							position: absolute;
							left:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
							top:0;
							width: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
							height:100% !important;
							-webkit-transition:  all 0s ease-out !important; 
							-moz-transition:  all 0s ease-out !important; 
							transition:  all 0s ease-out !important;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview img 
						{
							position: absolute;
							right:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
							top:0;
							width: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
							height:100% !important;
							box-shadow:none !important;
							-moz-box-shadow:none !important;
							-webkit-box-shadow:none !important;
							-webkit-transition:  all 0s ease-out !important; 
							-moz-transition:  all 0s ease-out !important; 
							transition:  all 0s ease-out !important;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArHEff=='flip out'){ ?>
						/* general style */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview 
						{
							width: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
							height:100% !important;
							position: absolute;
							top:0;
							z-index:100;
							-webkit-transition:  -webkit-transform 0.3s ease-out; 
							-moz-transition:  -moz-transform 0.3s ease-out; 
							transition:  transform 0.3s ease-out; 
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview img 
						{
							position: absolute;
							left:0;
							top:0;
							width: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
							height:100% !important;
							-webkit-transition: -webkit-transform 0.3s ease-out !important; 
							-moz-transition: -moz-transform 0.3s ease-out !important; 
							transition: transform 0.3s ease-out !important; 
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview img 
						{
							position: absolute;
							right:0;
							top:0;
							width: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
							height:100% !important;
							-webkit-transition: -webkit-transform 300ms ease-out !important; 
							-moz-transition: -moz-transform 0.3s ease-out !important; 
							transition: transform 0.3s ease-out !important; 
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview .alt { display:none; }
						/* prev button */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev 
						{
							-webkit-perspective-origin: 100% 50%;
							-moz-perspective-origin: 100% 50%;
							perspective-origin: 100% 50%;
							-webkit-perspective: 1000px;
							-moz-perspective: 1000px;
							perspective: 1000px;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview 
						{
							-webkit-transform: rotateY(90deg);
							-moz-transform: rotateY(90deg);
							transform: rotateY(90deg);
							-webkit-transform-origin: 0% 50%;
							-moz-transform-origin: 0% 50%;
							transform-origin: 0% 50%;
						}
						/* next button */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next 
						{
							-webkit-perspective-origin: 0% 50%;
							-moz-perspective-origin: 0% 50%;
							perspective-origin: 0% 50%;
							-webkit-perspective: 1000px;
							-moz-perspective: 1000px;
							perspective: 1000px;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview 
						{
							left:auto;
							-webkit-transform: rotateY(-90deg);
							-moz-transform: rotateY(-90deg);
							transform: rotateY(-90deg);
							-webkit-transform-origin: 100% 100%;
							-moz-transform-origin: 100% 100%;
							transform-origin: 100% 100%;
						}
						/* hover style */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a:hover .preview 
						{
							opacity:1;
							-webkit-transform: rotateY(0deg);
							-moz-transform: rotateY(0deg);
							transform: rotateY(0deg);
						}
						/* different hover style for flexslider nav */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a 
						{
							-webkit-transition:  none !important; 
							-moz-transition: none !important; 
							transition:  none !important;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArHEff=='double flip out'){ ?>
						/* general style */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview 
						{
							width: 270px;
							height:100% !important;
							position: absolute;
							top:0;
							z-index:100;
							-webkit-transition:  -webkit-transform 0.3s ease-out !important;
							-moz-transition:  -moz-transform 0.3s ease-out !important;
							transition:  transform 0.3s ease-out !important;
							-webkit-backface-visibility: hidden !important;
							-moz-backface-visibility: hidden !important;
							backface-visibility: hidden;
							-webkit-perspective-origin: 100% 50%;
							-moz-perspective-origin: 100% 50%;
							perspective-origin: 100% 50%;
							-webkit-perspective: 1000px;
							-moz-perspective: 1000px;
							perspective: 1000px;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview img { position: absolute; top:0; height: 100%; z-index:10; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview .alt 
						{
							background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TBgC;?>;
							height:100% !important;
							color: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TC;?>;
							text-indent:0;
							<?php if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TUp=='true'){ ?>
								text-transform: uppercase !important;
							<?php }else{?>
								text-transform: none !important;
							<?php }?>
							text-align:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TTA;?>;
							padding: 0px 5px;
							font-family: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TFF;?>;
							position: absolute;
							top:0;
							-webkit-box-sizing: border-box;
							-moz-box-sizing: border-box;
							-o-box-sizing: border-box;
							-webkit-transition:  -webkit-transform 0.3s ease-out !important;
							-moz-transition:  -moz-transform 0.3s ease-out !important;
							transition:  transform 0.3s ease-out !important;
							-webkit-backface-visibility: hidden;
							-moz-backface-visibility: hidden;
							backface-visibility: hidden;
							z-index:5;
						}
						/* previous button */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev 
						{
							-webkit-perspective-origin: 100% 50%;
							-moz-perspective-origin: 100% 50%;
							perspective-origin: 100% 50%;
							-webkit-perspective: 1000px;
							-moz-perspective: 1000px;
							perspective: 1000px;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview, .flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt
						{
							-webkit-transform: rotateY(90deg);
							-moz-transform: rotateY(90deg);
							transform: rotateY(90deg);
							-webkit-transform-origin: 0% 50%;
							-moz-transform-origin: 0% 50%;
							transform-origin: 0% 50%;
							-webkit-transition:  -webkit-transform 0.3s ease-out !important;
							-moz-transition:  -moz-transform 0.3s ease-out !important;
							transition:  transform 0.3s ease-out !important;
						}
						/* next button */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next 
						{
							-webkit-perspective-origin: 0% 50%;
							-moz-perspective-origin: 0% 50%;
							perspective-origin: 0% 50%;
							-webkit-perspective: 1000px;
							-moz-perspective: 1000px;
							perspective: 1000px;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview, .flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt
						{
							left:auto;
							-webkit-transform: rotateY(-90deg);
							-moz-transform: rotateY(-90deg);
							transform: rotateY(-90deg);
							-webkit-transform-origin: 100% 50%;
							-moz-transform-origin: 100% 50%;
							transform-origin: 100% 50%;
							-webkit-transition:  -webkit-transform 0.3s ease-out !important;
							-moz-transition:  -moz-transform 0.3s ease-out !important;
							transition:  transform 0.3s ease-out !important;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview img
						{
							left: 0;
							-webkit-transition:  -webkit-transform 0.3s ease-out !important;
							-moz-transition:  -moz-transform 0.3s ease-out !important;
							transition:  transform 0.3s ease-out !important;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview img
						{
							position: absolute;
							right:0;
							top:0;
							width: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
							-webkit-transition:  -webkit-transform 0.3s ease-out !important;
							-moz-transition:  -moz-transform 0.3s ease-out !important;
							transition:  transform 0.3s ease-out !important;
						}
						/* hover style */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a:hover .preview, .flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a:hover .preview .alt 
						{
							opacity:1;
							-webkit-transform: rotateY(0deg);
							-moz-transform: rotateY(0deg);
							transform: rotateY(0deg);
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a:hover .preview .alt
						{
							-webkit-transition-delay: 0.3s !important;
							-moz-transition-delay: 0.3s !important;
							transition-delay: 0.3s !important;
						}
						/* different hover style for flexslider nav */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a
						{
							-webkit-transition:  none !important;
							-moz-transition: none !important;
							transition:  none !important;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArHEff=='both ways'){ ?>
						/* general style */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview { height:100% !important; position: absolute; top:0; z-index:90; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview img
						{
							position: absolute;
							top:0px;
							height: 100%;
							-webkit-transition:  all 0.3s ease-out !important;
							-moz-transition:  all 0.3s ease-out !important;
							transition:  all 0.3s ease-out !important;
							opacity:0;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview .alt
						{
							background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TBgC;?>;
							height:100% !important;
							color: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TC;?>;
							text-indent:0;
							<?php if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TUp=='true'){ ?>
								text-transform: uppercase !important;
							<?php }else{?>
								text-transform: none !important;
							<?php }?>
							text-align:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TTA;?>;
							padding: 0px 5px;
							font-family: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TFF;?>;
							position: absolute;
							top:0;
							-webkit-box-sizing: border-box;
							-moz-box-sizing: border-box;
							-o-box-sizing: border-box;
							-webkit-transition:  all 0.3s ease-out !important;
							-moz-transition:  all 0.3s ease-out !important;
							transition:  all 0.3s ease-out !important;
							opacity:0;
						}
						/* next button */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview { left:-<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px; right:auto; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview { right:-<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px; left:auto; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview img { left:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview img { right:<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px; }
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt 
						{
							left:auto;
							right:-<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>px;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt { left:auto; }
						/* hover style */
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev:hover .preview .alt 
						{
							transform:translateX(49.5%);
							-moz-transform:translateX(49.5%);
							-webkit-transform:translateX(49.5%);
							opacity:1;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next:hover .preview .alt 
						{
							transform:translateX(-100%);
							-moz-transform:translateX(-100%);
							-webkit-transform:translateX(-100%);
							opacity:1;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a:hover .preview img 
						{
							transform:translateY(-100%);
							-moz-transform:translateY(-100%);
							-webkit-transform:translateY(-100%);
							opacity:1;
						}
					<?php }?>
					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav 
					{
						height:0 !important;
						top:50% !important;
					}

					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .arrow { height:100%;}
					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a
					{
						background-color: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBgC;?> ;
						opacity: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArOp/100;?> ;
						-webkit-transform:translateY(-50%) !important;
						-ms-transform:translateY(-50%) !important;
						-moz-transform:translateY(-50%) !important;
						-o-transform:translateY(-50%) !important;
						transform:translateY(-50%) !important;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?>:hover .flex-prev:hover .arrow, .flexslider_<?php echo $Chintan_Web_Slider;?>:hover .flex-next:hover .arrow 
					{
						background-color: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArHBgC;?> !important;
						opacity: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArHOp/100;?>;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-nav { <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavPos;?>: 0%; padding:0px !important; }
					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-nav li
					{
						margin: 0 <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavPB;?>px;
						margin-top:<?php if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavPos==top){echo 14;}else{echo 4;}?>px;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-paging li a 
					{
						width: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavW;?>px; 
						height: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavH;?>px; 
						-webkit-border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavBR;?>px; 
						-moz-border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavBR;?>px;
						-o-border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavBR;?>px; 
						border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavBR;?>px; 
						border: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavBW;?>px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavBS;?> <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavBC;?>;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-paging li a:hover { background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavHC;?>;}
					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-paging li a.flex-active { background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavCC;?>;}
					.flexslider_<?php echo $Chintan_Web_Slider;?>
					{
						width: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_W;?>px;
						margin: 0 auto !important;
						-webkit-border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBR;?>px;
						-moz-border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBR;?>px;
						-o-border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBR;?>px;
						border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBR;?>px;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?>
					{
						position: relative;
						z-index: 0;
						overflow: unset;
					}
					<?php if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 1') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							box-shadow: 0 10px 6px -6px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 0 10px 6px -6px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 0 10px 6px -6px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 2') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>:before, .flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							z-index: -1;
							position: absolute;
							content: "";
							bottom: 15px;
							left: 10px;
							width: 50%;
							top: 80%;
							max-width:300px;
							background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							box-shadow: 0 15px 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 0 15px 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 0 15px 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							transform: rotate(-3deg);
							-moz-transform: rotate(-3deg);
							-webkit-transform: rotate(-3deg);
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							transform: rotate(3deg);
							-moz-transform: rotate(3deg);
							-webkit-transform: rotate(3deg);
							right: 10px;
							left: auto;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 3') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>:before
						{
							z-index: -1;
							position: absolute;
							content: "";
							bottom: 15px;
							left: 10px;
							width: 50%;
							top: 80%;
							max-width:300px;
							background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							box-shadow: 0 15px 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 0 15px 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 0 15px 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							transform: rotate(-3deg);
							-moz-transform: rotate(-3deg);
							-webkit-transform: rotate(-3deg);
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 4') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							z-index: -1;
							position: absolute;
							content: "";
							bottom: 15px;
							right: 10px;
							left: auto;
							width: 50%;
							top: 80%;
							max-width:300px;
							background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							box-shadow: 0 15px 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 0 15px 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 0 15px 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							transform: rotate(3deg);
							-moz-transform: rotate(3deg);
							-webkit-transform: rotate(3deg);
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 5') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>:before, .flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							z-index: -1;
							position: absolute;
							content: "";
							bottom: 25px;
							left: 10px;
							width: 50%;
							top: 80%;
							max-width:300px;
							background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							box-shadow: 0 35px 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 0 35px 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 0 35px 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							transform: rotate(-8deg);
							-moz-transform: rotate(-8deg);
							-webkit-transform: rotate(-8deg);
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							transform: rotate(8deg);
							-moz-transform: rotate(8deg);
							-webkit-transform: rotate(8deg);
							right: 10px;
							left: auto;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 6') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							position:relative;
							box-shadow:0 1px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>, 0 0 40px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?> inset;
							-webkit-box-shadow:0 1px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>, 0 0 40px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?> inset;
							-moz-box-shadow:0 1px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>, 0 0 40px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?> inset;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?>:before, .flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							content:"";
							position:absolute; 
							z-index:-1;
							box-shadow:0 0 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow:0 0 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow:0 0 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							top:50%;
							bottom:0;
							left:10px;
							right:10px;
							border-radius:100px / 10px;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 7') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							position:relative;
							box-shadow:0 1px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>, 0 0 40px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?> inset;
							-webkit-box-shadow:0 1px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>, 0 0 40px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?> inset;
							-moz-box-shadow:0 1px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>, 0 0 40px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?> inset;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?>:before, .flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							content:"";
							position:absolute; 
							z-index:-1;
							box-shadow:0 0 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow:0 0 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow:0 0 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							top:0;
							bottom:0;
							left:10px;
							right:10px;
							border-radius:100px / 10px;
						} 
						.flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							right:10px; 
							left:auto; 
							transform:skew(8deg) rotate(3deg);
							-moz-transform:skew(8deg) rotate(3deg);
							-webkit-transform:skew(8deg) rotate(3deg);
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 8') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							position:relative;
							box-shadow:0 1px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>, 0 0 40px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?> inset;
							-webkit-box-shadow:0 1px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>, 0 0 40px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?> inset;
							-moz-box-shadow:0 1px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>, 0 0 40px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?> inset;
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?>:before, .flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							content:"";
							position:absolute; 
							z-index:-1;
							box-shadow:0 0 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow:0 0 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow:0 0 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							top:10px;
							bottom:10px;
							left:0;
							right:0;
							border-radius:100px / 10px;
						} 
						.flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							right:10px; 
							left:auto; 
							transform:skew(8deg) rotate(3deg);
							-moz-transform:skew(8deg) rotate(3deg);
							-webkit-transform:skew(8deg) rotate(3deg);
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 9') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>:before, .flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							position:absolute;
							content:"";
							box-shadow:0 10px 25px 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow:0 10px 25px 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow:0 10px 25px 20px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							top:40px;left:20px;bottom:50px;
							width:15%;
							z-index:-1;
							-webkit-transform: rotate(-5deg);
							-moz-transform: rotate(-5deg);
							transform: rotate(-5deg);
						}
						.flexslider_<?php echo $Chintan_Web_Slider;?>:after
						{
							-webkit-transform: rotate(5deg);
							-moz-transform: rotate(5deg);
							transform: rotate(5deg);
							right: 20px;left: auto;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 10') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							box-shadow: 0 0 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 0 0 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 0 0 10px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 11') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							box-shadow: 4px -4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 4px -4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 4px -4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 12') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							box-shadow: 5px 5px 3px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 5px 5px 3px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 5px 5px 3px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 13') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							box-shadow: 2px 2px white, 4px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 2px 2px white, 4px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 2px 2px white, 4px 4px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 14') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							box-shadow: 8px 8px 18px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 8px 8px 18px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 8px 8px 18px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 15') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							box-shadow: 0 8px 6px -6px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 0 8px 6px -6px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 0 8px 6px -6px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
						}
					<?php } else if($Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxS == 'Type 16') { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							box-shadow: 0 0 18px 7px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-moz-box-shadow: 0 0 18px 7px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
							-webkit-box-shadow: 0 0 18px 7px <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_BoxSC;?>;
						}
					<?php } else { ?>
						.flexslider_<?php echo $Chintan_Web_Slider;?>
						{
							box-shadow: none !important;
							-moz-box-shadow: none !important;
							-webkit-box-shadow: none !important;
						}
					<?php }?>
					.flexslider_<?php echo $Chintan_Web_Slider;?> .slides, .flexslider_<?php echo $Chintan_Web_Slider;?> .slides li img, .flexslider_<?php echo $Chintan_Web_Slider;?> .slides li, .flexslider_<?php echo $Chintan_Web_Slider;?> .slides
					{ 
						position:relative !important;
						width:100% !important;
						height:100% !important;
						padding:0px !important;
						margin-left:0px !important;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?> .slides li img
					{  
						-webkit-border: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBW;?>px solid <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBC;?>;
						-moz-border: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBW;?>px solid <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBC;?>;
						-o-border: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBW;?>px solid <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBC;?>;
						border: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBW;?>px solid <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBC;?>;
						-webkit-border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBR;?>px;
						-moz-border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBR;?>px;
						-o-border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBR;?>px;
						border-radius: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_IBR;?>px;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a.flex-next .arrow 
					{
						background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBgC;?> url("<?php echo plugins_url('/Images/icon-'. $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArType .'-'. $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArType .'.png',__FILE__)?>") no-repeat center center;
						background-size:70% 70%;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?>:hover .flex-next:hover .arrow 
					{ 
						right:0; 
						background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArHBgC;?> url("<?php echo plugins_url('/Images/icon-'. $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArType .'-'. $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArType .'.png',__FILE__)?>") no-repeat center center;
						background-size:70% 70%;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a.flex-prev .arrow
					{
						background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBgC;?> url("<?php echo plugins_url('/Images/icon-'. $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArType .'.png',__FILE__)?>") no-repeat center center;
						background-size:70% 70%;
					}
					.flexslider_<?php echo $Chintan_Web_Slider;?>:hover .flex-prev:hover .arrow 
					{ 
						right:0; 
						background: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArHBgC;?> url("<?php echo plugins_url('/Images/icon-'. $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArType .'.png',__FILE__)?>") no-repeat center center;
						background-size:70% 70%;
					}



					.rw_nav_video<?php echo $Chintan_Web_Slider;?>,.rw_nav_video{
						position:absolute;
						top:0;
						left:0;
						width:100%;
						height:100%;
						z-index:9;
						display:none !important;
					}

					.rw_nav_video<?php echo $Chintan_Web_Slider;?>_anim,.rw_nav_video_anim{
						display:block !important;
					}

					.pointer{
						cursor:pointer !important;
					}

					.flex-active-slide i.plIc{
						position:absolute;
						font-size:20px;
						padding:10px 25px;
						background-color: red;
						border-radius: 8px;
						color:#ffffff;
						top:50%;
						left:50%;
						-webkit-transform:translateY(-50%) translateX(-50%);
						-ms-transform:translateY(-50%) translateX(-50%);
						-moz-transform:translateY(-50%) translateX(-50%);
						-o-transform:translateY(-50%) translateX(-50%);
						transform:translateY(-50%) translateX(-50%);
					}

					.delIc<?php echo $Chintan_Web_Slider;?>{
						position:absolute;
						cursor: pointer;
						font-size:20px;
						color:#ffffff;
						top:5px;
						right:8px;
						text-shadow:0px 0px 30px #000000;
						display:none;
						z-index: 99;
					}
				</style>
				<?php if(!empty($Chintan_Web_Slider_Effect_Loader)){ ?>
					<div id="RW_Load_Content_Navigation<?php echo $Chintan_Web_Slider;?>" style="<?php if($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_Loading_Show == "true") { ?>display: block;<?php } else { ?>display: none;<?php } ?>">
						<div class="center_content<?php echo $Chintan_Web_Slider;?>">
							<?php if($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_Show == "true") { ?>
								<?php if($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T == "Type 1") { ?>
									<div class="RW_Loader_Frame_Navigation RW_Loader_Frame_Navigation<?php echo $Chintan_Web_Slider;?>">
										<div class="loader_Navigation1 loader_Navigation1<?php echo $Chintan_Web_Slider;?>" id="loader_Navigation1"></div>
										<div class="loader_Navigation2 loader_Navigation2<?php echo $Chintan_Web_Slider;?>" id="loader_Navigation2"></div>
										<div class="loader_Navigation3 loader_Navigation3<?php echo $Chintan_Web_Slider;?>" id="loader_Navigation3"></div>
										<div class="loader_Navigation4" id="loader_Navigation4"></div>
									</div>
								<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T == "Type 2") { ?>
									<div class="overlay-loader<?php echo $Chintan_Web_Slider;?>">
										<div class="loader<?php echo $Chintan_Web_Slider;?>">
											<div></div>
											<div></div>
											<div></div>
											<div></div>
											<div></div>
											<div></div>
											<div></div>
										</div>
									</div>
								<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T == "Type 3") { ?>
									<div class="windows8<?php echo $Chintan_Web_Slider;?>">
										<div class="wBall" id="wBall_1">
											<div class="wInnerBall"></div>
										</div>
										<div class="wBall" id="wBall_2">
											<div class="wInnerBall"></div>
										</div>
										<div class="wBall" id="wBall_3">
											<div class="wInnerBall"></div>
										</div>
										<div class="wBall" id="wBall_4">
											<div class="wInnerBall"></div>
										</div>
										<div class="wBall" id="wBall_5">
											<div class="wInnerBall"></div>
										</div>
									</div>
								<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_L_T == "Type 4") { ?>
									<div class="cssload-thecube<?php echo $Chintan_Web_Slider;?>">
										<div class="cssload-cube cssload-c1"></div>
										<div class="cssload-cube cssload-c2"></div>
										<div class="cssload-cube cssload-c4"></div>
										<div class="cssload-cube cssload-c3"></div>
									</div>
								<?php } ?>
							
							<?php if($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_Show == "true") { ?>
								<?php if($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T == "Type 1") { ?>
									<div class="cssload-loader<?php echo $Chintan_Web_Slider;?>"><?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT;?></div>
								<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T == "Type 2") { ?>
									<div id="inTurnFadingTextG<?php echo $Chintan_Web_Slider;?>">
										<?php foreach($text_array as $key=>$v){ ?>
											<div id="inTurnFadingTextG<?php echo $Chintan_Web_Slider;?>_<?php Print $key+1;?>" class="inTurnFadingTextG<?php echo $Chintan_Web_Slider;?>"><?php Print $v;?></div>
										<?php } ?>
									</div>
								<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T == "Type 3") { ?>
									<div class="cssload-preloader<?php echo $Chintan_Web_Slider;?>">
										<div class="cssload-preloader<?php echo $Chintan_Web_Slider;?>-box">
											<?php foreach($text_array as $key=>$v){ ?>
												<div><?php Print $v;?></div>
											<?php } ?>
										</div>
									</div>
								<?php } elseif($Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT_T == "Type 4") { ?>
									<div class="RW_Loader_Text_Navigation<?php echo $Chintan_Web_Slider;?>">
										<?php echo $Chintan_Web_Slider_Effect_Loader[0]->Chintan_Web_NSL_LT;?>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				<?php } else { ?>
					<div id="RW_Load_Content_Navigation<?php echo $Chintan_Web_Slider;?>" >
						<div class="center_content<?php echo $Chintan_Web_Slider;?>">
							<div class="cssload-thecube<?php echo $Chintan_Web_Slider;?>">
								<div class="cssload-cube cssload-c1"></div>
								<div class="cssload-cube cssload-c2"></div>
								<div class="cssload-cube cssload-c4"></div>
								<div class="cssload-cube cssload-c3"></div>
							</div>
						</div>
					</div>
				<?php } ?>
				<div id="chintan_webSlider1_<?php echo $Chintan_Web_Slider;?>" style="display:none;">
					<div class="flexslider flexslider_<?php echo $Chintan_Web_Slider;?>" style='position:relative;max-width:100%;'>
						<ul class="slides">
							<i class='delIc delIc<?php echo $Chintan_Web_Slider;?> chintan_web chintan_web-times'></i>
							<?php for($i=0;$i<count($Chintan_Web_Slider_Images);$i++){ 
								if(strpos($Chintan_Web_Slider_Images[$i]->Sl_Img_Url, 'youtube') > 0)
								{
									$rest_vImg_url = substr($Chintan_Web_Slider_Images[$i]->Sl_Img_Url, 0, -13);
									$link_vImg_sl = $rest_vImg_url.'maxresdefault.jpg';
									if (!@fopen("$link_vImg_sl",'r')) { $link_vImg_sl = $Chintan_Web_Slider_Images[$i]->Sl_Img_Url; }
								}
								else
								{
									$link_vImg_sl = $Chintan_Web_Slider_Images[$i]->Sl_Img_Url;
								}
							?> 
								<?php if($Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== '' && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== null && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== "undefined"){  ?>
								<li class="<?php if($Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== '' && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== null && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== "undefined"){ echo "pointer"; } ?>" onclick = "rw_nav_video_cl<?php echo $Chintan_Web_Slider;?>('<?php echo $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url; ?>',this)" >
									<img class='IMHR<?php echo $Chintan_Web_Slider;?>' src="<?php echo $link_vImg_sl;?>" alt="<?php echo html_entity_decode($Chintan_Web_Slider_Images[$i]->SL_Img_Title);?>" data-thumbnail="<?php echo $link_vImg_sl;?>"  />
									<?php if($Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== '' && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== null && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== "undefined") { ?>
										<iframe class='rw_nav_video<?php echo $Chintan_Web_Slider; ?> rw_nav_video' src='' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><i class='plIc plIc_nav chintan_web chintan_web-play'></i>
									<?php } ?>
								</li>
								<?php } else { ?>
								<li class="<?php if($Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== '' && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== null && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== "undefined"){ echo "pointer"; } ?>" onclick = "" >
									<img class='IMHR<?php echo $Chintan_Web_Slider;?>' src="<?php echo $link_vImg_sl;?>" alt="<?php echo html_entity_decode($Chintan_Web_Slider_Images[$i]->SL_Img_Title);?>" data-thumbnail="<?php echo $link_vImg_sl;?>"  />
									<?php if($Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== '' && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== null && $Chintan_Web_Slider_Videos[$i]->Sl_Video_Url !== "undefined") { ?>
										<iframe class='rw_nav_video<?php echo $Chintan_Web_Slider; ?> rw_nav_video' src='' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><i class='plIc plIc_nav chintan_web chintan_web-play'></i>
									<?php } ?>
								</li>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
				</div>
				<input type='text' style='display:none;' class='SLWIDTHR_<?php echo $Chintan_Web_Slider;?>'   value='<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_W;?>'>
				<input type='text' style='display:none;' class='SLHEIGHTR_<?php echo $Chintan_Web_Slider;?>'  value='<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_H;?>'>
				<input type='text' style='display:none;' class='SLCLWR_<?php echo $Chintan_Web_Slider;?>'     value='<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArBoxW;?>'>
				<input type='text' style='display:none;' class='SlClPrFS_<?php echo $Chintan_Web_Slider;?>'   value='<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_TFS;?>'>
				<input type='text' style='display:none;' class='hovEffType_<?php echo $Chintan_Web_Slider;?>' value='<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_ArHEff;?>'>
				<input type='text' style='display:none;' class='navWidth_<?php echo $Chintan_Web_Slider;?>'   value='<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavW;?>'>
				<input type='text' style='display:none;' class='navHeight_<?php echo $Chintan_Web_Slider;?>'  value='<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavH;?>'>
				<input type='text' style='display:none;' class='navType'    value='<?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_NavPos;?>'>
				<script src="<?php echo plugins_url('/Scripts/jquery.flexslider-min.js',__FILE__);?>"></script>
				
				<script>
					var SLWIDTHR = jQuery('.SLWIDTHR_<?php echo $Chintan_Web_Slider;?>').val();
					var SLHEIGHTR = jQuery('.SLHEIGHTR_<?php echo $Chintan_Web_Slider;?>').val();
					jQuery('#RW_Load_Content_Navigation<?php echo $Chintan_Web_Slider;?>').css('max-height',jQuery('#RW_Load_Content_Navigation<?php echo $Chintan_Web_Slider;?>').width()*SLHEIGHTR/SLWIDTHR);
					jQuery(window).resize(function(){
						jQuery('#RW_Load_Content_Navigation<?php echo $Chintan_Web_Slider;?>').css('max-height',jQuery('#RW_Load_Content_Navigation<?php echo $Chintan_Web_Slider;?>').width()*SLHEIGHTR/SLWIDTHR);
					})
					var array_nav<?php echo $Chintan_Web_Slider;?>=[];
					jQuery(".IMHR<?php echo $Chintan_Web_Slider;?>").each(function(){
						if( jQuery(this).attr("src") != "" ) { array_nav<?php echo $Chintan_Web_Slider;?>.push(jQuery(this).attr("src")); }
					})

					var y_nav<?php echo $Chintan_Web_Slider;?>=0;
					for(i=0;i<array_nav<?php echo $Chintan_Web_Slider;?>.length;i++)
					{
						jQuery("<img class='IMHR<?php echo $Chintan_Web_Slider;?>' />").attr('src', array_nav<?php echo $Chintan_Web_Slider;?>[i]).on("load",function(){
							y_nav<?php echo $Chintan_Web_Slider;?>++;
							if(y_nav<?php echo $Chintan_Web_Slider;?> == array_nav<?php echo $Chintan_Web_Slider;?>.length)
							{
								jQuery("#chintan_webSlider1_<?php echo $Chintan_Web_Slider;?>").css("display","block");
								jQuery("#RW_Load_Content_Navigation<?php echo $Chintan_Web_Slider;?>").remove();
								jQuery('#chintan_webSlider1_<?php echo $Chintan_Web_Slider;?> .flexslider').flexslider({
									slideshow: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_SlS;?>,
									slideshowSpeed: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_SlSS*1000;?>,
									pauseOnHover: <?php echo $Chintan_Web_Slider_Effect[0]->chintan_web_Sl1_PoH;?>,
									start: renderPreview, //render preview on start
									before: renderPreview //render preview before moving to the next slide
								});
								var y<?php echo $Chintan_Web_Slider;?> = true;
								function renderPreview(slider) {
									var sl = jQuery(slider);
									var prevWrapper = sl.find('.flex-prev');
									var nextWrapper = sl.find('.flex-next');
									//calculate the prev and curr slide based on current slide
									var curr = slider.animatingTo;
									var prev = (curr == 0) ? slider.count - 1 : curr - 1;
									var next = (curr == slider.count - 1) ? 0 : curr + 1;
									//add prev and next slide details into the directional nav
									prevWrapper.find('.preview, .arrow').remove();
									nextWrapper.find('.preview, .arrow').remove();
									prevWrapper.append(grabContent(sl.find('li:eq(' + prev + ') img')));
									nextWrapper.append(grabContent(sl.find('li:eq(' + next + ') img')));
									resp();

									// console.log(this);
									

									var delIc<?php echo $Chintan_Web_Slider;?> = document.querySelector(".delIc<?php echo $Chintan_Web_Slider;?>");
					
									delIc<?php echo $Chintan_Web_Slider;?>.onclick = delVideo<?php echo $Chintan_Web_Slider;?>;

									function delVideo<?php echo $Chintan_Web_Slider;?>(){
										document.querySelector('.flexslider_<?php echo $Chintan_Web_Slider;?> ol').style.display = "block";
										document.querySelector('.flex-direction-nav').style.display = "block";
										var videos = document.querySelectorAll('.rw_nav_video<?php echo $Chintan_Web_Slider;?>');
										for( var j = 0; j < videos.length; j++){
											videos[j].setAttribute('src','');
											videos[j].classList.remove("rw_nav_video<?php echo $Chintan_Web_Slider;?>_anim");
										}
										delIc<?php echo $Chintan_Web_Slider;?>.style.display = "none";
									}

									prevWrapper.click(function(){
										delVideo<?php echo $Chintan_Web_Slider;?>()
									})
									nextWrapper.click(function(){
										delVideo<?php echo $Chintan_Web_Slider;?>()
									})

								}

								

								
									
								// grab the data and render in HTML
								function grabContent(img) {
									var tn = img.data('thumbnail');
									var alt = img.prop('alt');
									var html = '';
									//you can edit this markup to your own needs, but make sure you style it up accordingly
									html = '<div class="arrow"></div><div class="preview"><img src="' + tn + '" alt="" /><div class="alt">' + alt + '</div></div>';
									return html;
									resp();
								}
								var count=0;
								resp();
								function resp(){
									var SLWIDTHR = jQuery('.SLWIDTHR_<?php echo $Chintan_Web_Slider;?>').val();
									var SLHEIGHTR = jQuery('.SLHEIGHTR_<?php echo $Chintan_Web_Slider;?>').val();
									var SLCLWR = jQuery('.SLCLWR_<?php echo $Chintan_Web_Slider;?>').val();
									var SlClPrFS = jQuery('.SlClPrFS_<?php echo $Chintan_Web_Slider;?>').val();
									var hovEffType = jQuery('.hovEffType_<?php echo $Chintan_Web_Slider;?>').val();
									var navWidth = jQuery('.navWidth_<?php echo $Chintan_Web_Slider;?>').val();
									var navHeight = jQuery('.navHeight_<?php echo $Chintan_Web_Slider;?>').val();
									var navType = jQuery('.navType_<?php echo $Chintan_Web_Slider;?>').val();
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>,#RW_Load_Content<?php echo $Chintan_Web_Slider;?>').css('height',Math.floor(jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()*SLHEIGHTR/SLWIDTHR));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next').css('height',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev').css('height',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next').css('width',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev').css('width',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav').css('height',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav a .preview').css('width',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .arrow').css('width',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview img').css('width',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview img').css('width',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-paging li a').css('width',Math.floor(navWidth*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-paging li a').css('height',Math.floor(navHeight*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									if(navType == 'bottom')
									{
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-nav li').css('margin-top',Math.floor(35/jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-paging li a').width()));
									}
									else if(navType == 'top')
									{
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-control-nav li').css('margin-top','14px');
									}
									if(hovEffType == 'slide out')
									{
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview img').css('right',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)+'px');
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview img').css('left',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)+'px');
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('right',Math.floor(2*SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)-1+'px');
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('left',Math.floor(2*SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)-2+'px');
									}
									else if(hovEffType == 'flip out' || hovEffType == 'double flip out')
									{
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview').css('right',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview').css('left',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('right',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('left',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700));
									}
									else if(hovEffType == 'both ways')
									{
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('left','-50px');
										jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('left','50px');
									}
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('width',Math.floor(2*SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)+'px');
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('width',Math.floor(2*SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)+'px');
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('font-size',Math.floor(SlClPrFS*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)+'px');
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('font-size',Math.floor(SlClPrFS*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)+'px');
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-next .preview .alt').css('line-height',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)+'px');
									jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?> .flex-direction-nav .flex-prev .preview .alt').css('line-height',Math.floor(SLCLWR*jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()/700)+'px');
									if(jQuery('.flexslider_<?php echo $Chintan_Web_Slider;?>').width()<=400) { jQuery('.flex-control-nav').css('display','none'); }
									else { jQuery('.flex-control-nav').css('display','block'); }
								}
								jQuery(window).resize(function(){ resp(); })
							}
						})
					}
				</script>
				<script type="text/javascript">
					function rw_nav_video_cl<?php echo $Chintan_Web_Slider;?>(src,el){
						el.children[1].setAttribute('src',src+'?rel=0&amp;autoplay=1');
						el.children[1].classList.add("rw_nav_video<?php echo $Chintan_Web_Slider;?>_anim");
						document.querySelector('.flexslider_<?php echo $Chintan_Web_Slider;?> ol').style.display = "none";
						document.querySelector('.flex-direction-nav').style.display = "none";
						setTimeout(function(){
							document.querySelector('.delIc<?php echo $Chintan_Web_Slider;?>').style.display = "inline-block";
						},1000)
					}

					var delIc<?php echo $Chintan_Web_Slider;?> = document.querySelector(".delIc<?php echo $Chintan_Web_Slider;?>");
					
					delIc<?php echo $Chintan_Web_Slider;?>.onclick = delVideo<?php echo $Chintan_Web_Slider;?>;

					function delVideo<?php echo $Chintan_Web_Slider;?>(){
						document.querySelector('.flexslider_<?php echo $Chintan_Web_Slider;?> ol').style.display = "block";
						document.querySelector('.flex-direction-nav').style.display = "block";
						var videos = document.querySelectorAll('.rw_nav_video<?php echo $Chintan_Web_Slider;?>');
						for( var j = 0; j < videos.length; j++){
							videos[j].setAttribute('src','');
							videos[j].classList.remove("rw_nav_video<?php echo $Chintan_Web_Slider;?>_anim");
						}
						delIc<?php echo $Chintan_Web_Slider;?>.style.display = "none";
					}
				</script>
			
			<?php }
			echo $after_widget;
		}
	}
?>