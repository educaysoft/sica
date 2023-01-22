<?php

class Cantonpersona extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('pais_model');
  	  $this->load->model('cantonpersona_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['cantonpersona']=$this->cantonpersona_model->lista_cantonpersonas()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  	$data['cantonpersonas']= $this->cantonpersona_model->lista_cantonpersonas()->result();
			
		$data['title']="Lista de cantonpersonas";
		$this->load->view('template/page_header');
		$this->load->view('cantonpersona_record',$data);
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
			$data['paises']= $this->pais_model->lista_paises()->result();
			$data['title']="Nueva Cantonpersona";
			$this->load->view('template/page_header');		
			$this->load->view('cantonpersona_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'idcantonpersona' => $this->input->post('idcantonpersona'),
		'idpersona' => $this->input->post('idpersona'),
		'idpais' => $this->input->post('idpais'),
		'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->cantonpersona_model->save($array_item);
	 	redirect('cantonpersona');
 	}



	public function edit()
	{
			$data['cantonpersona'] = $this->cantonpersona_model->cantonpersona($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['paises']= $this->pais_model->lista_paises()->result();
			$data['title'] = "Actualizar Cantonpersona";
			$this->load->view('template/page_header');		
			$this->load->view('cantonpersona_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idcantonpersona');
	 	$array_item=array(
		 	
		 	'idcantonpersona' => $this->input->post('idcantonpersona'),
			'idpersona' => $this->input->post('idpersona'),
			'idpais' => $this->input->post('idpais'),
			'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->cantonpersona_model->update($id,$array_item);
	 	redirect('cantonpersona');
 	}


 	public function delete()
 	{
 		$data=$this->cantonpersona_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('cantonpersona/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Cantonpersonas";
		$this->load->view('template/page_header');		
		$this->load->view('cantonpersona_list',$data);
		$this->load->view('template/page_footer');
	}



function cantonpersona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->cantonpersona_model->lista_cantonpersonasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcantonpersona,$r->lapersona,$r->lapais,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('cantonpersona/actual').'"   data-idcantonpersona="'.$r->idcantonpersona.'">Ver</a>');
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
  	$data['paises']= $this->pais_model->lista_paises()->result();


	$data['cantonpersona'] = $this->cantonpersona_model->cantonpersona($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Cantonpersona";
    $this->load->view('template/page_header');		
    $this->load->view('cantonpersona_record',$data);
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
  	$data['paises']= $this->pais_model->lista_paises()->result();


	$data['cantonpersona'] = $this->cantonpersona_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Cantonpersona";
    $this->load->view('template/page_header');		
    $this->load->view('cantonpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['cantonpersona'] = $this->cantonpersona_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Cantonpersona";
  
    $this->load->view('template/page_header');		
    $this->load->view('cantonpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['cantonpersona_list']=$this->cantonpersona_model->lista_cantonpersona()->result();
	$data['cantonpersona'] = $this->cantonpersona_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  

$data['title']="Cantonpersona";
	$this->load->view('template/page_header');		
  $this->load->view('cantonpersona_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['cantonpersona_list']=$this->cantonpersona_model->lista_cantonpersona()->result();
	$data['cantonpersona'] = $this->cantonpersona_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  $data['title']="Cantonpersona";
	$this->load->view('template/page_header');		
  $this->load->view('cantonpersona_record',$data);
	$this->load->view('template/page_footer');
}




}
