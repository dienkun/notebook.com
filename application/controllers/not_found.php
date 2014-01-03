<?php
	class Not_found extends CI_Controller {		
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
		}
		public function index(){		
			$this->load->view('404.html');
		}		
	}
?>