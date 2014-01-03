<?php
	class Account extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function is_account_exist($email){			
			$this->db->select('email');
			$this->db->where("email",$email);			
			$query=$this->db->get('account');
			if ($query->num_rows()==1) return "true";
			return "false";
		}

		public function sign_in($email,$password){
			$this->db->select('id,email,name,level_id');
			$this->db->where('email',$email);
			$this->db->where('password',$password);
			$query=$this->db->get('account');			
			if ($query->num_rows()==1){
				foreach ($query->result_array() as $row){			
					$account['id']=$row['id'];
					$account['email']=$row['email'];
				    $account['name']=$row['name'];
				    $account['level_id']=$row['level_id'];
				}	
				return $account;
			} 
			return "false";
		}

		public function sign_up($email,$password,$name,$level){			
			$data = array(
				'email' => $email,
				'password' => $password,
				'name' => $name,
				'level_id' => $level
				);
			$this->db->insert('account',$data);	
			$this->db->select('id,email,name,level_id');
			$this->db->where('email',$email);
			$this->db->where('password',$password);
			$query=$this->db->get('account');
			foreach ($query->result_array() as $row){			
				$account['id']=$row['id'];
				$account['email']=$row['email'];
			    $account['name']=$row['name'];
			    $account['level_id']=$row['level_id'];
			}	
			return $account;
		}
	}
?>