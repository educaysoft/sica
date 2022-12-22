<?php

class Portafolio extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('documento_model');
  	  $this->load->model('periodoacademico_model');
  	  $this->load->model('portafolio_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['portafolios']=$this->portafolio_model->lista_portafoliosA()->row_array();
  	$data['personas']= $this->persona_model->lista_personasA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			
		$data['title']="Lista de portafolios";
		$this->load->view('template/page_header');
		$this->load->view('portafolio_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{
		$data['personas']= $this->persona_model->lista_personasA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['title']="Nueva Portafolio";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('portafolio_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idpersona' => $this->input->post('idpersona'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->portafolio_model->save($array_item);
	 	redirect('portafolio');
 	}



public function edit()
{
	 	$data['portafolio'] = $this->portafolio_model->portafolio($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personasA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
 	 	$data['title'] = "Actualizar Portafolio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('portafolio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idportafolio');
	 	$array_item=array(
		 	
		 	'idportafolio' => $this->input->post('idportafolio'),
			'idpersona' => $this->input->post('idpersona'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->portafolio_model->update($id,$array_item);
	 	redirect('portafolio');
 	}


 	public function delete()
 	{
 		$data=$this->portafolio_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('portafolio/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Portafolios";
	$this->load->view('template/page_header');		
  $this->load->view('portafolio_list',$data);
	$this->load->view('template/page_footer');
}



function portafolio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->portafolio_model->lista_portafoliosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idportafolio,$r->elpersona,$r->elperiodoacademico,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('portafolio/actual').'"  data-idportafolio="'.$r->idportafolio.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



	function asignaturapersona_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idportafolio=$this->input->get('idportafolio');
			$data0 =$this->asignaturapersona_model->lista_asignaturapersonasA($idportafolio);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idportafolio,$r->idasignaturapersona,$r->laasignatura,$r->paralelo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('asignaturapersona/actual').'"    data-idasignaturapersona="'.$r->idasignaturapersona.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}





	function documento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idpersona=$this->input->get('idpersona');
			$data0 =$this->documento_model->lista_documentosC($idpersona);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumento,$r->idpersona,$r->asunto,$r->fechaelaboracion,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('documento/actual').'"    data-iddocumento="'.$r->iddocumento.'">Ver</a>');
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
	$data['portafolio'] = $this->portafolio_model->portafolio($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	  if(!empty($data))
	  {
  	$data['personas']= $this->persona_model->lista_personasA()->result();
    $data['title']="Portafolio";
    $this->load->view('template/page_header');		
    $this->load->view('portafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['personas']= $this->persona_model->lista_personasA()->result();
	$data['portafolio'] = $this->portafolio_model->elprimero();
	  if(!empty($data))
	  {
  	$data['personas']= $this->persona_model->lista_personasA()->result();
    $data['title']="Portafolio";
    $this->load->view('template/page_header');		
    $this->load->view('portafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['portafolio'] = $this->portafolio_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personasA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Portafolio";
  
    $this->load->view('template/page_header');		
    $this->load->view('portafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['portafolio_list']=$this->portafolio_model->lista_portafolio()->result();
	$data['portafolio'] = $this->portafolio_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personasA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  

$data['title']="Portafolio";
	$this->load->view('template/page_header');		
  $this->load->view('portafolio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['portafolio_list']=$this->portafolio_model->lista_portafolio()->result();
	$data['portafolio'] = $this->portafolio_model->anterior($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personasA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  $data['title']="Portafolio";
	$this->load->view('template/page_header');		
  $this->load->view('portafolio_record',$data);
	$this->load->view('template/page_footer');
}




}
