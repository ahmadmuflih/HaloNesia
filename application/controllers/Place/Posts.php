<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
     
        $this->load->model(array('M_reg_category','M_posts','M_places'));
    }
		public function index()
		{
			$cek = $this->session->userdata('role');
			if($cek == '3'){

				$this->load->model(array('M_category','M_posts'));
				$data['posts'] = $this->M_posts->get(null);
				// $data['category'] = $this->M_category->get(null);
				$this->load->view('header');
				$this->load->view('place/posts_view',$data);
				$this->load->view('footer');
			}
			else{
				header("location: ".base_url().'login');
			}
		}

		function json() {
			$id_admin = $this->session->userdata('id');
			// $id_place=  $this->M_places->get(array('id_admin'=>$id_admin));
			$this->load->library('datatables');
			$this->load->model(array('M_posts'));
	        header('Content-Type: application/json');
	        echo $this->M_posts->json($id_admin);
	    }

	    function getPost(){
		$id = $this->input->post('id');
		$data = $this->M_posts->get(array('id_post'=>$id));
		echo json_encode($data->row());
		

	}

		public function update(){
		$id = $this->input->post('id');
		$username = strtolower(trim($this->input->post('userEdit')));
    	$data = array(
			'post_author' => $this->input->post('author'),
			'post_title' => $this->input->post('title'),
			'post_content' => $this->input->post('postContent'),
			'post_category' => $this->input->post('category'),
		);

    	$admin = $this->M_admin->get(array('id_admin'=>$id));
    	if(($admin->num_rows()>0 && $admin->row()->id_admin != $id) || !preg_match('/^\w{6,}$/', $username) ||is_numeric($username[0]))
        	echo "Username is wrong or already taken";
	    else{
			$cek = $this->M_admin->update(array('id_admin'=>$id),$data);
			echo "berhasil";
		}
		
		
	}

	function delete(){
    	$id = $this->input->post('id');
    	$cek = $this->M_posts->delete(array('id_post'=>$id));
		if($cek>0)
			echo "berhasil";
		else
			echo "gagal";
    }
		
}
