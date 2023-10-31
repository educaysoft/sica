<?php

class Miembroareaacademica extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('periodoacademico_model');
  	  $this->load->model('miembroareaacademica_model');
  	  $this->load->model('areaacademica_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['miembroareaacademica']=$this->miembroareaacademica_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['areaacademicas']= $this->areaacademica_model->lista_areaacademicas()->result();
			
		$data['title']="Lista de miembroareaacademicas";
		$this->load->view('template/page_header');
		$this->load->view('miembroareaacademica_record',$data);
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
			$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['areaacademicas']= $this->areaacademica_model->lista_areaacademicas()->result();
			$data['title']="Nueva Miembroareaacademica";
			$this->load->view('template/page_header');		
			$this->load->view('miembroareaacademica_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idmiembroareaacademica' => $this->input->post('idmiembroareaacademica'),
			'idpersona' => $this->input->post('idpersona'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
			'idareaacademica' => $this->input->post('idareaacademica'),
			'fechadesde' => $this->input->post('fechadesde'),
			'fechahasta' => $this->input->post('fechahasta'),
	 	);
	 	$this->miembroareaacademica_model->save($array_item);
	 	redirect('miembroareaacademica');
 	}



	public function edit()
	{
			$data['miembroareaacademica'] = $this->miembroareaacademica_model->miembroareaacademica($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['comisonacademicas']= $this->comisonacademica_model->lista_comisonacademicas()->result();
			$data['title'] = "Actualizar Miembroareaacademica";
			$this->load->view('template/page_header');		
			$this->load->view('miembroareaacademica_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idmiembroareaacademica');
	 	$array_item=array(
		 	
		 	'idmiembroareaacademica' => $this->input->post('idmiembroareaacademica'),
			'idpersona' => $this->input->post('idpersona'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
			'idareaacademica' => $this->input->post('idareaacademica'),
			'fechainscripcion' => $this->input->post('fechainscripcion'),
	 	);
	 	$this->miembroareaacademica_model->update($id,$array_item);
	 	redirect('miembroareaacademica');
 	}


 	public function delete()
 	{
 		$data=$this->miembroareaacademica_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('miembroareaacademica/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		$data['title']="Miembroareaacademicas";
		$this->load->view('template/page_header');		
		$this->load->view('miembroareaacademica_list',$data);
		$this->load->view('template/page_footer');
	}



	function miembroareaacademica_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$id=$this->input->get('idareaacademica');
			$data0 = $this->miembroareaacademica_model->lista_miembroareaacademicaxarea($id);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idmiembroareaacademica,$r->elperiodo,$r->lapersona,$r->laarea,$r->fechadesde,$r->fechahasta,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('miembroareaacademica/actual').'"   data-idmiembroareaacademica="'.$r->idmiembroareaacademica.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}


	public function actual()
	{
		$data['miembroareaacademica'] = $this->miembroareaacademica_model->miembroareaacademica($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['areaacademicas']= $this->areaacademica_model->lista_areaacademicas()->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Miembroareaacademica";
		    $this->load->view('template/page_header');		
		    $this->load->view('miembroareaacademica_record',$data);
		    $this->load->view('template/page_footer');
		  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	 }







	public function elprimero()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['miembroareaacademica'] = $this->miembroareaacademica_model->elprimero();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['areaacademicas']= $this->areaacademica_model->lista_areaacademicas()->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Miembroareaacademica";
		    $this->load->view('template/page_header');		
		    $this->load->view('miembroareaacademica_record',$data);
		    $this->load->view('template/page_footer');
		  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	 }

	public function elultimo()
	{
		$data['miembroareaacademica'] = $this->miembroareaacademica_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['areaacademicas']= $this->areaacademica_model->lista_areaacademicas()->result();
		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Miembroareaacademica";
		  
		    $this->load->view('template/page_header');		
		    $this->load->view('miembroareaacademica_record',$data);
		    $this->load->view('template/page_footer');
		  }else{

		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	}

	public function siguiente(){
		$data['miembroareaacademica'] = $this->miembroareaacademica_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['areaacademicas']= $this->areaacademica_model->lista_areaacademicas()->result();

		$data['title']="Miembroareaacademica";
		$this->load->view('template/page_header');		
		$this->load->view('miembroareaacademica_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
		$data['miembroareaacademica'] = $this->miembroareaacademica_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['areaacademicas']= $this->areaacademica_model->lista_areaacademicas()->result();
		$data['title']="Miembroareaacademica";
		$this->load->view('template/page_header');		
		$this->load->view('miembroareaacademica_record',$data);
		$this->load->view('template/page_footer');
	}




}
