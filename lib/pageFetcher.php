<?php
class PageFetcher {
	const DEFAULT_PAGENAME = "Home";

	private $source;
	private $titles = array(
		'proeve' => 'Pagina van de proeve van bekwaamheid'
	);

	private $proeven;
	
	public function __construct(Proeven $proeven) {
		$this->proeven = $proeven;
	}

	public function setSource($source) {
		$this->source = $source;
	}

	public function getSource() {
		return strtolower($this->source);
	}

	public function setPageTitle() {
		if(!isset($this->source)) {
			$this->title = PageFetcher::DEFAULT_PAGENAME;
			return $this->title;
		}
		else {
			if(isset($this->titles[$this->getSource()])) {
				$this->title = $this->titles[$this->getSource()];
			}
			else {
				$this->title = PageFetcher::DEFAULT_PAGENAME;
			}
			return $this->title;
		}
	}

	public function getPageTitle() {
		return $this->title;
	}

	public function getContent() {
		if(!file_exists($this->sourcePath = 'pages/'. $this->source .'.php')) {
			throw new PageFetcherException('File could not be found: '. $this->sourcePath);
		}
		else {
			ob_start();
			if(file_exists($cp = 'controllers/'. $this->getSource() .'Controller.php')) require_once $cp;

			require_once $this->sourcePath;
			return ob_get_clean();
		}
	}

	public function fetch() {
		$this->setPageTitle();
		$title = $this->getPageTitle();

		$content = $this->getContent();

		$this->page = (new Page)->setTitle($title)->setContent($content);

		return $this->page;
	}
	
	function get_content($page){
		switch ($page) {
			case 'Proeve':
				include 'lib/proeve_page.php';
				break;
			case 'contact':
				include 'lib/contact_page.php';
				break;
			default:
				include 'lib/home_page.php';
				break;
		}
	}
}

class PageFetcherException extends Exception{}