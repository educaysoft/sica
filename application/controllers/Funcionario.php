<?php

class Funcionario extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('cargo_model');
  	  $this->load->model('funcionario_model');
  	  $this->load->model('departamentofuncionario_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['funcionario']=$this->funcionario_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['cargos']= $this->cargo_model->lista_cargos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['funcionario']['idpersona'])->result();
			
		$data['title']="Lista de funcionarios";
		$this->load->view('template/page_header');
		$this->load->view('funcionario_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }





	public function reportepdf()
	{
		$idpersona=$this->uri->segment(3);
	 	$data['estudios']= $this->estudio_model->lista_estudios1($idpersona)->result();
		$data['title']="Evento";
		$this->load->view('funcionario_list_pdf',$data);
	}







public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['cargos']= $this->cargo_model->lista_cargos()->result();
	$data['funcionario']=$this->funcionario_model->funcionario($this->uri->segment(3))->row_array();
	$data['estudios']= $this->estudio_model->estudios($data['funcionario']['idpersona'])->result();


	$data['title']="Modulo de Estudiane";
	$this->load->view('template/page_header');		
	$this->load->view('funcionario_record',$data);
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
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['cargos']= $this->cargo_model->lista_cargos()->result();
			$data['title']="Nueva Funcionario";
			$this->load->view('template/page_header');		
			$this->load->view('funcionario_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idfuncionario' => $this->input->post('idfuncionario'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'idcargo' => $this->input->post('idcargo'),
			'fechaingreso' => $this->input->post('fechaingreso'),
			'fechasalida' => $this->input->post('fechasalida'),
	 	);
	 	$result=$this->funcionario_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Funcionario ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
			$data['funcionario'] = $this->funcionario_model->funcionario($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['title'] = "Actualizar Funcionario";
			$this->load->view('template/page_header');		
			$this->load->view('funcionario_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idfuncionario');
	 	$array_item=array(
		 	
		 	'idfuncionario' => $this->input->post('idfuncionario'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$this->funcionario_model->update($id,$array_item);
	 	redirect('funcionario');
 	}


 	public function delete()
 	{
 		$data=$this->funcionario_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('funcionario/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		$data['title']="Funcionarios";
		$this->load->view('template/page_header');		
		$this->load->view('funcionario_list',$data);
		$this->load->view('template/page_footer');
	}



	function departamento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$idfuncionario=$this->input->get('idfuncionario');
			$data0 = $this->departamentofuncionario_model->lista_departamentofuncionarios1($idfuncionario);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idfuncionario,$r->iddepartamento,$r->elfuncionario,$r->fechadesde,
					$r->href='<a href="javascript:void(0);" class="item_ver" data-doctos="'.$r->idfuncionario.'">'.$r->iddepartamento.'</a>',
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('funcionario/actual').'"  data-idfuncionario="'.$r->idfuncionario.'">Ver</a>');
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
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['funcionario'] = $this->funcionario_model->elprimero();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['funcionario']['idpersona'])->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Funcionario";
		    $this->load->view('template/page_header');		
		    $this->load->view('funcionario_record',$data);
		    $this->load->view('template/page_footer');
		  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	 }

	public function elultimo()
	{
		$data['funcionario'] = $this->funcionario_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estudios']= $this->estudio_model->estudios($data['funcionario']['idpersona'])->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Funcionario";
		  
		    $this->load->view('template/page_header');		
		    $this->load->view('funcionario_record',$data);
		    $this->load->view('template/page_footer');
		  }else{

		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	}

	public function siguiente(){
		$data['funcionario'] = $this->funcionario_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['funcionario']['idpersona'])->result();

		$data['title']="Funcionario";
		$this->load->view('template/page_header');		
		$this->load->view('funcionario_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
		$data['funcionario'] = $this->funcionario_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estudios']= $this->estudio_model->estudios($data['funcionario']['idpersona'])->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Funcionario";
		$this->load->view('template/page_header');		
		$this->load->view('funcionario_record',$data);
		$this->load->view('template/page_footer');
	}




}
