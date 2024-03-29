<?php

class Paispersona extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('pais_model');
  	  $this->load->model('paispersona_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['paispersona']=$this->paispersona_model->lista_paispersonas()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  	$data['paispersonas']= $this->paispersona_model->lista_paispersonas()->result();
			
		$data['title']="Lista de paispersonas";
		$this->load->view('template/page_header');
		$this->load->view('paispersona_record',$data);
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
			$data['title']="Nueva Paispersona";
			$this->load->view('template/page_header');		
			$this->load->view('paispersona_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'idpaispersona' => $this->input->post('idpaispersona'),
		'idpersona' => $this->input->post('idpersona'),
		'idpais' => $this->input->post('idpais'),
		'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->paispersona_model->save($array_item);
	 	redirect('paispersona');
 	}



	public function edit()
	{
			$data['paispersona'] = $this->paispersona_model->paispersona($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['paises']= $this->pais_model->lista_paises()->result();
			$data['title'] = "Actualizar Paispersona";
			$this->load->view('template/page_header');		
			$this->load->view('paispersona_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idpaispersona');
	 	$array_item=array(
		 	
		 	'idpaispersona' => $this->input->post('idpaispersona'),
			'idpersona' => $this->input->post('idpersona'),
			'idpais' => $this->input->post('idpais'),
			'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->paispersona_model->update($id,$array_item);
	 	redirect('paispersona');
 	}


 	public function delete()
 	{
 		$data=$this->paispersona_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('paispersona/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Paispersonas";
		$this->load->view('template/page_header');		
		$this->load->view('paispersona_list',$data);
		$this->load->view('template/page_footer');
	}



function paispersona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->paispersona_model->lista_paispersonasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpaispersona,$r->lapersona,$r->lapais,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('paispersona/actual').'"   data-idpaispersona="'.$r->idpaispersona.'">Ver</a>');
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


	$data['paispersona'] = $this->paispersona_model->paispersona($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Paispersona";
    $this->load->view('template/page_header');		
    $this->load->view('paispersona_record',$data);
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


	$data['paispersona'] = $this->paispersona_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Paispersona";
    $this->load->view('template/page_header');		
    $this->load->view('paispersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['paispersona'] = $this->paispersona_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Paispersona";
  
    $this->load->view('template/page_header');		
    $this->load->view('paispersona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['paispersona_list']=$this->paispersona_model->lista_paispersona()->result();
	$data['paispersona'] = $this->paispersona_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  

$data['title']="Paispersona";
	$this->load->view('template/page_header');		
  $this->load->view('paispersona_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['paispersona_list']=$this->paispersona_model->lista_paispersona()->result();
	$data['paispersona'] = $this->paispersona_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['paises']= $this->pais_model->lista_paises()->result();
  $data['title']="Paispersona";
	$this->load->view('template/page_header');		
  $this->load->view('paispersona_record',$data);
	$this->load->view('template/page_footer');
}




}
