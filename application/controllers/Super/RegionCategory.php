<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegionCategory extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
     
        $this->load->model(array('M_reg_category'));
    }
		public function index()
		{
			$cek = $this->session->userdata('role');
			if($cek == '1'){
				$this->load->model(array('M_category','M_region'));
				$data['region'] = $this->M_region->get(null);
				$data['category'] = $this->M_category->get(null);
				$this->load->view('header');
				$this->load->view('super/regioncategory_view',$data);
				$this->load->view('footer');
			}
			else{
				header("location: ".base_url().'login');
			}
		}
		function json() {
			$this->load->library('datatables');
			$this->load->model(array('M_reg_category'));
			$region = $this->input->post('id_region');
			$category = $this->input->post('id_category');

	        header('Content-Type: application/json');
	        echo $this->M_reg_category->json($region,$category);
	    }
    public function insert(){
    	$data = array(
			'id_region' => $this->input->post('region'),
			'id_category' => $this->input->post('category')
		);
		if($data['id_region']==null || $data['id_category']==null){
			echo "Select region and category first!";
		}

		else if ($this->M_reg_category->cekRegCategory($data) > 0)
	    {
            echo "It already exists!";
	    }
	    else{
			$cek = $this->M_reg_category->insert($data);
			echo "berhasil";
		}
	}
	public function update(){
		$id = $this->input->post('id');
		$data = array(
			'id_region' => $this->input->post('regionEdit'),
			'id_category' => $this->input->post('categoryEdit')
		);
		if($data['id_region']==null || $data['id_category']==null){
			echo "Select region and category first!";
		}

		else {
			$regCat = $this->M_reg_category->get($data);
			if ($regCat->num_rows() > 0 && $regCat->row()->id != $id)
		    {
	            echo "It already exists!";
		    }
		    else{
				$cek = $this->M_reg_category->update(array('id',$id),$data);
				echo "berhasil";
			}
		}
		
	}
	function delete(){
    	$id = $this->input->post('id');
    	$cek = $this->M_reg_category->delete(array('id'=>$id));
		if($cek>0)
			echo "berhasil";
		else
			echo "gagal";
    }
    function getCategory(){
		$id = $this->input->post('id');
		$data = $this->M_reg_category->get(array('id'=>$id));
		echo json_encode($data->row());
	}
}
