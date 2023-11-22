<?php
class Alumno_model extends CI_model {

	function lista_alumnos(){
		 $alumno= $this->db->get('alumno0');
		 return $alumno;
	}


	function lista_alumnosA(){
		 $this->db->order_by("elalumno","asc");
		 $alumno= $this->db->get('alumno1');
		 return $alumno;
	}

	function lista_alumnosB(){
		 $this->db->order_by("elalumno","asc");
		 $alumno= $this->db->get('alumno2');
		 return $alumno;
	}


 	function alumno( $id){
 		$alumno = $this->db->query('select * from alumno0 where idalumno="'. $id.'"');
 		return $alumno;
 	}


 	function alumno1( $id){
 		$alumno = $this->db->query('select * from alumno1 where idalumno="'. $id.'"');
 		return $alumno;
 	}



 	function alumnospersona( $id){
 		$alumno = $this->db->query('select * from alumno0 where idpersona="'. $id.'"');
 		return $alumno;
 	}



 	function esalumno( $id){
 		$query = $this->db->query('select * from alumno0 where idpersona="'. $id.'"');
		if ($query->num_rows() == 0) {
			return false;
		   }else{
			return true;
		   }
 	}



 	function save($array)
 	{
		$condition2 = "idpersona =" . "'" . $array['idpersona'] . "'";
		$this->db->select('*');
		$this->db->from('alumno0');
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("alumno", $array);
			return true;
		   }else{
			return false;
		   }




 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idalumno',$id);
 		$this->db->update('alumno0',$array_item);
	}
 


 	public function delete($idalumno)
	{

		$condition = "idalumno =" . $idalumno ;
		$this->db->select('*');
		$this->db->from('alumno');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idalumno',$idp);
				$this->db->update('alumno', array('eliminado'=>1));
			$result=true;
		}else{
			$result=false;
		}
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idalumno")->get('alumno0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idalumno")->get('alumno0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$alumno = $this->db->select("idalumno")->order_by("idalumno")->get('alumno0')->result_array();
		$arr=array("idalumno"=>$id);
		$clave=array_search($arr,$alumno);
	   if(array_key_exists($clave+1,$alumno))
		 {

 		$alumno = $this->db->query('select * from alumno0 where idalumno="'. $alumno[$clave+1]["idalumno"].'"');
		 }else{

 		$alumno = $this->db->query('select * from alumno0 where idalumno="'. $id.'"');
		 }
		 	
 		return $alumno;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$alumno = $this->db->select("idalumno")->order_by("idalumno")->get('alumno0')->result_array();
		$arr=array("idalumno"=>$id);
		$clave=array_search($arr,$alumno);
	   if(array_key_exists($clave-1,$alumno))
		 {

 		$alumno = $this->db->query('select * from alumno0 where idalumno="'. $alumno[$clave-1]["idalumno"].'"');
		 }else{

 		$alumno = $this->db->query('select * from alumno0 where idalumno="'. $id.'"');
		 }
		 	
 		return $alumno;
 	}






}
