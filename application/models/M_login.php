<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Login extends CI_Model {
  function __construct(){
      parent::__construct();
      // $this->db1 = $this->load->database('db1', TRUE);
    }

    public function login($u,$p){
      $cek_admin = $this->db->get_where('admin',array('admin_login' => $u, 'admin_password' => $p));
      if ($cek_admin->num_rows()>0) {
        $data = $cek_admin->row();
        $id_role = $data->id_role;
        if($id_role == '1')
          $role = "Super Admin";
        else if($id_role=='2')
          $role = "Region Admin";
        else if($id_role=='3')
          $role = "Place Admin";
        else
          $role = "Admin Doang";
        $sess = array(
          'id' => $data->id_admin,
          'username' => $data->admin_login,
          'name' => $data->admin_name,
          'email' => $data->admin_email,
          'region' => $data->id_region,
          'role' => $id_role,
          'role_name' => $role,
        );
        $this->session->set_userdata($sess);
        return $id_role;
      }
      else{
        return 'invalid';
      }
    }

}
