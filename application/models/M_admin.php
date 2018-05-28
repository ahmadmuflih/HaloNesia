<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {
  function __construct(){
      parent::__construct();
      // $this->db1 = $this->load->database('db1', TRUE);
    }

     function insert($arraydata = array() )
  {
    $this->db->insert('admin', $arraydata);
    $last_recore = $this->db->insert_id();
    return $last_recore;
  }

  function insertAdminPlace($parameterfilter=array(),$arraydata = array())
  {
    $this->db->insert('admin', $arraydata);


    $last_recore = $this->db->insert_id();
    $masukin = array('id_admin' => $last_recore);
    $this->db->where($parameterfilter);
    $this->db->update('place', $masukin);
    return $last_recore;
  }
  function update($parameterfilter=array(), $arraydata=array() )
    {
        $this->db->where($parameterfilter);
        $this->db->update('admin', $arraydata);
        return $this->db->affected_rows();
    }
    function delete($parameter=array())
    {
        $this->db->delete('admin', $parameter );
        return $this->db->affected_rows();
    }
    public function get($parameterfilter=array()){
      return $this->db->get_where('admin', $parameterfilter);
    }
    function cekAdmin($username){
      $query = $this->db->get_where('admin',array('admin_login'=>$username));
      return $query->num_rows();
    }
    function json_adminRegion() {
        $this->datatables->select('a.id_admin as id, a.admin_login as username,a.admin_name as name, a.admin_email as email, r.region_code as region');
        $this->datatables->from('admin a');
        $this->datatables->join('region r','a.id_region = r.id');
        $this->datatables->where("a.id_role = 2");
        $this->datatables->add_column('view', '<center><button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id');
        return $this->datatables->generate();
    }


    function json_adminPlace() {
        $this->datatables->select('a.id_admin as id, a.admin_login as username,a.admin_name as name, a.admin_email as email, r.region_code as region, c.category_name as category, p.name as place');
        $this->datatables->from('place p');
        $this->datatables->join('admin a','a.id_admin = p.id_admin');
        $this->datatables->join('reg_category rc', 'rc.id = p.id_reg_category');
        $this->datatables->join('category c','c.id = rc.id_category');
        $this->datatables->join('region r', 'r.id = rc.id_region');
        return $this->datatables->generate();
    }


    // // bisagaya?
    // function json_place2($id) {
    //     $this->datatables->select('a.id_admin as id, a.admin_login as username,a.admin_name as name, a.admin_email as email, r.region_code as region, c.category_name as category, p.name as place');
    //     $this->datatables->from('place p');
    //     $this->datatables->where('p.id_place',$id);
    //     $this->datatables->join('admin a','a.id_admin = p.id_admin');
    //     $this->datatables->join('reg_category rc', 'rc.id = p.id_reg_category');
    //     $this->datatables->join('category c','c.id = rc.id_category');
    //     $this->datatables->join('region r', 'r.id = rc.id_region');
    //     return $this->datatables->generate();
    // }
}
