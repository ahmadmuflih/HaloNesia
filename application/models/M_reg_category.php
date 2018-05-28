<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_reg_category extends CI_Model {
  function __construct(){
      parent::__construct();
      // $this->db1 = $this->load->database('db1', TRUE);
    }

     function insert($arraydata = array() )
  {
    $this->db->insert('reg_category', $arraydata);
    $last_recore = $this->db->insert_id();
    return $last_recore;
  }
  function update($parameterfilter=array(), $arraydata=array() )
    {
        $this->db->where($parameterfilter);
        $this->db->update('reg_category', $arraydata);
        return $this->db->affected_rows();
    }
    function delete($parameter=array())
    {
        $this->db->delete('reg_category', $parameter );
        return $this->db->affected_rows();
    }
    public function get($parameterfilter=array()){
      return $this->db->get_where('reg_category', $parameterfilter);
    }

    function getRegionCategory($id_region){ 
     $this->db->select('rc.id, c.category_code,c.category_name'); 
     $this->db->from('reg_category rc'); 
     $this->db->join('category c','rc.id_category = c.id'); 
     $this->db->where("rc.id_region = $id_region"); 
     return $this->db->get();
    }

    function cekRegCategory($parameterfilter=array()){
      $query = $this->db->get_where('reg_category',$parameterfilter);
      return $query->num_rows();
    }
    function json($region_id,$category_id) {
        $this->datatables->select('rc.id, r.region_code as region,c.category_name as category');
        $this->datatables->from('reg_category rc');
        $this->datatables->join('category c','c.id = rc.id_category');
        $this->datatables->join('region r','r.id = rc.id_region');
        if($region_id!='0')
          $this->datatables->where("rc.id_region = $region_id");
        if($category_id!='0')
          $this->datatables->where("rc.id_category = $category_id");
        $this->datatables->add_column('view', '<center><button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id');
        return $this->datatables->generate();
    }

    function jsonRegionById($id,$region_id,$category_id) {
        $this->datatables->select('rc.id, r.region_code as region,c.category_name as category, category_code as code');
        $this->datatables->from('reg_category rc');
        $this->datatables->where('rc.id_region',$id);
        $this->datatables->join('category c','c.id = rc.id_category');
        $this->datatables->join('region r','r.id = rc.id_region');
        if($region_id!='0')
          $this->datatables->where("rc.id_region = $region_id");
        if($category_id!='0')
          $this->datatables->where("rc.id_category = $category_id");
        $this->datatables->add_column('view', '<center><button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id');
        return $this->datatables->generate();
    }
}
