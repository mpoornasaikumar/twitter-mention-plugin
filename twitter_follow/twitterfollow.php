<?php
/*
Plugin Name: Twitter Follow
Plugin URI: http://mpsktenali.x10host.com/home/
Description: display Twitter Follow button and count
Version: 12.1.0
Author: Poorna
*/ 

// exit if accessed directly
if (!defined('ABSPATH')){
	exit;
}

//load scripts 
require_once(plugin_dir_path(__file__).'/includes/twitterfollow-scripts.php');

//load class 
require_once(plugin_dir_path(__file__).'/includes/twitterfollow-class.php');


//Register widgets
function register_twitterfollow(){
	register_widget('twitter_follow_widget');
}

//hook in function
add_action('widgets_init','register_twitterfollow');