<?php
class Curso_model extends CI_model {

	function lista_cursoes(){
		 $curso= $this->db->get('curso');
		 return $curso;
	}

 	function curso( $id){
 		$curso = $this->db->query('select * from curso where idcurso="'. $id.'"');
		 
 		return $curso;
 	}

 	function save($array)
 	{
		$this->db->insert("curso", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idcurso',$id);
 		$this->db->update('curso',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idcurso',$id);
		$this->db->delete('curso');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


public function get_curso($id){
	$condition = "idcurso =" .  $id ;
	$this->db->select('*');
	$this->db->from('curso');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}





	function elprimero()
	{
		$query=$this->db->order_by("idcurso")->get('curso');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idcurso")->get('curso');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$curso = $this->db->select("idcurso")->order_by("idcurso")->get('curso')->result_array();
		$arr=array("idcurso"=>$id);
		$clave=array_search($arr,$curso);
	   if(array_key_exists($clave+1,$curso))
		 {

 		$curso = $this->db->query('select * from curso where idcurso="'. $curso[$clave+1]["idcurso"].'"');
		 }else{

 		$curso = $this->db->query('select * from curso where idcurso="'. $id.'"');
		 }
		 	
 		return $curso;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$curso = $this->db->select("idcurso")->order_by("idcurso")->get('curso')->result_array();
		$arr=array("idcurso"=>$id);
		$clave=array_search($arr,$curso);
	   if(array_key_exists($clave-1,$curso))
		 {

 		$curso = $this->db->query('select * from curso where idcurso="'. $curso[$clave-1]["idcurso"].'"');
		 }else{

 		$curso = $this->db->query('select * from curso where idcurso="'. $id.'"');
		 }
		 	
 		return $curso;
 	}



	function lista_cursoes_con_inscripciones(){
		 $this->db->select('curso.*');
		 $this->db->from('curso,evento');
		 $this->db->where('evento.idcurso=curso.idcurso and evento.idevento_estado=2');
		 $curso= $this->db->get();
		 return $curso;
	}




}
