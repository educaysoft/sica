<?php

class Subcriteriocalidad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('subcriteriocalidad_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['subcriteriocalidad'] = $this->subcriteriocalidad_model->elultimo();
            $data['title'] = "Subcriteriocalidad";
            $this->load->view('template/page_header');
            $this->load->view('subcriteriocalidad_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo subcriteriocalidad
    public function add() {
        $data['title'] = "Nuevo subcriteriocalidad";
        $this->load->view('template/page_header');
        $this->load->view('subcriteriocalidad_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo subcriteriocalidad
    public function save() {
        $array_item = array(
            'idsubcriteriocalidad' => $this->input->post('idsubcriteriocalidad'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->subcriteriocalidad_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Subcriteriocalidad ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de subcriteriocalidad
    public function edit() {
        $data['subcriteriocalidad'] = $this->subcriteriocalidad_model->subcriteriocalidad($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar subcriteriocalidad";
        $this->load->view('template/page_header');
        $this->load->view('subcriteriocalidad_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de subcriteriocalidad
    public function save_edit() {
        $id = $this->input->post('idsubcriteriocalidad');
        $array_item = array(
            'idsubcriteriocalidad' => $this->input->post('idsubcriteriocalidad'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->subcriteriocalidad_model->update($id, $array_item);
        redirect('subcriteriocalidad');
    }

    // Método para eliminar un subcriteriocalidad
    public function delete() {
        $data = $this->subcriteriocalidad_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('subcriteriocalidad/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->subcriteriocalidad_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El subcriteriocalidad no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los subcriteriocalidads
    public function listar() {
        $data['subcriteriocalidad_list'] = $this->subcriteriocalidad_model->lista_subcriteriocalidadsA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('subcriteriocalidad_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de subcriteriocalidad en formato JSON
    public function subcriteriocalidad_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->subcriteriocalidad_model->lista_subcriteriocalidadsA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idsubcriteriocalidad, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('subcriteriocalidad/actual').'"   data-idsubcriteriocalidad="' . $r->idsubcriteriocalidad . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de subcriteriocalidad
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['subcriteriocalidad'] = $this->subcriteriocalidad_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('subcriteriocalidad_record', $data);
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

    // Método para mostrar el último registro de subcriteriocalidad
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['subcriteriocalidad'] = $this->subcriteriocalidad_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('subcriteriocalidad_record', $data);
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

    // Método para mostrar el siguiente registro de subcriteriocalidad
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['subcriteriocalidad'] = $this->subcriteriocalidad_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('subcriteriocalidad_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  subcriteriocalidad
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['subcriteriocalidad'] = $this->subcriteriocalidad_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('subcriteriocalidad_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_subcriteriocalidad() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idsubcriteriocalidad')) {
        $this->db->select('*');
        $this->db->where(array('idsubcriteriocalidad' => $this->input->post('idsubcriteriocalidad')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
