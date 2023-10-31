<?php
class Tecnicaaprendizaje_model extends CI_model {

	function lista_tecnicaaprendizajes(){
		 $tecnicaaprendizaje= $this->db->get('tecnicaaprendizaje');
		 return $tecnicaaprendizaje;
	}

 	function tecnicaaprendizaje( $id){
 		$tecnicaaprendizaje = $this->db->query('select * from tecnicaaprendizaje where idtecnicaaprendizaje="'. $id.'"');
 		return $tecnicaaprendizaje;
 	}

 	function save($array)
 	{
		$this->db->insert("tecnicaaprendizaje", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idtecnicaaprendizaje',$id);
 		$this->db->update('tecnicaaprendizaje',$array_item);
	}
 


 	public function delete($id)
	{
 		$this->db->where('idtecnicaaprendizaje',$id);
		$this->db->delete('tecnicaaprendizaje');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idtecnicaaprendizaje")->get('tecnicaaprendizaje');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idtecnicaaprendizaje")->get('tecnicaaprendizaje');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$tecnicaaprendizaje = $this->db->select("idtecnicaaprendizaje")->order_by("idtecnicaaprendizaje")->get('tecnicaaprendizaje')->result_array();
		$arr=array("idtecnicaaprendizaje"=>$id);
		$clave=array_search($arr,$tecnicaaprendizaje);
	   if(array_key_exists($clave+1,$tecnicaaprendizaje))
		 {

 		$tecnicaaprendizaje = $this->db->query('select * from tecnicaaprendizaje where idtecnicaaprendizaje="'. $tecnicaaprendizaje[$clave+1]["idtecnicaaprendizaje"].'"');
		 }else{

 		$tecnicaaprendizaje = $this->db->query('select * from tecnicaaprendizaje where idtecnicaaprendizaje="'. $id.'"');
		 }
		 	
 		return $tecnicaaprendizaje;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$tecnicaaprendizaje = $this->db->select("idtecnicaaprendizaje")->order_by("idtecnicaaprendizaje")->get('tecnicaaprendizaje')->result_array();
		$arr=array("idtecnicaaprendizaje"=>$id);
		$clave=array_search($arr,$tecnicaaprendizaje);
	   if(array_key_exists($clave-1,$tecnicaaprendizaje))
		 {

 		$tecnicaaprendizaje = $this->db->query('select * from tecnicaaprendizaje where idtecnicaaprendizaje="'. $tecnicaaprendizaje[$clave-1]["idtecnicaaprendizaje"].'"');
		 }else{

 		$tecnicaaprendizaje = $this->db->query('select * from tecnicaaprendizaje where idtecnicaaprendizaje="'. $id.'"');
		 }
		 	
 		return $tecnicaaprendizaje;
 	}






}
