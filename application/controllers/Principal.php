<?php

class Principal extends CI_Controller {

function __construct() {
	parent::__construct();
// path to simple_html_dom
 }

function index()
{
 $this->load->view('template/page_header');
 $data['blog_text'] = "UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES"; 
 $this->load->view('template/page_menu', $data); 
 $this->load->view('template/page_footer'); 

}

function persona(){
	 	redirect('persona/actual/');
}



 function css() {
 $this->load->view('page_css');
 }

 function javascript() {
 $this->load->view('page_javascript');
 }

 function codeigniter() {
 $this->load->view('page_codeigniter');
 }

 function html5() {
$this->load->view('page_html5');
 }

 function mysql() {
 $this->load->view('page_mysql');
 }

 function mailget() {
 $this->load->view('page_mailget');
 }
 function others() {
 $this->load->view('page_others');
 }
 }
 ?>
