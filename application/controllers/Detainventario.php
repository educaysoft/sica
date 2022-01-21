<?php

class Detainventario extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('detainventario_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('articulo_model');
  	  $this->load->model('inventario_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['detainventario'] = $this->detainventario_model->elprimero();
  		$data['personas']= $this->persona_model->lista_persona()->result();
  		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['inventarios']= $this->inventario_model->lista_inventario()->result();
			
		$data['title']="Lista de detainventarioes";
		$this->load->view('template/page_header');
		$this->load->view('detainventario_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }




public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['detainventario'] = $this->detainventario_model->detainventario($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['articulos']= $this->articulo_model->lista_articulos()->result();
  	$data['inventarios']= $this->inventario_model->lista_inventario()->result();
	$data['title']="Modulo de Detainventarios";
	$this->load->view('template/page_header');		
	$this->load->view('detainventario_record',$data);
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
  		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['inventarios']= $this->inventario_model->lista_inventario()->result();
		$data['title']="Nueva Detainventario";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('detainventario_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'ubicacion' => $this->input->post('ubicacion'),
		 	'descripcion' => $this->input->post('descripcion'),
			'idpersona' => $this->input->post('idpersona'),
			'idarticulo' => $this->input->post('idarticulo'),
			'idinventario' => $this->input->post('idinventario'),
	 	);
	 	$this->detainventario_model->save($array_item);
	 	redirect('detainventario');
 	}



public function edit()
{
	 	$data['detainventario'] = $this->detainventario_model->detainventario($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_persona()->result();
  		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['inventarios']= $this->inventario_model->lista_inventario()->result();
 	 	$data['title'] = "Actualizar Detainventario";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('detainventario_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddetainventario');
	 	$array_item=array(
		 	
		 	'iddetainventario' => $this->input->post('iddetainventario'),
		 	'numero' => $this->input->post('numero'),
			'idpersona' => $this->input->post('idpersona'),
			'idarticulo' => $this->input->post('idarticulo'),
			'idinventario' => $this->input->post('idinventario'),
	 	);
	 	$this->detainventario_model->update($id,$array_item);
	 	redirect('detainventario');
 	}


 	public function delete()
 	{
 		$data=$this->detainventario_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('detainventario/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Detainventarios";
	$this->load->view('template/page_header');		
  $this->load->view('detainventario_list',$data);
	$this->load->view('template/page_footer');
}



function detainventario_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->detainventario_model->lista_detainventariosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddetainventario,$r->lapersona,$r->numero,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-iddetainventario="'.$r->iddetainventario.'">Ver</a>');
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
	$data['detainventario'] = $this->detainventario_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['articulos']= $this->articulo_model->lista_articulo()->result();
  	$data['inventarios']= $this->inventario_model->lista_inventario()->result();
    $data['title']="Detainventario";
    $this->load->view('template/page_header');		
    $this->load->view('detainventario_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['detainventario'] = $this->detainventario_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['articulos']= $this->articulo_model->lista_articulo()->result();
  	$data['inventarios']= $this->inventario_model->lista_inventario()->result();
    $data['title']="Detainventario";
  
    $this->load->view('template/page_header');		
    $this->load->view('detainventario_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['detainventario_list']=$this->detainventario_model->lista_detainventario()->result();
	$data['detainventario'] = $this->detainventario_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['articulos']= $this->articulo_model->lista_articulo()->result();
  	$data['inventarios']= $this->inventario_model->lista_inventario()->result();
  $data['title']="Detainventario";
	$this->load->view('template/page_header');		
  $this->load->view('detainventario_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['detainventario_list']=$this->detainventario_model->lista_detainventario()->result();
	$data['detainventario'] = $this->detainventario_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['articulos']= $this->articulo_model->lista_articulo()->result();
  	$data['inventarios']= $this->inventario_model->lista_inventario()->result();
  $data['title']="Detainventario";
	$this->load->view('template/page_header');		
  $this->load->view('detainventario_record',$data);
	$this->load->view('template/page_footer');
}




}
