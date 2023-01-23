<?php
class Jornadadocente_model extends CI_model {

	function lista_jornadadocentes(){
		 $jornadadocente= $this->db->get('jornadadocente');
		 return $jornadadocente;
	}


	function lista_jornadadocentesA(){
		 $jornadadocente= $this->db->get('jornadadocente1');
		 return $jornadadocente;
	}



 	function jornadadocente( $id){
 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $id.'"');
 		return $jornadadocente;
 	}


 	function jornadadocentes( $idasignaturadocente){
 		$jornadadocente = $this->db->query('select * from jornadadocente1 where idasignaturadocente="'. $idasignaturadocente.'"');
 		return $jornadadocente;
 	}



 	function save($array)
 	{

		$condition1 = "idasignaturadocente =" . "'" . $array['idasignaturadocente'] . "'";
		$condition2 = "iddiasemana =" . "'" . $array['iddiasemana'] . "'";
		$condition3 = "horainicio =" . "'" . $array['horainicio'] . "'";
		$this->db->select('*');
		$this->db->from('docente');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->where($condition3);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("jornadadocente", $array);
			return true;
		   }else{
			return false;
		   }
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idjornadadocente',$id);
 		$this->db->update('jornadadocente',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idjornadadocente',$id);
		$this->db->delete('jornadadocente');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idjornadadocente")->get('jornadadocente');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idjornadadocente")->get('jornadadocente');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$jornadadocente = $this->db->select("idjornadadocente")->order_by("idjornadadocente")->get('jornadadocente')->result_array();
		$arr=array("idjornadadocente"=>$id);
		$clave=array_search($arr,$jornadadocente);
	   if(array_key_exists($clave+1,$jornadadocente))
		 {

 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $jornadadocente[$clave+1]["idjornadadocente"].'"');
		 }else{

 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $id.'"');
		 }
		 	
 		return $jornadadocente;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$jornadadocente = $this->db->select("idjornadadocente")->order_by("idjornadadocente")->get('jornadadocente')->result_array();
		$arr=array("idjornadadocente"=>$id);
		$clave=array_search($arr,$jornadadocente);
	   if(array_key_exists($clave-1,$jornadadocente))
		 {

 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $jornadadocente[$clave-1]["idjornadadocente"].'"');
		 }else{

 		$jornadadocente = $this->db->query('select * from jornadadocente where idjornadadocente="'. $id.'"');
		 }
		 	
 		return $jornadadocente;
 	}






}
