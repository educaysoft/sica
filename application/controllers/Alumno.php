<?php

class Alumno extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('alumno_model');
  	  $this->load->model('matricula_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['alumno']=$this->alumno_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			
		$data['title']="Lista de alumnos";
		$this->load->view('template/page_header');
		$this->load->view('alumno_record',$data);
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
		$this->load->view('alumno_list_pdf',$data);
	}







public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['alumno']=$this->alumno_model->alumno($this->uri->segment(3))->row_array();


	$data['title']="Modulo de Estudiane";
	$this->load->view('template/page_header');		
	$this->load->view('alumno_record',$data);
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
			$data['title']="Nueva Alumno";
			$this->load->view('template/page_header');		
			$this->load->view('alumno_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idalumno' => $this->input->post('idalumno'),
			'idpersona' => $this->input->post('idpersona'),
	 	);
	 	$result=$this->alumno_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Alumno ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
			$data['alumno'] = $this->alumno_model->alumno($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['title'] = "Actualizar Alumno";
			$this->load->view('template/page_header');		
			$this->load->view('alumno_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idalumno');
	 	$array_item=array(
		 	
		 	'idalumno' => $this->input->post('idalumno'),
			'idpersona' => $this->input->post('idpersona'),
	 	);
	 	$this->alumno_model->update($id,$array_item);
	 	redirect('alumno');
 	}


 	public function delete()
 	{
 		$data=$this->alumno_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('alumno/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		$data['title']="Alumnos";
		$this->load->view('template/page_header');		
		$this->load->view('alumno_list',$data);
		$this->load->view('template/page_footer');
	}


	function alumno_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->alumno_model->lista_alumnosA();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idalumno,$r->idpersona,$r->elalumno,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('alumno/actual').'"  data-idalumno="'.$r->idalumno.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}








	function matricula_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$idalumno=$this->input->get('idalumno');
			$data0 = $this->matricula_model->lista_matriculas1($idalumno);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idmatricula,$r->idalumno,$r->eldepartamento,$r->elperiodo,$r->eltipomatricula,$r->nivelacademico,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('matricula/actual').'"  data-idmatricula="'.$r->idmatricula.'">Ver</a>');
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
		$data['alumno'] = $this->alumno_model->elprimero();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Alumno";
		    $this->load->view('template/page_header');		
		    $this->load->view('alumno_record',$data);
		    $this->load->view('template/page_footer');
		  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	 }

	public function elultimo()
	{
		$data['alumno'] = $this->alumno_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Alumno";
		  
		    $this->load->view('template/page_header');		
		    $this->load->view('alumno_record',$data);
		    $this->load->view('template/page_footer');
		  }else{

		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	}

	public function siguiente(){
		$data['alumno'] = $this->alumno_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();

		$data['title']="Alumno";
		$this->load->view('template/page_header');		
		$this->load->view('alumno_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
		$data['alumno'] = $this->alumno_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Alumno";
		$this->load->view('template/page_header');		
		$this->load->view('alumno_record',$data);
		$this->load->view('template/page_footer');
	}




}
