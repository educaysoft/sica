<?php

class Facae_model extends CI_Model{


	function consultar(){

    $persona= $this->db->query("select * from persona ");

		return $persona;


	}





}
