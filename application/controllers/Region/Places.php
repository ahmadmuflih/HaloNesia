<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
     
        $this->load->model(array('M_admin','M_region','M_places'));
    }
		public function index()
		{
			$cek = $this->session->userdata('role');
			if($cek == '2'){
				$id= $this->session->userdata('region');

				$this->load->model(array('M_region','M_places','M_category','M_reg_category'));
				// $data['category'] = $this->M_category->get(null);
				$data['category'] = $this->M_reg_category->getRegionCategory($id);
				// $data['id'] = $this->M_region->get(null);

			// $id = $this->session->userdata('region');
			// $admin = $this->M_places->get(array('id'=>$id));
			// $data['id'] = $admin;

			$data['id'] = $this->M_places->get(null);


				$this->load->view('header');
				$this->load->view('region/places_view',$data);
				$this->load->view('footer');
			}
			else{
				header("location: ".base_url().'login');
			}
		}


		function json() {
			$this->load->library('datatables');
			$this->load->model(array('M_admin','M_region'));
			// Disini 'region'
			$id = $this->session->userdata('region');
	        header('Content-Type: application/json');
	        echo $this->M_region->json_placeByRegionId($id);
	    }


	     public function insert(){
    	
    	// $id = $this->input->post('id');
	     	$id = $this->session->userdata('region');
    	$data = array(
    		'id_admin'=> null,
    		'id_reg_category'=>$this->input->post('categoryAdd'),
			'name' => $this->input->post('namaAdd'),
			'description' => $this->input->post('descriptionAdd'),
			'phone_number' => $this->input->post('phoneNumberAdd'),
			'address' => $this->input->post('addressAdd'),
			'latitude' => $this->input->post('latAdd'),
			'longitude' => $this->input->post('longAdd'),
		);
	
    	$cek = $this->M_places->insert($data);
			echo "berhasil";
		// }
	}
	public function update(){
		$id = $this->input->post('id');
		// $code = strtoupper(trim($this->input->post('codeEdit')));
    	$data = array(
    		'id_reg_category'=>$this->input->post('categoryEdit'),
			'name' => trim($this->input->post('namaEdit')),
			'description' => $this->input->post('descriptionEdit'),
			'phone_number' => $this->input->post('phoneNumber'),
			'address' => $this->input->post('address'),
			'latitude' => $this->input->post('latEdit'),
			'longitude' => $this->input->post('longEdit'),
		);
		// if(strlen($code) != 3){
		// 	echo "Code must be 3 digits";
		// }
		// else
	 //    {
	 //    	$region = $this->M_region->get(array('region_code'=>$code));
	 //    	if($region->num_rows()>0 && $region->row()->id != $id)
  //           	echo "Code already exists!";
		//     else{
				$cek = $this->M_places->update(array('id_place'=>$id),$data);
				echo "berhasil";
		// 	}
		// }
		
	}
	function delete(){
    	$id = $this->input->post('id');
    	$cek = $this->M_places->delete(array('id_place'=>$id));
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

	function getPlace(){
		$id = $this->input->post('id');
		$data = $this->M_places->get(array('id_place'=>$id));
		echo json_encode($data->row());
		

	}

		
}
