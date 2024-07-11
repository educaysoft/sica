<?php

class Articulo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('articulo_model');
      $this->load->model('prestamoarticulo_model');
  	  $this->load->model('institucion_model');
  	  $this->load->model('ubicacionarticulo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['articulo']=$this->articulo_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  		$data['title']="Lista de Artiulos";
		$this->load->view('template/page_header');		
  		$this->load->view('articulo_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['title']="Nuevo Artículo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('articulo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idarticulo' => $this->input->post('idarticulo'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->articulo_model->save($array_item);
	 	redirect('articulo');
 	}



public function edit()
{
	 	$data['articulo'] = $this->articulo_model->articulo($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 	 	$data['title'] = "Actualizar Articulo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('articulo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idarticulo');
	 	$array_item=array(
		 	
		 	'idarticulo' => $this->input->post('idarticulo'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 		'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->articulo_model->update($id,$array_item);
	 	redirect('articulo');
 	}



public function listar()
{
	
  $data['title']="Articulo";
	$this->load->view('template/page_header');		
  $this->load->view('articulo_list',$data);
	$this->load->view('template/page_footer');
}

function articulo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->articulo_model->lista_articulos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idarticulo,$r->nombre,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('articulo/actual').'"  data-idarticulo="'.$r->idarticulo.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}




	function ubicacion_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idarticulo=$this->input->get('idarticulo');
			$data0 =$this->ubicacionarticulo_model->ubicacionarticulosA($idarticulo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacionarticulo,$r->idarticulo,$r->launidad,$r->lapersona,$r->fecha,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionarticulo/actual').'"    data-idubicacionarticulo="'.$r->idubicacionarticulo.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionarticulo/edit').'"    data-idubicacionarticulo="'.$r->idubicacionarticulo.'">edit</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}








	function prestamo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idarticulo=$this->input->get('idarticulo');
			$data0 =$this->prestamoarticulo_model->prestamoarticulosA($idarticulo);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamoarticulo,$r->idarticulo,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoarticulo/actual').'"    data-idprestamoarticulo="'.$r->idprestamoarticulo.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoarticulo/edit').'"    data-idprestamoarticulo="'.$r->idprestamoarticulo.'">edit</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}




public function genpagina()
{
	$iddistributivo=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		//$iddistributivo=$this->uri->segment(3);
		$iddistributivo=1;
	 	$data['articulos']= $this->articulo_model->articuloA($iddistributivo)->result();
		$arreglo=array();
		$i=0;
		foreach($data['articulos'] as $row){
		$idarticulo=$row->idarticulo;

		$xx=array($this->prestamoarticulo_model->prestamoarticulosA($idarticulo)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->idarticulo=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['prestamoarticulo']=array();
		$data['prestamoarticulo']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;

		$this->load->view('articulo_genpagina',$data);
	}
}










public function actual()
{
	$data['articulo'] = $this->articulo_model->articulo($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Articulo";
    $this->load->view('template/page_header');		
    $this->load->view('articulo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['articulo'] = $this->articulo_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Articulo";
    $this->load->view('template/page_header');		
    $this->load->view('articulo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['articulo'] = $this->articulo_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Articulo";
  
    $this->load->view('template/page_header');		
    $this->load->view('articulo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['articulo_list']=$this->articulo_model->lista_articulo()->result();
	$data['articulo'] = $this->articulo_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Articulo";
	$this->load->view('template/page_header');		
  $this->load->view('articulo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['articulo_list']=$this->articulo_model->lista_articulo()->result();
	$data['articulo'] = $this->articulo_model->anterior($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Articulo";
	$this->load->view('template/page_header');		
  $this->load->view('articulo_record',$data);
	$this->load->view('template/page_footer');
}




	public function articulo_1()
	{
	  $this->load->view('articulos/articulo-1');
	}





}
