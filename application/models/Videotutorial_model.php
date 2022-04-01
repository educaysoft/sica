<?php
class Videotutorial_model extends CI_model {

	function lista_videotutorials(){
		 $videotutorial= $this->db->get('videotutorial');
		 return $videotutorial;
	}

	function lista_videotutorialsxordenador($idordenador){
		 $this->db->where(array('idordenador'=>$idordenador));
		 $videotutorial= $this->db->get('videotutorial');
		 return $videotutorial;
	}




	function lista_videotutorialsA(){
		 $videotutorial= $this->db->get('videotutorial1');
		 return $videotutorial;
	}




public function get_videotutorial($id){
	$condition = "idvideotutorial =" .  $id ;
	$this->db->select('*');
	$this->db->from('videotutorial');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}



 	function videotutorial( $id){
 		$videotutorial = $this->db->query('select * from videotutorial where idvideotutorial="'. $id.'"');
 		return $videotutorial;
 	}

 	function save($array)
 	{
		$this->db->insert("videotutorial", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idvideotutorial',$id);
 		$this->db->update('videotutorial',$array_item);
	}


 	public function delete($id)
	{
 		$this->db->where('idvideotutorial',$id);
		$this->db->delete('videotutorial');
    if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idvideotutorial")->get('videotutorial');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idvideotutorial")->get('videotutorial');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$videotutorial = $this->db->select("idvideotutorial")->order_by("idvideotutorial")->get('videotutorial')->result_array();
		$arr=array("idvideotutorial"=>$id);
		$clave=array_search($arr,$videotutorial);
	   if(array_key_exists($clave+1,$videotutorial))
		 {

 		$videotutorial = $this->db->query('select * from videotutorial where idvideotutorial="'. $videotutorial[$clave+1]["idvideotutorial"].'"');
		 }else{

 		$videotutorial = $this->db->query('select * from videotutorial where idvideotutorial="'. $id.'"');
		 }
		 	
 		return $videotutorial;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$videotutorial = $this->db->select("idvideotutorial")->order_by("idvideotutorial")->get('videotutorial')->result_array();
		$arr=array("idvideotutorial"=>$id);
		$clave=array_search($arr,$videotutorial);
	   if(array_key_exists($clave-1,$videotutorial))
		 {

 		$videotutorial = $this->db->query('select * from videotutorial where idvideotutorial="'. $videotutorial[$clave-1]["idvideotutorial"].'"');
		 }else{

 		$videotutorial = $this->db->query('select * from videotutorial where idvideotutorial="'. $id.'"');
		 }
		 	
 		return $videotutorial;
 	}






 

}
