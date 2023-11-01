<?php
class Asignaturadeldocente_model extends CI_model {

	function lista_asignaturadeldocentes(){
		 $asignaturadeldocente= $this->db->get('asignaturadeldocente0');
		 return $asignaturadeldocente;
	}


	function lista_asignaturadeldocentesA($id){
		if($id>0)
		{
			$this->db->where('iddocente',$id);
		}
		
		
		$asignaturadeldocente= $this->db->get('asignaturadeldocente1');
		 return $asignaturadeldocente;
	}



 	function asignaturadeldocente( $id){
 		$asignaturadeldocente = $this->db->query('select * from asignaturadeldocente0 where idasignaturadeldocente="'. $id.'"');
 		return $asignaturadeldocente;
	}



 	function asignaturadeldocente_pado( $idperiodoacademico,$iddocente){
 		$asignaturadeldocente = $this->db->query('select * from asignaturadeldocente1 where idperiodoacademico="'. $idperiodoacademico.'" and iddocente="'.$iddocente.'"');
 		return $asignaturadeldocente;
	}


	function asignaturadeldocentes1( $id){
 		$asignaturadeldocente = $this->db->query('select * from asignaturadeldocente1 where iddistributivo="'. $id.'"');
 		return $asignaturadeldocente;
 	}


	function asignaturadeldocentes2($id){
 		$asignaturadeldocente = $this->db->query('select * from asignaturadeldocente1 where idasignaturadeldocente="'. $id.'"');
 		return $asignaturadeldocente;
 	}



 	function asignaturadeldocentespersona( $id){
 		$asignaturadeldocente = $this->db->query('select * from asignaturadeldocente0 where idpersona="'. $id.'"');
 		return $asignaturadeldocente;
 	}



 	function save($array)
 	{
		$this->db->select('*');
		$this->db->from('asignaturadeldocente0');
		$condition = "iddocente =" .  $array['iddocente'] ;
		$this->db->where($condition);
		$condition = "idasignatura =" . $array['idasignatura'];
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			$this->db->insert("asignaturadeldocente", $array);
			return true;
		}else{
			return false;
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idasignaturadeldocente',$id);
 		$this->db->update('asignaturadeldocente0',$array_item);
	}
 


 	public function quitar($id)
	{
		$condition = "idasignaturadeldocente =" . $id ;
		$this->db->select('*');
		$this->db->from('asignaturadeldocente0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	

 			$this->db->where('idasignaturadeldocente',$id);
			$this->db->update('asignaturadeldocente',array('eliminado'=>1));
    			if($this->db->affected_rows()==1)
				$result=true;
			else
				$result=false;
		}else{	
			      $result=false;
   		}

		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idasignaturadeldocente")->get('asignaturadeldocente0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idasignaturadeldocente")->get('asignaturadeldocente0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$asignaturadeldocente = $this->db->select("idasignaturadeldocente")->order_by("idasignaturadeldocente")->get('asignaturadeldocente0')->result_array();
		$arr=array("idasignaturadeldocente"=>$id);
		$clave=array_search($arr,$asignaturadeldocente);
	   if(array_key_exists($clave+1,$asignaturadeldocente))
		 {

 		$asignaturadeldocente = $this->db->query('select * from asignaturadeldocente0 where idasignaturadeldocente="'. $asignaturadeldocente[$clave+1]["idasignaturadeldocente"].'"');
		 }else{

 		$asignaturadeldocente = $this->db->query('select * from asignaturadeldocente0 where idasignaturadeldocente="'. $id.'"');
		 }
		 	
 		return $asignaturadeldocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$asignaturadeldocente = $this->db->select("idasignaturadeldocente")->order_by("idasignaturadeldocente")->get('asignaturadeldocente0')->result_array();
		$arr=array("idasignaturadeldocente"=>$id);
		$clave=array_search($arr,$asignaturadeldocente);
	   if(array_key_exists($clave-1,$asignaturadeldocente))
		 {

 		$asignaturadeldocente = $this->db->query('select * from asignaturadeldocente0 where idasignaturadeldocente="'. $asignaturadeldocente[$clave-1]["idasignaturadeldocente"].'"');
		 }else{

 		$asignaturadeldocente = $this->db->query('select * from asignaturadeldocente0 where idasignaturadeldocente="'. $id.'"');
		 }
		 	
 		return $asignaturadeldocente;
 	}






}
