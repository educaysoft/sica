<?php
class Seguimientosilabo_model extends CI_model {

	function listar_seguimientosilabo(){
		 $seguimientosilabo= $this->db->get('seguimientosilabo');
		 return $seguimientosilabo;
	}




	function listar_seguimientosilabo1($versesiones){
		if($versesiones==0)
		{
		 $seguimientosilabo= $this->db->get('seguimientosilabo2');
		}else{
		 $seguimientosilabo= $this->db->get('seguimientosilabo1');
		}
		 return $seguimientosilabo;
	}

 
	function seguimientosilaboss( $idsilabo){
 		$seguimientosilabo = $this->db->query('select * from seguimientosilabo where idsilabo="'. $idsilabo.'"');
 		return $seguimientosilabo;
 	}


	function seguimientosilabo( $id){
 		$seguimientosilabo = $this->db->query('select * from seguimientosilabo where idseguimientosilabo="'. $id.'"');
 		return $seguimientosilabo;
 	}

 	function lista_unidades( $id){
		$seguimientosilabo = $this->db->query('select * from seguimientosilabo1 where idsilabo="'. $id.'"');
 		return $seguimientosilabo;
 	}


 	function seguimientosilabos( $idevento){
 		$seguimientosilabo = $this->db->query('select * from seguimientosilabo1 where idievento="'. $idevento.'"');
 		return $seguimientosilabo;
 	}

 	function save($array)
 	{
		$this->db->insert("seguimientosilabo", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idseguimientosilabo',$id);
 		$this->db->update('seguimientosilabo',$array_item);
	}
 



  public function delete($id)
	{
 		$this->db->where('idseguimientosilabo',$id);
		$this->db->delete('seguimientosilabo');
    		if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
		return $result;
 	}


	function elprimero()
	{
		$query=$this->db->order_by("idseguimientosilabo")->get('seguimientosilabo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idseguimientosilabo")->get('seguimientosilabo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$seguimientosilabo = $this->db->select("idseguimientosilabo")->order_by("idseguimientosilabo")->get('seguimientosilabo')->result_array();
		$arr=array("idseguimientosilabo"=>$id);
		$clave=array_search($arr,$seguimientosilabo);
	   if(array_key_exists($clave+1,$seguimientosilabo))
		 {

 		$seguimientosilabo = $this->db->query('select * from seguimientosilabo where idseguimientosilabo="'. $seguimientosilabo[$clave+1]["idseguimientosilabo"].'"');
		 }else{

 		$seguimientosilabo = $this->db->query('select * from seguimientosilabo where idseguimientosilabo="'. $id.'"');
		 }
		 	
 		return $seguimientosilabo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$seguimientosilabo = $this->db->select("idseguimientosilabo")->order_by("idseguimientosilabo")->get('seguimientosilabo')->result_array();
		$arr=array("idseguimientosilabo"=>$id);
		$clave=array_search($arr,$seguimientosilabo);
	   if(array_key_exists($clave-1,$seguimientosilabo))
		 {

 		$seguimientosilabo = $this->db->query('select * from seguimientosilabo where idseguimientosilabo="'. $seguimientosilabo[$clave-1]["idseguimientosilabo"].'"');
		 }else{

 		$seguimientosilabo = $this->db->query('select * from seguimientosilabo where idseguimientosilabo="'. $id.'"');
		 }
		 	
 		return $seguimientosilabo;
 	}














}
