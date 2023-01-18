<?php
class Ubicacionarticulo extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('ubicacionarticulo_model');
      		$this->load->model('unidad_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('articulo_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['ubicacionarticulo'] = $this->ubicacionarticulo_model->elultimo();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();

 		// print_r($data['ubicacionarticulo_list']);
  		$data['title']="Lista de Ubicacionarticuloes";
		$this->load->view('template/page_header');		
  		$this->load->view('ubicacionarticulo_record',$data);
		$this->load->view('template/page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['ubicacionarticulo'] = $this->ubicacionarticulo_model->ubicacionarticulo($this->uri->segment(3))->row_array();


		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Ubicacionarticulo del unidad";
	 
		$data['title']="Modulo de sesiones del evento";
		$this->load->view('template/page_header');		
		$this->load->view('ubicacionarticulo_record',$data);
		$this->load->view('template/page_footer');
	   }else{
		$this->load->view('template/page_header.php');
		$this->load->view('login_form');
		$this->load->view('template/page_footer.php');
	   }
	}




	public function add()
	{

		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['unidades']= $this->unidad_model->lista_unidades()->result();
   		date_default_timezone_set('America/Guayaquil');
	     	$date = date("Y-m-d");
		$data['title']="Nueva sesion de eventos";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('ubicacionarticulo_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fechaprestamo' => $this->input->post('fechaprestamo'),
		 	'fechadevolucion' => $this->input->post('fechadevolucion'),
		 	'detalle' => $this->input->post('detalle'),
		 	'horaprestamo' => $this->input->post('horaprestamo'),
		 	'horadevolucion' => $this->input->post('horadevolucion'),
	 	);
	 	$result=$this->ubicacionarticulo_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Fecha para este evento ya fue asignado'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 
 	}



	public function edit()
	{
	 	$data['ubicacionarticulo'] = $this->ubicacionarticulo_model->ubicacionarticulo($this->uri->segment(3))->row_array();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Ubicacionarticulo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ubicacionarticulo_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idubicacionarticulo');
	 	$array_item=array(
		 	'idubicacionarticulo' => $this->input->post('idubicacionarticulo'),
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fechaprestamo' => $this->input->post('fechaprestamo'),
		 	'fechadevolucion' => $this->input->post('fechadevolucion'),
		 	'detalle' => $this->input->post('detalle'),
		 	'horaprestamo' => $this->input->post('horaprestamo'),
		 	'horadevolucion' => $this->input->post('horadevolucion'),
	 	);
	 	$this->ubicacionarticulo_model->update($id,$array_item);
	 	redirect('ubicacionarticulo/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->ubicacionarticulo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ubicacionarticulo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionarticulo_list',$data);
	$this->load->view('template/page_footer');
}



function ubicacionarticulo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		if($this->uri->segment(3))
		{
			$idevento=$this->uri->segment(3);
		}else{
			$idevento=$this->input->get('idevento');
		}

	 	$data0 = $this->ubicacionarticulo_model->ubicacionarticulosA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idubicacionarticulo,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('ubicacionarticulo/actual').'"   data-idubicacionarticulo="'.$r->idubicacionarticulo.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();

}




	public function reportepdf()
	{
		

	 	$data['ubicacionarticulos']= $this->ubicacionarticulo_model->ubicacionarticulosA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('template/page_header');		
		$this->load->view('ubicacionarticulo_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}





public function elprimero()
{
  	$data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['ubicacionarticulo'] = $this->ubicacionarticulo_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicacionarticulo del unidad";
    $this->load->view('template/page_header');		
    $this->load->view('ubicacionarticulo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['unidades']= $this->unidad_model->lista_unidades()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
	$data['ubicacionarticulo'] = $this->ubicacionarticulo_model->elultimo();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicacionarticulo del unidad";
  
    $this->load->view('template/page_header');		
    $this->load->view('ubicacionarticulo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['ubicacionarticulo_list']=$this->ubicacionarticulo_model->lista_ubicacionarticulo()->result();
	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['ubicacionarticulo'] = $this->ubicacionarticulo_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Ubicacionarticulo del unidad";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionarticulo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['ubicacionarticulo_list']=$this->ubicacionarticulo_model->lista_ubicacionarticulo()->result();
  $data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['ubicacionarticulo'] = $this->ubicacionarticulo_model->anterior($this->uri->segment(3))->row_array();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Ubicacionarticulo del unidad";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionarticulo_record',$data);
	$this->load->view('template/page_footer');
}







public function get_ubicacionarticulo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idubicacionarticulo')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idubicacionarticulo' => $this->input->get('idubicacionarticulo')));
        $query = $this->db->get('ubicacionarticulo');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
