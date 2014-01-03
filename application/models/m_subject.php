<?php
	class M_subject extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}
		public function get_subject($offset,$start){
			$sql='SELECT *
				FROM subject 				
				LIMIT ?,?;';

			$query=$this->db->query($sql,array($start,$offset));

			if ($query->num_rows()>=1){
				$subjects= array();
				foreach ($query->result_array() as $row){
					$subjects[]=array(
						'id'=>$row['id'],
						'name'=>$row['name'],												
						'credit'=>$row['credit']													
						);
				}
				return $subjects;
			} 
			return "false";
		}
	}
?>	