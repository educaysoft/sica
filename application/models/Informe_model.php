<?php
class Informe_model extends CI_Model {
 function list_informes(){
 $persona = $this->db->query('select * from informe');
 return $persona;
 }


 function informe( $id){
 $product = $this->db->query('select * from informe where idinforme="'. $id.'"');
 return $product;
 }


 function save($array)
 {
$this->db->insert("informe", $array);
 }

 function update($id,$array_item)
 {
 $this->db->where('idinforme',$id);
 $this->db->update('informe',$array_item);

 }
 function delete($id)
 {
 $this->db->where('idinforme',$id);
 $this->db->delete('informe');

 }


 function maestrantes(){
 $persona = $this->db->query('select * from maestrante1 order by maestrante;');
 return $persona;
 }
}
?>
