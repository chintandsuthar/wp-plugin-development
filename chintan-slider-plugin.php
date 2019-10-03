<?php
        /*
		Plugin name: Chintan Slider Plugin
		Plugin URI: https://greenenvsolar.000webhostapp.com/
		Description: This is the slider image plugin which works in responsive mode and the shortcode you can put anywhere on website
		Version: 1.0.0
		Author: Chintan Suthar
		Author URI: https://greenenvsolar.000webhostapp.com/
		License: http://www.gnu.org/licenses/gpl-2.0.html
	*/
	add_action('widgets_init', 'Chintan_Web_Photo_Slider_Widget');
	function Chintan_Web_Photo_Slider_Widget() { register_widget('Chintan_Web_Photo_Slider'); }

	require_once(dirname(__FILE__) . '/Chintan-Web-Slider-Widget.php');
	require_once(dirname(__FILE__) . '/Chintan-Web-Slider-Ajax.php');
	require_once(dirname(__FILE__) . '/Chintan-Web-Slider-Shortcode.php');

	add_action('wp_enqueue_scripts','Chintan_Web_Slider_Style');
	function Chintan_Web_Slider_Style(){
		wp_register_style('Chintan_Web_Photo_Slider', plugins_url('/Style/Chintan-Web-Slider-Widget.css',__FILE__));
		wp_enqueue_style('Chintan_Web_Photo_Slider');
		wp_register_script('Chintan_Web_Photo_Slider',plugins_url('/Scripts/Chintan-Web-Slider-Widget.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_register_script('Chintan_Web_Photo_Slider2',plugins_url('/Scripts/jquery.easing.1.2.js',__FILE__));
		wp_register_script('Chintan_Web_Photo_Slider3',plugins_url('/Scripts/jquery.anythingslider.min.js',__FILE__));
		wp_register_script('Chintan_Web_Photo_Slider4',plugins_url('/Scripts/jquery.colorbox-min.js',__FILE__));
		wp_localize_script('Chintan_Web_Photo_Slider', 'object', array('ajaxurl' => admin_url('admin-ajax.php')));
		wp_enqueue_script('Chintan_Web_Photo_Slider');
		wp_enqueue_script('Chintan_Web_Photo_Slider2');
		wp_enqueue_script('Chintan_Web_Photo_Slider3');
		wp_enqueue_script('Chintan_Web_Photo_Slider4');
		wp_enqueue_script("jquery");
		
		wp_register_style( 'fontawesomeSl-css', plugins_url('/Style/chintanwebicons.css', __FILE__)); 
		wp_enqueue_style( 'fontawesomeSl-css' );
	}
	add_action("admin_menu", 'Chintan_Web_Slider_Admin_Menu' );
	function Chintan_Web_Slider_Admin_Menu() 
	{
		$complete_url = wp_nonce_url( '', 'edit-menu_', 'Chintan_Web_PSlider_Nonce' );
		add_menu_page('Chintan-Web Slider Admin' . $complete_url,'Photo Slider','manage_options','Chintan-Web Slider Admin' . $complete_url,'Manage_Chintan_Web_Slider_Admin',plugins_url('/Images/admin.png',__FILE__));
		add_submenu_page( 'Chintan-Web Slider Admin' . $complete_url, 'Chintan-Web Slider Admin', 'Slider Manager', 'manage_options', 'Chintan-Web Slider Admin' . $complete_url, 'Manage_Chintan_Web_Slider_Admin');
		add_submenu_page( 'Chintan-Web Slider Admin' . $complete_url, 'Chintan-Web Slider General', 'Slider Options', 'manage_options', 'Chintan-Web Slider General' . $complete_url, 'Manage_Chintan_Web_Slider_General');
		
	}
	function Manage_Chintan_Web_Slider_Admin()
	{
		require_once('Chintan-Web-Slider-Admin.php');
		require_once('Style/Chintan-Web-Slider-Admin.css.php');
	}
	function Manage_Chintan_Web_Slider_General()
	{
		require_once('Chintan-Web-Slider-General.php');
		require_once('Scripts/Chintan-Web-Slider-General.js.php');
		require_once('Style/Chintan-Web-Slider-General.css.php');
	}
	function Manage_Chintan_Web_Slider_Products()
	{
		require_once(dirname(__FILE__) . '/Chintan-Web-Products.php');
	}
	add_action('admin_init', 'Chintan_Web_Slider_Admin_Style');
	function Chintan_Web_Slider_Admin_Style()
	{
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		
		wp_register_script('Chintan_Web_Photo_Slider', plugins_url('Scripts/Chintan-Web-Slider-Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Chintan_Web_Photo_Slider', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script('Chintan_Web_Photo_Slider');

		wp_register_style( 'fontawesomeSl-css', plugins_url('/Style/chintanwebicons.css', __FILE__)); 
		wp_enqueue_style( 'fontawesomeSl-css' );
	}

	register_activation_hook(__FILE__,'Ric_Web_Slider_wp_activate');
	function Ric_Web_Slider_wp_activate()
	{
		require_once('Chintan-Web-Slider-Install.php');
	}
	function Chintan_Web_Photo_Slider_Color() {
		wp_enqueue_script(
			'alpha-color-picker',
			plugins_url('/Scripts/alpha-color-picker.js', __FILE__),
			array( 'jquery', 'wp-color-picker' ), // You must include these here.
			null,
			true
		);
		wp_enqueue_style(
			'alpha-color-picker',
			plugins_url('/Style/alpha-color-picker.css', __FILE__),
			array( 'wp-color-picker' ) // You must include these here.
		);
	}
	add_action( 'admin_enqueue_scripts', 'Chintan_Web_Photo_Slider_Color' );
?>
	