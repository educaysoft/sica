<?php
class Pagoevento extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('pagoevento_model');
      		$this->load->model('documento_model');
      		$this->load->model('persona_model');
      		$this->load->model('evento_model');
         	$this->load->model('sesionevento_model');
	}

	public function index(){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['pagoevento'] = $this->pagoevento_model->elultimo();

 		// print_r($data['pagoevento_list']);
  		$data['title']="Lista de Pagoeventoes";
		$this->load->view('template/page_header');		
  		$this->load->view('pagoevento_record',$data);
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
		$data['sesioneventos'] =$this->sesionevento_model->sesioneventos($idevento)->result();
       

		$data['title']="Nuevo Pagoevento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('pagoevento_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function evento()
	{
		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['title']="Nuevo Pagoevento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('pagoevento_form1',$data);
	 	$this->load->view('template/page_footer');
	}






	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'valor' => $this->input->post('valor'),
		 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$result=$this->pagoevento_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('No se guardo la parcipación'); </script>";
			echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-1);</script>";
		}
  	//redirect('pagoevento');
 	}


	public function  save_nota()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'valor' => $this->input->post('valor'),
		 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$result=$this->pagoevento_model->save($array_item);
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
	 	$data['pagoevento'] = $this->pagoevento_model->pagoevento($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Pagoevento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('pagoevento_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idevento' => $this->input->post('idevento'),
		 	'fecha' => $this->input->post('fecha'),
		 	'valor' => $this->input->post('valor'),
		 	'comentario' => $this->input->post('comentario'),
	 	);
	 	$this->pagoevento_model->update($array_item);
	 	redirect('pagoevento');
 	}



 	public function delete()
 	{
 		$data=$this->pagoevento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('pagoevento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}





public function listar()
{
	
  $data['pagoevento'] = $this->pagoevento_model->listar_pagoevento1(0)->result();
  $data['title']="Certificado";
	$this->load->view('template/page_header');		
  $this->load->view('pagoevento_list',$data);
	$this->load->view('template/page_footer');
}

function pagoevento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->pagoevento_model->listar_pagoevento1(0);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpagoevento,$r->idevento,$r->nombres,$r->fecha,$r->valor,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('pagoevento/actual').'"  data-idpagoevento="'.$r->idpagoevento.'">Ver</a>');
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
	$data['sesioneventos'] =$this->sesionevento_model->sesionevento_activo2($this->uri->segment(3))->result();
  	$data['pagoevento'] = $this->pagoevento_model->listar_pagoevento1($this->uri->segment(3))->result();
  	$data['title']="Certificado";
	$this->load->view('template/page_header');		
 	$this->load->view('pagoevento_report',$data);
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
	$data['sesioneventos'] =$this->sesionevento_model->sesionevento_activo($idevento)->result();
  	$data['pagoevento'] = $this->pagoevento_model->listar_pagoevento1($idevento)->result();
  	$data['title']="Certificado";
	$fechascortes=array(1=>"2022-04-08",2=>"2022-06-01",3=>"2022-06-10");
	$data['fechacorte']=$fechascortes;
//	$this->load->view('template/page_header');		
// 	$this->load->view('pagoevento_report',$data);
	$this->load->view('pagoevento_reportepdf',$data);
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
        $query = $this->db->get('pagoevento1');

	if ($query->num_rows() > 0) {
		$rows=$query->result();
	
//-- Content Rows
foreach($rows as  $row)
{
  $this->table->add_row(
    anchor("work/fill_form/$row->idpagoevento", $row->idpagoevento),
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


  	$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
	$data['pagoevento'] = $this->pagoevento_model->pagoevento($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Pagoevento del documento";
    $this->load->view('template/page_header');		
    $this->load->view('pagoevento_record',$data);
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
	$data['pagoevento'] = $this->pagoevento_model->elprimero();
  if(!empty($data))
  {
	$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Pagoevento del documento";
    $this->load->view('template/page_header');		
    $this->load->view('pagoevento_record',$data);
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
	$data['pagoevento'] = $this->pagoevento_model->elultimo();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Pagoevento del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('pagoevento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['pagoevento_list']=$this->pagoevento_model->lista_pagoevento()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['pagoevento'] = $this->pagoevento_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Pagoevento del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('pagoevento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['pagoevento_list']=$this->pagoevento_model->lista_pagoevento()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['pagoevento'] = $this->pagoevento_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
 // $data['title']="Correo";
    $data['title']="Pagoevento del documento";
	$this->load->view('template/page_header');		
  $this->load->view('pagoevento_record',$data);
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
      $sql=$sql.'select p1.*, (select valor from pagoevento p2 where p2.idpersona=p1.idpersona and p2.fecha="'.$this->input->post('fecha').'"  and p2.idevento='.$this->input->post('idevento'). ') as valor from participante1 p1 where p1.idevento='.$this->input->post('idevento').' and p1.idpersona in (select p2.idpersona from pagoevento p2 where p2.idevento=p1.idevento and p2.fecha="'.$this->input->post('fecha').'"  and p2.idevento='.$this->input->post('idevento').')';
$sql=$sql." union "; 

    $sql=$sql.'select p1.*, " " as valor from participante1 p1 where idevento='.$this->input->post('idevento').' and p1.idpersona not in (select p2.idpersona from pagoevento p2 where p2.idevento=p1.idevento and p2.fecha="'.$this->input->post('fecha').'" and p2.idevento='.$this->input->post('idevento').') order by nombres ;';



   $query= $this->db->query($sql);

     //   $this->db->select('*');
		 //   $this->db->order_by("p1.nombres","asc");
     //   $this->db->where(array('p1.idevento' => $this->input->post('idevento')));
     //   $this->db->from('participante1 p1');
     //   $this->db->select('p1.*, (select porcentaje from pagoevento  p2 where p2.idpersona=p1.idpersona and p2.fecha="'+$this->input->post('fecha')+'") as porcentaje');
      //  $query = $this->db->get();
	$data=$query->result();
	echo json_encode($data);
	}
}








public function get_pagoevento() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where('idevento',$this->input->post('idevento'));
        $this->db->where('fecha' ,$this->input->post('fecha'));
        $this->db->where('idpersona',$this->input->post('idpersona'));
        $query = $this->db->get('pagoevento1');

	if ($query->num_rows() > 0) {
		$data=$query->result();
		echo json_encode($data);
	}else{

	//		$this->db->select('idtipopagoevento,nombre as tipopagoevento, "" as comentario');
	//	$query = $this->db->get('tipopagoevento');

		$data=$query->result();
		echo json_encode($data);
	}


    }
}




public function get_pagoeventop() {

    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevento')) 
    {
        $this->db->select('*');
        $this->db->where(array('idevento' => $this->input->post('idevento'),'fecha' => $this->input->post('fecha'),'idpersona' => $this->input->post('idpersona')));
        $query = $this->db->get('pagoevento1');

	if ($query->num_rows() > 0) {
		$data=$query->result();
		echo json_encode($data);
	}else{
		$data=array();
		echo json_encode($data);
	}


    }


}



public function get_tipopagoevento() {
    $this->load->database();
    $this->load->helper('form');
        $this->db->select('*');
        $query = $this->db->get('tipopagoevento');
	$data=$query->result();
	echo json_encode($data);
	}



}

