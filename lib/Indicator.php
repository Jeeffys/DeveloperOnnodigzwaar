<?php
class Indicator {
	public $indicator;

	public function __construct($indicator) {
		$this->indicator = strip_tags($indicator);
	}
}