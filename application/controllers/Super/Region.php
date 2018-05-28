<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
     
        $this->load->model(array('M_region'));
    }
		public function index()
		{
			$cek = $this->session->userdata('role');
			if($cek == '1'){
				$this->load->view('header');
				$this->load->view('super/region_view');
				$this->load->view('footer');
			}
			else{
				header("location: ".base_url().'login');
			}
		}
		function json() {
			$this->load->library('datatables');
			$this->load->model(array('M_region'));
	        header('Content-Type: application/json');
	        echo $this->M_region->json();
	    }
    public function insert(){
    	$code = strtoupper(trim($this->input->post('code')));
    	$data = array(
			'region_code' => $code,
			'region_name' => trim($this->input->post('nama')),
			'region_description' => $this->input->post('description'),
			'latitude' => $this->input->post('lat'),
			'longitude' => $this->input->post('long'),
		);
		if(strlen($code) != 3){
			echo "Code must be 3 digits";
		}
		else if ($this->M_region->cekRegion($code) > 0)
	    {
            echo "Code already exists!";
	    }
	    else{
			$cek = $this->M_region->insert($data);
			echo "berhasil";
		}
	}
	public function update(){
		$id = $this->input->post('id');
		$code = strtoupper(trim($this->input->post('codeEdit')));
    	$data = array(
			'region_code' => $code,
			'region_name' => trim($this->input->post('namaEdit')),
			'region_description' => $this->input->post('descriptionEdit'),
			'latitude' => $this->input->post('latEdit'),
			'longitude' => $this->input->post('longEdit'),
		);
		if(strlen($code) != 3){
			echo "Code must be 3 digits";
		}
		else
	    {
	    	$region = $this->M_region->get(array('region_code'=>$code));
	    	if($region->num_rows()>0 && $region->row()->id != $id)
            	echo "Code already exists!";
		    else{
				$cek = $this->M_region->update(array('id'=>$id),$data);
				echo "berhasil";
			}
		}
		
	}
	function delete(){
    	$id = $this->input->post('id');
    	$cek = $this->M_region->delete(array('id'=>$id));
		if($cek>0)
			echo "berhasil";
		else
			echo "gagal";
    }
    function getRegion(){
		$id = $this->input->post('id');
		$data = $this->M_region->get(array('id'=>$id));
		echo json_encode($data->row());
	}
}
