<?php

class Persona extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('persona_model');
      $this->load->model('correo_model');
      $this->load->model('telefono_model');
      $this->load->model('genero_model');
}

public function index(){
 if(isset($this->session->userdata['logged_in'])){
	$data['persona'] = $this->persona_model->elultimo();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
  	$data["generos"]= $this->genero_model->lista_generos()->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
	$data['title']="Modulo de Personas";
	$this->load->view('template/page_header');		
	$this->load->view('persona_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}


public function actual(){
 if(isset($this->session->userdata['logged_in'])){
	$data['persona']=$this->persona_model->persona($this->uri->segment(3))->row_array();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
  	$data["generos"]= $this->genero_model->lista_generos()->result();
	$data['title']="Modulo de Personas";
	$this->load->view('template/page_header');		
	$this->load->view('persona_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}



public function add()
{
		$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['generos']= $this->genero_model->lista_generos()->result();
		$data['title']="Nueva Persona";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('persona_form',$data);
	 	$this->load->view('template/page_footer');
}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idpersona' => $this->input->post('idpersona'),
      			'cedula' => $this->input->post('cedula'),
		 	'nombres' => $this->input->post('nombres'),
			'apellidos' => $this->input->post('apellidos'),
			'fechanacimiento' => $this->input->post('fechanacimiento'),
			'idgenero' => $this->input->post('idgenero'),
			'foto' => $this->input->post('foto'));
	
		$array_correo=array(
			'idpersona'=>0,
			'nombre'=>$this->input->post('correo'),
			'idcorreo_estado'=>1);
			
		$array_telefono=array(
			'idpersona'=>0,
			'numero'=>$this->input->post('telefono'),
			'idoperadora'=>1,
			'idtelefono_estado'=>1);
		$result=$this->persona_model->save($array_item,$array_correo,$array_telefono);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Persona ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


public function edit()
{
	$data["persona"] = $this->persona_model->persona($this->uri->segment(3))->row_array();
  	$data["generos"]= $this->genero_model->lista_generos()->result();
  	$data["title"] = "Actualizar Persona";
  	$this->load->view('template/page_header');		
  	$this->load->view('persona_edit',$data);
 	$this->load->view('template/page_footer');
}


	public function  save_edit()
	{
		$id=$this->input->post('idpersona');
	 	$array_item=array(
		 	
		 	'idpersona' => $this->input->post('idpersona'),
		 	'cedula' => $this->input->post('cedula'),
     'nombres' => $this->input->post('nombres'),
		 	'apellidos' => $this->input->post('apellidos'),
			'fechanacimiento' => $this->input->post('fechanacimiento'),
			'idgenero' => $this->input->post('idgenero'),
	 	);
	 	$this->persona_model->update($id,$array_item);
	 	redirect('persona/actual/'.$id);
 	}


 	public function delete()
 	{
 		$data=$this->persona_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('persona/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function listar()
{
	
  $data['persona'] = $this->persona_model->lista_personas()->result();
  $data['title']="Personas";
	$this->load->view('template/page_header');		
  $this->load->view('persona_list',$data);
	$this->load->view('template/page_footer');
}






function persona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->persona_model->lista_personas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpersona,$r->cedula,$r->apellidos,$r->nombres,$r->fechanacimiento,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('persona/actual').'"    data-idpersona="'.$r->idpersona.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}






public function elprimero()
{

	$data['persona'] = $this->persona_model->elprimero();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
  	$data["generos"]= $this->genero_model->lista_generos()->result();
  if(!empty($data))
  {
    $data['title']="Persona";
  
    $this->load->view('template/page_header');		
    $this->load->view('persona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }


public function elultimo()
{

	$data['persona'] = $this->persona_model->elultimo();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
  	$data["generos"]= $this->genero_model->lista_generos()->result();
  if(!empty($data))
  {
    $data['title']="Personas";
  
    $this->load->view('template/page_header');		
    $this->load->view('persona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }








public function siguiente(){
	$data['persona'] = $this->persona_model->siguiente($this->uri->segment(3))->row_array();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
  	$data["generos"]= $this->genero_model->lista_generos()->result();
  	$data['title']="Personas";
	$this->load->view('template/page_header');		
  	$this->load->view('persona_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
	$data['persona'] = $this->persona_model->anterior($this->uri->segment(3))->row_array();
	$data['correos'] =$this->correo_model->correospersona($data['persona']['idpersona'])->result();
  	$data["generos"]= $this->genero_model->lista_generos()->result();
	$data['telefonos'] =$this->telefono_model->telefonospersona($data['persona']['idpersona'])->result();
  	$data['title']="Personas";
	$this->load->view('template/page_header');		
  	$this->load->view('persona_record',$data);
	$this->load->view('template/page_footer');
}







}
