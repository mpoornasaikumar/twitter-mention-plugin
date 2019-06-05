<?php
 //Add scripts
  function twitter_add_scripts(){
  	// Add Main CSS
  	wp_enqueue_style('twt-main-style', plugins_url(). '/twitterfollow/css/style.css');
   //Add Main JS
  	wp_enqueue_script('twt-main-script', plugins_url(). '/twitterfollow/js/main.Js'); 

  }

  add_action('wp_enqueue_scripts', 'twitter_add_scripts');
  