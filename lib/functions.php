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

class Proeven {

	function proef(){
		$xmlstring = file_get_contents('xml/mediadeveloper.xml');
		$xml = simplexml_load_string($xmlstring);
		$json = json_encode($xml);
		$array = json_decode($json, true);
		return $array;
	}
}
