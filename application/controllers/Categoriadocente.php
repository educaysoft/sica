<?php

class Categoriadocente extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('categoriadocente_model');
    }

    // Método para mostrar la página principal
    public function index() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['categoriadocente'] = $this->categoriadocente_model->elultimo();
            $data['title'] = "Categoriadocente";
            $this->load->view('template/page_header');
            $this->load->view('categoriadocente_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el formulario de agregar nuevo categoriadocente
    public function add() {
        $data['title'] = "Nuevo categoriadocente";
        $this->load->view('template/page_header');
        $this->load->view('categoriadocente_form', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar un nuevo categoriadocente
    public function save() {
        $array_item = array(
            'idcategoriadocente' => $this->input->post('idcategoriadocente'),
            'nombre' => $this->input->post('nombre'),
        );
        $result=$this->categoriadocente_model->save($array_item);

	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Categoriadocente ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}


    }

    // Método para mostrar el formulario de edición de categoriadocente
    public function edit() {
        $data['categoriadocente'] = $this->categoriadocente_model->categoriadocente($this->uri->segment(3))->row_array();
        $data['title'] = "Actualizar categoriadocente";
        $this->load->view('template/page_header');
        $this->load->view('categoriadocente_edit', $data);
        $this->load->view('template/page_footer');
    }

    // Método para guardar los cambios realizados en la edición de categoriadocente
    public function save_edit() {
        $id = $this->input->post('idcategoriadocente');
        $array_item = array(
            'idcategoriadocente' => $this->input->post('idcategoriadocente'),
            'nombre' => $this->input->post('nombre'),
        );
        $this->categoriadocente_model->update($id, $array_item);
        redirect('categoriadocente');
    }

    // Método para eliminar un categoriadocente
    public function delete() {
        $data = $this->categoriadocente_model->delete($this->uri->segment(3));
        echo json_encode($data);
        redirect('categoriadocente/elprimero');
        // $db['default']['db_debug'] = FALSE;
    }


 	public function quitar()
 	{
 		$result=$this->categoriadocente_model->quitar($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('El categoriadocente no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}






    // Método para listar todos los categoriadocentes
    public function listar() {
        $data['categoriadocente_list'] = $this->categoriadocente_model->lista_categoriadocentesA()->result();
        $data['title'] = "Tipo documento";
        $this->load->view('template/page_header');
        $this->load->view('categoriadocente_list', $data);
        $this->load->view('template/page_footer');
    }

    // Método para obtener datos de categoriadocente en formato JSON
    public function categoriadocente_data() {
        $draw = intval($this->input->get("draw"));
        $draw = intval($this->input->get("start"));
        $draw = intval($this->input->get("length"));

        $data0 = $this->categoriadocente_model->lista_categoriadocentesA();
        $data = array();
        foreach ($data0->result() as $r) {
            $data[] = array($r->idcategoriadocente, $r->nombre,
                $r->href = '<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('categoriadocente/actual').'"   data-idcategoriadocente="' . $r->idcategoriadocente . '">Ver</a>');
        }
        $output = array("draw" => $draw,
            "recordsTotal" => $data0->num_rows(),
            "recordsFiltered" => $data0->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    // Método para mostrar el primer registro de categoriadocente
    public function elprimero() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['categoriadocente'] = $this->categoriadocente_model->elprimero();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('categoriadocente_record', $data);
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

    // Método para mostrar el último registro de categoriadocente
    public function elultimo() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['categoriadocente'] = $this->categoriadocente_model->elultimo();
            if (!empty($data)) {
                $data['title'] = "Tipo documento";
                $this->load->view('template/page_header');
                $this->load->view('categoriadocente_record', $data);
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

    // Método para mostrar el siguiente registro de categoriadocente
    public function siguiente() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['categoriadocente'] = $this->categoriadocente_model->siguiente($this->uri->segment(3))->row_array();
            $data['title'] = "Tipo documento";
            $this->load->view('template/page_header');
            $this->load->view('categoriadocente_record', $data);
            $this->load->view('template/page_footer');
        } else {
            $this->load->view('template/page_header.php');
            $this->load->view('login_form');
            $this->load->view('template/page_footer.php');
        }
    }

    // Método para mostrar el  registro previo del actual en  categoriadocente
    public function anterior(){
  	    if(isset($this->session->userdata['logged_in'])){
            $data['categoriadocente'] = $this->categoriadocente_model->anterior($this->uri->segment(3))->row_array();
            $data['title']="Tipo documento";
            $this->load->view('template/page_header');		
            $this->load->view('categoriadocente_record',$data);
            $this->load->view('template/page_footer');
        } else{
	 	    $this->load->view('template/page_header.php');
		    $this->load->view('login_form');
	 	    $this->load->view('template/page_footer.php');
        } 
    }



public function get_categoriadocente() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idcategoriadocente')) {
        $this->db->select('*');
        $this->db->where(array('idcategoriadocente' => $this->input->post('idcategoriadocente')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
