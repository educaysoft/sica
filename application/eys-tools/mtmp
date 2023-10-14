<?php
class Miembrocomisionacademica_model extends CI_model {

	function lista_miembrocomisionacademicas(){
		 $miembrocomisionacademica= $this->db->get('miembrocomisionacademica');
		 return $miembrocomisionacademica;
	}


	function lista_miembrocomisionacademicasA(){
		 $this->db->order_by("elmiembrocomisionacademica","asc");
		 $miembrocomisionacademica= $this->db->get('miembrocomisionacademica1');
		 return $miembrocomisionacademica;
	}

	function lista_miembrocomisionacademicasB(){
		 $this->db->order_by("elperiodo asc,lacomision asc");
		 $miembrocomisionacademica= $this->db->get('miembrocomisionacademica1');
		 return $miembrocomisionacademica;
	}


 	function miembrocomisionacademica( $id){
 		$miembrocomisionacademica = $this->db->query('select * from miembrocomisionacademica where idmiembrocomisionacademica="'. $id.'"');
 		return $miembrocomisionacademica;
 	}


 	function miembrocomisionacademicaspersona( $id){
 		$miembrocomisionacademica = $this->db->query('select * from miembrocomisionacademica where idpersona="'. $id.'"');
 		return $miembrocomisionacademica;
 	}



 	function save($array)
 	{
		$this->db->insert("miembrocomisionacademica", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmiembrocomisionacademica',$id);
 		$this->db->update('miembrocomisionacademica',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmiembrocomisionacademica',$id);
		$this->db->delete('miembrocomisionacademica');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmiembrocomisionacademica")->get('miembrocomisionacademica');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmiembrocomisionacademica")->get('miembrocomisionacademica');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$miembrocomisionacademica = $this->db->select("idmiembrocomisionacademica")->order_by("idmiembrocomisionacademica")->get('miembrocomisionacademica')->result_array();
		$arr=array("idmiembrocomisionacademica"=>$id);
		$clave=array_search($arr,$miembrocomisionacademica);
	   if(array_key_exists($clave+1,$miembrocomisionacademica))
		 {

 		$miembrocomisionacademica = $this->db->query('select * from miembrocomisionacademica where idmiembrocomisionacademica="'. $miembrocomisionacademica[$clave+1]["idmiembrocomisionacademica"].'"');
		 }else{

 		$miembrocomisionacademica = $this->db->query('select * from miembrocomisionacademica where idmiembrocomisionacademica="'. $id.'"');
		 }
		 	
 		return $miembrocomisionacademica;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$miembrocomisionacademica = $this->db->select("idmiembrocomisionacademica")->order_by("idmiembrocomisionacademica")->get('miembrocomisionacademica')->result_array();
		$arr=array("idmiembrocomisionacademica"=>$id);
		$clave=array_search($arr,$miembrocomisionacademica);
	   if(array_key_exists($clave-1,$miembrocomisionacademica))
		 {

 		$miembrocomisionacademica = $this->db->query('select * from miembrocomisionacademica where idmiembrocomisionacademica="'. $miembrocomisionacademica[$clave-1]["idmiembrocomisionacademica"].'"');
		 }else{

 		$miembrocomisionacademica = $this->db->query('select * from miembrocomisionacademica where idmiembrocomisionacademica="'. $id.'"');
		 }
		 	
 		return $miembrocomisionacademica;
 	}






}
