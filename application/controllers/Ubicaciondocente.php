<?php
class Ubicaciondocente extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('ubicaciondocente_model');
      		$this->load->model('unidad_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('articulo_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['ubicaciondocente'] = $this->ubicaciondocente_model->elultimo();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['unidades']= $this->unidad_model->lista_unidades()->result();

 		// print_r($data['ubicaciondocente_list']);
  		$data['title']="Lista de Ubicaciondocentees";
		$this->load->view('template/page_header');		
  		$this->load->view('ubicaciondocente_record',$data);
		$this->load->view('template/page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['ubicaciondocente'] = $this->ubicaciondocente_model->ubicaciondocente($this->uri->segment(3))->row_array();


		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Ubicaciondocente del unidad";
	 
		$data['title']="Modulo ubicación del artículo: ";
		$this->load->view('template/page_header');		
		$this->load->view('ubicaciondocente_record',$data);
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
		$data['title']="Nueva ubicación de artículo: ";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('ubicaciondocente_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idunidad' => $this->input->post('idunidad'),
	 	);
	 	$result=$this->ubicaciondocente_model->save($array_item);
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
	 	$data['ubicaciondocente'] = $this->ubicaciondocente_model->ubicaciondocente($this->uri->segment(3))->row_array();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Ubicaciondocente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ubicaciondocente_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idubicaciondocente');
	 	$array_item=array(
		 	'idubicaciondocente' => $this->input->post('idubicaciondocente'),

		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idunidad' => $this->input->post('idunidad'),
	 	);
	 	$this->ubicaciondocente_model->update($id,$array_item);
	 	redirect('ubicaciondocente/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->ubicaciondocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ubicaciondocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('template/page_header');		
  $this->load->view('ubicaciondocente_list',$data);
	$this->load->view('template/page_footer');
}



function ubicaciondocente_data()
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

	 	$data0 = $this->ubicaciondocente_model->ubicaciondocentesA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idubicaciondocente,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('ubicaciondocente/actual').'"   data-idubicaciondocente="'.$r->idubicaciondocente.'">Ver</a>');
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
		

	 	$data['ubicaciondocentes']= $this->ubicaciondocente_model->ubicaciondocentesA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('template/page_header');		
		$this->load->view('ubicaciondocente_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}





public function elprimero()
{
  	$data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['ubicaciondocente'] = $this->ubicaciondocente_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicaciondocente del unidad";
    $this->load->view('template/page_header');		
    $this->load->view('ubicaciondocente_record',$data);
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
	$data['ubicaciondocente'] = $this->ubicaciondocente_model->elultimo();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicaciondocente del unidad";
  
    $this->load->view('template/page_header');		
    $this->load->view('ubicaciondocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['ubicaciondocente_list']=$this->ubicaciondocente_model->lista_ubicaciondocente()->result();
	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['ubicaciondocente'] = $this->ubicaciondocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Ubicaciondocente del unidad";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('ubicaciondocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['ubicaciondocente_list']=$this->ubicaciondocente_model->lista_ubicaciondocente()->result();
  $data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['ubicaciondocente'] = $this->ubicaciondocente_model->anterior($this->uri->segment(3))->row_array();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Ubicaciondocente del unidad";
	$this->load->view('template/page_header');		
  $this->load->view('ubicaciondocente_record',$data);
	$this->load->view('template/page_footer');
}







public function get_ubicaciondocente() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idubicaciondocente')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idubicaciondocente' => $this->input->get('idubicaciondocente')));
        $query = $this->db->get('ubicaciondocente');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
