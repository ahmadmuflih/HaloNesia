<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_region extends CI_Model {
  function __construct(){
      parent::__construct();
      // $this->db1 = $this->load->database('db1', TRUE);
    }

     function insert($arraydata = array() )
  {
    $this->db->insert('region', $arraydata);
    $last_recore = $this->db->insert_id();
    return $last_recore;
  }
  function update($parameterfilter=array(), $arraydata=array())
    {
        $this->db->where($parameterfilter);
        $this->db->update('region', $arraydata);
        return $this->db->affected_rows();
    }
    function delete($parameter=array())
    {
        $this->db->delete('region', $parameter );
        return $this->db->affected_rows();
    }
    public function get($parameterfilter=array()){
      return $this->db->get_where('region', $parameterfilter);
    }
    function cekRegion($code){
      $query = $this->db->get_where('region',array('region_code'=>$code));
      return $query->num_rows();
    }
    function json() {
        $this->datatables->select('r.id, r.region_code as code,r.region_name as name, r.region_description as description, r.latitude as lat, r.longitude as lng');
        $this->datatables->from('region r');
        $this->datatables->add_column('view', '<center><a class=\'btn btn-info btn-xs\' value=\'$1\' target=\'_blank\' href=\'http://www.google.com/maps/place/$2,$3\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></a> <button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id,lat,lng');
        return $this->datatables->generate();
    }


    //  function json_placeByRegionId($id) {
    //     $this->datatables->select('p.id_place as id,p.name as name, p.address as address, p.phone_number as phoneNumber, p.description as description');
    //     $this->datatables->from('place p');
    //     // $this->datatables->join('region r', 'r.id = rc.id_region');
    //     // $this->datatables->join('admin a','a.id_admin = p.id_admin');
    //     // $this->datatables->join('reg_category rc', 'rc.id = p.id_reg_category');
    //     // $this->datatables->join('category c','c.id = rc.id_category');
    //     $this->datatables->where('p.id_reg_category', $id);
    //     $this->datatables->add_column('view', '<center><a class=\'btn btn-info btn-xs\' value=\'$1\' target=\'_blank\' href=\'http://www.google.com/maps/place/$2,$3\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></a> <button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id,lat,lng');
    //     return $this->datatables->generate();
    // }
    // yang benar diatas ini


    function json_placeByRegionId($id) {
        $this->datatables->select('p.id_place as id,p.name as name, p.address as address, p.phone_number as phoneNumber, p.description as description, c.category_name as categoryName, c.category_code as categoryCode,p.latitude as lat, p.longitude as lng');
        $this->datatables->from('place p');
        //$this->datatables->join('admin a','a.id_admin = p.id_admin');
        $this->datatables->join('reg_category rc', 'rc.id = p.id_reg_category');
        $this->datatables->join('category c','c.id = rc.id_category');
        $this->datatables->join('region r', 'r.id = rc.id_region');
        $this->datatables->where('r.id', $id);
        $this->datatables->add_column('view', '<center><a class=\'btn btn-info btn-xs\' value=\'$1\' target=\'_blank\' href=\'http://www.google.com/maps/place/$2,$3\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></a> <button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id,lat,lng');
        return $this->datatables->generate();
    }


    //   function json_placeAdmin($id) {
    //     $this->datatables->select('a.id_admin as id, a.admin_login as username,a.admin_name as name, a.admin_email as email, r.region_code as region, c.category_name as category, p.name as place');
    //     $this->datatables->from('place p');
    //     $this->datatables->join('admin a','a.id_admin = p.id_admin');
    //     $this->datatables->join('reg_category rc', 'rc.id = p.id_reg_category');
    //     $this->datatables->join('category c','c.id = rc.id_category');
    //     $this->datatables->join('region r', 'r.id = rc.id_region');
    //     $this->datatables->where('r.id', $id);
    //     //$this->datatables->where('a.id_role ', '3');
    //     $this->datatables->add_column('view', '<center><a class=\'btn btn-info btn-xs\' value=\'$1\' target=\'_blank\' href=\'http://www.google.com/maps/place/$2,$3\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></a> <button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id,lat,lng');
    //     return $this->datatables->generate();
    // }


     function json_placeAdmin($id) {
        $this->datatables->select('a.id_admin as id, a.admin_login as username,a.admin_name as name, a.admin_email as email, r.region_code as region, c.category_name as category, p.name as place');
        $this->datatables->from('reg_category rc');
        $this->datatables->join('place p', 'p.id_reg_category = rc.id');
        $this->datatables->join('category c','c.id = rc.id_category');
        $this->datatables->join('region r', 'r.id = rc.id_region');
        //$this->datatables->where('a.id_role ', '3');
        $this->datatables->where('r.id', $id);
        $this->datatables->join('admin a','a.id_admin = p.id_admin','left outer');
        $this->datatables->add_column('view', '<center><a class=\'btn btn-info btn-xs\' value=\'$1\' target=\'_blank\' href=\'http://www.google.com/maps/place/$2,$3\' title=\'Go to Location\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></a>  <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Delete Admin\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id,lat,lng');
        return $this->datatables->generate();
    }

    // function json_placeAdmin($id) {
    //     $this->datatables->select('a.id_admin as id, a.admin_login as username,a.admin_name as name, a.admin_email as email, r.region_code as region, c.category_name as category, p.name as place');
    //     $this->datatables->from('place p');
    //     $this->datatables->join('admin a','a.id_admin = p.id_admin','left outer');
    //     $this->datatables->join('region_category rc', 'rc.id = p.id_reg_category');
    //     $this->datatables->join('category c','c.id = rc.id_category');
    //     $this->datatables->join('region r', 'r.id = rc.id_region');
    //     $this->datatables->where('r.id', $id);
    //     //$this->datatables->where('a.id_role ', '3');
    //     $this->datatables->add_column('view', '<center><a class=\'btn btn-info btn-xs\' value=\'$1\' target=\'_blank\' href=\'http://www.google.com/maps/place/$2,$3\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></a> <button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id,lat,lng');
    //     return $this->datatables->generate();
    // }

    
}
