<?php
class Asignatura_model extends CI_model {

	function lista_asignaturas(){
		 $asignatura= $this->db->get('asignatura0');
		 return $asignatura;
	}
	function lista_asignaturas1(){
		 $asignatura= $this->db->order_by("malla asc,area asc,nivel asc,nombre asc")->get('asignatura1');
		 return $asignatura;
	}



	function lista_asignaturasA(){
		 $asignatura= $this->db->order_by("malla asc,area asc,nombre asc")->get('asignatura1');
		 return $asignatura;
	}


 	function asignatura( $id){
 		$asignatura = $this->db->query('select * from asignatura0 where idasignatura="'. $id.'"');
 		return $asignatura;
 	}






 	function asignaturas1( $id){
		if($id>0){
 		$asignatura = $this->db->query('select * from asignatura1 where idasignatura="'. $id.'"');
		}else{
 		$asignatura = $this->db->query('select * from asignatura1');

		}
 		return $asignatura;
 	}


 	function asignaturasm( $idmalla){
 		$asignatura = $this->db->query('select * from asignatura1 where idmalla="'. $idmalla.'" order by idmalla,nivel asc');
 		return $asignatura;
 	}


 	function asignaturaxmalla( $idmalla){
 		$asignatura = $this->db->query('select * from asignatura1 where idmalla="'. $idmalla.'" order by idmalla,nivel asc');
 		return $asignatura;
 	}





 	function save($array)
 	{
		$this->db->insert("asignatura", $array);
		if( $this->db->affected_rows()>0){
			return true;
	   	}else{
			return false;
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idasignatura',$id);
 		$this->db->update('asignatura',$array_item);
	}



 public function quitar($id)
	{
		$this->db->trans_start();
		$condition = "idasignatura =" . $id ;
		$this->db->select('*');
		$this->db->from('asignatura0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 		  	$this->db->where('idasignatura',$id);
				$this->db->update('asignatura', array('eliminado'=>1));
           				 $this->db->trans_complete();
			      		$result=true;
      	}else{	

            $this->db->trans_complete();
			      $result=false;
   	}

	return $result;
 	}







 	public function delete($id)
	{
 		$this->db->where('idasignatura',$id);
		$this->db->delete('asignatura');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idasignatura")->get('asignatura0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idasignatura")->get('asignatura0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$asignatura = $this->db->select("idasignatura0")->order_by("idasignatura")->get('asignatura')->result_array();
		$arr=array("idasignatura"=>$id);
		$clave=array_search($arr,$asignatura);
	   if(array_key_exists($clave+1,$asignatura))
		 {

 		$asignatura = $this->db->query('select * from asignatura0 where idasignatura="'. $asignatura[$clave+1]["idasignatura"].'"');
		 }else{

 		$asignatura = $this->db->query('select * from asignatura0 where idasignatura="'. $id.'"');
		 }
		 	
 		return $asignatura;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$asignatura = $this->db->select("idasignatura")->order_by("idasignatura")->get('asignatura0')->result_array();
		$arr=array("idasignatura"=>$id);
		$clave=array_search($arr,$asignatura);
	   if(array_key_exists($clave-1,$asignatura))
		 {

 		$asignatura = $this->db->query('select * from asignatura0 where idasignatura="'. $asignatura[$clave-1]["idasignatura"].'"');
		 }else{

 		$asignatura = $this->db->query('select * from asignatura0 where idasignatura="'. $id.'"');
		 }
		 	
 		return $asignatura;
 	}
}
