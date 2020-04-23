<?php
/*
Plugin Name: WindowWebRadio Livelog
Description: Shows the chnagelog of wwr
Author: Karim Keshta
Version: 1.0
*/
include('system/protect.php');

add_shortcode('wwr_changelog', 'wwr_changelog');

function load_libs(){
    /*echo '<script src="' . plugins_url("WP-Book-Libary/libs/sweetalert2.min.js") .'"></script>
          <link rel="stylesheet" href="' . plugins_url("WP-Book-Libary/libs/sweetalert2.min.css") . '">';*/
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>';
}

function wwr_changelog(){
	return '<pre class="wp-block-preformatted" style="color:#4cd137;background-color: #2f3640;">' . fetchData() . '</pre>';
}

function fetchData(){
		$json = file_get_contents('##### HERE URL TO API #####');
		$obj = json_decode($json);
		$return = '<h2 style="color:#fbc531;">Windows WebRadio Changelog</h2>';
		foreach($obj->changelog as $line){
			if($line == ""){
				$return = $return . '<br><hr style="border-color:#f5f6fa;">';
			}
			if($line[0] != '-'){
				$return = $return . '<h4 style="color:#00a8ff;">' . $line . '</h4>';
			}else{
				$return = $return . $line . '<br>';
			}
		}
		return $return;
	}