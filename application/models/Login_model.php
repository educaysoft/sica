<?php

Class Login_model extends CI_Model {

	public function nuevo_participante($data)
	{

		$condition = "idpersona =" .  $data['idpersona']." and idevento = ". $data['idevento'];
		$this->db->select('*');
		$this->db->from('participante');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			$this->db->insert('participante', $data);
		}

	}

	public function nuevo_correo($data)
	{

		$condition = "nombre ='" .  $data['nombre']."'";
		$this->db->select('*');
		$this->db->from('correo');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {

			$this->db->insert('correo', $data);
		}

	}


	public function nuevo_telefono($data)
	{

		$condition = "idpersona =" .  $data['idpersona']." and numero = ". $data['numero'];
		$this->db->select('*');
		$this->db->from('telefono');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {

			$this->db->insert('telefono', $data);
		}

	}

// Insert registration data in database
public function registration_insert($datapersona,$datausuario,$dataparticipante,$datacorreo,$datatelefono) {

		$this->db->trans_start();
// Query to check whether username already exist or not
		$condition = "email =" . "'" . $datausuario['email'] . "'";
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
				$condition = "cedula =" . "'" . $datapersona['cedula'] . "'";
				$this->db->select('*');
				$this->db->from('persona');
				$this->db->where($condition);
				$this->db->limit(1);
				$query = $this->db->get();
				if ($query->num_rows() == 0) {
						// Query to insert data in database
						$this->db->insert('persona', $datapersona);
						if ($this->db->affected_rows() > 0) {
								$idpersona=$this->db->insert_id();
								$datausuario["idpersona"]=$idpersona;
								$dataparticipante["idpersona"]=$idpersona;
								$datacorreo["idpersona"]=$idpersona;
								$datatelefono["idpersona"]=$idpersona;
								$this->db->insert('usuario', $datausuario);
								$this->db->insert('participante', $dataparticipante);
								$this->db->insert('correo', $datacorreo);
								$this->db->insert('telefono', $datatelefono);
								if ($this->db->affected_rows() > 0) {
										$this->db->trans_complete();
								return true;
										//	$this->db->insert('aspirante', $datapa);
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
						$datausuario["idpersona"]=$idpersona;
						$dataparticipante["idpersona"]=$idpersona;
						$datacorreo["idpersona"]=$idpersona;
						$datatelefono["idpersona"]=$idpersona;
						$this->db->insert('usuario', $datausuario);
						$this->nuevo_participante($dataparticipante);
						$this->nuevo_correo($datacorreo);
						$this->nuevo_telefono($datatelefono);
						if ($this->db->affected_rows() > 0) {
							$this->db->trans_complete();
							return true;
						}else{
							$this->db->trans_complete();
							return false;
						}

				}
		}else{
				$condition = "cedula =" . "'" . $datapersona['cedula'] . "'";
				$this->db->select('*');
				$this->db->from('persona');
				$this->db->where($condition);
				$this->db->limit(1);
				$query = $this->db->get();
				if ($query->num_rows() > 0) {
						$idpersona=$query->result()[0]->idpersona;

						$condition = "idpersona =" . "'" . $idpersona . "'";
						$condition = $condition. " and idevento =" . "'" . $dataparticipante['idevento'] . "'";
						$this->db->select('*');
						$this->db->from('participante');
						$this->db->where($condition);
						$this->db->limit(1);
						$query = $this->db->get();
						if ($query->num_rows()== 0) {
							$dataparticipante["idpersona"]=$idpersona;
							$this->nuevo_participante($dataparticipante);
							if ($this->db->affected_rows() > 0) {
								$this->db->trans_complete();
								return true;
							}else{
								$this->db->trans_complete();
								return false;
							}
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
