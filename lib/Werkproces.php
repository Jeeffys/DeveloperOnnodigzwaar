<?php
class Werkproces {
	public function __construct($werkproces) {
		$this->werkproces = $werkproces;

		$this->titel = $this->werkproces['@attributes']['titel'];
		$this->volgnummer = $this->werkproces['@attributes']['volgnummer'];
		$this->referentie = $this->werkproces['@attributes']['referentie'];
	}

	public function competenties() {
		$aCompetenties = array();
		foreach($this->werkproces['competenties'] as $competenties) {
			foreach($competenties as $competentie) {
				$aCompetenties[] = new Competentie($competentie);
			}
		}

		return $aCompetenties;
	}
}