<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
     
        $this->load->model(array('M_category'));
    }
		public function index()
		{
			$cek = $this->session->userdata('role');
			if($cek == '1'){
				$this->load->view('header');
				$this->load->view('super/category_view');
				$this->load->view('footer');
			}
			else{
				header("location: ".base_url().'login');
			}
		}
		function json() {
			$this->load->library('datatables');
			$this->load->model(array('M_category'));
	        header('Content-Type: application/json');
	        echo $this->M_category->json();
	    }
    public function insert(){
    	$code = strtoupper(trim($this->input->post('code')));
    	$data = array(
			'category_code' => $code,
			'category_name' => trim($this->input->post('nama')),
			'category_description' => $this->input->post('description'),
		);
		if(strlen($code) != 3){
			echo "Code must be 3 digits";
		}
		else if ($this->M_category->cekCategory($code) > 0)
	    {
            echo "Code already exists!";
	    }
	    else{
			$cek = $this->M_category->insert($data);
			echo "berhasil";
		}
	}
	public function update(){
		$id = $this->input->post('id');
		$code = strtoupper(trim($this->input->post('codeEdit')));
    	$data = array(
			'category_code' => $code,
			'category_name' => trim($this->input->post('namaEdit')),
			'category_description' => $this->input->post('descriptionEdit'),
		);
		if(strlen($code) != 3){
			echo "Code must be 3 digits";
		}
		else
	    {
	    	$category = $this->M_category->get(array('category_code'=>$code));
	    	if($category->num_rows()>0 && $category->row()->id != $id)
            	echo "Code already exists!";
		    else{
				$cek = $this->M_category->update(array('id'=>$id),$data);
				echo "berhasil";
			}
		}
		
	}
	function delete(){
    	$id = $this->input->post('id');
    	$cek = $this->M_category->delete(array('id'=>$id));
		if($cek>0)
			echo "berhasil";
		else
			echo "gagal";
    }
    function getCategory(){
		$id = $this->input->post('id');
		$data = $this->M_category->get(array('id'=>$id));
		echo json_encode($data->row());
	}
}
