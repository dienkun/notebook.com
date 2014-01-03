<?php

class Index extends CI_Controller {
  // just returns time
	public function __construct(){
			parent::__construct();
	}

  public function index()
  {
    $this->load->model('M_subject');
    $data=$this->M_subject->get_subject(15,0);
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    /*
  	$this->load->model('M_class');
    $day="Saturday";
    $beginHour="15";
    $endHour="17";
    $beginMin="20";
    $endMin="30";
  	$data= $this->M_class->get_all_class_info();
    $class_info= $this->M_class->get_class_info_by_id(3);
    $start_date = date_create($class_info['start_date']);
    $end_date = date_add($start_date, date_interval_create_from_date_string($class_info["weeks"].' weeks'));
    $error="false";

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
    echo "<pre>";
    print_r($coincide_class);
    echo "</pre>";

    echo count(array());
    */
  } 
  
}
?>