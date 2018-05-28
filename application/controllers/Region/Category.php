<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
     
        $this->load->model(array('M_reg_category'));
    }
		public function index()
		{
			$cek = $this->session->userdata('role');
			if($cek == '2'){

				$this->load->model(array('M_category','M_region'));
				$data['region'] = $this->M_region->get(null);
				$data['category'] = $this->M_category->get(null);


				$this->load->view('header');
				$this->load->view('region/category_view');
				$this->load->view('footer');
			}
			else{
				header("location: ".base_url().'login');
			}
		}

	    function json() {
			$this->load->library('datatables');
			$this->load->model(array('M_reg_category','M_region'));
			$region = $this->input->post('id_region');
			$category = $this->input->post('id_category');
			// $id['id_region'] = $this->M_reg_category->get('id_region');
			$id = $this->session->userdata('region');

	        header('Content-Type: application/json');

	        
	        echo $this->M_reg_category->jsonRegionById($id,$region,$category);
	    }
		
}
