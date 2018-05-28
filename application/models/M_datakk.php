<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_datakk extends CI_Model {
  private $tableKK;
  function __construct(){
    parent::__construct();
    $this->tableKK = $this->db->dbprefix('kelompok_keahlian');
  }
  function getTableKK()
  {
    return $this->tableKK;
  }
  function insert($arraydata = array() )
  {
    $this->db->insert($this->tableKK, $arraydata);
    $last_recore = $this->db->insert_id();
    return $last_recore;
  }
  function update($parameterfilter=array(), $arraydata=array() )
    {
        $this->db->where($parameterfilter);
        $this->db->update( $this->tableKK, $arraydata);
        return $this->db->affected_rows();
    }
    function delete($parameter=array())
    {
        $this->db->delete( $this->tableKK, $parameter );
        return $this->db->affected_rows();
    }
    public function getKK($parameterfilter=array()){
      return $this->db->get_where($this->tableKK, $parameterfilter);
    }
    function cekKK($username){
      $query = $this->db->get_where($this->tableKK,array('username'=>$username));
      return $query->num_rows();
    }
    function getProdi(){
      return $this->db->get('prodi');
    }
    function json() {
        $this->datatables->select('kk.id, kk.kode, kk.nama, p.nama as prodi');
        $this->datatables->from('kelompok_keahlian kk');
        $this->datatables->join('prodi p', 'kk.id_prodi = p.id');
        $this->datatables->add_column('view', '<center><button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id');
        return $this->datatables->generate();
    }
}
