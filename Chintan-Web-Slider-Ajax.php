<?php
	// Admin Menu
	add_action( 'wp_ajax_chintan_web_Edit', 'chintan_web_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_chintan_web_Edit', 'chintan_web_Edit_Callback' );

	function chintan_web_Edit_Callback()
	{
		$number = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name = $wpdb->prefix . "chintan_web_photo_slider_manager";
		
		$Chintan_Web_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id=%s", $number));

		print_r($Chintan_Web_Manager);
		die();
	}
	
	add_action( 'wp_ajax_chintan_web_Edit_ImDescTit', 'chintan_web_Edit_ImDescTit_Callback' );
	add_action( 'wp_ajax_nopriv_chintan_web_Edit_ImDescTit', 'chintan_web_Edit_ImDescTit_Callback' );

	function chintan_web_Edit_ImDescTit_Callback()
	{
		$number = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name1 = $wpdb->prefix . "chintan_web_photo_slider_instal";
		$table_name1_1  = $wpdb->prefix . "chintan_web_photo_slider_instal_video";
		$array = array();

		$Chintan_Web_Instal=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE Sl_Number=%d order by id", $number));
		$Chintan_Web_Instal_Video=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1_1 WHERE Sl_Number=%d order by id", $number));

		for($i = 0; $i < count($Chintan_Web_Instal); $i++)
		{
			$Chintan_Web_Instal[$i]->SL_Img_Title = html_entity_decode($Chintan_Web_Instal[$i]->SL_Img_Title);
			$Chintan_Web_Instal[$i]->Sl_Img_Description = html_entity_decode($Chintan_Web_Instal[$i]->Sl_Img_Description);
		}

		$array[] = $Chintan_Web_Instal;
		$array[] = $Chintan_Web_Instal_Video;
		
		print json_encode($array);
		die();
	}
	
	add_action( 'wp_ajax_chintan_web_Del', 'chintan_web_Del_Callback' );
	add_action( 'wp_ajax_nopriv_chintan_web_Del', 'chintan_web_Del_Callback' );

	function chintan_web_Del_Callback()
	{
		$number = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name  = $wpdb->prefix . "chintan_web_photo_slider_manager";
		$table_name1 = $wpdb->prefix . "chintan_web_photo_slider_instal";
		$table_name1_1  = $wpdb->prefix . "chintan_web_photo_slider_instal_video";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id=%d", $number));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name1 WHERE Sl_Number=%d", $number));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name1_1 WHERE Sl_Number=%d", $number));
		die();
	}

	add_action( 'wp_ajax_chintan_web_Copy_Sl', 'chintan_web_Copy_Sl_Callback' );
	add_action( 'wp_ajax_nopriv_chintan_web_Copy_Sl', 'chintan_web_Copy_Sl_Callback' );

	function chintan_web_Copy_Sl_Callback()
	{
		$number = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name  = $wpdb->prefix . "chintan_web_photo_slider_manager";
		$table_name1 = $wpdb->prefix . "chintan_web_photo_slider_instal";
		$table_name1_1  = $wpdb->prefix . "chintan_web_photo_slider_instal_video";
		$table_name4 = $wpdb->prefix . "chintan_web_slider_id";

		$Chintan_Web_Manager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id=%s", $number));
		$Chintan_Web_Instal=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1 WHERE Sl_Number=%d order by id", $number));
		$Chintan_Web_Instal_Video=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name1_1 WHERE Sl_Number=%d order by id", $number));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name (id, Slider_Title, Slider_Type, Slider_IMGS_Quantity) VALUES (%d, %s, %s, %d)", '', $Chintan_Web_Manager[0]->Slider_Title, $Chintan_Web_Manager[0]->Slider_Type, $Chintan_Web_Manager[0]->Slider_IMGS_Quantity));

		$Slider_ID = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id > %d order by id desc limit 1",0));
		$Chintan_Web_Sl_Id = $Slider_ID[0]->Slider_ID + 1;
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, Slider_ID) VALUES (%d, %d)", '', $Chintan_Web_Sl_Id));
		
		for($i = 0; $i < count($Chintan_Web_Instal); $i++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1 (id, SL_Img_Title, Sl_Img_Description, Sl_Img_Url, Sl_Link_Url, Sl_Link_NewTab, Sl_Number) VALUES (%d, %s, %s, %s, %s, %s, %d)", '', $Chintan_Web_Instal[$i]->SL_Img_Title, $Chintan_Web_Instal[$i]->Sl_Img_Description, $Chintan_Web_Instal[$i]->Sl_Img_Url, $Chintan_Web_Instal[$i]->Sl_Link_Url, $Chintan_Web_Instal[$i]->Sl_Link_NewTab, $Chintan_Web_Sl_Id));
		}

		for($i = 0; $i < count($Chintan_Web_Instal_Video); $i++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name1_1 (id, Sl_Video_Url, Sl_Number) VALUES (%d, %s, %d)", '', $Chintan_Web_Instal_Video[$i]->Sl_Video_Url, $Chintan_Web_Sl_Id));
		}

		die();
	}
	// Theme Menu
	add_action( 'wp_ajax_chintan_web_Del_Option', 'chintan_web_Del_Option_Callback' );
	add_action( 'wp_ajax_nopriv_chintan_web_Del_Option', 'chintan_web_Del_Option_Callback' );

	function chintan_web_Del_Option_Callback()
	{
		$Chintan_Web_Slider_ID = sanitize_text_field($_POST['foobar']);

		global $wpdb;
		$table_name2  = $wpdb->prefix . "chintan_web_slider_effects_data";
		$table_name5  = $wpdb->prefix . "chintan_web_slider_effect1";
		
		$table_name5_Loader  = $wpdb->prefix . "chintan_web_slider_effect1_loader";
		

		$Chintan_Web_Effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $Chintan_Web_Slider_ID));

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name2 WHERE id=%d", $Chintan_Web_Slider_ID));

		if($Chintan_Web_Effects[0]->slider_type=='Slider Navigation')
		{
			$wpdb->query($wpdb->prepare("DELETE FROM $table_name5 WHERE chintan_web_slider_ID=%s", $Chintan_Web_Slider_ID));
			$wpdb->query($wpdb->prepare("DELETE FROM $table_name5_Loader WHERE chintan_web_slider_ID=%s", $Chintan_Web_Slider_ID));
		}
		
		die();
	}

	add_action( 'wp_ajax_Chintan_Web_ImgSlider_Vimeo', 'Chintan_Web_ImgSlider_Vimeo_Callback' );
	add_action( 'wp_ajax_nopriv_Chintan_Web_ImgSlider_Vimeo', 'Chintan_Web_ImgSlider_Vimeo_Callback' );

	function Chintan_Web_ImgSlider_Vimeo_Callback()
	{
		$Chintan_Web_ImgSlider_Vimeo_Src = sanitize_text_field($_POST['foobar']);

		$Chintan_Web_VSlider_Image=explode('video/',$Chintan_Web_ImgSlider_Vimeo_Src);
		$Chintan_Web_VSlider_Image_Real=unserialize(file_get_contents("http://vimeo.com/api/v2/video/$Chintan_Web_VSlider_Image[1].php"));
		$Chintan_Web_VSlider_Image_Real=$Chintan_Web_VSlider_Image_Real[0]['thumbnail_large'];

		echo $Chintan_Web_VSlider_Image_Real;
		die();
	}

	add_action( 'wp_ajax_chintan_web_Edit_Option', 'chintan_web_Edit_Option_Callback' );
	add_action( 'wp_ajax_nopriv_chintan_web_Edit_Option', 'chintan_web_Edit_Option_Callback' );

	function chintan_web_Edit_Option_Callback()
	{
		$Chintan_Web_Slider_ID = sanitize_text_field($_POST['foobar']);

		global $wpdb;
		$table_name2  = $wpdb->prefix . "chintan_web_slider_effects_data";
		$table_name5  = $wpdb->prefix . "chintan_web_slider_effect1";
		$table_name5_Loader  = $wpdb->prefix . "chintan_web_slider_effect1_loader";
		$array=array();
		$Chintan_Web_Effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $Chintan_Web_Slider_ID));

		if($Chintan_Web_Effects[0]->slider_type=='Slider Navigation')
		{
			$Chintan_Web_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE chintan_web_slider_ID=%s", $Chintan_Web_Slider_ID));
			$Chintan_Web_Effect_Loading=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5_Loader WHERE chintan_web_slider_ID=%s", $Chintan_Web_Slider_ID));
			$array[]=$Chintan_Web_Effect;
			$array[]=$Chintan_Web_Effect_Loading;
		}
		print json_encode($array);
		die();
	}

	add_action( 'wp_ajax_chintan_web_Copy_Sl2', 'chintan_web_Copy_Sl2_Callback' );
	add_action( 'wp_ajax_nopriv_chintan_web_Copy_Sl2', 'chintan_web_Copy_Sl2_Callback' );

	function chintan_web_Copy_Sl2_Callback()
	{
		$Chintan_Web_Slider_ID = sanitize_text_field($_POST['foobar']);

		global $wpdb;
		$table_name2  = $wpdb->prefix . "chintan_web_slider_effects_data";
		$table_name5  = $wpdb->prefix . "chintan_web_slider_effect1";
		$table_name5_Loader  = $wpdb->prefix . "chintan_web_slider_effect1_loader";
		
		$Chintan_Web_Effects=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $Chintan_Web_Slider_ID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, slider_name, slider_type) VALUES (%d, %s, %s)", '', $Chintan_Web_Effects[0]->slider_name, $Chintan_Web_Effects[0]->slider_type));

		$Chintan_Web_Slider_New_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id > %d order by id desc limit 1", 0));

		if($Chintan_Web_Effects[0]->slider_type=='Slider Navigation')
		{
			$Chintan_Web_Effect=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE chintan_web_slider_ID=%s", $Chintan_Web_Slider_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, chintan_web_slider_ID, chintan_web_slider_name, chintan_web_slider_type, chintan_web_Sl1_SlS, chintan_web_Sl1_SlSS, chintan_web_Sl1_PoH, chintan_web_Sl1_W, chintan_web_Sl1_H, chintan_web_Sl1_BoxS, chintan_web_Sl1_BoxSC, chintan_web_Sl1_IBW, chintan_web_Sl1_IBS, chintan_web_Sl1_IBC, chintan_web_Sl1_IBR, chintan_web_Sl1_TBgC, chintan_web_Sl1_TC, chintan_web_Sl1_TTA, chintan_web_Sl1_TFS, chintan_web_Sl1_TFF, chintan_web_Sl1_TUp, chintan_web_Sl1_ArBgC, chintan_web_Sl1_ArOp, chintan_web_Sl1_ArType, chintan_web_Sl1_ArHBgC, chintan_web_Sl1_ArHOp, chintan_web_Sl1_ArHEff, chintan_web_Sl1_ArBoxW, chintan_web_Sl1_NavW, chintan_web_Sl1_NavH, chintan_web_Sl1_NavPB, chintan_web_Sl1_NavBW, chintan_web_Sl1_NavBS, chintan_web_Sl1_NavBC, chintan_web_Sl1_NavBR, chintan_web_Sl1_NavCC, chintan_web_Sl1_NavHC, chintan_web_Sl1_ArPFT, chintan_web_Sl1_NavPos) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Chintan_Web_Slider_New_ID[0]->id, $Chintan_Web_Effect[0]->chintan_web_slider_name, $Chintan_Web_Effect[0]->chintan_web_slider_type, $Chintan_Web_Effect[0]->chintan_web_Sl1_SlS, $Chintan_Web_Effect[0]->chintan_web_Sl1_SlSS, $Chintan_Web_Effect[0]->chintan_web_Sl1_PoH, $Chintan_Web_Effect[0]->chintan_web_Sl1_W, $Chintan_Web_Effect[0]->chintan_web_Sl1_H, $Chintan_Web_Effect[0]->chintan_web_Sl1_BoxS, $Chintan_Web_Effect[0]->chintan_web_Sl1_BoxSC, $Chintan_Web_Effect[0]->chintan_web_Sl1_IBW, $Chintan_Web_Effect[0]->chintan_web_Sl1_IBS, $Chintan_Web_Effect[0]->chintan_web_Sl1_IBC, $Chintan_Web_Effect[0]->chintan_web_Sl1_IBR, $Chintan_Web_Effect[0]->chintan_web_Sl1_TBgC, $Chintan_Web_Effect[0]->chintan_web_Sl1_TC, $Chintan_Web_Effect[0]->chintan_web_Sl1_TTA, $Chintan_Web_Effect[0]->chintan_web_Sl1_TFS, $Chintan_Web_Effect[0]->chintan_web_Sl1_TFF, $Chintan_Web_Effect[0]->chintan_web_Sl1_TUp, $Chintan_Web_Effect[0]->chintan_web_Sl1_ArBgC, $Chintan_Web_Effect[0]->chintan_web_Sl1_ArOp, $Chintan_Web_Effect[0]->chintan_web_Sl1_ArType, $Chintan_Web_Effect[0]->chintan_web_Sl1_ArHBgC, $Chintan_Web_Effect[0]->chintan_web_Sl1_ArHOp, $Chintan_Web_Effect[0]->chintan_web_Sl1_ArHEff, $Chintan_Web_Effect[0]->chintan_web_Sl1_ArBoxW, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavW, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavH, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavPB, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavBW, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavBS, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavBC, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavBR, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavCC, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavHC, $Chintan_Web_Effect[0]->chintan_web_Sl1_ArPFT, $Chintan_Web_Effect[0]->chintan_web_Sl1_NavPos));

			$Chintan_Web_Effect_Loading=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5_Loader WHERE chintan_web_slider_ID=%s", $Chintan_Web_Slider_ID));

			$wpdb->query($wpdb->prepare("INSERT INTO $table_name5_Loader (id, chintan_web_slider_ID, Chintan_Web_NSL_L_Show, Chintan_Web_NSL_LT_Show, Chintan_Web_NSL_LT, Chintan_Web_NSL_L_BgC, Chintan_Web_NSL_L_T, Chintan_Web_NSL_LT_T, Chintan_Web_NSL_LT_FS, Chintan_Web_NSL_LT_FF, Chintan_Web_NSL_LT_C, Chintan_Web_NSL_L_T1_C, Chintan_Web_NSL_L_T2_C, Chintan_Web_NSL_L_T3_C, Chintan_Web_NSL_LT_T2_BC, Chintan_Web_NSL_L_C, Chintan_Web_NSL_LT_T2_AnC, Chintan_Web_NSL_LT_T3_BgC, Chintan_Web_NSL_L_S, Chintan_Web_NSL_Loading_Show) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Chintan_Web_Slider_New_ID[0]->id, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_L_Show, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_LT_Show, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_LT, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_L_BgC, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_L_T, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_LT_T, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_LT_FS, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_LT_FF, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_LT_C, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_L_T1_C, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_L_T2_C, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_L_T3_C, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_LT_T2_BC, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_L_C, $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_LT_T2_AnC,  $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_LT_T3_BgC,  $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_L_S,  $Chintan_Web_Effect_Loading[0]->Chintan_Web_NSL_Loading_Show));
		}
		
		die();
	}
?>