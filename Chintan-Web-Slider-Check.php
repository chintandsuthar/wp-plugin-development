<?php
	global $wpdb;

	$table_name   = $wpdb->prefix . "chintan_web_photo_slider_manager";
	$table_name1  = $wpdb->prefix . "chintan_web_photo_slider_instal";
	$table_name2  = $wpdb->prefix . "chintan_web_slider_effects_data";
	$table_name5  = $wpdb->prefix . "chintan_web_slider_effect1";
	

	$Chintan_Web_Slider_Desc=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE id>%d", 0));

	for($i=0; $i<count($Chintan_Web_Slider_Desc); $i++)
	{
		if(strlen($Chintan_Web_Slider_Desc[$i]->Sl_Img_Description)>0 && strpos($Chintan_Web_Slider_Desc[$i]->Sl_Img_Description, "&lt;/p&gt;")<=0)
		{
			$RW_Slider_Param = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $Chintan_Web_Slider_Desc[$i]->Sl_Number));
			$RW_Slider_Types = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE slider_name = %s", $RW_Slider_Param[0]->Slider_Type));

			if($RW_Slider_Types[0]->slider_type == 'Content Slider')
			{
				$Chintan_Web_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE chintanideo_EN_ID=%s", $RW_Slider_Types[0]->id));

				$New_RW_Slider_Desc = str_replace("\&","&", esc_html('<p><span style="color: ' . $Chintan_Web_Effect[0]->chintan_CS_Video_DC . '; font-size: ' . $Chintan_Web_Effect[0]->chintan_CS_Video_DFS . 'px; font-family: ' . $Chintan_Web_Effect[0]->chintan_CS_Video_DFF . '; text-align: ' . $Chintan_Web_Effect[0]->chintan_CS_Video_DTA . ';">' . $Chintan_Web_Slider_Desc[$i]->Sl_Img_Description . '</span></p>'));
			}
			
			else 
			{
				$New_RW_Slider_Desc = str_replace("\&","&", esc_html('<p>' . $Chintan_Web_Slider_Desc[$i]->Sl_Img_Description . '</p>'));
			}
			$wpdb->query($wpdb->prepare("UPDATE $table_name1 set Sl_Img_Description=%s WHERE id=%d", $New_RW_Slider_Desc, $Chintan_Web_Slider_Desc[$i]->id));
		}
	}
?>