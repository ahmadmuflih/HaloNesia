<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_admin','M_region'));
    }
	public function index()
	{
		$cek = $this->session->userdata('role');
		if($cek == '2'){
			$id = $this->session->userdata('id');
			$id_region = $this->session->userdata('region');
			$admin = $this->M_admin->get(array('id_admin'=>$id));
			$region= $this->M_region->get(array('id'=>$id_region));
			$data['admin']= $admin;
			$data['region'] = $region;
			$this->load->view('header');
			$this->load->view('region/home_view',$data);
			$this->load->view('footer');
		}
		else{
			header("location: ".base_url().'login');
		}
	}

	public function updateProfile(){
		// $id = $this->input->post('id');
		$id = $this->session->userdata('id');
    	$data = array(
			'admin_email' => $this->input->post('email'),
		);

		
		$admin = $this->M_admin->get(array('admin_email'=>$data['admin_email']));

    	if(($admin->num_rows()>0 && $admin->row()->id_admin != $id))
        	echo "Your email is wrong or already taken";
	    else{
			$cek = $this->M_admin->update(array('id_admin'=>$id),$data);
			echo "berhasil";
		}
		
		
	}


	public function updateNama(){
		// $id = $this->input->post('id');
		$username = strtolower(trim($this->input->post('nama')));
		$id = $this->session->userdata('id');
    	$data = array(
			'admin_name' => $this->input->post('nama')

		);

    // $admin = $this->M_admin->get(array('admin_email'=>$data['admin_email']));


    	// if((!preg_match('/^\w{6,}$/', $username) ||is_numeric($username[0])))
     //    	echo "Your name is contain disallowed charachter";
	    // else{
			$cek = $this->M_admin->update(array('id_admin'=>$id),$data);
			echo "berhasil";
		// }
		
	}

	public function updateRegion(){
		// $id = $this->input->post('id');
		// $username = strtolower(trim($this->input->post('nama')));
		$code = strtoupper(trim($this->input->post('codeUpdate')));
		$id = $this->session->userdata('region');
    	$data = array(
			'region_code' => $code,
			'region_name' => $this->input->post('nameUpdate'),
			'region_description' => $this->input->post('descriptionUpdate'),

		);

    // $admin = $this->M_admin->get(array('admin_email'=>$data['admin_email']));


    	// if((!preg_match('/^\w{6,}$/', $username) ||is_numeric($username[0])))
     //    	echo "Your name is contain disallowed charachter";
	    // else{


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

	public function update2(){
		// $id = $this->input->post('id');
		$username = strtolower(trim($this->input->post('username')));
		$id = $this->session->userdata('id');
		$admin = $this->M_admin->get(array('id_admin'=>$id));
		$data = array(
			'admin_password' => md5($this->input->post('new_password')),
			);

		if($admin->row()->admin_password != md5($this->input->post('password'))){
			$cek=false;
			echo "password lama anda salah!";
		}
		else if(strlen($this->input->post('new_password'))<6){
			echo "password minimal terdiri dari 6 karakter!";
			$cek=false;
		}
		else{
			$cek = $this->M_admin->update(array('id_admin'=>$id),$data);
			echo "berhasil";
		}
	}

	


	}
	

