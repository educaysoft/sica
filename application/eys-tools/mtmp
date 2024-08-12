<?php
class Reglamento_model extends CI_model {

	function lista_reglamentos(){
		 $reglamento= $this->db->get('reglamento');
		 return $reglamento;
	}


	function lista_reglamentosA(){

$this->db->order_by('idproceso', 'asc');
$this->db->order_by('orden', 'asc');

$query = $this->db->get('reglamento1');



		 return $query;
	}




 	function reglamento( $id){
 		$reglamento = $this->db->query('select * from reglamento where idreglamento="'. $id.'"');
 		return $reglamento;
 	}

 	function reglamentoA( $id){
 		$reglamento = $this->db->query('select * from reglamento1 where idinstitucion="'. $id.'" order by idproceso,orden');
 		return $reglamento;
 	}




 	function save($array)
 	{
		$this->db->insert("reglamento", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }

 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idreglamento',$id);
 		$this->db->update('reglamento',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idreglamento',$id);
		$this->db->delete('reglamento');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idreglamento")->get('reglamento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idreglamento")->get('reglamento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$reglamento = $this->db->select("idreglamento")->order_by("idreglamento")->get('reglamento')->result_array();
		$arr=array("idreglamento"=>$id);
		$clave=array_search($arr,$reglamento);
	   if(array_key_exists($clave+1,$reglamento))
		 {

 		$reglamento = $this->db->query('select * from reglamento where idreglamento="'. $reglamento[$clave+1]["idreglamento"].'"');
		 }else{

 		$reglamento = $this->db->query('select * from reglamento where idreglamento="'. $id.'"');
		 }
		 	
 		return $reglamento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$reglamento = $this->db->select("idreglamento")->order_by("idreglamento")->get('reglamento')->result_array();
		$arr=array("idreglamento"=>$id);
		$clave=array_search($arr,$reglamento);
	   if(array_key_exists($clave-1,$reglamento))
		 {

 		$reglamento = $this->db->query('select * from reglamento where idreglamento="'. $reglamento[$clave-1]["idreglamento"].'"');
		 }else{

 		$reglamento = $this->db->query('select * from reglamento where idreglamento="'. $id.'"');
		 }
		 	
 		return $reglamento;
 	}






 

}
