<?php
$proef = $this->kerntaken->haalVoorPagina($_GET['title']);

$kerntaken = $proef->kerntaken();

$viewWerkprocessen = array();

foreach($kerntaken as $kerntaak) {

	if(slugify($kerntaak->getTitle()) == $_GET['title']) {
		$werkprocessen = $kerntaak->werkprocessen();
		foreach($werkprocessen as $werkproces) {
			$viewWerkprocessen[] = $werkproces;
		}
	}
}

$title = $proef->getTitle();