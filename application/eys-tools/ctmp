<?php

class Miembrocomisionacademica extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('periodoacademico_model');
  	  $this->load->model('miembrocomisionacademica_model');
  	  $this->load->model('comisionacademica_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['miembrocomisionacademica']=$this->miembrocomisionacademica_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['comisionacademicas']= $this->comisionacademica_model->lista_comisionacademicas()->result();
			
		$data['title']="Lista de miembrocomisionacademicas";
		$this->load->view('template/page_header');
		$this->load->view('miembrocomisionacademica_record',$data);
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
			$data['comisionacademicas']= $this->comisionacademica_model->lista_comisionacademicas()->result();
			$data['title']="Nueva Miembrocomisionacademica";
			$this->load->view('template/page_header');		
			$this->load->view('miembrocomisionacademica_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idmiembrocomisionacademica' => $this->input->post('idmiembrocomisionacademica'),
			'idpersona' => $this->input->post('idpersona'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
			'idcomisionacademica' => $this->input->post('idcomisionacademica'),
			'fechadesde' => $this->input->post('fechadesde'),
			'fechahasta' => $this->input->post('fechahasta'),
	 	);
	 	$this->miembrocomisionacademica_model->save($array_item);
	 	redirect('miembrocomisionacademica');
 	}



	public function edit()
	{
			$data['miembrocomisionacademica'] = $this->miembrocomisionacademica_model->miembrocomisionacademica($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['comisonacademicas']= $this->comisonacademica_model->lista_comisonacademicas()->result();
			$data['title'] = "Actualizar Miembrocomisionacademica";
			$this->load->view('template/page_header');		
			$this->load->view('miembrocomisionacademica_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idmiembrocomisionacademica');
	 	$array_item=array(
		 	
		 	'idmiembrocomisionacademica' => $this->input->post('idmiembrocomisionacademica'),
			'idpersona' => $this->input->post('idpersona'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
			'idcomisionacademica' => $this->input->post('idcomisionacademica'),
			'fechainscripcion' => $this->input->post('fechainscripcion'),
	 	);
	 	$this->miembrocomisionacademica_model->update($id,$array_item);
	 	redirect('miembrocomisionacademica');
 	}


 	public function delete()
 	{
 		$data=$this->miembrocomisionacademica_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('miembrocomisionacademica/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		$data['title']="Miembrocomisionacademicas";
		$this->load->view('template/page_header');		
		$this->load->view('miembrocomisionacademica_list',$data);
		$this->load->view('template/page_footer');
	}



	function miembrocomisionacademica_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->miembrocomisionacademica_model->lista_miembrocomisionacademicasB();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idmiembrocomisionacademica,$r->elperiodo,$r->lapersona,$r->lacomision,$r->fechadesde,$r->fechahasta,
					$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('miembrocomisionacademica/actual').'"   data-idmiembrocomisionacademica="'.$r->idmiembrocomisionacademica.'">Ver</a>');
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
		$data['miembrocomisionacademica'] = $this->miembrocomisionacademica_model->miembrocomisionacademica($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['comisionacademicas']= $this->comisionacademica_model->lista_comisionacademicas()->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Miembrocomisionacademica";
		    $this->load->view('template/page_header');		
		    $this->load->view('miembrocomisionacademica_record',$data);
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
		$data['miembrocomisionacademica'] = $this->miembrocomisionacademica_model->elprimero();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['comisionacademicas']= $this->comisionacademica_model->lista_comisionacademicas()->result();

		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Miembrocomisionacademica";
		    $this->load->view('template/page_header');		
		    $this->load->view('miembrocomisionacademica_record',$data);
		    $this->load->view('template/page_footer');
		  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	 }

	public function elultimo()
	{
		$data['miembrocomisionacademica'] = $this->miembrocomisionacademica_model->elultimo();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['comisionacademicas']= $this->comisionacademica_model->lista_comisionacademicas()->result();
		  if(!empty($data))
		  {
			$data['personas']= $this->persona_model->lista_personas()->result();
		    $data['title']="Miembrocomisionacademica";
		  
		    $this->load->view('template/page_header');		
		    $this->load->view('miembrocomisionacademica_record',$data);
		    $this->load->view('template/page_footer');
		  }else{

		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
		  }
	}

	public function siguiente(){
		$data['miembrocomisionacademica'] = $this->miembrocomisionacademica_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['comisionacademicas']= $this->comisionacademica_model->lista_comisionacademicas()->result();

		$data['title']="Miembrocomisionacademica";
		$this->load->view('template/page_header');		
		$this->load->view('miembrocomisionacademica_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
		$data['miembrocomisionacademica'] = $this->miembrocomisionacademica_model->anterior($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['comisionacademicas']= $this->comisionacademica_model->lista_comisionacademicas()->result();
		$data['title']="Miembrocomisionacademica";
		$this->load->view('template/page_header');		
		$this->load->view('miembrocomisionacademica_record',$data);
		$this->load->view('template/page_footer');
	}




}
