<?php
class Instructor_model extends CI_model {

	function lista_instructores(){
		 $instructor= $this->db->get('instructor');
		 return $instructor;
	}


	function lista_instructorA(){
		 $this->db->order_by("elinstructor","asc");
		 $instructor= $this->db->get('instructor1');
		 return $instructor;
	}

	function lista_instructorsB(){
		 $this->db->order_by("elinstructor","asc");
		 $instructor= $this->db->get('instructor2');
		 return $instructor;
	}


 	function instructor( $id){
 		$instructor = $this->db->query('select * from instructor where idinstructor="'. $id.'"');
 		return $instructor;
 	}


 	function instructorspersona( $id){
 		$instructor = $this->db->query('select * from instructor where idpersona="'. $id.'"');
 		return $instructor;
 	}



 	function save($array)
 	{
		$this->db->insert("instructor", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idinstructor',$id);
 		$this->db->update('instructor',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idinstructor',$id);
		$this->db->delete('instructor');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idinstructor")->get('instructor');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idinstructor")->get('instructor');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$instructor = $this->db->select("idinstructor")->order_by("idinstructor")->get('instructor')->result_array();
		$arr=array("idinstructor"=>$id);
		$clave=array_search($arr,$instructor);
	   if(array_key_exists($clave+1,$instructor))
		 {

 		$instructor = $this->db->query('select * from instructor where idinstructor="'. $instructor[$clave+1]["idinstructor"].'"');
		 }else{

 		$instructor = $this->db->query('select * from instructor where idinstructor="'. $id.'"');
		 }
		 	
 		return $instructor;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$instructor = $this->db->select("idinstructor")->order_by("idinstructor")->get('instructor')->result_array();
		$arr=array("idinstructor"=>$id);
		$clave=array_search($arr,$instructor);
	   if(array_key_exists($clave-1,$instructor))
		 {

 		$instructor = $this->db->query('select * from instructor where idinstructor="'. $instructor[$clave-1]["idinstructor"].'"');
		 }else{

 		$instructor = $this->db->query('select * from instructor where idinstructor="'. $id.'"');
		 }
		 	
 		return $instructor;
 	}






}
