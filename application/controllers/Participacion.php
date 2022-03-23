<?php
class Participacion extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('participacion_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('tipoparticipacion_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
		$data['participacion'] = $this->participacion_model->elultimo();

 		// print_r($data['participacion_list']);
  		$data['title']="Lista de Participaciones";
		$this->load->view('template/page_header');		
  		$this->load->view('participacion_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
		$data['title']="Nuevo Participacion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('participacion_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function evento()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
		$data['title']="Nuevo Participacion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('participacion_form1',$data);
	 	$this->load->view('template/page_footer');
	}






	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idtipoparticipacion' => $this->input->post('idtipoparticipacion'),
		 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$this->participacion_model->save($array_item);
	 	//redirect('participacion');
 	}



	public function edit()
	{
	 	$data['participacion'] = $this->participacion_model->participacion($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Participacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('participacion_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idparticipacion');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->participacion_model->update($id,$array_item);
	 	redirect('participacion');
 	}



 	public function delete()
 	{
 		$data=$this->participacion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('participacion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function listar()
{
	
  $data['participacion'] = $this->participacion_model->listar_participacion1()->result();
  $data['title']="Certificado";
	$this->load->view('template/page_header');		
  $this->load->view('participacion_list',$data);
	$this->load->view('template/page_footer');
}

function participacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->participacion_model->listar_participacion1();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idparticipacion,$r->elevento,$r->lapersona,$r->fecha,$r->tipoparticipacion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idparticipacion="'.$r->idparticipacion.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}




public function tabla()
{


$this->load->library('table');
$this->load->library('typography');






//-- Table Initiation
$tmpl = array (
  'table_open'          => '<table border="0" cellpadding="0" cellspacing="0">',
  'heading_row_start'   => '<tr class="heading">',
  'heading_row_end'     => '</tr>',
  'heading_cell_start'  => '<th>',
  'heading_cell_end'    => '</th>',
  'row_start'           => '<tr>',
  'row_end'             => '</tr>',
  'cell_start'          => '<td>',
  'cell_end'            => '</td>',
  'row_alt_start'       => '<tr class="alt">',
  'row_alt_end'         => '</tr>',
  'cell_alt_start'      => '<td>',
  'cell_alt_end'        => '</td>',
  'table_close'         => '</table>'
);
$this->table->set_template($tmpl);      
$this->table->set_caption("TABLE TITLE");

//-- Header Row
$this->table->set_heading('ID', 'Date', 'Title', 'Item');
    $this->load->database();
    $this->load->helper('form');
        $this->db->select('*');
        $query = $this->db->get('participacion1');

	if ($query->num_rows() > 0) {
		$rows=$query->result();
	
//-- Content Rows
foreach($rows as  $row)
{
  $this->table->add_row(
    anchor("work/fill_form/$row->idparticipacion", $row->idparticipacion),
    $row->fecha,
    $row->elevento,
    $this->typography->auto_typography($row->lapersona)
  );
}

//-- Display Table
$table = $this->table->generate();
echo $table;
	}






}






public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['participacion'] = $this->participacion_model->elprimero();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Participacion del documento";
    $this->load->view('template/page_header');		
    $this->load->view('participacion_record',$data);
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
	$data['participacion'] = $this->participacion_model->elultimo();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Participacion del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('participacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['participacion_list']=$this->participacion_model->lista_participacion()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['participacion'] = $this->participacion_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Participacion del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('participacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['participacion_list']=$this->participacion_model->lista_participacion()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['participacion'] = $this->participacion_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Participacion del documento";
	$this->load->view('template/page_header');		
  $this->load->view('participacion_record',$data);
	$this->load->view('template/page_footer');
}



public function get_participantes() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where(array('idevento' => $this->input->post('idevento')));
        $query = $this->db->get('participante1');
	$data=$query->result();
	echo json_encode($data);
	}
}


public function get_participacion() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where(array('idevento' => $this->input->post('idevento'),'fecha' => $this->input->post('fecha')));
        $query = $this->db->get('participacion1');

	if ($query->num_rows() > 0) {
		$data=$query->result();
		echo json_encode($data);
	}else{

		$this->db->select('idtipoparticipacion,nombre as tipoparticipacion, "" as comentario');
		$query = $this->db->get('tipoparticipacion');

		$data=$query->result();
		echo json_encode($data);
	}


    }
}




public function get_participacionp() {

    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where(array('idevento' => $this->input->post('idevento'),'fecha' => $this->input->post('fecha'),'idpersona' => $this->input->post('idpersona')));
        $query = $this->db->get('participacion1');

	if ($query->num_rows() > 0) {
		$data=$query->result();
		echo json_encode($data);
	}else{

		$this->db->select('idtipoparticipacion,nombre as tipoparticipacion, "" as comentario');
		$query = $this->db->get('tipoparticipacion');

		$data=$query->result();
		echo json_encode($data);
	}


    }


}



public function get_tipoparticipacion() {
    $this->load->database();
    $this->load->helper('form');
        $this->db->select('*');
        $query = $this->db->get('tipoparticipacion');
	$data=$query->result();
	echo json_encode($data);
	}



}

