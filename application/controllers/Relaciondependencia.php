<?php

class Relaciondependencia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('relaciondependencia_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['relaciondependencia'] = $this->relaciondependencia_model->elultimo();
            $data['title'] = "Relaciondependencia";
            $this->load->view('template/page_header');
            $this->load->view('relaciondependencia_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo relaciondependencia
    public function add() {
        $data['title'] = "Nuevo relaciondependencia";
        $this->load->view('template/page_header');
        $this->load->view('relaciondependencia_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo relaciondependencia
    public function save() {
        $array_item = array(
            'idrelaciondependencia' => $this->input->post('idrelaciondependencia'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->relaciondependencia_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Relaciondependencia ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de relaciondependencia
    public function edit() {
        $data['relaciondependencia'] = $this->relaciondependencia_model->relaciondependencia($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar relaciondependencia";
        $this->load->view('template/page_header');
        $this->load->view('relaciondependencia_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de relaciondependencia
    public function save_edit() {
        $id = $this->input->post('idrelaciondependencia');
        $array_item = array(
            'idrelaciondependencia' => $this->input->post('idrelaciondependencia'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->relaciondependencia_model->update($id, $array_item);
        redirect('relaciondependencia');
    }

    // Método para eliminar un relaciondependencia
    public function delete() {
        $data = $this->relaciondependencia_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('relaciondependencia/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->relaciondependencia_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El relaciondependencia no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los relaciondependencias
    public function listar() {
        $data['relaciondependencia_list'] = $this->relaciondependencia_model->lista_relaciondependenciasA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('relaciondependencia_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de relaciondependencia en formato JSON
    public function relaciondependencia_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->relaciondependencia_model->lista_relaciondependenciasA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idrelaciondependencia, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('relaciondependencia/actual').'"   data-idrelaciondependencia="' . $r->idrelaciondependencia . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de relaciondependencia
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['relaciondependencia'] = $this->relaciondependencia_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('relaciondependencia_record', $data);
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

    // Método para mostrar el último registro de relaciondependencia
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['relaciondependencia'] = $this->relaciondependencia_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('relaciondependencia_record', $data);
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

    // Método para mostrar el siguiente registro de relaciondependencia
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['relaciondependencia'] = $this->relaciondependencia_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('relaciondependencia_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  relaciondependencia
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['relaciondependencia'] = $this->relaciondependencia_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('relaciondependencia_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_relaciondependencia() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idrelaciondependencia')) {
        $this->db->select('*');
        $this->db->where(array('idrelaciondependencia' => $this->input->post('idrelaciondependencia')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
