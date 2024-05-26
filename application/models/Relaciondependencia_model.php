<?php
class Relaciondependencia_model extends CI_model {

	function lista_relaciondependencias(){
		 $relaciondependencia= $this->db->get('relaciondependencia0');
		 return $relaciondependencia;
	}

	function lista_relaciondependenciasA(){
		 $relaciondependencia= $this->db->get('relaciondependencia1');
		 return $relaciondependencia;
	}




 	function relaciondependencia( $id){
 		$relaciondependencia = $this->db->query('select * from relaciondependencia0 where idrelaciondependencia="'. $id.'"');
 		return $relaciondependencia;
 	}

 	function save($array)
 	{
		$condition = "idrelaciondependencia =" . "'" . $array['idrelaciondependencia'] . "'";
		$this->db->select('*');
		$this->db->from('relaciondependencia');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("relaciondependencia", $array);
		   if( $this->db->affected_rows()>0){
			    return true;
		   }else{
			    return false;
		   }
	   }else{
		    return false;
		   }
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idrelaciondependencia',$id);
 		$this->db->update('relaciondependencia',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idrelaciondependencia',$id);
		$this->db->delete('relaciondependencia');
    	if($this->db->affected_rows()==1){
			$result=true;
        }else{
			$result=false;
    }
		return $result;
 	}



 	function quitar($id)
	{

        $this->db->select('*');
		$this->db->from('relaciondependencia0');
 		$this->db->where('idrelaciondependencia',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idrelaciondependencia',$id);
			$this->db->update('relaciondependencia', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idrelaciondependencia")->get('relaciondependencia');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idrelaciondependencia")->get('relaciondependencia');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$relaciondependencia = $this->db->select("idrelaciondependencia")->order_by("idrelaciondependencia")->get('relaciondependencia')->result_array();
		$arr=array("idrelaciondependencia"=>$id);
		$clave=array_search($arr,$relaciondependencia);
	   if(array_key_exists($clave+1,$relaciondependencia))
		 {

 		$relaciondependencia = $this->db->query('select * from relaciondependencia where idrelaciondependencia="'. $relaciondependencia[$clave+1]["idrelaciondependencia"].'"');
		 }else{

 		$relaciondependencia = $this->db->query('select * from relaciondependencia where idrelaciondependencia="'. $id.'"');
		 }
		 	
 		return $relaciondependencia;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$relaciondependencia = $this->db->select("idrelaciondependencia")->order_by("idrelaciondependencia")->get('relaciondependencia')->result_array();
		$arr=array("idrelaciondependencia"=>$id);
		$clave=array_search($arr,$relaciondependencia);
	   if(array_key_exists($clave-1,$relaciondependencia))
		 {

 		$relaciondependencia = $this->db->query('select * from relaciondependencia where idrelaciondependencia="'. $relaciondependencia[$clave-1]["idrelaciondependencia"].'"');
		 }else{

 		$relaciondependencia = $this->db->query('select * from relaciondependencia where idrelaciondependencia="'. $id.'"');
		 }
		 	
 		return $relaciondependencia;
 	}








}
