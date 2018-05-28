<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_category extends CI_Model {
  function __construct(){
      parent::__construct();
      // $this->db1 = $this->load->database('db1', TRUE);
    }

     function insert($arraydata = array() )
  {
    $this->db->insert('category', $arraydata);
    $last_recore = $this->db->insert_id();
    return $last_recore;
  }
  function update($parameterfilter=array(), $arraydata=array() )
    {
        $this->db->where($parameterfilter);
        $this->db->update('category', $arraydata);
        return $this->db->affected_rows();
    }
    function delete($parameter=array())
    {
        $this->db->delete('category', $parameter );
        return $this->db->affected_rows();
    }
    public function get($parameterfilter=array()){
      return $this->db->get_where('category', $parameterfilter);
    }
    function cekCategory($code){
      $query = $this->db->get_where('category',array('category_code'=>$code));
      return $query->num_rows(); 
    }
    function json() {
        $this->datatables->select('c.id, c.category_code as code,c.category_name as name, c.category_description as description');
        $this->datatables->from('category c');
        $this->datatables->add_column('view', '<center><button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id');
        return $this->datatables->generate();
    }
}
