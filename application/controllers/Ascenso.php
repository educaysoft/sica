<?php

class Ascenso extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('ascenso_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('cliente_model');
  	  $this->load->model('evento_model');
  	  $this->load->model('cinturon_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['ascenso']=$this->ascenso_model->ascenso(1)->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['clientes']= $this->cliente_model->lista_clientesA()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['cinturones']= $this->cinturon_model->lista_cinturones()->result();
			
		$data['title']="Lista de ascensos";
		$this->load->view('template/page_header');
		$this->load->view('ascenso_record',$data);
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
  		$data['clientes']= $this->cliente_model->lista_clientesA()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['cinturones']= $this->cinturon_model->lista_cinturones()->result();
		$data['title']="Nueva Ascenso";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('ascenso_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
			'idcliente' => $this->input->post('idcliente'),
			'idevento' => $this->input->post('idevento'),
			'idcinturon' => $this->input->post('idcinturon'),
	 	);
	 	$this->ascenso_model->save($array_item);
	 	redirect('ascenso');
 	}



public function edit()
{
	 	$data['ascenso'] = $this->ascenso_model->ascenso($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Ascenso";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ascenso_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idascenso');
	 	$array_item=array(
		 	
		 	'idascenso' => $this->input->post('idascenso'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->ascenso_model->update($id,$array_item);
	 	redirect('ascenso');
 	}


 	public function delete()
 	{
 		$data=$this->ascenso_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ascenso/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Ascensos";
	$this->load->view('template/page_header');		
  $this->load->view('ascenso_list',$data);
	$this->load->view('template/page_footer');
}



function ascenso_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->ascenso_model->lista_ascensosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idascenso,$r->elcliente,$r->elevento,$r->elcinturon,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idascenso="'.$r->idascenso.'">Ver</a>');
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
	$data['ascenso'] = $this->ascenso_model->elprimero();


  if(!empty($data))
  {
 	$data['ascenso']=$this->ascenso_model->lista_ascensos()->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['clientes']= $this->cliente_model->lista_clientes1()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['cinturones']= $this->cinturon_model->lista_cinturones()->result();
	


    $data['title']="Ascenso";
    $this->load->view('template/page_header');		
    $this->load->view('ascenso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['ascenso'] = $this->ascenso_model->elultimo();
  if(!empty($data))
  {
 	$data['ascenso']=$this->ascenso_model->lista_ascensos()->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['clientes']= $this->cliente_model->lista_clientes1()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['cinturones']= $this->cinturon_model->lista_cinturones()->result();
	


    $data['title']="Ascenso";
  
    $this->load->view('template/page_header');		
    $this->load->view('ascenso_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 

	$data['ascenso'] = $this->ascenso_model->siguiente($this->uri->segment(3))->row_array();

  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['clientes']= $this->cliente_model->lista_clientes1()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['cinturones']= $this->cinturon_model->lista_cinturones()->result();
	


 	$data['title']="Ascenso";
	$this->load->view('template/page_header');		
  	$this->load->view('ascenso_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
	$data['ascenso'] = $this->ascenso_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['clientes']= $this->cliente_model->lista_clientes1()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['cinturones']= $this->cinturon_model->lista_cinturones()->result();
	 
 
  $data['title']="Ascenso";
	$this->load->view('template/page_header');		
  $this->load->view('ascenso_record',$data);
	$this->load->view('template/page_footer');
}




}
