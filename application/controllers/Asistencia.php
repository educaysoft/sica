<?php
class Asistencia extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('asistencia_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
      		$this->load->model('tipoasistencia_model');
         	$this->load->model('fechaevento_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['tipoasistencias']= $this->tipoasistencia_model->lista_tipoasistencias()->result();
		$data['asistencia'] = $this->asistencia_model->elultimo();

 		// print_r($data['asistencia_list']);
  		$data['title']="Lista de Asistenciaes";
		$this->load->view('template/page_header');		
  		$this->load->view('asistencia_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['tipoasistencias']= $this->tipoasistencia_model->lista_tipoasistencias()->result();
		$data['fechaeventos'] =$this->fechaevento_model->fechaeventos($idevento)->result();
		$data['title']="Nuevo Asistencia";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('asistencia_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function evento()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['tipoasistencias']= $this->tipoasistencia_model->lista_tipoasistencias()->result();
		$data['title']="Nuevo Asistencia";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('asistencia_form1',$data);
	 	$this->load->view('template/page_footer');
	}






	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idtipoasistencia' => $this->input->post('idtipoasistencia'),
		 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$this->asistencia_model->save($array_item);
	 	//redirect('asistencia');
 	}




	public function  save_asistencia()
	{
	 		$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idtipoasistencia' => $this->input->post('idtipoasistencia'),
		 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$result=$this->asistencia_model->save($array_item);
	 	if($result == FALSE)
		{
			$data=array('resultado'=>"FALSE");
		}else{
			$data=array('resultado'=>"TRUE");
		}
		echo json_encode($data);
  	}	




	public function edit()
	{
	 	$data['asistencia'] = $this->asistencia_model->asistencia($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Asistencia";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('asistencia_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('idasistencia');
	 	$array_item=array(
		 	'idevento' => $this->input->post('idevento'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->asistencia_model->update($id,$array_item);
	 	redirect('asistencia');
 	}



 	public function delete()
 	{
 		$data=$this->asistencia_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('asistencia/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function listar()
{
	
  $data['asistencia'] = $this->asistencia_model->listar_asistencia1()->result();
  $data['title']="Certificado";
	$this->load->view('template/page_header');		
  $this->load->view('asistencia_list',$data);
	$this->load->view('template/page_footer');
}

function asistencia_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->asistencia_model->listar_asistencia1();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idasistencia,$r->elevento,$r->lapersona,$r->fecha,$r->tipoasistencia,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idasistencia="'.$r->idasistencia.'">Ver</a>');
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
        $query = $this->db->get('asistencia1');

	if ($query->num_rows() > 0) {
		$rows=$query->result();
	
//-- Content Rows
foreach($rows as  $row)
{
  $this->table->add_row(
    anchor("work/fill_form/$row->idasistencia", $row->idasistencia),
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
	$data['asistencia'] = $this->asistencia_model->elprimero();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();

  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Asistencia del documento";
    $this->load->view('template/page_header');		
    $this->load->view('asistencia_record',$data);
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
	$data['asistencia'] = $this->asistencia_model->elultimo();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Asistencia del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('asistencia_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['asistencia_list']=$this->asistencia_model->lista_asistencia()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['asistencia'] = $this->asistencia_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Asistencia del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('asistencia_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['asistencia_list']=$this->asistencia_model->lista_asistencia()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['asistencia'] = $this->asistencia_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Asistencia del documento";
	$this->load->view('template/page_header');		
  $this->load->view('asistencia_record',$data);
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


public function get_asistencia() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where(array('idevento' => $this->input->post('idevento'),'fecha' => $this->input->post('fecha')));
        $query = $this->db->get('asistencia1');

	if ($query->num_rows() > 0) {
		$data=$query->result();
		echo json_encode($data);
	}else{

		$this->db->select('idtipoasistencia,nombre as tipoasistencia, "" as comentario');
		$query = $this->db->get('tipoasistencia');

		$data=$query->result();
		echo json_encode($data);
	}


    }
}




public function get_asistenciap() {

    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where(array('idevento' => $this->input->post('idevento'),'fecha' => $this->input->post('fecha'),'idpersona' => $this->input->post('idpersona')));
        $query = $this->db->get('asistencia1');

	if ($query->num_rows() > 0) {
		$data=$query->result();
		echo json_encode($data);
	}else{

		$this->db->select('idtipoasistencia,nombre as tipoasistencia, "" as comentario');
		$query = $this->db->get('tipoasistencia');

		$data=$query->result();
		echo json_encode($data);
	}


    }


}



public function get_tipoasistencia() {
    $this->load->database();
    $this->load->helper('form');
        $this->db->select('*');
        $query = $this->db->get('tipoasistencia');
	$data=$query->result();
	echo json_encode($data);
	}



}

