<?php
class Tipodocu_model extends CI_model {

	function lista_tipodocu(){
		 $tipodocu= $this->db->get('tipodocu');
		 return $tipodocu;
	}

	function lista_tipodocusA(){
		 $tipodocu= $this->db->get('tipodocu1');
		 return $tipodocu;
	}




 	function tipodocu( $id){
 		$tipodocu = $this->db->query('select * from tipodocu where idtipodocu="'. $id.'"');
 		return $tipodocu;
 	}

 	function save($array)
 	{
		$this->db->insert("tipodocu", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtipodocu',$id);
 		$this->db->update('tipodocu',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtipodocu',$id);
		$this->db->delete('tipodocu');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtipodocu")->get('tipodocu');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtipodocu")->get('tipodocu');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tipodocu = $this->db->select("idtipodocu")->order_by("idtipodocu")->get('tipodocu')->result_array();
		$arr=array("idtipodocu"=>$id);
		$clave=array_search($arr,$tipodocu);
	   if(array_key_exists($clave+1,$tipodocu))
		 {

 		$tipodocu = $this->db->query('select * from tipodocu where idtipodocu="'. $tipodocu[$clave+1]["idtipodocu"].'"');
		 }else{

 		$tipodocu = $this->db->query('select * from tipodocu where idtipodocu="'. $id.'"');
		 }
		 	
 		return $tipodocu;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tipodocu = $this->db->select("idtipodocu")->order_by("idtipodocu")->get('tipodocu')->result_array();
		$arr=array("idtipodocu"=>$id);
		$clave=array_search($arr,$tipodocu);
	   if(array_key_exists($clave-1,$tipodocu))
		 {

 		$tipodocu = $this->db->query('select * from tipodocu where idtipodocu="'. $tipodocu[$clave-1]["idtipodocu"].'"');
		 }else{

 		$tipodocu = $this->db->query('select * from tipodocu where idtipodocu="'. $id.'"');
		 }
		 	
 		return $tipodocu;
 	}








}
