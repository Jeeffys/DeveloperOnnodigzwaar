<?php
class Competentie {
	public function __construct($competentie) {
		$this->competentie = $competentie;
	}

	public function getTitle() {
		return $this->competentie['@attributes']['titel'];
	}

	public function vaardigheden() {
		$aVaardigheden = array();

		foreach($this->competentie['vaardigheden'] as $vaardigheden) {
			foreach($vaardigheden as $vaardigheid) {
				$aVaardigheden[] = new Vaardigheid($vaardigheid);
			}
		}

		return $aVaardigheden;
	}
}