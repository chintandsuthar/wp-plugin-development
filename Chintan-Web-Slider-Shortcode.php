<?php
	function Chintan_Web_Slider_ID($atts, $content = null)
	{
		$atts=shortcode_atts(
			array(
				"id"=>"1"
			),$atts
		);
		return Chintan_Web_Draw_Short_Slider($atts['id']);
	}
	add_shortcode('Chintan_Web_Slider', 'Chintan_Web_Slider_ID');
	function Chintan_Web_Draw_Short_Slider($Slider_ID)
	{
		ob_start();
			$args = shortcode_atts(array('name' => 'Widget Area','id'=>'','description'=>'','class'=>'','before_widget'=>'','after_widget'=>'','before_title'=>'','AFTER_TITLE'=>'','widget_id'=>'','widget_name'=>'Chintan-Web Slider'), $Slider_ID, 'Chintan_Web_Slider' );
			$Chintan_Web_Photo_Slider=new Chintan_Web_Photo_Slider;

			$instance=array('Chintan_Web_Slider'=>$Slider_ID);
			$Chintan_Web_Photo_Slider->widget($args,$instance);
			$cont[]= ob_get_contents();
		ob_end_clean();
		return $cont[0];
	}
?>