<?php

class Indicadorcalidad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('indicadorcalidad_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['indicadorcalidad'] = $this->indicadorcalidad_model->elultimo();
            $data['title'] = "Indicadorcalidad";
            $this->load->view('template/page_header');
            $this->load->view('indicadorcalidad_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo indicadorcalidad
    public function add() {
        $data['title'] = "Nuevo indicadorcalidad";
        $this->load->view('template/page_header');
        $this->load->view('indicadorcalidad_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo indicadorcalidad
    public function save() {
        $array_item = array(
            'idindicadorcalidad' => $this->input->post('idindicadorcalidad'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->indicadorcalidad_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Indicadorcalidad ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de indicadorcalidad
    public function edit() {
        $data['indicadorcalidad'] = $this->indicadorcalidad_model->indicadorcalidad($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar indicadorcalidad";
        $this->load->view('template/page_header');
        $this->load->view('indicadorcalidad_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de indicadorcalidad
    public function save_edit() {
        $id = $this->input->post('idindicadorcalidad');
        $array_item = array(
            'idindicadorcalidad' => $this->input->post('idindicadorcalidad'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->indicadorcalidad_model->update($id, $array_item);
        redirect('indicadorcalidad');
    }

    // Método para eliminar un indicadorcalidad
    public function delete() {
        $data = $this->indicadorcalidad_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('indicadorcalidad/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->indicadorcalidad_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El indicadorcalidad no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los indicadorcalidads
    public function listar() {
        $data['indicadorcalidad_list'] = $this->indicadorcalidad_model->lista_indicadorcalidadsA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('indicadorcalidad_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de indicadorcalidad en formato JSON
    public function indicadorcalidad_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->indicadorcalidad_model->lista_indicadorcalidadsA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idindicadorcalidad, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('indicadorcalidad/actual').'"   data-idindicadorcalidad="' . $r->idindicadorcalidad . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de indicadorcalidad
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['indicadorcalidad'] = $this->indicadorcalidad_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('indicadorcalidad_record', $data);
                $this->load->view('template/page_footer');
            } else {
                $this->load->view('template/page_header');
                $this->load->view('registro_vacio');
                $this->load->view('template/page_footer');
            }
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el último registro de indicadorcalidad
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['indicadorcalidad'] = $this->indicadorcalidad_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('indicadorcalidad_record', $data);
                $this->load->view('template/page_footer');
            } else {
                $this->load->view('template/page_header');
                $this->load->view('registro_vacio');
                $this->load->view('template/page_footer');
            }
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el siguiente registro de indicadorcalidad
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['indicadorcalidad'] = $this->indicadorcalidad_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('indicadorcalidad_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  indicadorcalidad
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['indicadorcalidad'] = $this->indicadorcalidad_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('indicadorcalidad_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_indicadorcalidad() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idindicadorcalidad')) {
        $this->db->select('*');
        $this->db->where(array('idindicadorcalidad' => $this->input->post('idindicadorcalidad')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
