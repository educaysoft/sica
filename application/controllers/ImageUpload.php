<?php

class ImageUpload extends CI_Controller {


   public function __construct() { 
      
      parent::__construct(); 
      $this->load->helper(array('form', 'url')); 
   }

   public function index() { 
      $this->load->view('upload_image_form', array('error' => '' )); 
   } 


   /**
    * Method to upload image 
    *
    * @return Response
   */
   public function uploadImage() { 
      header('Content-Type: application/json');
      
      $config['upload_path']   = './images/'; 
      $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
      $config['max_size']      = 2048;
      $this->load->library('upload', $config);
    
      if ( ! $this->upload->do_upload('file')) {
         $error = array('error' => $this->upload->display_errors()); 
         echo json_encode($error);
      }else { 
         $data = $this->upload->data();
         $success = ['success'=>$data['file_name']];
         echo json_encode($success);
      } 
   }
} 


?>


