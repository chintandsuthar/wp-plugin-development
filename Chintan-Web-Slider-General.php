<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
 
	global $wpdb;
	$table_name   = $wpdb->prefix . "chintan_web_photo_slider_manager";
	$table_name1  = $wpdb->prefix . "chintan_web_photo_slider_instal";
	$table_name2  = $wpdb->prefix . "chintan_web_slider_effects_data";
	$table_name3  = $wpdb->prefix . "chintan_web_slider_font_family";
	$table_name4  = $wpdb->prefix . "chintan_web_slider_id";
	$table_name5  = $wpdb->prefix . "chintan_web_slider_effect1";
	
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_', 'Chintan_Web_PSlider_Nonce' ))
		{
			$Chintan_Web_slider_name=sanitize_text_field($_POST['chintan_web_slider_name']); $Chintan_Web_slider_type=sanitize_text_field($_POST['Chintan_web_slider_type']);
			//Slider Navigation
			$Chintan_Web_Sl1_SlS=sanitize_text_field($_POST['chintan_web_Sl1_SlS']); $Chintan_Web_Sl1_SlSS=sanitize_text_field($_POST['chintan_web_Sl1_SlSS']); $Chintan_Web_Sl1_PoH=sanitize_text_field($_POST['chintan_web_Sl1_PoH']); $Chintan_Web_Sl1_W=sanitize_text_field($_POST['chintan_web_Sl1_W']); $Chintan_Web_Sl1_H=sanitize_text_field($_POST['chintan_web_Sl1_H']); $Chintan_Web_Sl1_BoxS=sanitize_text_field($_POST['chintan_web_Sl1_BoxS']); $Chintan_Web_Sl1_BoxSC=sanitize_text_field($_POST['chintan_web_Sl1_BoxSC']); $Chintan_Web_Sl1_IBW=sanitize_text_field($_POST['chintan_web_Sl1_IBW']); $Chintan_Web_Sl1_IBS=sanitize_text_field($_POST['chintan_web_Sl1_IBS']); $Chintan_Web_Sl1_IBC=sanitize_text_field($_POST['chintan_web_Sl1_IBC']); $Chintan_Web_Sl1_IBR=sanitize_text_field($_POST['chintan_web_Sl1_IBR']); $Chintan_Web_Sl1_TBgC=sanitize_text_field($_POST['chintan_web_Sl1_TBgC']); $Chintan_Web_Sl1_TC=sanitize_text_field($_POST['chintan_web_Sl1_TC']); $Chintan_Web_Sl1_TTA=sanitize_text_field($_POST['chintan_web_Sl1_TTA']); $Chintan_Web_Sl1_TFS=sanitize_text_field($_POST['chintan_web_Sl1_TFS']); $Chintan_Web_Sl1_TFF=sanitize_text_field($_POST['chintan_web_Sl1_TFF']); $Chintan_Web_Sl1_TUp=sanitize_text_field($_POST['chintan_web_Sl1_TUp']); $Chintan_Web_Sl1_ArBgC=sanitize_text_field($_POST['chintan_web_Sl1_ArBgC']); $Chintan_Web_Sl1_ArOp=sanitize_text_field($_POST['chintan_web_Sl1_ArOp']); $Chintan_Web_Sl1_ArType=sanitize_text_field($_POST['chintan_web_Sl1_ArType']); $Chintan_Web_Sl1_ArHBgC=sanitize_text_field($_POST['chintan_web_Sl1_ArHBgC']); $Chintan_Web_Sl1_ArHOp=sanitize_text_field($_POST['chintan_web_Sl1_ArHOp']); $Chintan_Web_Sl1_ArHEff=sanitize_text_field($_POST['chintan_web_Sl1_ArHEff']); $Chintan_Web_Sl1_ArBoxW=sanitize_text_field($_POST['chintan_web_Sl1_ArBoxW']); $Chintan_Web_Sl1_NavW=sanitize_text_field($_POST['chintan_web_Sl1_NavW']); $Chintan_Web_Sl1_NavH=sanitize_text_field($_POST['chintan_web_Sl1_NavH']); $Chintan_Web_Sl1_NavPB=sanitize_text_field($_POST['chintan_web_Sl1_NavPB']); $Chintan_Web_Sl1_NavBW=sanitize_text_field($_POST['chintan_web_Sl1_NavBW']); $Chintan_Web_Sl1_NavBS=sanitize_text_field($_POST['chintan_web_Sl1_NavBS']); $Chintan_Web_Sl1_NavBC=sanitize_text_field($_POST['chintan_web_Sl1_NavBC']); $Chintan_Web_Sl1_NavBR=sanitize_text_field($_POST['chintan_web_Sl1_NavBR']); $Chintan_Web_Sl1_NavCC=sanitize_text_field($_POST['chintan_web_Sl1_NavCC']); $Chintan_Web_Sl1_NavHC=sanitize_text_field($_POST['chintan_web_Sl1_NavHC']); $Chintan_Web_Sl1_ArPFT=""; $Chintan_Web_Sl1_NavPos=sanitize_text_field($_POST['chintan_web_Sl1_NavPos']);
			

			if($Chintan_Web_Sl1_SlS=='on'){ $Chintan_Web_Sl1_SlS='true'; }else{ $Chintan_Web_Sl1_SlS='false'; }
			if($Chintan_Web_Sl1_PoH=='on'){ $Chintan_Web_Sl1_PoH='true'; }else{ $Chintan_Web_Sl1_PoH='false'; }
			
			if($Chintan_Web_Sl1_TUp=='on'){ $Chintan_Web_Sl1_TUp='true'; }else{ $Chintan_Web_Sl1_TUp='false'; }
			if($chintan_CS_BIB=='on'){ $chintan_CS_BIB='true'; }else{ $chintan_CS_BIB='none'; }
			if($chintan_CS_P=='on'){ $chintan_CS_P='true'; }else{ $chintan_CS_P='none'; }
			
			if($chintan_CS_Video_TShow=='on'){ $chintan_CS_Video_TShow='true'; }else{ $chintan_CS_Video_TShow='none'; }
			if($chintan_CS_Video_DShow=='on'){ $chintan_CS_Video_DShow='true'; }else{ $chintan_CS_Video_DShow='none'; }
			if($chintan_CS_Video_Show=='on'){ $chintan_CS_Video_Show='true'; }else{ $chintan_CS_Video_Show='none'; }
			if($chintan_CS_Video_ArrShow=='on'){ $chintan_CS_Video_ArrShow='true'; }else{ $chintan_CS_Video_ArrShow='none'; }
			if($chintan_fsl_SShow == 'on'){ $chintan_fsl_SShow = 'true'; }else{ $chintan_fsl_SShow = 'false'; }
			if($chintan_fsl_Ic_Show == 'on'){ $chintan_fsl_Ic_Show = 'true'; }else{ $chintan_fsl_Ic_Show = 'false'; }
			if($chintan_fsl_PPL_Show == 'on'){ $chintan_fsl_PPL_Show = 'true'; }else{ $chintan_fsl_PPL_Show = 'false'; }
			if($chintan_fsl_Randomize == 'on'){ $chintan_fsl_Randomize = 'true'; }else{ $chintan_fsl_Randomize = 'false'; }
			if($chintan_fsl_Loop == 'on'){ $chintan_fsl_Loop = 'true'; }else{ $chintan_fsl_Loop = 'false'; }
			
			

			if($Chintan_Web_Sl_CT_ArText == 'on'){ $Chintan_Web_Sl_CT_ArText = 'true'; }else{ $Chintan_Web_Sl_CT_ArText = 'false'; }
			
			if($Chintan_Web_Sl_FS_AP == 'on'){ $Chintan_Web_Sl_FS_AP = 'true'; }else{ $Chintan_Web_Sl_FS_AP = 'false'; }
			
			if($Chintan_Web_Sl_FS_SLoop == 'on'){ $Chintan_Web_Sl_FS_SLoop = 'true'; }else{ $Chintan_Web_Sl_FS_SLoop = 'false'; }
			if($Chintan_Web_Sl_FS_ShNavBut == 'on'){ $Chintan_Web_Sl_FS_ShNavBut = 'true'; }else{ $Chintan_Web_Sl_FS_ShNavBut = 'false'; }
			
			if($Chintan_Web_Sl_FS_Nav_Show == 'on'){ $Chintan_Web_Sl_FS_Nav_Show = 'true'; }else{ $Chintan_Web_Sl_FS_Nav_Show = 'false'; }
			
			if($Chintan_Web_Sl_DS_AP == 'on'){ $Chintan_Web_Sl_DS_AP = 'true'; }else{ $Chintan_Web_Sl_DS_AP = 'false'; }
			if($Chintan_Web_Sl_DS_DFS == 'on'){ $Chintan_Web_Sl_DS_DFS = 'true'; }else{ $Chintan_Web_Sl_DS_DFS = 'false'; }
			if($Chintan_Web_Sl_DS_Tr == 'on'){ $Chintan_Web_Sl_DS_Tr = 'true'; }else{ $Chintan_Web_Sl_DS_Tr = 'false'; }
			if($Chintan_Web_Sl_DS_Arr_Show == 'on'){ $Chintan_Web_Sl_DS_Arr_Show = 'true'; }else{ $Chintan_Web_Sl_DS_Arr_Show = 'false'; }
			
			if($Chintan_Web_Sl_TSL_TA == 'on'){ $Chintan_Web_Sl_TSL_TA = 'true'; }else{ $Chintan_Web_Sl_TSL_TA = 'false'; }
			if($Chintan_Web_Sl_TSL_AP == 'on'){ $Chintan_Web_Sl_TSL_AP = 'true'; }else{ $Chintan_Web_Sl_TSL_AP = 'false'; }
			if($Chintan_Web_Sl_TSL_PH == 'on'){ $Chintan_Web_Sl_TSL_PH = 'true'; }else{ $Chintan_Web_Sl_TSL_PH = 'false'; }
			if($Chintan_Web_Sl_TSL_Loop == 'on'){ $Chintan_Web_Sl_TSL_Loop = 'true'; }else{ $Chintan_Web_Sl_TSL_Loop = 'false'; }
			if($Chintan_Web_Sl_TSL_Nav_Show == 'on'){ $Chintan_Web_Sl_TSL_Nav_Show = 'true'; }else{ $Chintan_Web_Sl_TSL_Nav_Show = 'false'; }
			if($Chintan_Web_Sl_TSL_SS_Show == 'on'){ $Chintan_Web_Sl_TSL_SS_Show = 'true'; }else{ $Chintan_Web_Sl_TSL_SS_Show = 'false'; }
			if($Chintan_Web_Sl_TSL_Arr_Show == 'on'){ $Chintan_Web_Sl_TSL_Arr_Show = 'true'; }else{ $Chintan_Web_Sl_TSL_Arr_Show = 'false'; }
			if($Chintan_Web_AnSL_SSh == 'on'){ $Chintan_Web_AnSL_SSh = 'true'; }else{ $Chintan_Web_AnSL_SSh = 'false'; }
			if($Chintan_Web_AnSL_N_Sh == 'on'){ $Chintan_Web_AnSL_N_Sh = 'true'; }else{ $Chintan_Web_AnSL_N_Sh = 'false'; }

			if(isset($_POST['chintan_webSlSave']))
			{
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, slider_name, slider_type) VALUES (%d, %s, %s)", '', $Chintan_Web_slider_name, $Chintan_Web_slider_type));

				$Chintan_Web_Slider_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id > %d order by id desc limit 1", 0));

				if($Chintan_Web_slider_type=='Slider Navigation')
				{
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, chintan_web_slider_ID, chintan_web_slider_name, chintan_web_slider_type, chintan_web_Sl1_SlS, chintan_web_Sl1_SlSS, chintan_web_Sl1_PoH, chintan_web_Sl1_W, chintan_web_Sl1_H, chintan_web_Sl1_BoxS, chintan_web_Sl1_BoxSC, chintan_web_Sl1_IBW, chintan_web_Sl1_IBS, chintan_web_Sl1_IBC, chintan_web_Sl1_IBR, chintan_web_Sl1_TBgC, chintan_web_Sl1_TC, chintan_web_Sl1_TTA, chintan_web_Sl1_TFS, chintan_web_Sl1_TFF, chintan_web_Sl1_TUp, chintan_web_Sl1_ArBgC, chintan_web_Sl1_ArOp, chintan_web_Sl1_ArType, chintan_web_Sl1_ArHBgC, chintan_web_Sl1_ArHOp, chintan_web_Sl1_ArHEff, chintan_web_Sl1_ArBoxW, chintan_web_Sl1_NavW, chintan_web_Sl1_NavH, chintan_web_Sl1_NavPB, chintan_web_Sl1_NavBW, chintan_web_Sl1_NavBS, chintan_web_Sl1_NavBC, chintan_web_Sl1_NavBR, chintan_web_Sl1_NavCC, chintan_web_Sl1_NavHC, chintan_web_Sl1_ArPFT, chintan_web_Sl1_NavPos) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Chintan_Web_Slider_ID[0]->id, $Chintan_Web_slider_name, $Chintan_Web_slider_type, $Chintan_Web_Sl1_SlS, $Chintan_Web_Sl1_SlSS, $Chintan_Web_Sl1_PoH, $Chintan_Web_Sl1_W, $Chintan_Web_Sl1_H, $Chintan_Web_Sl1_BoxS, $Chintan_Web_Sl1_BoxSC, $Chintan_Web_Sl1_IBW, $Chintan_Web_Sl1_IBS, $Chintan_Web_Sl1_IBC, $Chintan_Web_Sl1_IBR, $Chintan_Web_Sl1_TBgC, $Chintan_Web_Sl1_TC, $Chintan_Web_Sl1_TTA, $Chintan_Web_Sl1_TFS, $Chintan_Web_Sl1_TFF, $Chintan_Web_Sl1_TUp, $Chintan_Web_Sl1_ArBgC, $Chintan_Web_Sl1_ArOp, $Chintan_Web_Sl1_ArType, $Chintan_Web_Sl1_ArHBgC, $Chintan_Web_Sl1_ArHOp, $Chintan_Web_Sl1_ArHEff, $Chintan_Web_Sl1_ArBoxW, $Chintan_Web_Sl1_NavW, $Chintan_Web_Sl1_NavH, $Chintan_Web_Sl1_NavPB, $Chintan_Web_Sl1_NavBW, $Chintan_Web_Sl1_NavBS, $Chintan_Web_Sl1_NavBC, $Chintan_Web_Sl1_NavBR, $Chintan_Web_Sl1_NavCC, $Chintan_Web_Sl1_NavHC, $Chintan_Web_Sl1_ArPFT, $Chintan_Web_Sl1_NavPos));
					
				}
				
			}
			else if(isset($_POST['chintan_webSlUpdate']))
			{
				$Chintan_Web_Slider_UP_ID=sanitize_text_field($_POST['chintan_web_Slider_UP_ID']);

				$wpdb->query($wpdb->prepare("UPDATE $table_name2 set slider_name = %s, slider_type = %s WHERE id = %d", $Chintan_Web_slider_name, $Chintan_Web_slider_type, $Chintan_Web_Slider_UP_ID));

				if($Chintan_Web_slider_type=='Slider Navigation')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name5 set chintan_web_slider_name = %s, chintan_web_slider_type = %s, chintan_web_Sl1_SlS = %s, chintan_web_Sl1_SlSS = %s, chintan_web_Sl1_PoH = %s, chintan_web_Sl1_W = %s, chintan_web_Sl1_H = %s, chintan_web_Sl1_BoxS = %s, chintan_web_Sl1_BoxSC = %s, chintan_web_Sl1_IBW = %s, chintan_web_Sl1_IBS = %s, chintan_web_Sl1_IBC = %s, chintan_web_Sl1_IBR = %s, chintan_web_Sl1_TBgC = %s, chintan_web_Sl1_TC = %s, chintan_web_Sl1_TTA = %s, chintan_web_Sl1_TFS = %s, chintan_web_Sl1_TFF = %s, chintan_web_Sl1_TUp = %s, chintan_web_Sl1_ArBgC = %s, chintan_web_Sl1_ArOp = %s, chintan_web_Sl1_ArType = %s, chintan_web_Sl1_ArHBgC = %s, chintan_web_Sl1_ArHOp = %s, chintan_web_Sl1_ArHEff = %s, chintan_web_Sl1_ArBoxW = %s, chintan_web_Sl1_NavW = %s, chintan_web_Sl1_NavH = %s, chintan_web_Sl1_NavPB = %s, chintan_web_Sl1_NavBW = %s, chintan_web_Sl1_NavBS = %s, chintan_web_Sl1_NavBC = %s, chintan_web_Sl1_NavBR = %s, chintan_web_Sl1_NavCC = %s, chintan_web_Sl1_NavHC = %s, chintan_web_Sl1_ArPFT = %s, chintan_web_Sl1_NavPos = %s WHERE chintan_web_slider_ID = %s", $Chintan_Web_slider_name, $Chintan_Web_slider_type, $Chintan_Web_Sl1_SlS, $Chintan_Web_Sl1_SlSS, $Chintan_Web_Sl1_PoH, $Chintan_Web_Sl1_W, $Chintan_Web_Sl1_H, $Chintan_Web_Sl1_BoxS, $Chintan_Web_Sl1_BoxSC, $Chintan_Web_Sl1_IBW, $Chintan_Web_Sl1_IBS, $Chintan_Web_Sl1_IBC, $Chintan_Web_Sl1_IBR, $Chintan_Web_Sl1_TBgC, $Chintan_Web_Sl1_TC, $Chintan_Web_Sl1_TTA, $Chintan_Web_Sl1_TFS, $Chintan_Web_Sl1_TFF, $Chintan_Web_Sl1_TUp, $Chintan_Web_Sl1_ArBgC, $Chintan_Web_Sl1_ArOp, $Chintan_Web_Sl1_ArType, $Chintan_Web_Sl1_ArHBgC, $Chintan_Web_Sl1_ArHOp, $Chintan_Web_Sl1_ArHEff, $Chintan_Web_Sl1_ArBoxW, $Chintan_Web_Sl1_NavW, $Chintan_Web_Sl1_NavH, $Chintan_Web_Sl1_NavPB, $Chintan_Web_Sl1_NavBW, $Chintan_Web_Sl1_NavBS, $Chintan_Web_Sl1_NavBC, $Chintan_Web_Sl1_NavBR, $Chintan_Web_Sl1_NavCC, $Chintan_Web_Sl1_NavHC, $Chintan_Web_Sl1_ArPFT, $Chintan_Web_Sl1_NavPos, $Chintan_Web_Slider_UP_ID));
					
				}
				
			}
		}
		else
		{
			wp_die('Security check fail'); 
		}
	}

	
	$Chintan_WebSliderCount=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d",0));
	$Chintan_Web_Sl1=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE id>%d",0));
	if($Chintan_Web_Sl1[0]->chintan_web_Sl1_SlS=='true'){ $Chintan_Web_Sl1_SlS='checked'; }
	if($Chintan_Web_Sl1[0]->chintan_web_Sl1_PoH=='true'){ $Chintan_Web_Sl1_PoH='checked'; }
	
	if($Chintan_Web_Sl1[0]->chintan_web_Sl1_TUp=='true'){ $Chintan_Web_Sl1_TUp='checked'; }
	
	
