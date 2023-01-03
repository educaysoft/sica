<?php
class Distributivodocente_model extends CI_model {

	function lista_distributivodocentes(){
		 $distributivodocente= $this->db->get('distributivodocente');
		 return $distributivodocente;
	}


	function lista_distributivodocentesA(){
		 $distributivodocente= $this->db->get('distributivodocente1');
		 return $distributivodocente;
	}



 	function distributivodocente( $id){
 		$distributivodocente = $this->db->query('select * from distributivodocente where iddistributivodocente="'. $id.'"');
 		return $distributivodocente;
 	}


 	function distributivodocentespersona( $id){
 		$distributivodocente = $this->db->query('select * from distributivodocente where idpersona="'. $id.'"');
 		return $distributivodocente;
 	}



 	function save($array)
 	{
		$this->db->select('*');
		$this->db->from('distributivodocente');
		$condition = "iddocente =" . "'" . $array['iddocente'] . "'";
		$this->db->where($condition);
		$condition = "idperiodoacademico =" . "'" . $array['idperiodoacademico'] . "'";
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("distributivodocente", $array);
			return true;
		}else{
			return false;
		}
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('iddistributivodocente',$id);
 		$this->db->update('distributivodocente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('iddistributivodocente',$id);
		$this->db->delete('distributivodocente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("iddistributivodocente")->get('distributivodocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("iddistributivodocente")->get('distributivodocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$distributivodocente = $this->db->select("iddistributivodocente")->order_by("iddistributivodocente")->get('distributivodocente')->result_array();
		$arr=array("iddistributivodocente"=>$id);
		$clave=array_search($arr,$distributivodocente);
	   if(array_key_exists($clave+1,$distributivodocente))
		 {

 		$distributivodocente = $this->db->query('select * from distributivodocente where iddistributivodocente="'. $distributivodocente[$clave+1]["iddistributivodocente"].'"');
		 }else{

 		$distributivodocente = $this->db->query('select * from distributivodocente where iddistributivodocente="'. $id.'"');
		 }
		 	
 		return $distributivodocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$distributivodocente = $this->db->select("iddistributivodocente")->order_by("iddistributivodocente")->get('distributivodocente')->result_array();
		$arr=array("iddistributivodocente"=>$id);
		$clave=array_search($arr,$distributivodocente);
	   if(array_key_exists($clave-1,$distributivodocente))
		 {

 		$distributivodocente = $this->db->query('select * from distributivodocente where iddistributivodocente="'. $distributivodocente[$clave-1]["iddistributivodocente"].'"');
		 }else{

 		$distributivodocente = $this->db->query('select * from distributivodocente where iddistributivodocente="'. $id.'"');
		 }
		 	
 		return $distributivodocente;
 	}






}
