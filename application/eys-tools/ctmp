<?php

class Nacionalidadpersona extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('nacionalidad_model');
  	  $this->load->model('nacionalidadpersona_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['nacionalidadpersona']=$this->nacionalidadpersona_model->lista_nacionalidadpersonas()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['nacionalidades']= $this->nacionalidad_model->lista_nacionalidades()->result();
  	$data['nacionalidadpersonas']= $this->nacionalidadpersona_model->lista_nacionalidadpersonas()->result();
			
		$data['title']="Lista de nacionalidadpersonas";
		$this->load->view('template/page_header');
		$this->load->view('nacionalidadpersona_record',$data);
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
			$data['nacionalidades']= $this->nacionalidad_model->lista_nacionalidades()->result();
			$data['title']="Nueva Nacionalidadpersona";
			$this->load->view('template/page_header');		
			$this->load->view('nacionalidadpersona_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'idnacionalidadpersona' => $this->input->post('idnacionalidadpersona'),
		'idpersona' => $this->input->post('idpersona'),
		'idnacionalidad' => $this->input->post('idnacionalidad'),
		'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->nacionalidadpersona_model->save($array_item);
	 	redirect('nacionalidadpersona');
 	}



	public function edit()
	{
			$data['nacionalidadpersona'] = $this->nacionalidadpersona_model->nacionalidadpersona($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['nacionalidades']= $this->nacionalidad_model->lista_nacionalidades()->result();
			$data['title'] = "Actualizar Nacionalidadpersona";
			$this->load->view('template/page_header');		
			$this->load->view('nacionalidadpersona_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idnacionalidadpersona');
	 	$array_item=array(
		 	
		 	'idnacionalidadpersona' => $this->input->post('idnacionalidadpersona'),
			'idpersona' => $this->input->post('idpersona'),
			'idnacionalidad' => $this->input->post('idnacionalidad'),
			'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->nacionalidadpersona_model->update($id,$array_item);
	 	redirect('nacionalidadpersona');
 	}


 	public function delete()
 	{
 		$data=$this->nacionalidadpersona_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('nacionalidadpersona/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Nacionalidadpersonas";
		$this->load->view('template/page_header');		
		$this->load->view('nacionalidadpersona_list',$data);
		$this->load->view('template/page_footer');
	}



function nacionalidadpersona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->nacionalidadpersona_model->lista_nacionalidadpersonasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idnacionalidadpersona,$r->lapersona,$r->lanacionalidad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('nacionalidadpersona/actual').'"   data-idnacionalidadpersona="'.$r->idnacionalidadpersona.'">Ver</a>');
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


  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['nacionalidades']= $this->nacionalidad_model->lista_nacionalidades()->result();


	$data['nacionalidadpersona'] = $this->nacionalidadpersona_model->nacionalidadpersona($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Nacionalidadpersona";
    $this->load->view('template/page_header');		
    $this->load->view('nacionalidadpersona_record',$data);
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
  	$data['nacionalidades']= $this->nacionalidad_model->lista_nacionalidades()->result();


	$data['nacionalidadpersona'] = $this->nacionalidadpersona_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Nacionalidadpersona";
    $this->load->view('template/page_header');		
    $this->load->view('nacionalidadpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['nacionalidadpersona'] = $this->nacionalidadpersona_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['nacionalidades']= $this->nacionalidad_model->lista_nacionalidades()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Nacionalidadpersona";
  
    $this->load->view('template/page_header');		
    $this->load->view('nacionalidadpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['nacionalidadpersona_list']=$this->nacionalidadpersona_model->lista_nacionalidadpersona()->result();
	$data['nacionalidadpersona'] = $this->nacionalidadpersona_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['nacionalidades']= $this->nacionalidad_model->lista_nacionalidades()->result();
  

$data['title']="Nacionalidadpersona";
	$this->load->view('template/page_header');		
  $this->load->view('nacionalidadpersona_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['nacionalidadpersona_list']=$this->nacionalidadpersona_model->lista_nacionalidadpersona()->result();
	$data['nacionalidadpersona'] = $this->nacionalidadpersona_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['nacionalidades']= $this->nacionalidad_model->lista_nacionalidades()->result();
  $data['title']="Nacionalidadpersona";
	$this->load->view('template/page_header');		
  $this->load->view('nacionalidadpersona_record',$data);
	$this->load->view('template/page_footer');
}




}
