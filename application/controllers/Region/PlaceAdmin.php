<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlaceAdmin extends CI_Controller {
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
				$data['place'] = $this->M_places->getPlacesNoAdminYet($id);
				$this->load->view('header');
				$this->load->view('region/placeadmin_view',$data);
				$this->load->view('footer');
			}
			else{
				header("location: ".base_url().'login');
			}
		}

		function json() {
			$id = $this->session->userdata('region');
			//$role = $this->session->userdata('role');
			$this->load->library('datatables');
			$this->load->model(array('M_region'));
	        header('Content-Type: application/json');
	        echo $this->M_region->json_placeAdmin($id);
	    }
		
		public function update(){
		$id = $this->input->post('id');
		// $code = strtoupper(trim($this->input->post('codeEdit')));
    	$data = array(
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
	public function insert(){
    	$username = strtolower(trim($this->input->post('userAdd')));
    	$id = $this->input->post('placeAdd');
    	$region=$this->session->userdata('region');
    	$data = array(
    		// 'id_place' => $this->input->post('placeAdd'),
			'admin_login' => $username,
			'admin_name' => trim($this->input->post('namaAdd')),
			'admin_email' => $this->input->post('emailAdd'),
			'admin_password' => md5($username),
			'id_role' => 3,
			'id_region' => $region,
		);


		if($this->M_admin->cekAdmin($username) || !preg_match('/^\w{6,}$/', $username) ||is_numeric($username[0])) {
			echo "Username is wrong or already taken";
		}
		elseif ( $id==null) {
			echo "Please, select your place first!!!";
		}

	    else{
			$cek = $this->M_admin->insertAdminPlace(array('id_place'=>$id),$data);
			// $datanya id place harus 2 untuk kasi masuk id adminnya nanti di model; spertinya kalau jadi 1 data nda bisa deh
			echo "berhasil";
		}
	}


	function delete(){
    	$id = $this->input->post('id');
    	$cek = $this->M_admin->delete(array('id_admin'=>$id));
		if($cek>0)
			echo "berhasil";
		else
			echo "gagal";
    }


	//  function getPlace(){
	// 	$id = $this->input->post('id');
	// 	$data = $this->M_places->get(array('id_place'=>$id));
	// 	echo json_encode($data->row());
		

	// }
}
    

