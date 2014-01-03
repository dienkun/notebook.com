<?php
	class Signup extends CI_Controller{

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
			else $this->load->view('form_signup.php');					
		}

		public function submit(){
			$this->load->model('Account');
			$result = $this->Account->is_account_exist($this -> input -> post('email'));			
			if($result=="false"){
				$account=$this->Account->sign_up($this -> input -> post('email'),$this -> input -> post('password'),$this -> input -> post('name'),1);
				$this->session->set_userdata('account',$account);
				$data['account']=$account;
				$this->load->view('form_index',$data);
			}				
			else {
				$message['register_error']='This email is already registered, please choose another one.';				
				$this->load->view('form_signup.php',$message);
			}
		}

	}
?>