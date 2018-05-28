<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compose extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
     
        $this->load->model(array('M_region','M_posts','M_places'));
    }
		public function index()
		{
			$cek = $this->session->userdata('role');
			if($cek == '2'){
				$id_region= $this->session->userdata('region');

				$data['place'] =  $this->M_places->getRegionPlaces($id_region);
				
				$this->load->view('header');
				$this->load->view('region/compose_view',$data);
				$this->load->view('footer');
			}
			else{
				header("location: ".base_url().'login');
			}
		}


		// public function __construct()
  //   {
  //       parent::__construct();
     
  //       $this->load->model(array('M_admin','M_region','M_places','M_posts'));
  //   }
		// public function index()
		// {
		// 	$cek = $this->session->userdata('role');
		// 	if($cek == '3'){
		// 		// $id= $this->session->userdata('region');
		// 		// $data['place'] = $this->M_places->getRegionPlaces($id);
		// 		$this->load->view('header');
		// 		$this->load->view('place/compose_view');
		// 		$this->load->view('footer');
		// 	}
		// 	else{
		// 		header("location: ".base_url().'login');
		// 	}
		// }

		// function json() {
		// 	$id = $this->session->userdata('region');
		// 	//$role = $this->session->userdata('role');
		// 	$this->load->library('datatables');
		// 	$this->load->model(array('M_region'));
	 //        header('Content-Type: application/json');
	 //        echo $this->M_region->json_placeAdmin($id);
	 //    }
		
	// 	public function update(){
	// 	$id = $this->input->post('id');
	// 	// $code = strtoupper(trim($this->input->post('codeEdit')));
 //    	$data = array(
	// 		'name' => trim($this->input->post('namaEdit')),
	// 		'description' => $this->input->post('descriptionEdit'),
	// 		'phone_number' => $this->input->post('phoneNumber'),
	// 		'address' => $this->input->post('address'),
	// 		'latitude' => $this->input->post('latEdit'),
	// 		'longitude' => $this->input->post('longEdit'),
	// 	);
	// 	// if(strlen($code) != 3){
	// 	// 	echo "Code must be 3 digits";
	// 	// }
	// 	// else
	//  //    {
	//  //    	$region = $this->M_region->get(array('region_code'=>$code));
	//  //    	if($region->num_rows()>0 && $region->row()->id != $id)
 //  //           	echo "Code already exists!";
	// 	//     else{
	// 			$cek = $this->M_places->update(array('id_place'=>$id),$data);
	// 			echo "berhasil";
	// 	// 	}
	// 	// }
		
	// }
	public function insert(){

		$id_admin=$this->session->userdata('id');
		$config['upload_path'] = './uploads';
										//'jpg|jpeg|png|pdf';
	    $config['allowed_types'] = 'jpg|jpeg|png';
	    $config['max_size']    = '1200';
		$this->load->library('upload',$config);

		$place=$this->input->post('placeAdd');
    	$username = strtolower(trim($this->input->post('userAdd')));
    	// $id_place = $this->M_posts->getIdPlace(array('id_admin'=>$id_admin));
    	$title =$this->input->post('title');
		$postContent =$this->input->post('postContent');
    	$data = array(
    		'id_place' => $place,
			'post_title' => $title,
			'post_content' => $postContent,
			'post_category' => $this->input->post('category'),
			// 'id_place' => $id_place,
			'post_author' => $this->session->userdata('name'),
		);

		
		if (empty($place)) {
			echo "Please, Select Your Place at Where You Wanna Post";
		}
   
		elseif (empty($title)) {
	    echo "Don't Forget to Enter the Title";
	  	} 
	  	elseif (strlen($postContent) <10){
			echo "Your Post is too short!!";
		}
		// elseif (!$this->upload->do_upload('file')) {
		
		// $error= $this->upload->display_errors();
		// 		echo $error;
		// 	# code...
		// }
		elseif (!$this->upload->do_upload('file')) {
			# code...
			$cek=$this->M_posts->insert($data);
			echo "berhasil";
		}
		 else {
		 	$dokumens = $this->upload->data();
			// $success['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $dokumens['file_name'] . '</strong> was successfully uploaded!</div>';

			// $data['nama']=$this->input->post('nama');
			// $data['keterangan']=$this->input->post('keterangan');
			// $data['file_url'] = $dokumens['file_name'];	
			// $this->kaprodi_model->proposalajukan($data);
			// $this->session->set_flashdata('info', $success);
			
		 	$cek=$this->M_posts->insert($data);
			$data1 = array(
    		// 'id_place' => $this->input->post('placeAdd'),
			'file_url' => $dokumens['file_name'],
			'id_post' => $cek,
			);	
			$cek=$this->M_posts->insertFile($data1);
			 // $this->template->kaprodi('kaprodi/v_proposalAjukan', $success);
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


	// function getPlace(){
	// 	$id = $this->input->post('id');
	// 	$data = $this->M_places->get(array('id_place'=>$id));
	// 	echo json_encode($data->row());
	// }


	 function getPlace(){
		// $id = $this->input->post('region');
		$id= $this->session->userdata('region');
		$data = $this->M_admin->get(array('id_region'=>$id));
		$admins = $data->row();
		$admins->admin_password = null;
		echo json_encode($admins);

	}
		
}
