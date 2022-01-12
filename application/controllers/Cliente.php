<?php

class Cliente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('institucion_model');
  	  $this->load->model('cliente_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['cliente']=$this->cliente_model->lista_clientes()->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			
		$data['title']="Lista de clientes";
		$this->load->view('template/page_header');
		$this->load->view('cliente_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{
		$data['personas']= $this->persona_model->lista_persona()->result();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['title']="Nueva Cliente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('cliente_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idcliente' => $this->input->post('idcliente'),
			'idpersona' => $this->input->post('idpersona'),
			'idinstitucion' => $this->input->post('idinstitucion'),
			'fechainscripcion' => $this->input->post('fechainscripcion'),
	 	);
	 	$this->cliente_model->save($array_item);
	 	redirect('cliente');
 	}



public function edit()
{
	 	$data['cliente'] = $this->cliente_model->cliente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_persona()->result();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 	 	$data['title'] = "Actualizar Cliente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('cliente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcliente');
	 	$array_item=array(
		 	
		 	'idcliente' => $this->input->post('idcliente'),
			'idpersona' => $this->input->post('idpersona'),
			'idinstitucion' => $this->input->post('idinstitucion'),
			'fechainscripcion' => $this->input->post('fechainscripcion'),
	 	);
	 	$this->cliente_model->update($id,$array_item);
	 	redirect('cliente');
 	}


 	public function delete()
 	{
 		$data=$this->cliente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('cliente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Clientes";
	$this->load->view('template/page_header');		
  $this->load->view('cliente_list',$data);
	$this->load->view('template/page_footer');
}



function cliente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->cliente_model->lista_clientesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcliente,$r->elcliente,$r->lainstitucion,$r->fechainscripcion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcliente="'.$r->idcliente.'">Ver</a>');
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


  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();


	$data['cliente'] = $this->cliente_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
    $data['title']="Cliente";
    $this->load->view('template/page_header');		
    $this->load->view('cliente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['cliente'] = $this->cliente_model->elultimo();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
    $data['title']="Cliente";
  
    $this->load->view('template/page_header');		
    $this->load->view('cliente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['cliente_list']=$this->cliente_model->lista_cliente()->result();
	$data['cliente'] = $this->cliente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  

$data['title']="Cliente";
	$this->load->view('template/page_header');		
  $this->load->view('cliente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['cliente_list']=$this->cliente_model->lista_cliente()->result();
	$data['cliente'] = $this->cliente_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Cliente";
	$this->load->view('template/page_header');		
  $this->load->view('cliente_record',$data);
	$this->load->view('template/page_footer');
}




}
