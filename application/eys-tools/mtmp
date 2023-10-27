<?php
class Distributivodocente_model extends CI_model {

	function lista_distributivodocentes(){
		 $distributivodocente= $this->db->get('distributivodocente0');
		 return $distributivodocente;
	}


	function lista_distributivodocentesA(){
		 $distributivodocente= $this->db->get('distributivodocente1');
		 return $distributivodocente;
	}



 	function distributivodocente( $id){
 		$distributivodocente = $this->db->query('select * from distributivodocente0 where iddistributivodocente="'. $id.'"');
 		return $distributivodocente;
	}



 	function distributivodocente_pado( $idperiodoacademico,$iddocente){
 		$distributivodocente = $this->db->query('select * from distributivodocente1 where idperiodoacademico="'. $idperiodoacademico.'" and iddocente="'.$iddocente.'"');
 		return $distributivodocente;
	}


	function distributivodocentes1( $id){
 		$distributivodocente = $this->db->query('select * from distributivodocente1 where iddistributivo="'. $id.'"');
 		return $distributivodocente;
 	}


	function distributivodocentes2($id){
 		$distributivodocente = $this->db->query('select * from distributivodocente1 where iddistributivodocente="'. $id.'"');
 		return $distributivodocente;
 	}



 	function distributivodocentespersona( $id){
 		$distributivodocente = $this->db->query('select * from distributivodocente0 where idpersona="'. $id.'"');
 		return $distributivodocente;
 	}



 	function save($array)
 	{
		$this->db->select('*');
		$this->db->from('distributivodocente0');
		$condition = "iddocente =" .  $array['iddocente'] ;
		$this->db->where($condition);
		$condition = "iddistributivo =" . $array['iddistributivo'];
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0){
			$this->db->insert("distributivodocente", $array);
			return true;
		}else{
			return false;
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddistributivodocente',$id);
 		$this->db->update('distributivodocente0',$array_item);
	}
 


 	public function quitar($id)
	{
		$condition = "iddistributivodocente =" . $id ;
		$this->db->select('*');
		$this->db->from('distributivodocente0');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	

 			$this->db->where('iddistributivodocente',$id);
			$this->db->update('distributivodocente',array('eliminado'=>1));
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
		$query=$this->db->order_by("iddistributivodocente")->get('distributivodocente0');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddistributivodocente")->get('distributivodocente0');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$distributivodocente = $this->db->select("iddistributivodocente")->order_by("iddistributivodocente")->get('distributivodocente0')->result_array();
		$arr=array("iddistributivodocente"=>$id);
		$clave=array_search($arr,$distributivodocente);
	   if(array_key_exists($clave+1,$distributivodocente))
		 {

 		$distributivodocente = $this->db->query('select * from distributivodocente0 where iddistributivodocente="'. $distributivodocente[$clave+1]["iddistributivodocente"].'"');
		 }else{

 		$distributivodocente = $this->db->query('select * from distributivodocente0 where iddistributivodocente="'. $id.'"');
		 }
		 	
 		return $distributivodocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$distributivodocente = $this->db->select("iddistributivodocente")->order_by("iddistributivodocente")->get('distributivodocente0')->result_array();
		$arr=array("iddistributivodocente"=>$id);
		$clave=array_search($arr,$distributivodocente);
	   if(array_key_exists($clave-1,$distributivodocente))
		 {

 		$distributivodocente = $this->db->query('select * from distributivodocente0 where iddistributivodocente="'. $distributivodocente[$clave-1]["iddistributivodocente"].'"');
		 }else{

 		$distributivodocente = $this->db->query('select * from distributivodocente0 where iddistributivodocente="'. $id.'"');
		 }
		 	
 		return $distributivodocente;
 	}






}
