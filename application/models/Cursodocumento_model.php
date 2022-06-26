<?php
class Cursodocumento_model extends CI_model {

	function listar_cursodocumento(){
		 $cursodocumento= $this->db->get('cursodocumento');
		 return $cursodocumento;
	}

	function listar_cursodocumento1($idcurso){
		if($idcurso==0)
		{
		$cursodocumento=$this->db->order_by("asunto")->get('cursodocumento1');
		}else{

		$this->db->where('idcurso='.$idcurso);
		$cursodocumento=$this->db->order_by("asunto")->get('cursodocumento1');
		}

		 return $cursodocumento;
	}

 	function cursodocumento( $id){
 		$cursodocumento = $this->db->query('select * from cursodocumento where idcursodocumento="'. $id.'"');
 		return $cursodocumento;
 	}
 	function lista_unidades( $id){
		$cursodocumento = $this->db->query('select * from cursodocumento1 where idcurso="'. $id.'"');
 		return $cursodocumento;
 	}




 	function cursodocumentos( $id){
 		$cursodocumento = $this->db->query('select * from cursodocumento1 where idevento="'. $id.'"');
 		return $cursodocumento;
 	}

 	function save($array)
 	{
		$this->db->insert("cursodocumento", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcursodocumento',$id);
 		$this->db->update('cursodocumento',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idcursodocumento',$id);
		$this->db->delete('cursodocumento');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idcursodocumento")->get('cursodocumento');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcursodocumento")->get('cursodocumento');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$cursodocumento = $this->db->select("idcursodocumento")->order_by("idcursodocumento")->get('cursodocumento')->result_array();
		$arr=array("idcursodocumento"=>$id);
		$clave=array_search($arr,$cursodocumento);
	   if(array_key_exists($clave+1,$cursodocumento))
		 {

 		$cursodocumento = $this->db->query('select * from cursodocumento where idcursodocumento="'. $cursodocumento[$clave+1]["idcursodocumento"].'"');
		 }else{

 		$cursodocumento = $this->db->query('select * from cursodocumento where idcursodocumento="'. $id.'"');
		 }
		 	
 		return $cursodocumento;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$cursodocumento = $this->db->select("idcursodocumento")->order_by("idcursodocumento")->get('cursodocumento')->result_array();
		$arr=array("idcursodocumento"=>$id);
		$clave=array_search($arr,$cursodocumento);
	   if(array_key_exists($clave-1,$cursodocumento))
		 {

 		$cursodocumento = $this->db->query('select * from cursodocumento where idcursodocumento="'. $cursodocumento[$clave-1]["idcursodocumento"].'"');
		 }else{

 		$cursodocumento = $this->db->query('select * from cursodocumento where idcursodocumento="'. $id.'"');
		 }
		 	
 		return $cursodocumento;
 	}














}
