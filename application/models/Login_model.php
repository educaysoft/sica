<?php

Class Login_model extends CI_Model {

// Insert registration data in database
public function registration_insert($datap,$datau,$dataa) {

		$this->db->trans_start();
// Query to check whether username already exist or not
		$condition = "email =" . "'" . $datau['email'] . "'";
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
				$condition = "cedula =" . "'" . $datap['cedula'] . "'";
				$this->db->select('*');
				$this->db->from('persona');
				$this->db->where($condition);
				$this->db->limit(1);
				$query = $this->db->get();
				if ($query->num_rows() == 0) {
						// Query to insert data in database
						$this->db->insert('persona', $datap);
						if ($this->db->affected_rows() > 0) {
								$idpersona=$this->db->insert_id();
								$datau["idpersona"]=$idpersona;
								$dataa["idpersona"]=$idpersona;
								$this->db->insert('usuario', $datau);
								if ($this->db->affected_rows() > 0) {
										$this->db->trans_complete();
										return true;
										//	$this->db->insert('aspirante', $dataa);
										//	if ($this->db->affected_rows() > 0) {
										//		$this->db->trans_complete();
										//		return true;
										//	}else{
										//		return false;
										//	}
								}else{
										$this->db->trans_complete();
										return false;
								}
						}else {
								return false;
						}
				}else {
								$idpersona=$query->result()[0]->idpersona;
								$datau["idpersona"]=$idpersona;
								$dataa["idpersona"]=$idpersona;
								$this->db->insert('usuario', $datau);
								if ($this->db->affected_rows() > 0) {
										$this->db->trans_complete();
										return true;
										//	$this->db->insert('aspirante', $dataa);
										//	if ($this->db->affected_rows() > 0) {
										//		$this->db->trans_complete();
										//		return true;
										//	}else{
										//		return false;
										//	}
								}else{
										$this->db->trans_complete();
										return false;
								}

				}
		}
}
// Read data using username and password
public function login($data) {

$condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('usuario');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($email) {
	$condition = "email =" . "'" . $email . "'";
	$this->db->select('*');
	$this->db->from('usuario');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}
}


public function get_persona($id){
	$condition = "idpersona =" .  $id ;
	$this->db->select('*');
	$this->db->from('persona');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		return $query->result();
	} else {
		return false;
	}

}



}

?>
