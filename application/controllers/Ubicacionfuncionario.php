<?php
class Ubicacionfuncionario extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('ubicacionfuncionario_model');
      		$this->load->model('unidad_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('articulo_model');
      		$this->load->model('fechacalendario_model');
      		$this->load->model('modoevaluacion_model');
	}

	public function index(){
		$data['ubicacionfuncionario'] = $this->ubicacionfuncionario_model->elultimo();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['unidades']= $this->unidad_model->lista_unidades()->result();

 		// print_r($data['ubicacionfuncionario_list']);
  		$data['title']="Lista de Ubicacionfuncionarioes";
		$this->load->view('template/page_header');		
  		$this->load->view('ubicacionfuncionario_record',$data);
		$this->load->view('template/page_footer');
	}



	public function actual(){
	 if(isset($this->session->userdata['logged_in'])){

		$data['ubicacionfuncionario'] = $this->ubicacionfuncionario_model->ubicacionfuncionario($this->uri->segment(3))->row_array();


		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Ubicacionfuncionario del unidad";
	 
		$data['title']="Modulo ubicación del artículo: ";
		$this->load->view('template/page_header');		
		$this->load->view('ubicacionfuncionario_record',$data);
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
	 	$this->load->view('ubicacionfuncionario_form',$data);
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
	 	$result=$this->ubicacionfuncionario_model->save($array_item);
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
	 	$data['ubicacionfuncionario'] = $this->ubicacionfuncionario_model->ubicacionfuncionario($this->uri->segment(3))->row_array();
		$data['articulos']= $this->articulo_model->lista_articulos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Ubicacionfuncionario";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ubicacionfuncionario_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idubicacionfuncionario');
	 	$array_item=array(
		 	'idubicacionfuncionario' => $this->input->post('idubicacionfuncionario'),

		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idunidad' => $this->input->post('idunidad'),
	 	);
	 	$this->ubicacionfuncionario_model->update($id,$array_item);
	 	redirect('ubicacionfuncionario/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->ubicacionfuncionario_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ubicacionfuncionario/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}



public function listar()
{
	
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Sesiones de evento";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionfuncionario_list',$data);
	$this->load->view('template/page_footer');
}



function ubicacionfuncionario_data()
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

	 	$data0 = $this->ubicacionfuncionario_model->ubicacionfuncionariosA($idevento);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idubicacionfuncionario,$r->elevento,$r->fecha,$r->tema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('ubicacionfuncionario/actual').'"   data-idubicacionfuncionario="'.$r->idubicacionfuncionario.'">Ver</a>');
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
		

	 	$data['ubicacionfuncionarios']= $this->ubicacionfuncionario_model->ubicacionfuncionariosA($this->uri->segment(3))->result();

		$data['title']="Evento";
	//	$this->load->view('template/page_header');		
		$this->load->view('ubicacionfuncionario_list_pdf',$data);
//		$this->load->view('template/page_footer');
	}





public function elprimero()
{
  	$data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['ubicacionfuncionario'] = $this->ubicacionfuncionario_model->elprimero();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicacionfuncionario del unidad";
    $this->load->view('template/page_header');		
    $this->load->view('ubicacionfuncionario_record',$data);
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
	$data['ubicacionfuncionario'] = $this->ubicacionfuncionario_model->elultimo();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Ubicacionfuncionario del unidad";
  
    $this->load->view('template/page_header');		
    $this->load->view('ubicacionfuncionario_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['ubicacionfuncionario_list']=$this->ubicacionfuncionario_model->lista_ubicacionfuncionario()->result();
	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  		$data['temas']= $this->tema_model->lista_temas()->result();
		$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
	$data['ubicacionfuncionario'] = $this->ubicacionfuncionario_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Ubicacionfuncionario del unidad";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionfuncionario_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['ubicacionfuncionario_list']=$this->ubicacionfuncionario_model->lista_ubicacionfuncionario()->result();
  $data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['ubicacionfuncionario'] = $this->ubicacionfuncionario_model->anterior($this->uri->segment(3))->row_array();
	$data['modoevaluacions']= $this->modoevaluacion_model->lista_modoevaluacions()->result();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Ubicacionfuncionario del unidad";
	$this->load->view('template/page_header');		
  $this->load->view('ubicacionfuncionario_record',$data);
	$this->load->view('template/page_footer');
}







public function get_ubicacionfuncionario() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idubicacionfuncionario')) 
    {
        $this->db->select('*');
    	$this->db->order_by("fecha","asc");
        $this->db->where(array('idubicacionfuncionario' => $this->input->get('idubicacionfuncionario')));
        $query = $this->db->get('ubicacionfuncionario');
	$data=$query->result();
	echo json_encode($data);
	}
}











}
