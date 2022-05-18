<?php

class Aspirante extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('aspirante_model');
  	  $this->load->model('estudio_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['aspirante']=$this->aspirante_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['aspirante']['idpersona'])->result();
			
		$data['title']="Lista de aspirantes";
		$this->load->view('template/page_header');
		$this->load->view('aspirante_record',$data);
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
			$data['title']="Nueva Aspirante";
			$this->load->view('template/page_header');		
			$this->load->view('aspirante_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idaspirante' => $this->input->post('idaspirante'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'fechadesde' => $this->input->post('fechadesde'),
			'fechahasta' => $this->input->post('fechahasta'),
	 	);
	 	$this->aspirante_model->save($array_item);
	 	redirect('aspirante');
 	}



	public function edit()
	{
			$data['aspirante'] = $this->aspirante_model->aspirante($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['title'] = "Actualizar Aspirante";
			$this->load->view('template/page_header');		
			$this->load->view('aspirante_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idaspirante');
	 	$array_item=array(
		 	
		 	'idaspirante' => $this->input->post('idaspirante'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'fechainscripcion' => $this->input->post('fechainscripcion'),
	 	);
	 	$this->aspirante_model->update($id,$array_item);
	 	redirect('aspirante');
 	}


 	public function delete()
 	{
 		$data=$this->aspirante_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('aspirante/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		$data['title']="Aspirantes";
		$this->load->view('template/page_header');		
		$this->load->view('aspirante_list',$data);
		$this->load->view('template/page_footer');
	}



	function aspirante_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->aspirante_model->lista_aspirantesB();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idaspirante,$r->elaspirante,$r->lacarrera,$r->fechadesde,$r->fechahasta,
					$r->href='<a href="javascript:void(0);" class="item_ver" data-doctos="'.$r->idpersona.'">'.$r->cantidad.'</a>',
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idaspirante="'.$r->idaspirante.'">Ver</a>');
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
		$data['aspirante'] = $this->aspirante_model->elprimero();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['aspirante']['idpersona'])->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Aspirante";
		    $this->load->view('template/page_header');		
		    $this->load->view('aspirante_record',$data);
		    $this->load->view('template/page_footer');
		  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	 }

	public function elultimo()
	{
		$data['aspirante'] = $this->aspirante_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estudios']= $this->estudio_model->estudios($data['aspirante']['idpersona'])->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Aspirante";
		  
		    $this->load->view('template/page_header');		
		    $this->load->view('aspirante_record',$data);
		    $this->load->view('template/page_footer');
		  }else{

		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	}

	public function siguiente(){
		$data['aspirante'] = $this->aspirante_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['aspirante']['idpersona'])->result();

		$data['title']="Aspirante";
		$this->load->view('template/page_header');		
		$this->load->view('aspirante_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
		$data['aspirante'] = $this->aspirante_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estudios']= $this->estudio_model->estudios($data['aspirante']['idpersona'])->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Aspirante";
		$this->load->view('template/page_header');		
		$this->load->view('aspirante_record',$data);
		$this->load->view('template/page_footer');
	}




}
