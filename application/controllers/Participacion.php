<?php
class Participacion extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('participacion_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
         	$this->load->model('fechaevento_model');
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
	     $idevento=$this->uri->segment(3);
	    if(!isset($idevento)){
	      $idevento=0;
	    }else{
	     $data["idevento"]=$idevento;
	    }

		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->evento($idevento)->result();
		$data['tipoparticipacion']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
		$data['fechaeventos'] =$this->fechaevento_model->fechaeventos($idevento)->result();
       

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
		 	'porcentaje' => $this->input->post('porcentaje'),
		 	'ayuda' => $this->input->post('ayuda'),
		 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$result=$this->participacion_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('No se guardo la parcipación'); </script>";
			echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}
  	//redirect('participacion');
 	}


	public function  save_nota()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'porcentaje' => $this->input->post('porcentaje'),
		 	'ayuda' => $this->input->post('ayuda'),
		 	'comentario' => $this->input->post('comentario'),
		 	'idtipoparticipacion' => $this->input->post('idtipoparticipacion'),
	 	);
	 	$result=$this->participacion_model->save($array_item);
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
	 	$data['participacion'] = $this->participacion_model->participacion($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipoparticipaciones']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
 	 	$data['title'] = "Actualizar Participacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('participacion_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'idtipoparticipacion' => $this->input->post('idtipoparticipacion'),
		 	'porcentaje' => $this->input->post('porcentaje'),
		 	'ayuda' => $this->input->post('ayuda'),
		 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$this->participacion_model->update($array_item);
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
	
  $data['participacion'] = $this->participacion_model->listar_participacion1(0)->result();
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


	 	$data0 = $this->participacion_model->listar_participacion1(0);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idparticipacion,$r->idevento,$r->nombres,$r->fecha,$r->porcentaje,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('participacion/actual').'"  data-idparticipacion="'.$r->idparticipacion.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}


public function reporte()
{

	$data['evento'] = $this->evento_model->evento($this->uri->segment(3))->row_array();
	$data['fechaeventos'] =$this->fechaevento_model->fechaevento_activo2($this->uri->segment(3))->result();
  	$data['participacion'] = $this->participacion_model->listar_participacion1($this->uri->segment(3))->result();
  	$data['title']="Certificado";
	$this->load->view('template/page_header');		
 	$this->load->view('participacion_report',$data);
	$this->load->view('template/page_footer');



}

public function reportepdf()
{
	$tmp=explode("-",$this->uri->segment(3));
	$idevento=$tmp[0];
	if(isset($tmp[1]))
	{
	$nivelrpt=$tmp[1];
	}else{
	$nivelrpt=0;
	}
        $data['nivelrpt']=$nivelrpt;
	$data['evento'] = $this->evento_model->evento($idevento)->row_array();
	$data['fechaeventos'] =$this->fechaevento_model->fechaevento_activo($idevento)->result();
  	$data['participacion'] = $this->participacion_model->listar_participacion1($idevento)->result();
  	$data['title']="Certificado";
	$fechascortes=array(1=>"2022-04-08",2=>"2022-06-01",3=>"2022-06-10");
	$data['fechacorte']=$fechascortes;
//	$this->load->view('template/page_header');		
// 	$this->load->view('participacion_report',$data);
	$this->load->view('participacion_reportepdf',$data);
//	$this->load->view('template/page_footer');



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




public function actual()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['participacion'] = $this->participacion_model->participacion($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
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







public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['participacion'] = $this->participacion_model->elprimero();
  if(!empty($data))
  {
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
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
	$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
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
	$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
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
	$data['tipoparticipacions']= $this->tipoparticipacion_model->lista_tipoparticipacions()->result();
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
		    $this->db->order_by("nombres","asc");
        $this->db->where(array('idevento' => $this->input->post('idevento')));
        $query = $this->db->get('participante1');
	$data=$query->result();
	echo json_encode($data);
	}
}


public function get_participantes2() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
      $sql="";
      $sql=$sql.'select p1.*, (select porcentaje from participacion p2 where p2.idpersona=p1.idpersona and p2.fecha="'.$this->input->post('fecha').'"  and p2.idevento='.$this->input->post('idevento'). ') as porcentaje from participante1 p1 where p1.idevento='.$this->input->post('idevento').' and p1.idpersona in (select p2.idpersona from participacion p2 where p2.idevento=p1.idevento and p2.fecha="'.$this->input->post('fecha').'"  and p2.idevento='.$this->input->post('idevento').')';
$sql=$sql." union "; 

    $sql=$sql.'select p1.*, " " as porcentaje from participante1 p1 where idevento='.$this->input->post('idevento').' and p1.idpersona not in (select p2.idpersona from participacion p2 where p2.idevento=p1.idevento and p2.fecha="'.$this->input->post('fecha').'" and p2.idevento='.$this->input->post('idevento').') order by nombres ;';



   $query= $this->db->query($sql);

     //   $this->db->select('*');
		 //   $this->db->order_by("p1.nombres","asc");
     //   $this->db->where(array('p1.idevento' => $this->input->post('idevento')));
     //   $this->db->from('participante1 p1');
     //   $this->db->select('p1.*, (select porcentaje from participacion  p2 where p2.idpersona=p1.idpersona and p2.fecha="'+$this->input->post('fecha')+'") as porcentaje');
      //  $query = $this->db->get();
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
        $this->db->where('idevento',$this->input->post('idevento'));
        $this->db->where('fecha' ,$this->input->post('fecha'));
        $this->db->where('idpersona',$this->input->post('idpersona'));
        $query = $this->db->get('participacion1');

	if ($query->num_rows() > 0) {
		$data=$query->result();
		echo json_encode($data);
	}else{

	//		$this->db->select('idtipoparticipacion,nombre as tipoparticipacion, "" as comentario');
	//	$query = $this->db->get('tipoparticipacion');

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
		$data=array();
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

