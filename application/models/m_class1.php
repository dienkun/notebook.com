<?php
	class M_class extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function count_class_by_id($id){
			$sql='SELECT class.id,class.start_date,class.weeks,subject.name,room.room_number,room.block,class.max_student 
				FROM account,class,room,subject 
				WHERE account.id=? AND account.id = class.account_id AND class.room_id=room.id AND class.subject_id=subject.id;';

			$query=$this->db->query($sql,array($id));
			return $query->num_rows();
		}


		public function get_class_by_id($id,$offset,$start){
			
			$sql='SELECT class.id,class.start_date,class.weeks,subject.name,room.room_number,room.block,class.max_student,class.subject_id
				FROM account,class,room,subject 
				WHERE account.id=? AND account.id = class.account_id AND class.room_id=room.id AND class.subject_id=subject.id
				LIMIT ?,?;';

			$query=$this->db->query($sql,array($id,$start,$offset));

			if ($query->num_rows()>=1){
				$class= array();
				foreach ($query->result_array() as $row){
					$class[]=array(
						'subject'=>$row['name'],						
						'room'=>$row['block'].' '.$row['room_number'],
						'start_date'=>$row['start_date'],
						'weeks'=>$row['weeks'],
						'max_student'=>$row['max_student'],
						'id'=>$row['id'],
						'subject_id'=>$row['subject_id']
						);
				}
				return $class;
			} 
			return "false";
		}

		public function get_class_info_by_id($id){
			$sql='SELECT class.id,class.start_date,class.weeks,subject.name,room.room_number,room.block,class.max_student,class.subject_id,class.room_id,class.account_id
				FROM class,room,subject 
				WHERE class.id=? AND class.room_id=room.id AND class.subject_id=subject.id
				';

			$query=$this->db->query($sql,array($id));

			if ($query->num_rows()==1){
				$class= array();
				foreach ($query->result_array() as $row){
					$class[]=array(
						'subject'=>$row['name'],						
						'room'=>$row['block'].' '.$row['room_number'],
						'start_date'=>$row['start_date'],
						'weeks'=>$row['weeks'],
						'max_student'=>$row['max_student'],
						'id'=>$row['id'],
						'subject_id'=>$row['subject_id'],
						'room_id'=>$row['room_id'],
						'account_id'=>$row['account_id']
						);
				}
				return $class;
			} 
			return "false";
		}


		public function edit_class($id,$subject_id,$room_id,$start_date,$weeks,$max_student){
			$data = array(
               'subject_id' => $subject_id,
               'room_id' => $room_id,
               'start_date' => $start_date,
               'max_student' => $max_student,
               'weeks' => $weeks
            );
			$this->db->where('id', $id);
			$this->db->update('class', $data);			
		}

		public function get_room(){
			$sql='SELECT room.id,room.room_number,room.block
				FROM room
				ORDER BY room.block';

			$query=$this->db->query($sql);	

			if ($query->num_rows()>=1){
				$rooms[]= array();
				foreach ($query->result_array() as $row){
					$rooms[]=array(
						'id'=>$row['id'],
						'room'=>$row['block'].' '.$row['room_number']					
						);
				}
				return $rooms;
			} 
			return "false";
		}

		public function get_subject(){
			$sql='SELECT subject.id,subject.name
				FROM subject
				ORDER BY subject.name';

			$query=$this->db->query($sql);	

			if ($query->num_rows()>=1){
				$subjects[]= array();
				foreach ($query->result_array() as $row){
					$subjects[]=array(
						'id'=>$row['id'],
						'name'=>$row['name']						
						);
				}
				return $subjects;
			} 
			return "false";
		}

		public function create_class($account_id,$subject_id,$room_id,$start_date,$weeks,$max_student,$days,$schedule){
			$data=array(
				'account_id'=>$account_id,
				'subject_id'=>$subject_id,
				'room_id'=>$room_id,
				'start_date'=>$start_date,
				'weeks'=>$weeks,
				'max_student'=>$max_student
				);
			$this->db->insert('class', $data);  
			$sql='SELECT MAX(id) as max_id
				FROM class
				';

			$query=$this->db->query($sql);	
			if ($query->num_rows()==1){				
				$schedule1=array();
				foreach ($query->result_array() as $row){					
					for($i=0;$i<$days;$i++){
						$schedule1[]=array(
							'class_id'=>$row['max_id'],
							'day'=>$schedule[$i]['day'],
							'begin_time'=>$schedule[$i]['begin_time'],
							'end_time'=>$schedule[$i]['end_time']
							);
					}
				}
				$this->db->insert_batch('schedule', $schedule1); 		
			} 
			


		}

		public function delete($id){
			$this->db->delete('class', array('id' => $id)); 
		}

		public function delete_schedule($id){
			$this->db->delete('schedule', array('id' => $id)); 
		}

		public function count_schedule_by_id($id){
			$sql='SELECT schedule.id,schedule.day,schedule.begin_time,schedule.end_time
				FROM schedule
				WHERE schedule.class_id=?';

			$query=$this->db->query($sql,array($id));
			return $query->num_rows();
		}



		public function get_schedule_by_class_id($id){
			
			$sql='SELECT schedule.id,schedule.day,schedule.begin_time,schedule.end_time
				FROM schedule
				WHERE schedule.class_id=?
				;';

			$query=$this->db->query($sql,array($id));	

			if ($query->num_rows()>=1){
				$schedule= array();
				foreach ($query->result_array() as $row){
					$schedule[]=array(
						'id'=>$row['id'],
						'day'=>$row['day'],
						'begin_time'=>$row['begin_time'],
						'end_time'=>$row['end_time'],						
						);
				}
				return $schedule;
			} 
			return "false";
		}

		public function get_schedule_by_schedule_id($id){
			
			$sql='SELECT schedule.id,schedule.day,schedule.begin_time,schedule.end_time
				FROM schedule
				WHERE schedule.id=?
				;';

			$query=$this->db->query($sql,array($id));	

			if ($query->num_rows()==1){
				$schedule= array();
				foreach ($query->result_array() as $row){
					$schedule[]=array(
						'id'=>$row['id'],
						'day'=>$row['day'],
						'begin_time'=>$row['begin_time'],
						'end_time'=>$row['end_time'],						
						);
				}
				return $schedule;
			} 
			return "false";
		}
	}
?>