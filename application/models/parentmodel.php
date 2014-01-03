<?php
class ParentModel extends CI_Model {
 
	private $tbl_parent= 'film';
 
	public function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
	function count_all(){
		return $this->db->count_all($this->tbl_parent);
	}
 
	function count_all_search($searchparams){		
		$this->db->like($searchparams,'','after');		
		$this->db->from($this->tbl_parent);		
		return $this->db->count_all_results();		
	}
 
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('id','asc');
		$data=$this->db->get($this->tbl_parent, $limit, $offset);
		return $data->result_array();
	}
 
	function get_search_pagedlist($searchparams,$limit = 10, $offset = 0){
 
		$this->db->like($searchparams,'','after');		
 		$data=$this->db->get($this->tbl_parent, $limit, $offset);
		return $data->result_array();
	}
 
}
?>