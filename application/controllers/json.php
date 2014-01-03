<?php
	class Json extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
		if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');			
			$this->load->model("Schedule");
			$data = $this->Schedule->get_schedule_by_id($this->session->userdata('account')['id']);
			/*echo "<pre>";
			print_r($data);
			echo "</pre>";*/
			echo json_encode($data);
			/*
			$year = date('Y');
			$month = date('m');			
			echo json_encode(array(	
				array(
					'id' => 111,
					'allDay' => false,
					'title' => "Event1 ",
					'start' => '2013-12-16 12:00:00',
					'end'=> '2013-12-16 14:00:00',					
					'url' => "http://yahoo.com/"
				),
				
				array(
					'id' => 222,
					'title' => "Event2",
					'allDay' => false,
					'start' => '2013-12-17 15:00:00',
					'end' => '2013-12-17 19:00:00',
					'url' => "http://yahoo.com/"
				)				
			));		
			*/
		}
	}						

?>
