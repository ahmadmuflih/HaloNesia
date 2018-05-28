<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlaceAdmin extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
     
        $this->load->model(array('M_admin','M_region'));
    }
		public function index()
		{
			$cek = $this->session->userdata('role');
			if($cek == '1'){
				$data['region'] = $this->M_region->get(null);
				$this->load->view('header');
				$this->load->view('super/placeadmin_view',$data);
				$this->load->view('footer');
			}
			else{
				header("location: ".base_url().'login');
			}
		}
		function json() {
			$this->load->library('datatables');
			$this->load->model(array('M_admin'));
	        header('Content-Type: application/json');
	        echo $this->M_admin->json_adminPlace();
	    }
    
}
