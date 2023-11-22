<?php
class Movilidadalumno_model extends CI_model {

	function lista_movilidadalumnos(){
		 $movilidadalumno= $this->db->get('movilidadalumno0');
		 return $movilidadalumno;
	}


	function lista_movilidadalumnosA(){
		 $this->db->order_by("idmovilidadalumno","asc");
		 $movilidadalumno= $this->db->get('movilidadalumno1');
		 return $movilidadalumno;
	}

	function lista_movilidadalumnosB(){
		 $this->db->order_by("elmovilidadalumno","asc");
		 $movilidadalumno= $this->db->get('movilidadalumno2');
		 return $movilidadalumno;
	}


 	function movilidadalumno( $id){
 		$movilidadalumno = $this->db->query('select * from movilidadalumno0 where idmovilidadalumno="'. $id.'"');
 		return $movilidadalumno;
 	}


 	function movilidadalumno1( $id){
 		$movilidadalumno = $this->db->query('select * from movilidadalumno1 where idmovilidadalumno="'. $id.'"');
 		return $movilidadalumno;
 	}



 	function movilidadalumnospersona( $id){
 		$movilidadalumno = $this->db->query('select * from movilidadalumno0 where idpersona="'. $id.'"');
 		return $movilidadalumno;
 	}



 	function esmovilidadalumno( $id){
 		$query = $this->db->query('select * from movilidadalumno0 where idpersona="'. $id.'"');
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
		$this->db->from('movilidadalumno0');
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("movilidadalumno", $array);
			return true;
		   }else{
			return false;
		   }




 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmovilidadalumno',$id);
 		$this->db->update('movilidadalumno0',$array_item);
	}
 


 	public function delete($idmovilidadalumno)
	{

		$condition = "idmovilidadalumno =" . $idmovilidadalumno ;
		$this->db->select('*');
		$this->db->from('movilidadalumno');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idmovilidadalumno',$idp);
				$this->db->update('movilidadalumno', array('eliminado'=>1));
			$result=true;
		}else{
			$result=false;
		}
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmovilidadalumno")->get('movilidadalumno0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmovilidadalumno")->get('movilidadalumno0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$movilidadalumno = $this->db->select("idmovilidadalumno")->order_by("idmovilidadalumno")->get('movilidadalumno0')->result_array();
		$arr=array("idmovilidadalumno"=>$id);
		$clave=array_search($arr,$movilidadalumno);
	   if(array_key_exists($clave+1,$movilidadalumno))
		 {

 		$movilidadalumno = $this->db->query('select * from movilidadalumno0 where idmovilidadalumno="'. $movilidadalumno[$clave+1]["idmovilidadalumno"].'"');
		 }else{

 		$movilidadalumno = $this->db->query('select * from movilidadalumno0 where idmovilidadalumno="'. $id.'"');
		 }
		 	
 		return $movilidadalumno;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$movilidadalumno = $this->db->select("idmovilidadalumno")->order_by("idmovilidadalumno")->get('movilidadalumno0')->result_array();
		$arr=array("idmovilidadalumno"=>$id);
		$clave=array_search($arr,$movilidadalumno);
	   if(array_key_exists($clave-1,$movilidadalumno))
		 {

 		$movilidadalumno = $this->db->query('select * from movilidadalumno0 where idmovilidadalumno="'. $movilidadalumno[$clave-1]["idmovilidadalumno"].'"');
		 }else{

 		$movilidadalumno = $this->db->query('select * from movilidadalumno0 where idmovilidadalumno="'. $id.'"');
		 }
		 	
 		return $movilidadalumno;
 	}






}
