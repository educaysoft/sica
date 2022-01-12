<?php
class Persona_model extends CI_Model {
	function list_persona(){
 		//$persona = $this->db->query('select * from persona2');
 		$persona = $this->db->get('persona2');
 		return $persona;
 	}
 	function product( $id){
 		$product = $this->db->query('select * from persona where idpersona="'. $id.'"');
 		return $product;
 	}

 	function lapersona( $id){
 		$product = $this->db->query('select * from persona where idpersona="'. $id.'"');
 		return $product;
 	}
 	function save($array)
 	{
		$this->db->insert("persona", $array);
 	}

 	function update($id,$array_item)
 	{
 		$this->db->where('idpersona',$id);
 		$this->db->update('persona',$array_item);
	}
 	public function delete()
	{
//		die();
//		$db_debug =$this->db->db_debug;
//		$this->db->db_debug=FALSE;
//		try{
		$idpersona=$this->input->post('idpersona');
 		$this->db->where('idpersona',$idpersona);
		$this->db->delete('persona');
                if($this->db->affected_rows()==1)
			$result=true;
		else
			$result=false;
//		}catch (Exception $e){
//			echo 'error'.$e-> getMessage();
//		}
//		$this->db->db_debug=$db_debug;
		return $result;
 	}
}
?>
