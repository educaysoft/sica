<?php
class Tutorexamencomplexivo_model extends CI_model {

	function listar_tutorexamencomplexivo(){
		 $tutorexamencomplexivo= $this->db->get('tutorexamencomplexivo');
		 return $tutorexamencomplexivo;
	}

	function listar_tutorexamencomplexivo1(){
		 $tutorexamencomplexivo= $this->db->get('tutorexamencomplexivo1');
		 return $tutorexamencomplexivo;
	}

	function tutorexamencomplexivo2($id){
 		$tutorexamencomplexivo = $this->db->query('select distinct cedula, eltutorexamencomplexivo as eldocente,iddocente from tutorexamencomplexivo1 ');
 		return $tutorexamencomplexivo;
 	}




 	function tutorexamencomplexivo($id){
 		$tutorexamencomplexivo = $this->db->query('select * from tutorexamencomplexivo where idtutorexamencomplexivo="'. $id.'"');
 		return $tutorexamencomplexivo;
 	}

 	function save($array)
 	{
		$condition1 = "idexamencomplexivo =" . "'" . $array['idexamencomplexivo'] . "'";
		$condition2 = "iddocente =" . "'" . $array['iddocente'] . "'";
		$this->db->select('*');
		$this->db->from('tutorexamencomplexivo');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("tutorexamencomplexivo", $array);
			return true;
		}else{
			return false;
		}


 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtutorexamencomplexivo',$id);
 		$this->db->update('tutorexamencomplexivo',$array_item);
	}


  public function delete($id)
	{
 		$this->db->where('idtutorexamencomplexivo',$id);
		$this->db->delete('tutorexamencomplexivo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtutorexamencomplexivo")->get('tutorexamencomplexivo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtutorexamencomplexivo")->get('tutorexamencomplexivo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tutorexamencomplexivo = $this->db->select("idtutorexamencomplexivo")->order_by("idtutorexamencomplexivo")->get('tutorexamencomplexivo')->result_array();
		$arr=array("idtutorexamencomplexivo"=>$id);
		$clave=array_search($arr,$tutorexamencomplexivo);
	   if(array_key_exists($clave+1,$tutorexamencomplexivo))
		 {

 		$tutorexamencomplexivo = $this->db->query('select * from tutorexamencomplexivo where idtutorexamencomplexivo="'. $tutorexamencomplexivo[$clave+1]["idtutorexamencomplexivo"].'"');
		 }else{

 		$tutorexamencomplexivo = $this->db->query('select * from tutorexamencomplexivo where idtutorexamencomplexivo="'. $id.'"');
		 }
		 	
 		return $tutorexamencomplexivo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tutorexamencomplexivo = $this->db->select("idtutorexamencomplexivo")->order_by("idtutorexamencomplexivo")->get('tutorexamencomplexivo')->result_array();
		$arr=array("idtutorexamencomplexivo"=>$id);
		$clave=array_search($arr,$tutorexamencomplexivo);
	   if(array_key_exists($clave-1,$tutorexamencomplexivo))
		 {

 		$tutorexamencomplexivo = $this->db->query('select * from tutorexamencomplexivo where idtutorexamencomplexivo="'. $tutorexamencomplexivo[$clave-1]["idtutorexamencomplexivo"].'"');
		 }else{

 		$tutorexamencomplexivo = $this->db->query('select * from tutorexamencomplexivo where idtutorexamencomplexivo="'. $id.'"');
		 }
		 	
 		return $tutorexamencomplexivo;
 	}






}
