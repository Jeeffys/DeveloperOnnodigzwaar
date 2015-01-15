<?php
class Competentie {
	public function __construct($competentie) {
		$this->competentie = $competentie;

		$this->titel = $this->competentie['@attributes']['titel'];
		$this->code = $this->competentie['@attributes']['code'];
		$this->referentie = $this->competentie['@attributes']['referentie'];
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

	public function indicator() {
		return new Indicator($this->competentie['indicator']);
	}
}