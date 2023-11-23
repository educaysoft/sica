<?php

class Movilidadalumno extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('departamentofuente_model');
  	  $this->load->model('movilidadalumno_model');
  	  $this->load->model('tipomovilidadalumno_model');
  	  $this->load->model('departamentodestino_model');
  	  $this->load->model('etapamovilidadalumno_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['movilidadalumno']=$this->movilidadalumno_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamentofuente_model->listar_departamentofuente()->result();
			$data['departamentofuente']= $this->departamentofuente_model->listar_departamentofuente1(0)->result();
			$data['departamentodestino']= $this->departamentodestino_model->listar_departamentodestino1(0)->result();
  	$data['tipomovilidadalumno']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumnos()->result();
			
		$data['title']="Lista de movilidadalumnos";
		$this->load->view('template/page_header');
		$this->load->view('movilidadalumno_record',$data);
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
		$data['title']="Evento";
		$this->load->view('movilidadalumno_list_pdf',$data);
	}







public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['departamentos']= $this->departamentofuente_model->lista_departamentos()->result();
	$data['movilidadalumno']=$this->movilidadalumno_model->movilidadalumno($this->uri->segment(3))->row_array();
			$data['departamentofuente']= $this->departamentofuente_model->listar_departamentofuente1(0)->result();
			$data['departamentodestino']= $this->departamentodestino_model->listar_departamentodestino1(0)->result();
  	$data['tipomovilidadalumno']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumnos()->result();

	$data['title']="Modulo de Estudiane";
	$this->load->view('template/page_header');		
	$this->load->view('movilidadalumno_record',$data);
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
			$data['departamentofuente']= $this->departamentofuente_model->listar_departamentofuente1(0)->result();
			$data['departamentodestino']= $this->departamentodestino_model->listar_departamentodestino1(0)->result();
  			$data['tipomovilidadalumno']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumnos()->result();
			$data['title']="Nueva Movilidadmovilidadalumno";
			$this->load->view('template/page_header');		
			$this->load->view('movilidadalumno_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamentofuente' => $this->input->post('iddepartamentofuente'),
			'iddepartamentodestino' => $this->input->post('iddepartamentodestino'),
			'idtipomovilidadalumno' => $this->input->post('idtipomovilidadalumno'),
	 	);
	 	$result=$this->movilidadalumno_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Movilidadmovilidadalumno ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
			$data['movilidadalumno'] = $this->movilidadalumno_model->movilidadalumno($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['departamentofuente']= $this->departamentofuente_model->listar_departamentofuente1(0)->result();
			$data['departamentodestino']= $this->departamentodestino_model->listar_departamentodestino1(0)->result();
  			$data['tipomovilidadalumno']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumnos()->result();
			$data['title'] = "Actualizar Movilidadmovilidadalumno";
			$this->load->view('template/page_header');		
			$this->load->view('movilidadalumno_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idmovilidadalumno');
	 	$array_item=array(
		 	
		 	'idmovilidadalumno' => $this->input->post('idmovilidadalumno'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamentofuente' => $this->input->post('iddepartamentofuente'),
			'iddepartamentodestino' => $this->input->post('iddepartamentodestino'),
			'idtipomovilidadalumno' => $this->input->post('idtipomovilidadalumno'),
	 	);
	 	$this->movilidadalumno_model->update($id,$array_item);
	 	redirect('movilidadalumno');
 	}


 	public function delete()
 	{
 		$data=$this->movilidadalumno_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('movilidadalumno/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		$data['title']="Movilidadmovilidadalumnos";
		$this->load->view('template/page_header');		
		$this->load->view('movilidadalumno_list',$data);
		$this->load->view('template/page_footer');
	}



	function etapamovilidadalumno_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$idmovilidadalumno=$this->input->get('idmovilidadalumno');
			$data0 = $this->etapamovilidadalumno_model->lista_etapamovilidadalumnos1($idmovilidadalumno);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idetapamovilidadalumno,$r->idmovilidadalumno,$r->etapa,$r->fecha,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('movilidadalumno/actual').'"  data-idmovilidadalumno="'.$r->idmovilidadalumno.'">Ver</a>');
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
		$data['movilidadalumno'] = $this->movilidadalumno_model->elprimero();
		$data['departamentos']= $this->departamentofuente_model->lista_departamentos()->result();
  			$data['tipomovilidadalumno']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumnos()->result();
			$data['departamentofuente']= $this->departamentofuente_model->listar_departamentofuente1(0)->result();
			$data['departamentodestino']= $this->departamentodestino_model->listar_departamentodestino1(0)->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Movilidadmovilidadalumno";
		    $this->load->view('template/page_header');		
		    $this->load->view('movilidadalumno_record',$data);
		    $this->load->view('template/page_footer');
		  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	 }

	public function elultimo()
	{
		$data['movilidadalumno'] = $this->movilidadalumno_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
  			$data['tipomovilidadalumno']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumnos()->result();
			$data['departamentofuente']= $this->departamentofuente_model->listar_departamentofuente1(0)->result();
			$data['departamentodestino']= $this->departamentodestino_model->listar_departamentodestino1(0)->result();
		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Movilidadmovilidadalumno";
		  
		    $this->load->view('template/page_header');		
		    $this->load->view('movilidadalumno_record',$data);
		    $this->load->view('template/page_footer');
		  }else{

		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	}

	public function siguiente(){
		$data['movilidadalumno'] = $this->movilidadalumno_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  			$data['tipomovilidadalumno']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumnos()->result();
			$data['departamentofuente']= $this->departamentofuente_model->listar_departamentofuente1(0)->result();
			$data['departamentodestino']= $this->departamentodestino_model->listar_departamentodestino1(0)->result();

		$data['title']="Movilidadmovilidadalumno";
		$this->load->view('template/page_header');		
		$this->load->view('movilidadalumno_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
		$data['movilidadalumno'] = $this->movilidadalumno_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  			$data['tipomovilidadalumno']=$this->tipomovilidadalumno_model->lista_tipomovilidadalumnos()->result();
			$data['departamentofuente']= $this->departamentofuente_model->listar_departamentofuente1(0)->result();
			$data['departamentodestino']= $this->departamentodestino_model->listar_departamentodestino1(0)->result();
		$data['title']="Movilidadmovilidadalumno";
		$this->load->view('template/page_header');		
		$this->load->view('movilidadalumno_record',$data);
		$this->load->view('template/page_footer');
	}




}
