<?php
class Kerntaken {

	private $kerntaken = false;
	private $kerntaak;

	public function haalAlleKerntakenOp() {
		$xmlString = file_get_contents('xml/mediadeveloper.xml');
		$xml = simplexml_load_string($xmlString);
		$json = json_encode($xml);
		$array = json_decode($json, true);

		$this->kerntaken = xmlstr_to_array($xmlString);
	}

	function alleKerntaken(){
		if($this->kerntaken === false)
			$this->haalAllekerntakenOp();

		return $this->kerntaken;
	}

	public function alles() {
		$array = array();
		foreach($this->kerntaken['kerntaken'] as $kerntaken) {
			foreach($kerntaken as $kerntaak) {
				$array[] = new Proef($kerntaak['@attributes']['titel'], $kerntaken);
			}
		}

		return $array;
	}

	public function haalVoorPagina($pagina) {
		foreach($this->kerntaken['kerntaken'] as $kerntaken) {
			foreach($kerntaken as $kerntaak) {
				if(slugify($kerntaak['@attributes']['titel']) == $pagina) {
					$this->kerntaak = $kerntaak['@attributes']['titel'];
					
					return new Proef($kerntaak['@attributes']['titel'], $kerntaken);
				}
			}
		}

		return array();
	}
}
