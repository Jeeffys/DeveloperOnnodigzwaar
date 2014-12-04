<?php
class Index {
	function get($key){
		if(isset($_GET[$key]) && !empty($_GET[$key])){
			return $_GET[$key];
		}else{
			return "home";
		}
	}

	function get_pageTitle($page){
		$siteName = 'onnodigzwaar.nl';
		return ucfirst($siteName). ' | ' . ucfirst($page);
	}
	
	function get_content($page){
		switch ($page) {
			case 'Proeve':
				include 'lib/proeve_page.php';
				break;
			case 'contact':
				include 'lib/contact_page.php';
				break;
			default:
				include 'lib/home_page.php';
				break;
		}
	}
}	