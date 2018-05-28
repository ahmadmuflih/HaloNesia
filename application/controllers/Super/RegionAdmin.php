<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegionAdmin extends CI_Controller {
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
				$this->load->view('super/regionadmin_view',$data);
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
	        echo $this->M_admin->json_adminRegion();
	    }
    public function insert(){
    	$username = strtolower(trim($this->input->post('user')));
    	$data = array(
			'admin_login' => $username,
			'admin_name' => trim($this->input->post('nama')),
			'admin_email' => $this->input->post('email'),
			'admin_password' => md5($username),
			'id_role' => 2,
			'id_region' => $this->input->post('region'),
		);
		if($this->M_admin->cekAdmin($username) || !preg_match('/^\w{6,}$/', $username) ||is_numeric($username[0])){
			echo "Username is wrong or already taken";
		}
	    else{
			$cek = $this->M_admin->insert($data);
			echo "berhasil";
		}
	}
	public function update(){
		$id = $this->input->post('id');
		$username = strtolower(trim($this->input->post('userEdit')));
    	$data = array(
			'admin_login' => $username,
			'admin_name' => trim($this->input->post('namaEdit')),
			'admin_email' => $this->input->post('emailEdit'),
			'admin_password' => md5($username),
			'id_role' => 2,
			'id_region' => $this->input->post('regionEdit'),
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
    	$cek = $this->M_admin->delete(array('id_admin'=>$id));
		if($cek>0)
			echo "berhasil";
		else
			echo "gagal";
    }
    function getRegion(){
		$id = $this->input->post('id');
		$data = $this->M_admin->get(array('id_admin'=>$id));
		$admins = $data->row();
		$admins->admin_password = null;
		echo json_encode($admins);
	}
}