?>
<div class="rw_loading_c" style="display: none;">
	<div class="cont_cont">
		<div class="cssload-thecube">
			<div class="cssload-cube cssload-c1"></div>
			<div class="cssload-cube cssload-c2"></div>
			<div class="cssload-cube cssload-c4"></div>
			<div class="cssload-cube cssload-c3"></div>
		</div>
		<div class="RW_Loader_Text_Navigation">
			Please Wait !
		</div>
	</div>
</div>
<form method="POST">
	<?php wp_nonce_field( 'edit-menu_', 'Chintan_Web_PSlider_Nonce' );?>
	<?php require_once( 'Chintan-Web-Slider-Header.php' ); ?>
	<?php require_once( 'Chintan-Web-Slider-Check.php' ); ?>
	<div style="position: relative; width: 100%; right: 1%; height: 50px;">
		<input type="button" class="JAddSlider2" value="Add Option" onclick="addSliderJ2()"/>
		<input type="submit" class="JSaveSlider2" value="Save" name="chintan_webSlSave"/>
		<input type="submit" class="JUpdateSlider2" value="Update" name="chintan_webSlUpdate"/>
		<input type="button" class="JCanselSlider2" value="Cancel" onclick="canselSliderJ2()"/>
		<input type="text" class="chintanideo_EN_ID" style="display:none;" id="chintan_web_slider_ID" name="chintan_web_Slider_UP_ID">
	</div>
	<div class="Chintan_Web_SliderIm_Fixed_Div"></div>
	<div class="Chintan_Web_SliderIm_Absolute_Div">
		<div class="Chintan_Web_SliderIm_Relative_Div">
			<p> Are you sure you want to remove ? </p>
			<span class="Chintan_Web_SliderIm_Relative_No">No</span>
			<span class="Chintan_Web_SliderIm_Relative_Yes">Yes</span>
		</div>
	</div>
	<div class="Table_Data_chintan_web_Content_2" >
		<div class="Table_Data_chintan_web1_2">
			<table class="chintan_web_Tit_Table_2">
				<tr class="chintan_web_Tit_Table_2_Tr">
					<td>No</td>
					<td>Option Name</td>
					<td>Slider Type</td>
					<td>Clone</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			</table>
			<table class="chintan_web_Tit_Table2_2">
				<?php for($i=0;$i<count($Chintan_WebSliderCount);$i++){ ?>
					<tr class="chintan_web_Tit_Table2_2_Tr2">
						<td><?php echo $i+1;?></td>
						<td><?php echo $Chintan_WebSliderCount[$i]->slider_name;?></td>
						<td><?php echo $Chintan_WebSliderCount[$i]->slider_type;?></td>
						<td onclick="chintan_web_Copy_Sl2('<?php echo $Chintan_WebSliderCount[$i]->id;?>')"><i class="jIcFileso chintan_web chintan_web-files-o"></i></td>
						<td onclick="chintan_web_Edit_Sl2('<?php echo $Chintan_WebSliderCount[$i]->id;?>')"><i class="jIcPencil chintan_web chintan_web-pencil"></i></td>
						<td onclick="chintan_web_Delete_Sl2('<?php echo $Chintan_WebSliderCount[$i]->id;?>')"><i class="jIcDel chintan_web chintan_web-trash"></i></td>
					</tr>
				<?php }?>
			</table>
		</div>
		<div class="Table_Data_chintan_web2_2">
			<table class="chintan_web_SaveSl_Table">
				<tr>
					<td>Slider Name</td>
					<td>Slider Type</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="chintan_web_Text_Field" name="chintan_web_slider_name" id="chintan_web_slider_name" required="" placeholder="* Required">
					</td>
					<td class="SlType">
						<select class="chintan_web_Text_Field" id="chintan_web_slider_type" name="chintan_web_slider_type" onchange="Chintan_PS_Buttons_Clicked()">
							<option value="Slider Navigation">            Slider Navigation            </option>
							
						</select>
					</td>
				</tr>
			</table>
			<table class="chintan_web_SaveSl_Table_2 chintan_web_SaveSl_Table_2_1" style="display:none;">
				<tr>
					<td colspan="4">General Options</td>
				</tr>
				<tr>
					<td>Slide Show</td>
					<td>SlideShow Speed (s)</td>
					<td>Pause on Hover</td>
					<td>Width (px)</td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_web_Sl1_SlS" id="chintan_web_Sl1_SlS" <?php echo $Chintan_Web_Sl1_SlS;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_SlSS;?>" id="chintan_web_Sl1_SlSS" name="chintan_web_Sl1_SlSS" min="1" max="30">
							<span class="range-slider__value" id="chintan_web_Sl1_SlSS_Span">0</span>
						</div>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_web_Sl1_PoH" id="chintan_web_Sl1_PoH" <?php echo $Chintan_Web_Sl1_PoH;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_W;?>" id="chintan_web_Sl1_W" name="chintan_web_Sl1_W" min="100" max="2000">
							<span class="range-slider__value" id="chintan_web_Sl1_W_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Height (px)</td>
					<td>Shadow Type</td>
					<td>Shadow Color</td>
					<td>Loading Color</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_H;?>" id="chintan_web_Sl1_H" name="chintan_web_Sl1_H" min="100" max="2000">
							<span class="range-slider__value" id="chintan_web_Sl1_H_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_BoxS" name="chintan_web_Sl1_BoxS">
							<option value="Type 1" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_BoxS=='Type 1'){ echo 'selected';}?>> Type 1 </option>
							<option value="Type 2" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_BoxS=='Type 2'){ echo 'selected';}?>> Type 2 </option>
							
						</select>
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_BoxSC" id="chintan_web_Sl1_BoxSC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_BoxSC;?>">
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_IBS" id="chintan_web_Sl1_IBS" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->Chintan_Web_Sl1_IBS;?>">
					</td>
				</tr>
				<tr>
					<td colspan="4">Image Options</td>
				</tr>
				<tr>
					<td>Border Width (px)</td>
					<td>Border Color</td>
					<td>Border Radius (px)</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_IBW;?>" id="chintan_web_Sl1_IBW" name="chintan_web_Sl1_IBW" min="0" max="20">
							<span class="range-slider__value" id="chintan_web_Sl1_IBW_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_IBC" id="chintan_web_Sl1_IBC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_IBC;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_IBR;?>" id="chintan_web_Sl1_IBR" name="chintan_web_Sl1_IBR" min="0" max="500">
							<span class="range-slider__value" id="chintan_web_Sl1_IBR_Span">0</span>
						</div>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Title Options</td>
				</tr>
				<tr>
					<td>Background Color</td>
					<td>Color</td>
					<td>Text Align</td>
					<td>Font Size (px)</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="chintan_web_Sl1_TBgC" id="chintan_web_Sl1_TBgC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_TBgC;?>">
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_TC" id="chintan_web_Sl1_TC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_TC;?>">
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_TTA" name="chintan_web_Sl1_TTA">
							<option value="left"   <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_TTA=="left"){ echo "selected";}?>>   Left   </option>
							<option value="right"  <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_TTA=="right"){ echo "selected";}?>>  Right  </option>
							<option value="center" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_TTA=="center"){ echo "selected";}?>> Center </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_TFS;?>" id="chintan_web_Sl1_TFS" name="chintan_web_Sl1_TFS" min="8" max="48">
							<span class="range-slider__value" id="chintan_web_Sl1_TFS_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Font Family</td>
					<td>Uppercase</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_TFF" name="chintan_web_Sl1_TFF">
							<?php for($i=0;$i<count($Chintan_WebFontCount);$i++){ ?> 
								<?php if($Chintan_WebFontCount[$i]==$Chintan_Web_Sl1[0]->chintan_web_Sl1_TFF){ ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;" selected><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php } else { ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;"><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php }?>
							<?php }?>
						</select>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" id="chintan_web_Sl1_TUp" name="chintan_web_Sl1_TUp" <?php echo $Chintan_Web_Sl1_TUp;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Arrows Options</td>
				</tr>
				<tr>
					<td>Background Color</td>
					<td>Opacity (%)</td>
					<td>Arrow Type</td>
					<td>Hover Background Color</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="chintan_web_Sl1_ArBgC" id="chintan_web_Sl1_ArBgC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArBgC;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArOp;?>" id="chintan_web_Sl1_ArOp" name="chintan_web_Sl1_ArOp" min="0" max="100">
							<span class="range-slider__value" id="chintan_web_Sl1_ArOp_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_ArType" name="chintan_web_Sl1_ArType">
							<option value="1"  <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArType=="1"){ echo "selected";}?>>  Type 1  </option>
							<option value="2"  <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArType=="2"){ echo "selected";}?>>  Type 2  </option>
							
						</select>
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_ArHBgC" id="chintan_web_Sl1_ArHBgC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHBgC;?>">
					</td>
				</tr>
				<tr>
					<td>Hover Opacity (%)</td>
					<td>Hover Effect</td>
					<td>Box Width (px)</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHOp;?>" id="chintan_web_Sl1_ArHOp" name="chintan_web_Sl1_ArHOp" min="0" max="100">
							<span class="range-slider__value" id="chintan_web_Sl1_ArHOp_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_ArHEff" name="chintan_web_Sl1_ArHEff">
							<option value="slide out"       <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHEff=="slide out"){ echo "selected";}?>>       Slide Out       </option>
							<option value="flip out"        <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHEff=="flip out"){ echo "selected";}?>>        Flip Out        </option>
							<option value="double flip out" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHEff=="double flip out"){ echo "selected";}?>> Double Flip Out </option>
							<option value="both ways"       <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHEff=="both ways"){ echo "selected";}?>>       Both Ways       </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArBoxW;?>" id="chintan_web_Sl1_ArBoxW" name="chintan_web_Sl1_ArBoxW" min="50" max="150">
							<span class="range-slider__value" id="chintan_web_Sl1_ArBoxW_Span">0</span>
						</div>
					</td>
					<td>
						
					</td>
				</tr>
				<tr>
					<td colspan="4">Navigation Options</td>
				</tr>
				<tr>
					<td>Width (px)</td>
					<td>Height (px)</td>
					<td>Place Between (px)</td>
					<td>Border Width (px)</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavW;?>" id="chintan_web_Sl1_NavW" name="chintan_web_Sl1_NavW" min="0" max="20">
							<span class="range-slider__value" id="chintan_web_Sl1_NavW_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavH;?>" id="chintan_web_Sl1_NavH" name="chintan_web_Sl1_NavH" min="0" max="20">
							<span class="range-slider__value" id="chintan_web_Sl1_NavH_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavPB;?>" id="chintan_web_Sl1_NavPB" name="chintan_web_Sl1_NavPB" min="0" max="15">
							<span class="range-slider__value" id="chintan_web_Sl1_NavPB_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBW;?>" id="chintan_web_Sl1_NavBW" name="chintan_web_Sl1_NavBW" min="0" max="5">
							<span class="range-slider__value" id="chintan_web_Sl1_NavBW_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Border Style</td>
					<td>Border Color</td>
					<td>Border Radius (px)</td>
					<td>Current Color</td>
				</tr>
				<tr>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_NavBS" name="chintan_web_Sl1_NavBS">
							<option value="none"   <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBS=="none"){ echo "selected";}?>>   None   </option>
							<option value="solid"  <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBS=="solid"){ echo "selected";}?>>  Solid  </option>
							<option value="dashed" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBS=="dashed"){ echo "selected";}?>> Dashed </option>
							<option value="dotted" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBS=="dotted"){ echo "selected";}?>> Dotted </option>
						</select>
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_NavBC" id="chintan_web_Sl1_NavBC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBC;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBR;?>" id="chintan_web_Sl1_NavBR" name="chintan_web_Sl1_NavBR" min="0" max="20">
							<span class="range-slider__value" id="chintan_web_Sl1_NavBR_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_NavCC" id="chintan_web_Sl1_NavCC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavCC;?>">
					</td>
				</tr>
				<tr>
					<td>Hover Color</td>
					<td>Position</td>
					<td colspan="2"></td>
				</tr>
				<td>
						<input type="text" name="chintan_web_Sl1_BoxSC" id="chintan_web_Sl1_BoxSC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_BoxSC;?>">
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_IBS" id="chintan_web_Sl1_IBS" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->Chintan_Web_Sl1_IBS;?>">
					</td>
				</tr>
				<tr>
					<td colspan="4">Image Options</td>
				</tr>
				<tr>
					<td>Border Width (px)</td>
					<td>Border Color</td>
					<td>Border Radius (px)</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_IBW;?>" id="chintan_web_Sl1_IBW" name="chintan_web_Sl1_IBW" min="0" max="20">
							<span class="range-slider__value" id="chintan_web_Sl1_IBW_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_IBC" id="chintan_web_Sl1_IBC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_IBC;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_IBR;?>" id="chintan_web_Sl1_IBR" name="chintan_web_Sl1_IBR" min="0" max="500">
							<span class="range-slider__value" id="chintan_web_Sl1_IBR_Span">0</span>
						</div>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Title Options</td>
				</tr>
				<tr>
					<td>Background Color</td>
					<td>Color</td>
					<td>Text Align</td>
					<td>Font Size (px)</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="chintan_web_Sl1_TBgC" id="chintan_web_Sl1_TBgC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_TBgC;?>">
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_TC" id="chintan_web_Sl1_TC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_TC;?>">
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_TTA" name="chintan_web_Sl1_TTA">
							<option value="left"   <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_TTA=="left"){ echo "selected";}?>>   Left   </option>
							<option value="right"  <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_TTA=="right"){ echo "selected";}?>>  Right  </option>
							<option value="center" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_TTA=="center"){ echo "selected";}?>> Center </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_TFS;?>" id="chintan_web_Sl1_TFS" name="chintan_web_Sl1_TFS" min="8" max="48">
							<span class="range-slider__value" id="chintan_web_Sl1_TFS_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Font Family</td>
					<td>Uppercase</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_TFF" name="chintan_web_Sl1_TFF">
							<?php for($i=0;$i<count($Chintan_WebFontCount);$i++){ ?> 
								<?php if($Chintan_WebFontCount[$i]==$Chintan_Web_Sl1[0]->chintan_web_Sl1_TFF){ ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;" selected><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php } else { ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;"><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php }?>
							<?php }?>
						</select>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" id="chintan_web_Sl1_TUp" name="chintan_web_Sl1_TUp" <?php echo $Chintan_Web_Sl1_TUp;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Arrows Options</td>
				</tr>
				<tr>
					<td>Background Color</td>
					<td>Opacity (%)</td>
					<td>Arrow Type</td>
					<td>Hover Background Color</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="chintan_web_Sl1_ArBgC" id="chintan_web_Sl1_ArBgC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArBgC;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArOp;?>" id="chintan_web_Sl1_ArOp" name="chintan_web_Sl1_ArOp" min="0" max="100">
							<span class="range-slider__value" id="chintan_web_Sl1_ArOp_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_ArType" name="chintan_web_Sl1_ArType">
							<option value="1"  <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArType=="1"){ echo "selected";}?>>  Type 1  </option>
							<option value="2"  <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArType=="2"){ echo "selected";}?>>  Type 2  </option>
							
						</select>
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_ArHBgC" id="chintan_web_Sl1_ArHBgC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHBgC;?>">
					</td>
				</tr>
				<tr>
					<td>Hover Opacity (%)</td>
					<td>Hover Effect</td>
					<td>Box Width (px)</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHOp;?>" id="chintan_web_Sl1_ArHOp" name="chintan_web_Sl1_ArHOp" min="0" max="100">
							<span class="range-slider__value" id="chintan_web_Sl1_ArHOp_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_ArHEff" name="chintan_web_Sl1_ArHEff">
							<option value="slide out"       <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHEff=="slide out"){ echo "selected";}?>>       Slide Out       </option>
							<option value="flip out"        <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHEff=="flip out"){ echo "selected";}?>>        Flip Out        </option>
							<option value="double flip out" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHEff=="double flip out"){ echo "selected";}?>> Double Flip Out </option>
							<option value="both ways"       <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_ArHEff=="both ways"){ echo "selected";}?>>       Both Ways       </option>
						</select>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_ArBoxW;?>" id="chintan_web_Sl1_ArBoxW" name="chintan_web_Sl1_ArBoxW" min="50" max="150">
							<span class="range-slider__value" id="chintan_web_Sl1_ArBoxW_Span">0</span>
						</div>
					</td>
					<td>
						
					</td>
				</tr>
				<tr>
					<td colspan="4">Navigation Options</td>
				</tr>
				<tr>
					<td>Width (px)</td>
					<td>Height (px)</td>
					<td>Place Between (px)</td>
					<td>Border Width (px)</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavW;?>" id="chintan_web_Sl1_NavW" name="chintan_web_Sl1_NavW" min="0" max="20">
							<span class="range-slider__value" id="chintan_web_Sl1_NavW_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavH;?>" id="chintan_web_Sl1_NavH" name="chintan_web_Sl1_NavH" min="0" max="20">
							<span class="range-slider__value" id="chintan_web_Sl1_NavH_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavPB;?>" id="chintan_web_Sl1_NavPB" name="chintan_web_Sl1_NavPB" min="0" max="15">
							<span class="range-slider__value" id="chintan_web_Sl1_NavPB_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBW;?>" id="chintan_web_Sl1_NavBW" name="chintan_web_Sl1_NavBW" min="0" max="5">
							<span class="range-slider__value" id="chintan_web_Sl1_NavBW_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Border Style</td>
					<td>Border Color</td>
					<td>Border Radius (px)</td>
					<td>Current Color</td>
				</tr>
				<tr>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_web_Sl1_NavBS" name="chintan_web_Sl1_NavBS">
							<option value="none"   <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBS=="none"){ echo "selected";}?>>   None   </option>
							<option value="solid"  <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBS=="solid"){ echo "selected";}?>>  Solid  </option>
							<option value="dashed" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBS=="dashed"){ echo "selected";}?>> Dashed </option>
							<option value="dotted" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBS=="dotted"){ echo "selected";}?>> Dotted </option>
						</select>
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_NavBC" id="chintan_web_Sl1_NavBC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBC;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavBR;?>" id="chintan_web_Sl1_NavBR" name="chintan_web_Sl1_NavBR" min="0" max="20">
							<span class="range-slider__value" id="chintan_web_Sl1_NavBR_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" name="chintan_web_Sl1_NavCC" id="chintan_web_Sl1_NavCC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavCC;?>">
					</td>
				</tr>
				<tr>
					<td>Hover Color</td>
					<td>Position</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="chintan_web_Sl1_NavHC" id="chintan_web_Sl1_NavHC" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl1[0]->chintan_web_Sl1_NavHC;?>">
					</td>
					<td>
						<select id="chintan_web_Sl1_NavPos" name="chintan_web_Sl1_NavPos" class="chintan_web_Select_Menu">
							<option value="top"    <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavPos=="top"){ echo "selected";}?>>    Top    </option>
							<option value="bottom" <?php if($Chintan_Web_Sl1[0]->chintan_web_Sl1_NavPos=="bottom"){ echo "selected";}?>> Bottom </option>
						</select>
					</td>
					<td colspan="2"></td>
				</tr>
			</table>
			<table class="chintan_web_SaveSl_Table_2 chintan_web_SaveSl_Table_2_2" style="display:none;">
				<tr>
					<td colspan="4">General Settings</td>
				</tr>
				<tr>
					<td>Background Image Blur</td>
					<td>Navigation</td>
					<td>Slide Duration (s)</td>
					<td>Show Description</td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_CS_BIB" id="chintan_CS_BIB" <?php echo $chintan_Checked1;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_CS_P" id="chintan_CS_P" <?php echo $chintan_Checked2;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_SD;?>" id="chintan_CS_SD" name="chintan_CS_SD" min="1" max="20">
							<span class="range-slider__value" id="chintan_CS_SD_Span">0</span>
						</div>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_CS_Video_DShow" id="chintan_CS_Video_DShow" <?php echo $chintan_Checked5;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>
					<td>Animation Type</td>
					<td>Show Slideshow</td>
					<td>Background Color</td>
					<td>Box Shadox Color</td>
				</tr>
				<tr>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_CS_AT" name="chintan_CS_AT" >
							<option value="slide"      <?php if($chintan_Effect1[0]->chintan_CS_AT=="slide"){echo "selected";}?>>      Slide       </option>
							<option value="slideUp"    <?php if($chintan_Effect1[0]->chintan_CS_AT=="slideUp"){echo "selected";}?>>    Slide Up    </option>
							<option value="bounce"     <?php if($chintan_Effect1[0]->chintan_CS_AT=="bounce"){echo "selected";}?>>     Bounce      </option>
							
						</select>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_CS_Video_H" id="chintan_CS_Video_H" <?php echo $chintan_Checked8;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" name="chintan_CS_Cont_BgC" id="chintan_CS_Cont_BgC" class="alpha-color-picker" value="<?php echo $chintan_Effect1[0]->chintan_CS_Cont_BgC;?>">
					</td>
					<td>
						<input type="text" id="chintan_CS_Cont_BSC" class="alpha-color-picker" name="chintan_CS_Cont_BSC" value="<?php echo $chintan_Effect1[0]->chintan_CS_Cont_BSC;?>">
					</td>
				</tr>
				<tr>
					<td>Width (px)</td>
					<td>Height (px)</td>
					<td>Popup</td>
					<td>Border Width (px)</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_Cont_W;?>" id="chintan_CS_Cont_W" name="chintan_CS_Cont_W" min="400" max="1500">
							<span class="range-slider__value" id="chintan_CS_Cont_W_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_Cont_H;?>" id="chintan_CS_Cont_H" name="chintan_CS_Cont_H" min="400" max="900">
							<span class="range-slider__value" id="chintan_CS_Cont_H_Span">0</span>
						</div>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_CS_Video_DC" id="chintan_CS_Video_DC" <?php echo $chintan_Checked9;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_Cont_BW;?>" id="chintan_CS_Cont_BW" name="chintan_CS_Cont_BW" min="0" max="10">
							<span class="range-slider__value" id="chintan_CS_Cont_BW_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Border Color</td>
					<td>Border Radius (px)</td>
					<td>Loading Color</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" id="chintan_CS_Cont_BC" class="alpha-color-picker" name="chintan_CS_Cont_BC" value="<?php echo $chintan_Effect1[0]->chintan_CS_Cont_BC;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_Cont_BR;?>" id="chintan_CS_Cont_BR" name="chintan_CS_Cont_BR" min="0" max="10">
							<span class="range-slider__value" id="chintan_CS_Cont_BR_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" id="chintan_CS_Cont_BS" class="alpha-color-picker" name="chintan_CS_Cont_BS" value="<?php echo $chintan_Effect1[0]->chintan_CS_Cont_BS;?>">
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Settings for Image Title</td>
				</tr>
				<tr>
					<td>Show Title</td>
					<td>Color</td>
					<td>Font Size (px)</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_CS_Video_TShow" id="chintan_CS_Video_TShow" <?php echo $chintan_Checked4;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" id="chintan_CS_Video_TC" class="alpha-color-picker" name="chintan_CS_Video_TC" value="<?php echo $chintan_Effect1[0]->chintan_CS_Video_TC;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_Video_TFS;?>" id="chintan_CS_Video_TFS" name="chintan_CS_Video_TFS" min="6" max="36">
							<span class="range-slider__value" id="chintan_CS_Video_TFS_Span">0</span>
						</div>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>Font Family</td>
					<td>Text Align</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_CS_Video_TFF" name="chintan_CS_Video_TFF">
							<?php for($i=0;$i<count($Chintan_WebFontCount);$i++){ ?> 
								<?php if($Chintan_WebFontCount[$i]==$Chintan_Web_Sl1[0]->chintan_CS_Video_TFF){ ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;" selected><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php } else { ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;"><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php }?>
							<?php }?>
						</select>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_CS_Video_TTA" name="chintan_CS_Video_TTA">
							<option value="left"   <?php if($chintan_Effect1[0]->chintan_CS_Video_TTA=="left"){echo "selected";}?>>   Left   </option>
							<option value="right"  <?php if($chintan_Effect1[0]->chintan_CS_Video_TTA=="right"){echo "selected";}?>>  Right  </option>
							<option value="center" <?php if($chintan_Effect1[0]->chintan_CS_Video_TTA=="center"){echo "selected";}?>> Center </option>
						</select>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Settings for Image</td>
				</tr>
				<tr>
					<td>Show Image</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_CS_Video_Show" id="chintan_CS_Video_Show" <?php echo $chintan_Checked6;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Settings for Link</td>
				</tr>
				<tr>
					<td>Font Size (px)</td>
					<td>Font Family</td>
					<td>Color</td>
					<td>Text</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_LFS;?>" id="chintan_CS_LFS" name="chintan_CS_LFS" min="8" max="36">
							<span class="range-slider__value" id="chintan_CS_LFS_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_CS_LFF" name="chintan_CS_LFF">
							<?php for($i=0;$i<count($Chintan_WebFontCount);$i++){ ?> 
								<?php if($Chintan_WebFontCount[$i]==$Chintan_Web_Sl1[0]->chintan_CS_LFF){ ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;" selected><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php } else { ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;"><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php }?>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" id="chintan_CS_LC" class="alpha-color-picker" name="chintan_CS_LC" value="<?php echo $chintan_Effect1[0]->chintan_CS_LC;?>">
					</td>
					<td>
						<input type="text" id="chintan_CS_LT" name="chintan_CS_LT" value="<?php echo $chintan_Effect1[0]->chintan_CS_LT;?>">
					</td>
				</tr>
				<tr>
					<td>Background Color</td>
					<td>Border Color</td>
					<td>Border Radius (px)</td>
					<td>Position</td>
				</tr>
				<tr>
					<td>
						<input type="text" id="chintan_CS_LBgC" class="alpha-color-picker" name="chintan_CS_LBgC" value="<?php echo $chintan_Effect1[0]->chintan_CS_LBgC;?>">
					</td>
					<td>
						<input type="text" id="chintan_CS_LBC" class="alpha-color-picker" name="chintan_CS_LBC" value="<?php echo $chintan_Effect1[0]->chintan_CS_LBC;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_LBR;?>" id="chintan_CS_LBR" name="chintan_CS_LBR" min="0" max="20">
							<span class="range-slider__value" id="chintan_CS_LBR_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_CS_LPos" name="chintan_CS_LPos">
							<option value="left"   <?php if($chintan_Effect1[0]->chintan_CS_LPos=="left"){echo "selected";}?>>   Left   </option>
							<option value="right"  <?php if($chintan_Effect1[0]->chintan_CS_LPos=="right"){echo "selected";}?>>  Right  </option>
							<option value="center" <?php if($chintan_Effect1[0]->chintan_CS_LPos=="center"){echo "selected";}?>> Center </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Width (px)</td>
					<td>Border Style</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_Link_BW;?>" id="chintan_CS_Link_BW" name="chintan_CS_Link_BW" min="0" max="20">
							<span class="range-slider__value" id="chintan_CS_Link_BW_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_CS_Link_BS" name="chintan_CS_Link_BS">
							<option value="none"   <?php if($chintan_Effect1[0]->chintan_CS_Link_BS=="none"){echo "selected";}?>>   None   </option>
							<option value="dotted" <?php if($chintan_Effect1[0]->chintan_CS_Link_BS=="dotted"){echo "selected";}?>> Dotted </option>
							<option value="dashed" <?php if($chintan_Effect1[0]->chintan_CS_Link_BS=="dashed"){echo "selected";}?>> Dashed </option>
							<option value="solid"  <?php if($chintan_Effect1[0]->chintan_CS_Link_BS=="Solid"){echo "selected";}?>>  Solid  </option>
						</select>
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Hover Settings for Link</td>
				</tr>
				<tr>
					<td>Background Color</td>
					<td>Color</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<input type="text" id="chintan_CS_LHBgC" class="alpha-color-picker" name="chintan_CS_LHBgC" value="<?php echo $chintan_Effect1[0]->chintan_CS_LHBgC;?>">
					</td>
					<td>
						<input type="text" id="chintan_CS_LHC" class="alpha-color-picker" name="chintan_CS_LHC" value="<?php echo $chintan_Effect1[0]->chintan_CS_LHC;?>">
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Settings for Arrows</td>
				</tr>
				<tr>
					<td>Show Arrows</td>
					<td>Size (px)</td>
					<td>Color</td>
					<td>Type</td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_CS_Video_ArrShow" id="chintan_CS_Video_ArrShow" <?php echo $chintan_Checked7;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect1[0]->chintan_CS_AFS;?>" id="chintan_CS_AFS" name="chintan_CS_AFS" min="8" max="36">
							<span class="range-slider__value" id="chintan_CS_AFS_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" id="chintan_CS_AC" class="alpha-color-picker" name="chintan_CS_AC" value="<?php echo $chintan_Effect1[0]->chintan_CS_AC;?>">
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_CS_Icon" name="chintan_CS_Icon">
							<option value="1" <?php if($chintan_Effect1[0]->chintan_CS_Icon=="1"){echo "selected";}?>> Type 1 </option>
							<option value="2" <?php if($chintan_Effect1[0]->chintan_CS_Icon=="2"){echo "selected";}?>> Type 2 </option>
							
						</select>
					</td>
				</tr>
			</table>
			<table class="chintan_web_SaveSl_Table_2 chintan_web_SaveSl_Table_2_3" style="display:none;">
				<tr>
					<td colspan="4">General Option</td>
				</tr>
				<tr>
					<td>Animation Type</td>
					<td>Slideshow Show</td>
					<td>SlideShow Speed (s)</td>
					<td>Animation Duration (s)</td>
				</tr>
				<tr>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_fsl_animation" name="chintan_fsl_animation">
							<option value="fade"  <?php if($chintan_Effect2[0]->chintan_fsl_animation=="fade"){echo "selected";}?>>  Fade  </option>
							<option value="slide" <?php if($chintan_Effect2[0]->chintan_fsl_animation=="slide"){echo "selected";}?>> Slide </option>
						</select>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_fsl_SShow" id="chintan_fsl_SShow" <?php echo $chintan_Checked9;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_SShow_Speed;?>" id="chintan_fsl_SShow_Speed" name="chintan_fsl_SShow_Speed" min="1" max="30">
							<span class="range-slider__value" id="chintan_fsl_SShow_Speed_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Anim_Dur;?>" id="chintan_fsl_Anim_Dur" name="chintan_fsl_Anim_Dur" min="1" max="10">
							<span class="range-slider__value" id="chintan_fsl_Anim_Dur_Span">0</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Icon Show</td>
					<td>Pause-Play Show</td>
					<td>Randomize</td>
					<td>Loop</td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_fsl_Ic_Show" id="chintan_fsl_Ic_Show" <?php echo $chintan_Checked10;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_fsl_PPL_Show" id="chintan_fsl_PPL_Show" <?php echo $chintan_Checked11;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_fsl_Randomize" id="chintan_fsl_Randomize" <?php echo $chintan_Checked12;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_fsl_Loop" id="chintan_fsl_Loop" <?php echo $chintan_Checked13;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
				</tr>
				<tr>
					<td>Loading Color</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" name="chintan_fsl_Border_Style" id="chintan_fsl_Border_Style" class="alpha-color-picker" value="<?php echo $Chintan_Web_Sl2_Loader[0]->chintan_fsl_Border_Style;?>">
					</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Slider Settings</td>
				</tr>
				<tr>
					<td>Width (px)</td>
					<td>Height (px)</td>
					<td>Border Width (px)</td>
					<td>Shadow Type</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Width;?>" id="chintan_fsl_Width" name="chintan_fsl_Width" min="300" max="1000">
							<span class="range-slider__value" id="chintan_fsl_Width_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Height;?>" id="chintan_fsl_Height" name="chintan_fsl_Height" min="200" max="1000">
							<span class="range-slider__value" id="chintan_fsl_Height_Span">0</span>
						</div>
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Border_Width;?>" id="chintan_fsl_Border_Width" name="chintan_fsl_Border_Width" min="0" max="20">
							<span class="range-slider__value" id="chintan_fsl_Border_Width_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_fsl_Box_Shadow" name="chintan_fsl_Box_Shadow">
							<option value="Type 1" <?php if($chintan_Effect2[0]->chintan_fsl_Box_Shadow=='Type 1'){ echo 'selected';}?>> Type 1 </option>
							<option value="Type 2" <?php if($chintan_Effect2[0]->chintan_fsl_Box_Shadow=='Type 2'){ echo 'selected';}?>> Type 2 </option>
							
						</select>
					</td>
				</tr>
				<tr>
					<td>Border Color</td>
					<td>Shadow Color</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" id="chintan_fsl_Border_Color" class="alpha-color-picker" name="chintan_fsl_Border_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Border_Color;?>">
					</td>
					<td>
						<input type="text" id="chintan_fsl_Shadow_Color" class="alpha-color-picker" name="chintan_fsl_Shadow_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Shadow_Color;?>">
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4">Description Settings</td>
				</tr>
				<tr>
					<td>Show</td>
					<td>Background Color</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td>
						<label class="switch switch-light">
							<input class="switch-input" type="checkbox" name="chintan_fsl_Desc_Show" id="chintan_fsl_Desc_Show" <?php echo $chintan_Checked14;?>/>
							<span class="switch-label" data-on="On" data-off="Off"></span> 
							<span class="switch-handle"></span> 
						</label>
					</td>
					<td>
						<input type="text" id="chintan_fsl_Desc_Bg_Color" class="alpha-color-picker" name="chintan_fsl_Desc_Bg_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Desc_Bg_Color;?>">
					</td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="4">Title Settings</td>
				</tr>
				<tr>
					<td>Font Size (px)</td>
					<td>Color</td>
					<td>Font Family</td>
					<td>Text Align</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Title_Font_Size;?>" id="chintan_fsl_Title_Font_Size" name="chintan_fsl_Title_Font_Size" min="8" max="36">
							<span class="range-slider__value" id="chintan_fsl_Title_Font_Size_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" id="chintan_fsl_Title_Color" class="alpha-color-picker" name="chintan_fsl_Title_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Title_Color;?>">
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_fsl_Title_Font_Family" name="chintan_fsl_Title_Font_Family">
							<?php for($i=0;$i<count($Chintan_WebFontCount);$i++){ ?> 
								<?php if($Chintan_WebFontCount[$i]==$chintan_Effect2[0]->chintan_fsl_Title_Font_Family){ ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;" selected><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php } else { ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;"><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php }?>
							<?php }?>
						</select>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_fsl_Title_Text_Align" name="chintan_fsl_Title_Text_Align">
							<option value="left"   <?php if($chintan_Effect2[0]->chintan_fsl_Title_Text_Align=="left"){echo "selected";}?>>   Left   </option>
							<option value="right"  <?php if($chintan_Effect2[0]->chintan_fsl_Title_Text_Align=="right"){echo "selected";}?>>  Right  </option>
							<option value="center" <?php if($chintan_Effect2[0]->chintan_fsl_Title_Text_Align=="center"){echo "selected";}?>> Center </option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="4">Link Settings</td>
				</tr>
				<tr>
					<td>Text</td>
					<td>Border Width (px)</td>
					<td>Border Style</td>
					<td>Border Color</td>
				</tr>
				<tr>
					<td>
						<input type="text" id="chintan_fsl_Link_Text" name="chintan_fsl_Link_Text" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Link_Text;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Link_Border_Width;?>" id="chintan_fsl_Link_Border_Width" name="chintan_fsl_Link_Border_Width" min="0" max="30">
							<span class="range-slider__value" id="chintan_fsl_Link_Border_Width_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_fsl_Link_Border_Style" name="chintan_fsl_Link_Border_Style">
							<option value="none"   <?php if($chintan_Effect2[0]->chintan_fsl_Link_Border_Style=="none"){echo "selected";}?>>   None   </option>
							<option value="solid"  <?php if($chintan_Effect2[0]->chintan_fsl_Link_Border_Style=="solid"){echo "selected";}?>>  Solid  </option>
							<option value="dotted" <?php if($chintan_Effect2[0]->chintan_fsl_Link_Border_Style=="dotted"){echo "selected";}?>> Dotted </option>
							<option value="dashed" <?php if($chintan_Effect2[0]->chintan_fsl_Link_Border_Style=="dashed"){echo "selected";}?>> Dashed </option>
						</select>
					</td>
					<td>
						<input type="text" id="chintan_fsl_Link_Border_Color" class="alpha-color-picker" name="chintan_fsl_Link_Border_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Link_Border_Color;?>">
					</td>
				</tr>
				<tr>
					<td>Font Size (px)</td>
					<td>Color</td>
					<td>Font Family</td>
					<td>Background Color</td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Link_Font_Size;?>" id="chintan_fsl_Link_Font_Size" name="chintan_fsl_Link_Font_Size" min="8" max="36">
							<span class="range-slider__value" id="chintan_fsl_Link_Font_Size_Span">0</span>
						</div>
					</td>
					<td>
						<input type="text" id="chintan_fsl_Link_Color" class="alpha-color-picker" name="chintan_fsl_Link_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Link_Color;?>">
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_fsl_Link_Font_Family" name="chintan_fsl_Link_Font_Family">
							<?php for($i=0;$i<count($Chintan_WebFontCount);$i++){ ?> 
								<?php if($Chintan_WebFontCount[$i]==$chintan_Effect2[0]->chintan_fsl_Link_Font_Family){ ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;" selected><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php } else { ?> 
									<option value="<?php echo $Chintan_WebFontCount[$i];?>" style="font-family: <?php echo $Chintan_WebFontCount[$i];?>;"><?php echo $Chintan_WebFontCount[$i];?></option>
								<?php }?>
							<?php }?>
						</select>
					</td>
					<td>
						<input type="text" id="chintan_fsl_Link_Bg_Color" class="alpha-color-picker" name="chintan_fsl_Link_Bg_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Link_Bg_Color;?>">
					</td>
				</tr>
				<tr>
					<td>Hover Border Color</td>
					<td>Hover Background Color</td>
					<td>Radius (px)</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="text" id="chintan_fsl_Link_Hover_Border_Color" class="alpha-color-picker" name="chintan_fsl_Link_Hover_Border_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Link_Hover_Border_Color;?>">
					</td>
					<td>
						<input type="text" id="chintan_fsl_Link_Hover_Bg_Color" class="alpha-color-picker" name="chintan_fsl_Link_Hover_Bg_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Link_Hover_Bg_Color;?>">
					</td>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Title_Text_Shadow;?>" id="chintan_fsl_Title_Text_Shadow" name="chintan_fsl_Title_Text_Shadow" min="0" max="100">
							<span class="range-slider__value" id="chintan_fsl_Title_Text_Shadow_Span">0</span>
						</div>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>Hover Color</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td>
						<input type="text" id="chintan_fsl_Link_Hover_Color" class="alpha-color-picker" name="chintan_fsl_Link_Hover_Color" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Link_Hover_Color;?>">
					</td>
					<td colspan="3"></td>
				</tr>
				<tr>
					<td colspan="4">Icon Settings</td>
				</tr>
				<tr>
					<td>Icon Size (px)</td>
					<td>Icon Type</td>
					<td>Hover Icon Type</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<div class="range-slider">  
							<input class="range-slider__range" type="range" value="<?php echo $chintan_Effect2[0]->chintan_fsl_Icon_Size;?>" id="chintan_fsl_Icon_Size" name="chintan_fsl_Icon_Size" min="10" max="45">
							<span class="range-slider__value" id="chintan_fsl_Icon_Size_Span">0</span>
						</div>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_fsl_Icon_Type" name="chintan_fsl_Icon_Type">
							<option value="1"  <?php if($chintan_Effect2[0]->chintan_fsl_Icon_Type=="1"){echo "selected";}?>>  Icon 1  </option>
							<option value="2"  <?php if($chintan_Effect2[0]->chintan_fsl_Icon_Type=="2"){echo "selected";}?>>  Icon 2  </option>
							</select>
					</td>
					<td>
						<select class="chintan_web_Select_Menu" id="chintan_fsl_Hover_Icon_Type" name="chintan_fsl_Hover_Icon_Type">
							<option value="1"  <?php if($chintan_Effect2[0]->chintan_fsl_Hover_Icon_Type=="1"){echo "selected";}?>>  Icon 1  </option>
							<option value="2"  <?php if($chintan_Effect2[0]->chintan_fsl_Hover_Icon_Type=="2"){echo "selected";}?>>  Icon 2  </option>
							</select>
					</td>
					<td></td>
				</tr>
			
		</div>
	</div>
</form>