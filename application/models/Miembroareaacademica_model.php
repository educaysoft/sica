<?php
class Miembroareaacademica_model extends CI_model {

	function lista_miembroareaacademicas(){
		 $miembroareaacademica= $this->db->get('miembroareaacademica');
		 return $miembroareaacademica;
	}


	function lista_miembroareaacademicasA(){
		 $this->db->order_by("elmiembroareaacademica","asc");
		 $miembroareaacademica= $this->db->get('miembroareaacademica1');
		 return $miembroareaacademica;
	}

	function lista_miembroareaacademicasB(){
		 $this->db->order_by("elperiodo asc,laarea asc");
		 $miembroareaacademica= $this->db->get('miembroareaacademica1');
		 return $miembroareaacademica;
	}


	function lista_miembroareaacademicaxarea($id){
 		$this->db->where('idareaacademica',$id);
		 $miembroareaacademica= $this->db->get('miembroareaacademica1');
		 return $miembroareaacademica;
	}







 	function miembroareaacademica( $id){
 		$miembroareaacademica = $this->db->query('select * from miembroareaacademica where idmiembroareaacademica="'. $id.'"');
 		return $miembroareaacademica;
 	}


 	function miembroareaacademicaspersona( $id){
 		$miembroareaacademica = $this->db->query('select * from miembroareaacademica where idpersona="'. $id.'"');
 		return $miembroareaacademica;
 	}



 	function save($array)
 	{
		$this->db->insert("miembroareaacademica", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idmiembroareaacademica',$id);
 		$this->db->update('miembroareaacademica',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idmiembroareaacademica',$id);
		$this->db->delete('miembroareaacademica');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idmiembroareaacademica")->get('miembroareaacademica');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idmiembroareaacademica")->get('miembroareaacademica');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$miembroareaacademica = $this->db->select("idmiembroareaacademica")->order_by("idmiembroareaacademica")->get('miembroareaacademica')->result_array();
		$arr=array("idmiembroareaacademica"=>$id);
		$clave=array_search($arr,$miembroareaacademica);
	   if(array_key_exists($clave+1,$miembroareaacademica))
		 {

 		$miembroareaacademica = $this->db->query('select * from miembroareaacademica where idmiembroareaacademica="'. $miembroareaacademica[$clave+1]["idmiembroareaacademica"].'"');
		 }else{

 		$miembroareaacademica = $this->db->query('select * from miembroareaacademica where idmiembroareaacademica="'. $id.'"');
		 }
		 	
 		return $miembroareaacademica;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$miembroareaacademica = $this->db->select("idmiembroareaacademica")->order_by("idmiembroareaacademica")->get('miembroareaacademica')->result_array();
		$arr=array("idmiembroareaacademica"=>$id);
		$clave=array_search($arr,$miembroareaacademica);
	   if(array_key_exists($clave-1,$miembroareaacademica))
		 {

 		$miembroareaacademica = $this->db->query('select * from miembroareaacademica where idmiembroareaacademica="'. $miembroareaacademica[$clave-1]["idmiembroareaacademica"].'"');
		 }else{

 		$miembroareaacademica = $this->db->query('select * from miembroareaacademica where idmiembroareaacademica="'. $id.'"');
		 }
		 	
 		return $miembroareaacademica;
 	}






}
