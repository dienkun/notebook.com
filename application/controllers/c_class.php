<?php
	class C_class extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper('url');		
			$this->load->library('session');	
			$this->load->model('M_class');
		}
		public function index(){	
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');	
			else {
				$config['base_url']   = base_url(). "index.php/c_class/index";
		    	$config['total_rows'] = $this->M_class->count_class_by_id($this->session->userdata('account')['id']);
		    	$config['per_page']   = 15;
		    	$config['first_link']= '<i class=\"fa fa-angle-double-left\"></i>';
		    	$config['first_tag_open']='<li>';
		    	$config['first_tag_close']='</li>';
		    	$config['last_link']= '<i class=\"fa fa-angle-double-right\"></i>';
		    	$config['last_tag_open']='<li>';
		    	$config['last_tag_close']='</li>';
		    	$config['cur_tag_open']='<li class=\"active\">';
		    	$config['cur_tag_close']='</li>';
		    	$config['num_tag_open'] = '<li>';
		    	$config['num_tag_close'] = '</li>';

							
				$start = $this->uri->segment(3);
				$this->load->library("pagination",$config);
				$data['pagination'] = $this->pagination->create_links();
				$data['account']=$this->session->userdata('account');
				$data['class_info'] = $this->M_class->get_class_by_id($this->session->userdata('account')['id'],$config['per_page'],$start);					
				$this->load->view('form_class',$data);
			}		
			//$class_info = $this->M_class->get_class_by_id(1,15,0);					
			
						
			/*
			if($this->input->post("ajax")){
				$this->load->view("paging_view",$data);	
			}else{
				$this->load->view("paging_view",$data);	
			}
			*/						
		}


		public function detail_class(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');
			$id=$this->uri->segment(3);
			$data['account']=$this->session->userdata('account');
			$data['schedule']=$this->M_class->get_schedule_by_class_id($id);
			$data['id']=$id;
			$this->load->view('form_detail_class',$data);
		}

		public function edit_class(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');
			$id=$this->uri->segment(3);
			$data['account']=$this->session->userdata('account');
			$data['class_info']=$this->M_class->get_class_info_by_id($id);
			$data['subjects']=$this->M_class->get_subject();
			$data['rooms']=$this->M_class->get_room();


			$this->load->view('form_edit_class',$data);
		}

		public function edit_class_submit(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');
			$class_id=$_POST["class_id"];
			$subject_id=$_POST["subject_id"];
			$room_id=$_POST["room_id"];
			$start_date=$_POST["start_date"];
			$weeks=$_POST["weeks"];
			$max_student=$_POST["max_student"];
			$this->M_class->edit_class($class_id,$subject_id,$room_id,$start_date,$weeks,$max_student);
			$this->index();
			echo $class_id;
			echo $subject_id;
			//$=$_POST[""];			
		}

		public function create_class(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');
			$data['account']=$this->session->userdata('account');
			$data['subjects']=$this->M_class->get_subject();
			$data['rooms']=$this->M_class->get_room();
			$this->load->view('form-create-class',$data);
		}

		public function check_time($class_id,$day,$beginHour,$beginMin,$endHour,$endMin,$schedule_id=0){
			$data= $this->M_class->get_all_class_info($schedule_id);
		    $class_info= $this->M_class->get_class_info_by_id($class_id);
		    $start_date = date_create($class_info['start_date']);
		    $end_date = date_add($start_date, date_interval_create_from_date_string($class_info["weeks"].' weeks'));
		    //$error="false";
		    $coincide_class=array();
		    for ($i=0; $i < count($data); $i++) { 
		      if($class_info["room"]!=$data[$i]["room"]) continue;
		      if($day!=$data[$i]["day"]) continue;
		      $s_date = date_create($data[$i]['start_date']);
		      if($end_date < $s_date) continue;
		      $e_date = date_add($start_date, date_interval_create_from_date_string($data[$i]["weeks"].' weeks'));
		      if($e_date < $start_date) continue;
		      if($endHour < $data[$i]["beginHour"]) continue;
		      else if($endHour == $data[$i]["beginHour"] && $endMin <= $data[$i]["beginMin"]) continue;
		      else {
		        $coincide_class[]=$data[$i];
		        continue;
		      }

		      if($data[$i]["endHour"] < $beginHour) continue;
		      else if($data[$i]["endHour"] == $beginHour && $data[$i]["endMin"] <= $endMin) continue;
		      else {
		        $coincide_class[]=$data[$i];
		        continue;
		      }
		    }
		    return $coincide_class;
		}

		
		public function delete(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');
			$id_class=$_POST["class_id"];
			$this->M_class->delete($id_class);
			echo "success";
		}

		public function delete_schedule(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');
			$id_class=$_POST["class_id"];
			$this->M_class->delete_schedule($id_class);
			echo "success";
		}

		public function insert_schedule(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');			
			$id=$this->uri->segment(3);
			$data['account']=$this->session->userdata('account');
			$data['id']=$id;
			$this->load->view('form_create_schedule',$data);
		}

		public function make_error_message($coincide_class){
			$error = "<p style=\"color:red;\"> Coincide with:<br><ul>";
			for ($i=0; $i < count($coincide_class); $i++) { 
				$error=$error."<li>";
				$error=$error." class:".$coincide_class[$i]["name"]."&nbsp;&nbsp;start_date:".$coincide_class[$i]["start_date"];
				$error=$error."&nbsp;&nbsp;weeks:".$coincide_class[$i]["weeks"]."&nbsp;&nbsp;room:".$coincide_class[$i]["room"];
				$error=$error."&nbsp;&nbsp;day:".$coincide_class[$i]["day"]."&nbsp;&nbsp;begin_time:".$coincide_class[$i]["beginHour"].":".$coincide_class[$i]["beginMin"];
				$error=$error."&nbsp;&nbsp;end_time:".$coincide_class[$i]["endHour"].":".$coincide_class[$i]["endMin"];
				$error=$error."</li>";
			}
			$error=$error."</ul></p>";
			return $error;
		}

		public function edit_schedule(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');			
			$class_id=$this->uri->segment(3);
			$schedule_id=$this->uri->segment(4);
			$data['account']=$this->session->userdata('account');						
			$data['class_id']=$class_id;
			$data['schedule_id']=$schedule_id;
			$data['schedule']=$this->M_class->get_schedule_by_schedule_id($schedule_id);			
			$this->load->view('form_edit_schedule',$data);
		}

		public function edit_schedule_submit(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');

			if($_POST['beginHour']<10) 
				$beginHour='0'.$_POST['beginHour'];
			else $beginHour=$_POST['beginHour'];

			if($_POST['beginMin']<10) 
				$beginMin='0'.$_POST['beginMin'];
			else $beginMin=$_POST['beginMin'];

			if($_POST['endHour']<10) 
				$endHour='0'.$_POST['endHour'];
			else $endHour=$_POST['endHour'];

			if($_POST['endMin']<10) 
				$endMin='0'.$_POST['endMin'];
			else $endMin=$_POST['endMin'];

			$day=$_POST['dayofweek'];
			$class_id=$_POST['class_id'];
			$schedule_id=$_POST['schedule_id'];

			$data['account']=$this->session->userdata('account');
			$coincide_class=$this->check_time($class_id,$day,$beginHour,$beginMin,$endHour,$endMin,$schedule_id);

			if(count($coincide_class)==0){
				$this->M_class->edit_schedule($schedule_id,$class_id,$day,$beginHour.":".$beginMin.":00",$endHour.":".$endMin.":00");
				$data['schedule']=$this->M_class->get_schedule_by_class_id($class_id);
				$data['id']=$class_id;				
				$this->load->view('form_detail_class',$data);				
			}				
			else {
				$error=$this->make_error_message($coincide_class);
				$data['error']=$error;
				$data['class_id']=$class_id;
				$data['schedule_id']=$schedule_id;
				$data['schedule']=$this->M_class->get_schedule_by_schedule_id($schedule_id);
				$this->load->view('form_edit_schedule',$data);
			}
						
		}

		public function insert_schedule_submit(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');

			if($_POST['beginHour']<10) 
				$beginHour='0'.$_POST['beginHour'];
			else $beginHour=$_POST['beginHour'];

			if($_POST['beginMin']<10) 
				$beginMin='0'.$_POST['beginMin'];
			else $beginMin=$_POST['beginMin'];

			if($_POST['endHour']<10) 
				$endHour='0'.$_POST['endHour'];
			else $endHour=$_POST['endHour'];

			if($_POST['endMin']<10) 
				$endMin='0'.$_POST['endMin'];
			else $endMin=$_POST['endMin'];

			$day=$_POST['dayofweek'];
			$id=$_POST['id'];
			$data['account']=$this->session->userdata('account');
			$coincide_class=$this->check_time($id,$day,$beginHour,$beginMin,$endHour,$endMin);

			if(count($coincide_class)==0){
				$this->M_class->insert_schedule($id,$day,$beginHour.":".$beginMin.":00",$endHour.":".$endMin.":00");
				$data['schedule']=$this->M_class->get_schedule_by_class_id($id);
				$data['id']=$id;				
				$this->load->view('form_detail_class',$data);				
			}				
			else {
				$error=$this->make_error_message($coincide_class);
				$data['error']=$error;
				$data['id']=$id;								
				$this->load->view('form_create_schedule',$data);
			}
						
		}

		public function create_class_submit(){
			if($this->session->userdata('account')==NULL)
				$this->load->view('form_signin');
			$account_id=$this->session->userdata('account')['id'];
			$subject_id=$_POST['subject_id'];
			$room_id=$_POST['room_id'];
			$start_date=$_POST['start_date'];
			$weeks=$_POST['weeks'];
			$max_student=$_POST['max_student'];
			$days=$_POST['days'];
			$schedule=array();

			for($i=1;$i<=$days;$i++){
				if($_POST['beginHour'.$i]<10) $_POST['beginHour'.$i]='0'.$_POST['beginHour'.$i];
				if($_POST['beginMin'.$i]<10) $_POST['beginMin'.$i]='0'.$_POST['beginMin'.$i];
				if($_POST['endHour'.$i]<10) $_POST['endHour'.$i]='0'.$_POST['endHour'.$i];
				if($_POST['endMin'.$i]<10) $_POST['endMin'.$i]='0'.$_POST['endMin'.$i];
				$schedule[]=array(
					'day'=>$_POST['dayofweek'.$i],
					'begin_time'=>$_POST['beginHour'.$i].':'.$_POST['beginMin'.$i].':00',					
					'end_time'=>$_POST['endHour'.$i].':'.$_POST['endMin'.$i].':00'					
					);
			}
			$this->M_class->create_class($account_id,$subject_id,$room_id,$start_date,$weeks,$max_student,$days,$schedule);
			$this->index();
			
		}


	}						

?>

