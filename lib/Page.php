<?php
class Page {
	private $title;
	private $contents;

	public function setTitle($title) {
		$this->title = $title;

		return $this;
	}

	public function setContent($content) {
		$this->content = $content;

		return $this;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getContent() {
		return $this->content;
	}
}