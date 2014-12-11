<?php
class Proef {
	private $title;
	private $kerntaken;

	public function __construct($title, $kerntaken) {
		$this->title = $title;
		$this->kerntaken = $kerntaken;
	}

	public function getTitle() {
		return $this->title;
	}

	public function kerntaken() {
		$kerntaken = array();
		foreach($this->kerntaken as $kerntaak) {
			$kerntaken[] = new Kerntaak($kerntaak);
		}

		return $kerntaken;
	}
}