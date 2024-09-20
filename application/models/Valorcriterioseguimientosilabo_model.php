<?php
class Valorcriterioseguimientosilabo_model extends CI_model {

	function lista_valorcriterioseguimientosilabos(){
		 $valorcriterioseguimientosilabo= $this->db->get('valorcriterioseguimientosilabo0');
		 return $valorcriterioseguimientosilabo;
	}

	function lista_valorcriterioseguimientosilabosA(){
		 $valorcriterioseguimientosilabo= $this->db->get('valorcriterioseguimientosilabo1');
		 return $valorcriterioseguimientosilabo;
	}




 	function valorcriterioseguimientosilabo( $id){
 		$valorcriterioseguimientosilabo = $this->db->query('select * from valorcriterioseguimientosilabo0 where idvalorcriterioseguimientosilabo="'. $id.'"');
 		return $valorcriterioseguimientosilabo;
 	}

 	function save($array)
 	{
		$condition = "idvalorcriterioseguimientosilabo =" . "'" . $array['idvalorcriterioseguimientosilabo'] . "'";
		$this->db->select('*');
		$this->db->from('valorcriterioseguimientosilabo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
		   $this->db->insert("valorcriterioseguimientosilabo", $array);
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
 		$this->db->where('idvalorcriterioseguimientosilabo',$id);
 		$this->db->update('valorcriterioseguimientosilabo',$array_item);
	}
 

 	 function delete($id)
	{
 		$this->db->where('idvalorcriterioseguimientosilabo',$id);
		$this->db->delete('valorcriterioseguimientosilabo');
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
		$this->db->from('valorcriterioseguimientosilabo0');
 		$this->db->where('idvalorcriterioseguimientosilabo',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
	 	  	$this->db->where('idvalorcriterioseguimientosilabo',$id);
			$this->db->update('valorcriterioseguimientosilabo', array('eliminado'=>1));
			$result=true;
        }else{
            $result=false;
        }
		return $result;
 	}






	function elprimero()
	{
		$query=$this->db->order_by("idvalorcriterioseguimientosilabo")->get('valorcriterioseguimientosilabo');
		if($query->num_rows()>0)
		{
			return $query->first_row('array');
		}	
			return array();

	}


// Para ir al último registro
	function elultimo()
	{
		$query=$this->db->order_by("idvalorcriterioseguimientosilabo")->get('valorcriterioseguimientosilabo');
		if($query->num_rows()>0)
		{
			return $query->last_row('array');
		}	
			return array();

	}


	// Para moverse al siguiente registro
 	function siguiente($id){
 		$valorcriterioseguimientosilabo = $this->db->select("idvalorcriterioseguimientosilabo")->order_by("idvalorcriterioseguimientosilabo")->get('valorcriterioseguimientosilabo')->result_array();
		$arr=array("idvalorcriterioseguimientosilabo"=>$id);
		$clave=array_search($arr,$valorcriterioseguimientosilabo);
	   if(array_key_exists($clave+1,$valorcriterioseguimientosilabo))
		 {

 		$valorcriterioseguimientosilabo = $this->db->query('select * from valorcriterioseguimientosilabo where idvalorcriterioseguimientosilabo="'. $valorcriterioseguimientosilabo[$clave+1]["idvalorcriterioseguimientosilabo"].'"');
		 }else{

 		$valorcriterioseguimientosilabo = $this->db->query('select * from valorcriterioseguimientosilabo where idvalorcriterioseguimientosilabo="'. $id.'"');
		 }
		 	
 		return $valorcriterioseguimientosilabo;
 	}


// Para moverse al anterior registro
 	function anterior($id){
 		$valorcriterioseguimientosilabo = $this->db->select("idvalorcriterioseguimientosilabo")->order_by("idvalorcriterioseguimientosilabo")->get('valorcriterioseguimientosilabo')->result_array();
		$arr=array("idvalorcriterioseguimientosilabo"=>$id);
		$clave=array_search($arr,$valorcriterioseguimientosilabo);
	   if(array_key_exists($clave-1,$valorcriterioseguimientosilabo))
		 {

 		$valorcriterioseguimientosilabo = $this->db->query('select * from valorcriterioseguimientosilabo where idvalorcriterioseguimientosilabo="'. $valorcriterioseguimientosilabo[$clave-1]["idvalorcriterioseguimientosilabo"].'"');
		 }else{

 		$valorcriterioseguimientosilabo = $this->db->query('select * from valorcriterioseguimientosilabo where idvalorcriterioseguimientosilabo="'. $id.'"');
		 }
		 	
 		return $valorcriterioseguimientosilabo;
 	}








}
