<?php

class Docente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('docente_model');
  	  $this->load->model('estudio_model');
  	  $this->load->model('silabo_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['docente']=$this->docente_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['docente']['idpersona'])->result();
			
		$data['title']="Lista de docentes";
		$this->load->view('template/page_header');
		$this->load->view('docente_record',$data);
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
	//	print_r($data['estudios']);
	//	die();
		$data['title']="Evento";
		$this->load->view('docente_list_pdf',$data);
	}







public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['docente']=$this->docente_model->docente($this->uri->segment(3))->row_array();
	$data['estudios']= $this->estudio_model->estudios($data['docente']['idpersona'])->result();


	$data['title']="Modulo de Estudiane";
	$this->load->view('template/page_header');		
	$this->load->view('docente_record',$data);
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
			$data['title']="Nueva Docente";
			$this->load->view('template/page_header');		
			$this->load->view('docente_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'iddocente' => $this->input->post('iddocente'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$result=$this->docente_model->save($array_item);
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
			$data['docente'] = $this->docente_model->docente($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['title'] = "Actualizar Docente";
			$this->load->view('template/page_header');		
			$this->load->view('docente_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddocente');
	 	$array_item=array(
		 	
		 	'iddocente' => $this->input->post('iddocente'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$this->docente_model->update($id,$array_item);
	 	redirect('docente');
 	}


 	public function delete()
 	{
 		$data=$this->docente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('docente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		$data['title']="Docentes";
		$this->load->view('template/page_header');		
		$this->load->view('docente_list',$data);
		$this->load->view('template/page_footer');
	}



	function docente_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->docente_model->lista_docentesB();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocente,$r->eldocente,
					$r->href='<a href="javascript:void(0);" class="item_ver" data-doctos="'.$r->idpersona.'">'.$r->cantidad.'</a>',
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('docente/actual').'"  data-iddocente="'.$r->iddocente.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}




	function silabo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$iddocente=$this->input->get('iddocente');
			$data0 =$this->silabo_model->silaboss($iddocente);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocente,$r->idsilabo,$r->elsilabo,$r->elperiodo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retornos="'.site_url('silabo/actual').'"    data-idsilabo="'.$r->idsilabo.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}




	function estudio_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idpersona=$this->input->get('idpersona');
			$data0 =$this->estudio_model->estudios($idpersona);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idpersona,$r->idestudio,$r->lainstitucion,$r->nivel,$r->titulo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_vere"  data-retornoe="'.site_url('estudio/actual').'"    data-idestudio="'.$r->idestudio.'">Ver</a>');
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
		$data['docente'] = $this->docente_model->elprimero();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['docente']['idpersona'])->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Docente";
		    $this->load->view('template/page_header');		
		    $this->load->view('docente_record',$data);
		    $this->load->view('template/page_footer');
		  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	 }

	public function elultimo()
	{
		$data['docente'] = $this->docente_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estudios']= $this->estudio_model->estudios($data['docente']['idpersona'])->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Docente";
		  
		    $this->load->view('template/page_header');		
		    $this->load->view('docente_record',$data);
		    $this->load->view('template/page_footer');
		  }else{

		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	}

	public function siguiente(){
		$data['docente'] = $this->docente_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['estudios']= $this->estudio_model->estudios($data['docente']['idpersona'])->result();

		$data['title']="Docente";
		$this->load->view('template/page_header');		
		$this->load->view('docente_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
		$data['docente'] = $this->docente_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['estudios']= $this->estudio_model->estudios($data['docente']['idpersona'])->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Docente";
		$this->load->view('template/page_header');		
		$this->load->view('docente_record',$data);
		$this->load->view('template/page_footer');
	}




}
