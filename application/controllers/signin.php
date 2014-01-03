<?php
	class Signin extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
		}

		public function index(){				
			if($this->session->userdata('account')!=NULL){
				$data['account']=$this->session->userdata('account');			
				$this->load->view('form_index',$data);
			}								
			else $this->load->view('form_signin.php');
		}

		public function submit(){
			$this->load->model('Account');
			$account = $this->Account->sign_in($this -> input -> post('email'),$this -> input -> post('password'));								
			if($account=="false"){		
				$message['login_error']='Email or password is incorrect!';
				$this->load->view('form_signin.php',$message);						
			}				
			else {
				$this->session->set_userdata('account',$account);				
				$data['account']=$account;
				$this->load->view('form_index',$data);
			}
		}

	}
?>