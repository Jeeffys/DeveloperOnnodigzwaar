<?php
class Vaardigheid {
	public function __construct($vaardigheid) {
		$this->vaardigheid = $vaardigheid;

		$this->titel = $this->vaardigheid['@attributes']['titel'];
		$this->referentie = $this->vaardigheid['@attributes']['referentie'];
	}

	public function getTitle() {
		return $this->vaardigheid['@attributes']['titel'];
	}
}