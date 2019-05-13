<?php
class controller {

	protected $db;

	public function __construct() {
		global $config;
		$this->db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
	}
	
	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		// include 'views/'.$viewName.'.php';
		include $viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		// include 'views/template.php';
		include './template.php';
	}

	public function Template($viewName, $viewData) {
		extract($viewData);
		include 'views/'.$viewName.'.php';
	}
	public function loadViewInTemplate($viewName, $viewData) {
		extract($viewData);
		include $viewName.'.php';
		include 'home.php';
	}
	public function loadLibrary($lib) {
		if(file_exists('libraries/'.$lib.'.php')) {
			include 'libraries/'.$lib.'.php';
		}
	}
}