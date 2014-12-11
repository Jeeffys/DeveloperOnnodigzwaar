<?php
class Vaardigheid {
	public function __construct($vaardigheid) {
		$this->vaardigheid = $vaardigheid;
	}

	public function getTitle() {
		return $this->vaardigheid['@attributes']['titel'];
	}
}