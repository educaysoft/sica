<?php
class Docenteasignatura extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('docenteasignatura_model');
      		$this->load->model('docente_model');
      		$this->load->model('persona_model');
      		$this->load->model('asignatura_model');
      		$this->load->model('periodoacademico_model');
	}

	public function index(){
  		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['docentes']= $this->docente_model->lista_docentes()->result();
		$data['docenteasignatura'] = $this->docenteasignatura_model->elultimo();

 		// print_r($data['docenteasignatura_list']);
  		$data['title']="Lista de Docenteasignaturaes";
		$this->load->view('template/page_header');		
  		$this->load->view('docenteasignatura_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
		$data['docentes']= $this->docente_model->lista_docentesA()->result();
		$data['docenteasignatura'] = $this->docenteasignatura_model->elultimo();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['title']="Nuevo docente para el asignatura";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('docenteasignatura_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'iddocente' => $this->input->post('iddocente'),
		 	'idasignatura' => $this->input->post('idasignatura'),
		 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->docenteasignatura_model->save($array_item);
	 	redirect('docenteasignatura');
 	}



	public function edit()
	{
	 	$data['docenteasignatura'] = $this->docenteasignatura_model->docenteasignatura($this->uri->segment(3))->row_array();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['docentes']= $this->docente_model->lista_docentes()->result();
 	 	$data['title'] = "Actualizar Docenteasignatura";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('docenteasignatura_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddocenteasignatura');
	 	$array_item=array(
		 	'idasignatura' => $this->input->post('idasignatura'),
		 	'iddocente' => $this->input->post('iddocente'),
		 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->docenteasignatura_model->update($id,$array_item);
	 	redirect('docenteasignatura');
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('iddocenteasignatura');
	 	$array_item=array(
		 	'idasignatura' => $this->input->post('idasignatura'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocente' => $this->input->post('iddocente'),
	 	);
	 	echo $this->docenteasignatura_model->update($id,$array_item);
 	}



 	public function delete()
 	{
 		$data=$this->docenteasignatura_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('docenteasignatura/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Unidades del asignatura";
		$this->load->view('template/page_header');		
		$this->load->view('docenteasignatura_list',$data);
		$this->load->view('template/page_footer');
	}



	function docenteasignatura_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->docenteasignatura_model->listar_docenteasignatura1();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocenteasignatura,$r->idasignatura,$r->unidad,$r->launidad,$r->elvideo,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idasignatura="'.$r->iddocenteasignatura.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}

	//===========================================================
	//Devuelve el primer registro de la tabla
	//===========================================================

	public function elprimero()
	{
		$data['docenteasignatura'] = $this->docenteasignatura_model->elprimero();
	  if(!empty($data))
	  {
		    $data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
		    $data['docentes']= $this->docente_model->lista_docentes()->result();
		    $data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Docenteasignatura del docente";
		    $this->load->view('template/page_header');		
		    $this->load->view('docenteasignatura_record',$data);
		    $this->load->view('template/page_footer');
	  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
	  }
	}

	public function elultimo()
	{
		$data['docenteasignatura'] = $this->docenteasignatura_model->elultimo();
	  if(!empty($data))
	  {
			$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
		$data['docentes']= $this->docente_model->lista_docentes()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Docenteasignatura del docente";
	  
	    $this->load->view('template/page_header');		
	    $this->load->view('docenteasignatura_record',$data);
	    $this->load->view('template/page_footer');
	  }else{

	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function siguiente(){
	 // $data['docenteasignatura_list']=$this->docenteasignatura_model->lista_docenteasignatura()->result();
		$data['docentee']= $this->docente_model->lista_docentes()->result();
		$data['docenteasignatura'] = $this->docenteasignatura_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
	    $data['title']="Docenteasignatura del docente";
	 // $data['title']="Correo";
		$this->load->view('template/page_header');		
	  $this->load->view('docenteasignatura_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
	 // $data['docenteasignatura_list']=$this->docenteasignatura_model->lista_docenteasignatura()->result();
		$data['docentes']= $this->docente_model->lista_docentes()->result();
		$data['docenteasignatura'] = $this->docenteasignatura_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
			$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
	 // $data['title']="Correo";
	    $data['title']="Docenteasignatura del docente";
		$this->load->view('template/page_header');		
	  $this->load->view('docenteasignatura_record',$data);
		$this->load->view('template/page_footer');
	}


}
