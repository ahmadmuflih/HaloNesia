	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Compose extends CI_Controller {
		 public  $last;
		
		public function __construct()
	    {
	        parent::__construct();
	       
	     
	        $this->load->model(array('M_admin','M_region','M_places','M_posts'));
	        $this->load->helper(array('url','file'));
	    }
			public function index()
			{
				$cek = $this->session->userdata('role');
				if($cek == '3'){
					// $id= $this->session->userdata('region');
					// $data['place'] = $this->M_places->getRegionPlaces($id);
					$this->load->view('header');
					$this->load->view('place/compose_view');
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
			$id_admin=$this->session->userdata('id');
			// $config['upload_path'] = './uploads';
			// 								//'jpg|jpeg|png|pdf';
		 //    $config['allowed_types'] = 'jpg|jpeg|png';
		 //    // $config['max_size']    = '1200';
			// $this->load->library('upload',$config);

	    	$username = strtolower(trim($this->input->post('userAdd')));
	    	$id_place = $this->M_posts->getIdPlace(array('id_admin'=>$id_admin));
	    	$title =$this->input->post('title');
			$postContent =$this->input->post('postContent');
	    	$data = array(
	    		// 'id_place' => $this->input->post('placeAdd'),
				'post_title' => $title,
				'post_content' => $postContent,
				'post_category' => $this->input->post('category'),
				'id_place' => $id_place,
				'post_author' => $this->session->userdata('name'),
			);
	   
			if (empty($title)) {
		    echo "Don't Forget to Enter the Title";
		  	} 
		  	elseif (strlen($postContent) <1){
				echo "Your Post is too short!!";
			}
			elseif (!empty($_FILES)) {
				

				$files = $_FILES;


				$cek=$this->M_posts->insert($data);

				foreach($files as $key => $value)
				{
					for($s = 0; $s < count($files['userfile']['size']); $s++)
					{
						$_FILES['userfile']['name']     = $value['name'][$s];
						$_FILES['userfile']['type']     = $value['type'][$s];
						$_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
						$_FILES['userfile']['error']    = $value['error'][$s];
						$_FILES['userfile']['size']     = $value['size'][$s]; 
						$config['upload_path']   = FCPATH . 'uploads/';
						$config['allowed_types'] = 'gif|jpg|png';
						$this->load->library('upload', $config);
						$dokumens=$this->upload->do_upload('userfile');
						// print "<hr>";
						// print '<h3>Rewritten $_FILES array number #'.$s.':</h3>';
						// print "<pre>" . print_r($_FILES, true) . "</pre>";
						// print "<h3>Upload data:</h3>";
						// print "<pre>" . print_r($this->upload->data(), true) . "</pre>";
						// print "<h3>Errors:</h3>";
						// print "<pre>" . print_r($this->upload->display_errors(), true) . "</pre>";
						$dataupload = $this->upload->data();
						$data1 = array(
							'file_url' => "uploads/".$dataupload['file_name'],
							'id_post' => $cek,
							);	
						$cek1=$this->M_posts->insertFile($data1);
						

						// echo $this->db->last_query();
					}
				}


				//echo base_url()."".$data1['file_url'];
				echo "berhasil";
			}
			else {				
			 // 	$cek=$this->M_posts->insert($data);
				// $data1 = array(
	   //  		// 'id_place' => $this->input->post('placeAdd'),
				// 'file_url' => $dokumens['file_name'],
				// 'id_post' => $cek,
				// );	
				// $cek=$this->M_posts->insertFile($data1);
				//  // $this->template->kaprodi('kaprodi/v_proposalAjukan', $success);
		  //  		echo "berhasil";
			 	$cek=$this->M_posts->insert($data);
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


			function proses_upload(){

	        $config['upload_path']   = FCPATH.'/uploads/';
	        $config['allowed_types'] = 'gif|jpg|png|ico';
	        $this->load->library('upload',$config);

	        if($this->upload->do_upload('userfile')){
	        	// $token=$this->input->post('token_foto');
	        	$last=$this->last;
	        	$nama=$this->upload->data('file_name');
	        	// $this->db->insert('foto',array('file_url'=>$nama));

	        	$data = array(
	    		// 'id_place' => $this->input->post('placeAdd'),
				'file_url' => $nama,
				'id_place' => $last,
				);

	        	// $cek=$this->M_posts->insertFile($data);
				 // $this->template->kaprodi('kaprodi/v_proposalAjukan', $success);
		   		echo $last;
	        }


		}
	}
	    