<?php
	define('BASE', '/var/www/html/');
	
	class template {
		protected $html;
		
		function __construct() {
			$this->html = "";
		}
		
		public function getHtml($file, $data) {
			$this->html .= $this->readFile($file, 0);
			$this->html .= $data;
			$this->html .= $this->readFile($file, 1);
		}
		
		public function getHtmlBefore($file) {
			$this->html .= $this->readFile($file, 0);
		}
		
		public function getHtmlAfter($file) {
			$this->html .= $this->readFile($file, 1);
		}
		
		private function readFile($file, $position) {
			$allFile = BASE."/tpl/$file.tpl";
			if(!file_exists($allFile)) return "$allFile doesn't exist\n";
			
			return explode('{divide}', file_get_contents($allFile))[$position];
		}
		
		public function printHtml() {
			return $this->html;
		}
	}
?>
