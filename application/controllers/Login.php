<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
	parent::__construct();
		// session_start();
		$this->load->model('M_login');
	}

	public function index()
	{
	$this->load->library('session');
		$cek = $this->session->userdata('username');
		if (empty($cek)) {
			$this->load->view('login_view');
		}else{
			$st = $this->session->userdata('role');
			if ($st == 'super')
				header('location:'.base_url().'admin');
			else if($st == '1')
				header('location:'.base_url().'super/home');
			else if($st == '2')
				header('location:'.base_url().'region/home');
			else if($st == '3')
				header('location:'.base_url().'place/home');
			else{
				header('location:'.base_url());
			}
		}
	}

	public function cekLogin(){
		$u = $this->db->escape_str($this->input->post('username'));
    	$p = md5($this->db->escape_str($this->input->post('password')));
      	$status = $this->M_login->login($u,$p);
      	if($status == '1')
      		$status = base_url().'super/home';
      	else if($status == '2')
      		$status = base_url().'region/home';
      	else if($status == '3')
      		$status = base_url().'place/home';
      	echo $status;
	}
}
