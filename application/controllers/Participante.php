<?php
class Participante extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('participante_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['participante'] = $this->participante_model->elultimo();

 		// print_r($data['participante_list']);
  		$data['title']="Lista de Participantees";
		$this->load->view('template/page_header');		
  		$this->load->view('participante_record',$data);
		$this->load->view('template/page_footer');
	}


public function actual(){
 if(isset($this->session->userdata['logged_in'])){
 
   $data['documentos']= $this->documento_model->lista_documentos()->result();
  $data['eventos']= $this->evento_model->lista_eventos()->result();


		$data['personas']= $this->persona_model->lista_personas()->result();
 
 
   $data['participante']=$this->participante_model->participante($this->uri->segment(3))->row_array();
	$data['title']="Modulo de Participante";
	$this->load->view('template/page_header');		
	$this->load->view('participante_record',$data);
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
		$data['eventos']= $this->evento_model->lista_eventos_open()->result();
		$data['title']="Nuevo Participante";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('participante_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
	 	);
	 	$result=$this->participante_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Participante ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
	 	$data['participante'] = $this->participante_model->participante($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Participante";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('participante_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idparticipante');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->participante_model->update($id,$array_item);
	 	redirect('participante');
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('idparticipante');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	echo $this->participante_model->update($id,$array_item);
 	}



 	public function delete()
 	{
    $idparticipante=$_GET['idparticipante'];
    $idevento=$_GET['idevento'];

 		$data=$this->participante_model->delete($idparticipante,$idevento);
 		echo json_encode($data);
	 	redirect('participante/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}




public function listar()
{
	
  $data['participante'] = $this->participante_model->listar_participante1()->result();
  $data['title']="participantes";
	$this->load->view('template/page_header');		
  $this->load->view('participante_list',$data);
	$this->load->view('template/page_footer');
}



function participante_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->participante_model->listar_participante1();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idparticipante,$r->elevento,$r->nombres,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('participante/actual').'"    data-idparticipante="'.$r->idparticipante.'">Ver</a>');
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
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['participante'] = $this->participante_model->elprimero();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Participante del documento";
    $this->load->view('template/page_header');		
    $this->load->view('participante_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['participante'] = $this->participante_model->elultimo();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Participante del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('participante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['participante_list']=$this->participante_model->lista_participante()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['participante'] = $this->participante_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Participante del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('participante_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['participante_list']=$this->participante_model->lista_participante()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['participante'] = $this->participante_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Participante del documento";
	$this->load->view('template/page_header');		
  $this->load->view('participante_record',$data);
	$this->load->view('template/page_footer');
}




public function get_participante() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idpersona')) {
        $this->db->select('*');
        $this->db->where('idpersona',  $this->input->post('idpersona'));
        $this->db->where('idevento', $this->input->post('idevento'));
        $query = $this->db->get('participante');
	$data=$query->result();
	echo json_encode($data);
	}
}












}
