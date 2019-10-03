<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	global $wpdb;
	$table_name   = $wpdb->prefix . "chintan_web_photo_slider_manager";
	$table_name1  = $wpdb->prefix . "chintan_web_photo_slider_instal";
	$table_name1_1  = $wpdb->prefix . "chintan_web_photo_slider_instal_video";
	$table_name2  = $wpdb->prefix . "chintan_web_slider_effects_data";
	$table_name3  = $wpdb->prefix . "chintan_web_slider_font_family";
	$table_name4  = $wpdb->prefix . "chintan_web_slider_id";
	$table_name5  = $wpdb->prefix . "chintan_web_slider_effect1";
	


	$sql='CREATE TABLE IF NOT EXISTS ' .$table_name.' ( id INTEGER(10) UNSIGNED AUTO_INCREMENT, Slider_Title VARCHAR(255) NOT NULL, Slider_Type VARCHAR(255) NOT NULL, Slider_IMGS_Quantity INTEGER(10) NOT NULL, PRIMARY KEY (id) )';

	$sql1='CREATE TABLE IF NOT EXISTS ' .$table_name1.' ( id INTEGER(10) UNSIGNED AUTO_INCREMENT, SL_Img_Title VARCHAR(255) NOT NULL, Sl_Img_Description LONGTEXT NOT NULL, Sl_Img_Url VARCHAR(255) NOT NULL, Sl_Link_Url VARCHAR(255) NOT NULL, Sl_Link_NewTab VARCHAR(255) NOT NULL, Sl_Number INTEGER(10) NOT NULL, PRIMARY KEY (id) )';

	$sql1_1='CREATE TABLE IF NOT EXISTS ' .$table_name1_1.' ( id INTEGER(10) UNSIGNED AUTO_INCREMENT, Sl_Video_Url VARCHAR(255) NOT NULL, Sl_Number INTEGER(10) NOT NULL, PRIMARY KEY (id) )';

	$sql2='CREATE TABLE IF NOT EXISTS ' .$table_name2 . '( id INTEGER(10) UNSIGNED AUTO_INCREMENT, slider_name VARCHAR(255) NOT NULL,  slider_type VARCHAR(255) NOT NULL, PRIMARY KEY (id) )';

	$sql3='CREATE TABLE IF NOT EXISTS ' .$table_name3.' ( id INTEGER(10) UNSIGNED AUTO_INCREMENT, Font_family VARCHAR(255) NOT NULL, PRIMARY KEY (id) )';

	$sql4='CREATE TABLE IF NOT EXISTS ' .$table_name4 . '( id INTEGER(10) UNSIGNED AUTO_INCREMENT, Slider_ID INTEGER(10) NOT NULL, PRIMARY KEY (id) )';

	$sql5='CREATE TABLE IF NOT EXISTS ' .$table_name5 . '( id INTEGER(10) UNSIGNED AUTO_INCREMENT, chintan_web_slider_ID VARCHAR(255) NOT NULL, chintan_web_slider_name VARCHAR(255) NOT NULL, chintan_web_slider_type VARCHAR(255) NOT NULL, chintan_web_Sl1_SlS VARCHAR(255) NOT NULL, chintan_web_Sl1_SlSS VARCHAR(255) NOT NULL, chintan_web_Sl1_PoH VARCHAR(255) NOT NULL, chintan_web_Sl1_W VARCHAR(255) NOT NULL, chintan_web_Sl1_H VARCHAR(255) NOT NULL, chintan_web_Sl1_BoxS VARCHAR(255) NOT NULL, chintan_web_Sl1_BoxSC VARCHAR(255) NOT NULL, chintan_web_Sl1_IBW VARCHAR(255) NOT NULL, chintan_web_Sl1_IBS VARCHAR(255) NOT NULL, chintan_web_Sl1_IBC VARCHAR(255) NOT NULL, chintan_web_Sl1_IBR VARCHAR(255) NOT NULL, chintan_web_Sl1_TBgC VARCHAR(255) NOT NULL, chintan_web_Sl1_TC VARCHAR(255) NOT NULL, chintan_web_Sl1_TTA VARCHAR(255) NOT NULL, chintan_web_Sl1_TFS VARCHAR(255) NOT NULL, chintan_web_Sl1_TFF VARCHAR(255) NOT NULL, chintan_web_Sl1_TUp VARCHAR(255) NOT NULL, chintan_web_Sl1_ArBgC VARCHAR(255) NOT NULL, chintan_web_Sl1_ArOp VARCHAR(255) NOT NULL, chintan_web_Sl1_ArType VARCHAR(255) NOT NULL, chintan_web_Sl1_ArHBgC VARCHAR(255) NOT NULL, chintan_web_Sl1_ArHOp VARCHAR(255) NOT NULL, chintan_web_Sl1_ArHEff VARCHAR(255) NOT NULL, chintan_web_Sl1_ArBoxW VARCHAR(255) NOT NULL, chintan_web_Sl1_NavW VARCHAR(255) NOT NULL, chintan_web_Sl1_NavH VARCHAR(255) NOT NULL, chintan_web_Sl1_NavPB VARCHAR(255) NOT NULL, chintan_web_Sl1_NavBW VARCHAR(255) NOT NULL, chintan_web_Sl1_NavBS VARCHAR(255) NOT NULL, chintan_web_Sl1_NavBC VARCHAR(255) NOT NULL, chintan_web_Sl1_NavBR VARCHAR(255) NOT NULL, chintan_web_Sl1_NavCC VARCHAR(255) NOT NULL, chintan_web_Sl1_NavHC VARCHAR(255) NOT NULL, chintan_web_Sl1_ArPFT VARCHAR(255) NOT NULL, chintan_web_Sl1_NavPos VARCHAR(255) NOT NULL, PRIMARY KEY (id) )';

    
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	dbDelta($sql1);
	dbDelta($sql1_1);
	dbDelta($sql2);
	dbDelta($sql3);
	dbDelta($sql4);
	dbDelta($sql5);
	
	$sqla   = 'ALTER TABLE ' . $table_name . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla1  = 'ALTER TABLE ' . $table_name1 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla2  = 'ALTER TABLE ' . $table_name2 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla3  = 'ALTER TABLE ' . $table_name3 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla4  = 'ALTER TABLE ' . $table_name4 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	$sqla5  = 'ALTER TABLE ' . $table_name5 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
	
	$wpdb->query($sqla);
	$wpdb->query($sqla1);
	$wpdb->query($sqla2);
	$wpdb->query($sqla3);
	$wpdb->query($sqla4);
	$wpdb->query($sqla5);
	
	
	$Chintan_WebFontCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d",0));
	if(count($Chintan_WebFontCount)==0)
	{
		foreach ($Chintan_Web_Fonts as $JFonts) 
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Font_family) VALUES (%d, %s)", '', $JFonts));
		}
	}
	$Chintan_SN_Count_TG=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id>%d",0));

	if(count($Chintan_SN_Count_TG) == 0)
	{
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, slider_name, slider_type) VALUES (%d, %s, %s)", '', 'Slider Navigation 1', 'Slider Navigation'));
		$Chintan_SN_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE slider_name=%s", 'Slider Navigation 1'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, chintan_web_slider_ID, chintan_web_slider_name, chintan_web_slider_type, chintan_web_Sl1_SlS, chintan_web_Sl1_SlSS, chintan_web_Sl1_PoH, chintan_web_Sl1_W, chintan_web_Sl1_H, chintan_web_Sl1_BoxS, chintan_web_Sl1_BoxSC, chintan_web_Sl1_IBW, chintan_web_Sl1_IBS, chintan_web_Sl1_IBC, chintan_web_Sl1_IBR, chintan_web_Sl1_TBgC, chintan_web_Sl1_TC, chintan_web_Sl1_TTA, chintan_web_Sl1_TFS, chintan_web_Sl1_TFF, chintan_web_Sl1_TUp, chintan_web_Sl1_ArBgC, chintan_web_Sl1_ArOp, chintan_web_Sl1_ArType, chintan_web_Sl1_ArHBgC, chintan_web_Sl1_ArHOp, chintan_web_Sl1_ArHEff, chintan_web_Sl1_ArBoxW, chintan_web_Sl1_NavW, chintan_web_Sl1_NavH, chintan_web_Sl1_NavPB, chintan_web_Sl1_NavBW, chintan_web_Sl1_NavBS, chintan_web_Sl1_NavBC, chintan_web_Sl1_NavBR, chintan_web_Sl1_NavCC, chintan_web_Sl1_NavHC, chintan_web_Sl1_ArPFT, chintan_web_Sl1_NavPos) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Chintan_SN_EN[0]->id, 'Slider Navigation 1', 'Slider Navigation', 'true', '3', 'true', '750', '400', 'true', '#0084aa', '10', '#6ecae9', '#ffffff', '0', '#0084aa', '#ffffff', 'center', '10', 'Aldhabi', 'true', '#1e73be', '82', '1', '#1e73be', '80', 'slide out', '50', '8', '8', '8', '1', 'solid', '#ffffff', '20', '#0084aa', '#ffffff', '35', 'bottom'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, slider_name, slider_type) VALUES (%d, %s, %s)", '', 'Slider Navigation 2', 'Slider Navigation'));
		$Chintan_SN_EN=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE slider_name=%s", 'Slider Navigation 2'));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, chintan_web_slider_ID, chintan_web_slider_name, chintan_web_slider_type, chintan_web_Sl1_SlS, chintan_web_Sl1_SlSS, chintan_web_Sl1_PoH, chintan_web_Sl1_W, chintan_web_Sl1_H, chintan_web_Sl1_BoxS, chintan_web_Sl1_BoxSC, chintan_web_Sl1_IBW, chintan_web_Sl1_IBS, chintan_web_Sl1_IBC, chintan_web_Sl1_IBR, chintan_web_Sl1_TBgC, chintan_web_Sl1_TC, chintan_web_Sl1_TTA, chintan_web_Sl1_TFS, chintan_web_Sl1_TFF, chintan_web_Sl1_TUp, chintan_web_Sl1_ArBgC, chintan_web_Sl1_ArOp, chintan_web_Sl1_ArType, chintan_web_Sl1_ArHBgC, chintan_web_Sl1_ArHOp, chintan_web_Sl1_ArHEff, chintan_web_Sl1_ArBoxW, chintan_web_Sl1_NavW, chintan_web_Sl1_NavH, chintan_web_Sl1_NavPB, chintan_web_Sl1_NavBW, chintan_web_Sl1_NavBS, chintan_web_Sl1_NavBC, chintan_web_Sl1_NavBR, chintan_web_Sl1_NavCC, chintan_web_Sl1_NavHC, chintan_web_Sl1_ArPFT, chintan_web_Sl1_NavPos) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Chintan_SN_EN[0]->id, 'Slider Navigation 2', 'Slider Navigation', 'true', '3', 'true', '380', '450', 'true', '#0084aa', '0', '#6ecae9', '#ffffff', '0', '#0084aa', '#ffffff', 'center', '10', 'Aldhabi', 'true', 'rgba(30,115,190,0.6)', '100', '2', '#1e73be', '100', 'flip out', '50', '8', '8', '8', '1', 'solid', '#ffffff', '20', '#0084aa', '#1967aa', '40', 'bottom'));
	}




?>