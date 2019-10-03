<?php
	if(!defined('ABSPATH')) exit;
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
?>
<style type="text/css">
	.Chintan_Web_Header_Main { position:relative; width: 99%; height: 140px; background: #6ecae9; margin-top: 30px; text-align: left; }
	.Chintan_Web_Header_Main img { position: relative; width: 222px; }
	.Chintan_Web_Header_Contacts { position: relative; margin-top: 12px; font-size: 16px; padding: 10px; } 
	.Chintan_Web_Header_Contacts a { text-decoration: none; color: #fff; margin-left: 10px; padding: 5px 7px; border-radius: 5px; background-color: #6ecae9; box-shadow: 0px 0px 10px #30a9d1; border: 1px solid #30a9d1; }
	.Chintan_Web_Header_Contacts a:hover { background-color: #30a9d1; color: #ffffff; box-shadow: 0px 0px 10px #30a9d1; }
</style>
<div class='Chintan_Web_Header_Main'>
	<h2>Chinta Slider</h2>
	
</div>