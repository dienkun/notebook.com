<?php
	class Schedule extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function get_schedule_by_id($id){
			
			$sql='SELECT schedule.day, schedule.begin_time, schedule.end_time, class.id,class.start_date,class.weeks,subject.name,
				room.room_number,room.block
				FROM account,class,schedule,room,subject WHERE account.id=? AND account.id = class.account_id 
				 AND class.room_id=room.id AND class.id=schedule.class_id AND class.subject_id=subject.id;
				';

			$query=$this->db->query($sql,array($id));
				
			if ($query->num_rows()>=1){
				$jsonevents=array();				
				foreach ($query->result_array() as $row){
					$start_date = date_create($row['start_date']);					
					for ($i=0; $i < 7; $i++) { 
						if(date_format($start_date, 'l')==$row['day'])break;
						date_add($start_date, date_interval_create_from_date_string('1 day'));						
					}
					//tìm ngày đầu tiên (tính từ ngày $row->start_date có thứ là $row->day. 
					//Ví dụ $row->start_date là 16/12/2012 và $row->day là sunday thì ngày sunday đầu tiên sau ngày 16/12/2012 là 22/12/2012
					$address = $row['room_number'].' '.$row['block'];

					for($i=0; $i < $row['weeks']; $i++){												
						$begin_time=date_format($start_date, 'Y-m-d').' '.$row['begin_time'];
						$end_time=date_format($start_date, 'Y-m-d').' '.$row['end_time'];						
						$jsonevents[] = array(
						    'id' => $row['id'],
						    'title' => $row['name'].' '.$address,
						    'start' => $begin_time,
						    'end' => $end_time,
						    'allDay' => false						    
						);	
						$start_date=date_add($start_date, date_interval_create_from_date_string('1 weeks'));
					}//tạo cùng 1 sự kiện ở nhiều tuần
										
				}	
				return $jsonevents;
			} 
			return "false";
		}
	}
?>