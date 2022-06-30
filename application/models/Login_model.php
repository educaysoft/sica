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
	// varible fuente para saber de donde fue llamada 0 =php   1=javascrip
public function registration_insert($fuente, $datapersona,$datausuario,$dataparticipante,$datacorreo,$datatelefono) {

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
								$this->db->insert('participante', $dataparticipante);
								$this->db->insert('correo', $datacorreo);
								$this->db->insert('telefono', $datatelefono);
								$this->db->insert('usuario', $datausuario);
								if ($this->db->affected_rows() > 0) {
								    $idusuario=$this->db->insert_id();
								    $date = date('d-m-y h:i:s');
								    $this->db->insert('password', array('idusuario'=>$idusuario,'idevento'=>$dataparticipante['idevento'],'password'=>$datausuario['password'],'onoff'=>1,'fechaon'=>$date,'fechaoff'=>''));
                    
								    if ($this->db->affected_rows() > 0) {
								      $this->db->trans_complete();
									if($fuente==0){
										return true;
									}else{
										$X=array('resultado'=>'TRUE');	
										echo json_encode($X);
									}
								    }else{
								      $this->db->trans_complete();
									if($fuente==0){
										return false;
								    }else{
										$X=array('resultado'=>'FALSE');	
										echo json_encode($X);
								    }
								    }
                						}	
						}else {
									if($fuente==0){
										return false;
									}else{
										$X=array('resultado'=>'FALSE');	
										echo json_encode($X);
									}
						}
				}else{
						$idpersona=$query->result()[0]->idpersona;
						$datausuario["idpersona"]=$idpersona;
						$dataparticipante["idpersona"]=$idpersona;
						$datacorreo["idpersona"]=$idpersona;
						$datatelefono["idpersona"]=$idpersona;
						$this->nuevo_participante($dataparticipante);
						$this->nuevo_correo($datacorreo);
						$this->nuevo_telefono($datatelefono);
						$this->db->insert('usuario', $datausuario);
						if ($this->db->affected_rows() > 0) {
							    $idusuario=$this->db->insert_id();
							    $date = date('d-m-y h:i:s');
							    $this->db->insert('password', array('idusuario'=>$idusuario,'idevento'=>$dataparticipante['idevento'],'password'=>$datausuario['password'],'onoff'=>1,'fechaon'=>$date,'fechaoff'=>''));
							    if ($this->db->affected_rows() > 0) {
							      $this->db->trans_complete();
									if($fuente==0){
										return true;
									}else{
										$X=array('resultado'=>'TRUE');	
										echo json_encode($X);
									}
							    }else{
							      $this->db->trans_complete();
									if($fuente==0){
										return false;
									}else{
										$X=array('resultado'=>'FALSE');	
										echo json_encode($X);
									}
							    }
            					}
				}
		}else{
				$idusuario=$query->result()[0]->idusuario;
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
                $condition = "idusuario =" . "'" . $idusuario . "'";
                $condition = $condition. " and onoff = 1";
                $this->db->select('*');
                $this->db->from('password');
                $this->db->where($condition);
                $this->db->limit(1);
                $query = $this->db->get();
                if ($query->num_rows()> 0) {
                      $date = date('d-m-y h:i:s');
                      $condition = "idusuario =" . "'" . $idusuario . "'";
                      $condition = $condition. " and onoff = 1";
                      $this->db->where($condition);
                      $this->db->update('password',array('onoff'=>0,'fechaoff'=>$date));
                      $this->db->insert('password', array('idusuario'=>$idusuario,'idevento'=>$dataparticipante['idevento'],'password'=>$datausuario['password'],'onoff'=>1,'fechaon'=>$date,'fechaoff'=>''));
                  }else{
                      $date = date('d-m-y h:i:s');
                      $this->db->insert('password', array('idusuario'=>$idusuario,'idevento'=>$dataparticipante['idevento'],'password'=>$datausuario['password'],'onoff'=>1,'fechaon'=>$date,'fechaoff'=>''));
                  }
							if ($this->db->affected_rows() > 0) {
								$this->db->trans_complete();
								if($fuente==0){
									return true;
								}else{
									$X=array('resultado'=>'TRUE');	
									echo json_encode($X);
								}
							}else{
								$this->db->trans_complete();
									if($fuente==0){
										return false;
									}else{
										$X=array('resultado'=>'FALSE');	
										echo json_encode($X);
									}
							}
            }else {
                $condition = "idusuario =" .  $idusuario ;
                $condition = $condition. " and onoff = 1";
                $condition = $condition. " and password =" . "'" . $datausuario['password'] . "'";
                $this->db->select('*');
                $this->db->from('password');
                $this->db->where($condition);
                $this->db->limit(1);
                $query = $this->db->get();
                if ($query->num_rows()== 0) {
                      $date = date('d-m-y h:i:s');
                      $this->db->insert('password', array('idusuario'=>$idusuario,'idevento'=>$dataparticipante['idevento'],'password'=>$datausuario['password'],'onoff'=>1,'fechaon'=>$date,'fechaoff'=>''));
		      
								if($fuente==0){
									return true;
								}else{
									$X=array('resultado'=>'TRUE');	
									echo json_encode($X);
								}
                  }
	

            }
				}
		}

}
// Read data using username and password
public function login($data) {
      $condition = "email =" . "'" . $data['email'] . "'";
      $this->db->select('*');
      $this->db->from('usuario');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();

      if ($query->num_rows() == 1) {
            $idusuario=$query->result()[0]->idusuario;
            $condition = "idusuario =" . "'" . $idusuario . "' AND " . "password =" . "'" . $data['password'] . "' AND "."idevento =".$data['idevento'];
         //   $condition = $condition. " and onoff = 1" ;
            $this->db->select('*');
            $this->db->from('password');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                return true;
            }else{
                return false;
            }
      } else {
      return false;
      }
}

// Read data from database to show data in admin page
public function read_user_information($email,$password,$idevento) {
	$condition = "email =" . "'" . $email . "'";
	$this->db->select('*');
	$this->db->from('usuario');
	$this->db->where($condition);
	$this->db->limit(1);
  $query = $this->db->get();
		$arrusuario=$query->result();
     if ($query->num_rows() == 1) {
            $idusuario=$query->result()[0]->idusuario;
            $condition = "idusuario =" . "'" . $idusuario . "'";
            $condition = $condition. " and idevento= ". $idevento ;
            $this->db->select('*');
            $this->db->from('password');
            $this->db->where($condition);
	    $this->db->where("password like binary",$password);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 1) {
                $arrusuario[0]->{'idevento'}=$query->result()[0]->idevento;
                $condition = "idevento =" .$query->result()[0]->idevento ;
	              $this->db->select('*');
                $this->db->from('evento');
                $this->db->where($condition);
                $this->db->limit(1);
                $query = $this->db->get();
                if ($query->num_rows() == 1) {

                        $condition = "idpagina =" .$query->result()[0]->idpagina ;
                        $this->db->select('*');
                        $this->db->from('pagina');
                        $this->db->where($condition);
                        $this->db->limit(1);
                        $query = $this->db->get();
                        if ($query->num_rows() == 1) {
                              $arrusuario[0]->{'inicio'}=$query->result()[0]->ruta;
                           //    print_r($arrusuario);
                           //      die();
                              return $arrusuario;
                          } else {
                           return false;
                          }
                }else{
                           return false;

                }         
            }else{

              return false;
            }
        }else{
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
