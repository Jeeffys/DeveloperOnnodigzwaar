<?php
class Proeven {

	private $proeven = false;
	private $kerntaak;

	public function haalAlleProevenOp() {
		$xmlString = file_get_contents('xml/mediadeveloper.xml');
		$xml = simplexml_load_string($xmlString);
		$json = json_encode($xml);
		$array = json_decode($json, true);

		$this->proeven = $array;
	}

	function alleProeven(){
		if($this->proeven === false)
			$this->haalAlleProevenOp();

		return $this->proeven;
	}

	public function haalVoorPagina($pagina) {
		foreach($this->proeven['kerntaken'] as $kerntaken) {
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
