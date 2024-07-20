<?php
class Lector_model extends CI_model {

	function listar_lector(){
		 $lector= $this->db->get('lector');
		 return $lector;
	}

	function listar_lector1(){
		 $lector= $this->db->get('lector1');
		 return $lector;
	}

	function lector2($id){
 		$lector = $this->db->query('select distinct cedula, ellector as eldocente,iddocente from lector1 ');
 		return $lector;
 	}




 	function lector($id){
 		$lector = $this->db->query('select * from lector where idlector="'. $id.'"');
 		return $lector;
 	}

 	function save($array)
 	{
		$condition1 = "idtrabajointegracioncurricular =" . "'" . $array['idtrabajointegracioncurricular'] . "'";
		$condition2 = "iddocente =" . "'" . $array['iddocente'] . "'";
		$this->db->select('*');
		$this->db->from('lector');
		$this->db->where($condition1);
		$this->db->where($condition2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert("lector", $array);
			return true;
		}else{
			return false;
		}


 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idlector',$id);
 		$this->db->update('lector',$array_item);
	}


  public function delete($id)
	{
 		$this->db->where('idlector',$id);
		$this->db->delete('lector');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idlector")->get('lector');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idlector")->get('lector');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$lector = $this->db->select("idlector")->order_by("idlector")->get('lector')->result_array();
		$arr=array("idlector"=>$id);
		$clave=array_search($arr,$lector);
	   if(array_key_exists($clave+1,$lector))
		 {

 		$lector = $this->db->query('select * from lector where idlector="'. $lector[$clave+1]["idlector"].'"');
		 }else{

 		$lector = $this->db->query('select * from lector where idlector="'. $id.'"');
		 }
		 	
 		return $lector;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$lector = $this->db->select("idlector")->order_by("idlector")->get('lector')->result_array();
		$arr=array("idlector"=>$id);
		$clave=array_search($arr,$lector);
	   if(array_key_exists($clave-1,$lector))
		 {

 		$lector = $this->db->query('select * from lector where idlector="'. $lector[$clave-1]["idlector"].'"');
		 }else{

 		$lector = $this->db->query('select * from lector where idlector="'. $id.'"');
		 }
		 	
 		return $lector;
 	}






}
