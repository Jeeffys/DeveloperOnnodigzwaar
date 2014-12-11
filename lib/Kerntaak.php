<?php
class Kerntaak {
	// Werkprocessen in kerntaak
	private $werkprocessen = array();

	public function __construct($data) {
		$this->kerntaak = $data;

		$this->titel = $this->kerntaak['@attributes']['titel'];
	}

	public function getTitle() {
		return $this->kerntaak['@attributes']['titel'];
	}

	public function werkprocessen() {

		$aWerkprocessen = array();
		foreach($this->kerntaak['werkprocessen'] as $werkprocessen) {
			foreach($werkprocessen as $werkproces) {
				$aWerkprocessen[] = new Werkproces($werkproces);
			}
		}

		return $aWerkprocessen;
	}
}