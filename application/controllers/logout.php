<?php
	class Logout extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			
		}

		public function index(){	
			if($this->session->userdata('account')!=NULL){
				$this->session->sess_destroy();	
				$this->load->view('form_signin');
			}else $this->load->view('form_signin');		

			if($this->session->userdata('account')!=NULL){				
				$this->load->view('form_signin');
			}else $this->load->view('form_signin');
		}	
	}
?>