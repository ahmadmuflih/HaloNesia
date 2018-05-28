<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_posts extends CI_Model {
  function __construct(){
      parent::__construct();
      // $this->db1 = $this->load->database('db1', TRUE);
    }

     function insert($arraydata = array())
  {
    $this->db->insert('posts', $arraydata);


    $last_recore = $this->db->insert_id();
    // $id_postLastRecord = array('id_post' => $last_recore);
    // $masukin= $this->db->insert('files', "id_post = $last_recore", $arraydata1);
    return $last_recore;
  }

    function insertFile($arraydata = array())
  {
    // $this->db->insert('posts', $arraydata);


    // $last_recore = $this->db->insert_id();
    // $id_postLastRecord = array('id_post' => $last_recore);
    $masukin= $this->db->insert('files',$arraydata);
    return $masukin;
  }

     function insertCoba($arraydata = array())
  {
    // $this->db->insert('posts', $arraydata);


    // $last_recore = $this->db->insert_id();
    // $id_postLastRecord = array('id_post' => $last_recore);
    $masukin= $this->db->insert('coba',$arraydata);
    return $masukin;
  }



  function update($parameterfilter=array(), $arraydata=array() )
    {
        $this->db->where($parameterfilter);
        $this->db->update('posts', $arraydata);
        return $this->db->affected_rows();
    }
    function delete($parameter=array())
    {
        $this->db->delete('posts', $parameter );
        return $this->db->affected_rows();
    }
    public function getIdPlace($parameterfilter=array()){
      $q= $this->db->get_where('place', $parameterfilter);
      $a= $q->result_array();
// if id is unique, we want to return just one row
      $data = array_shift($a);
      return $data['id_place'];
    }

    public function get($parameterfilter=array()){
      return $this->db->get_where('posts', $parameterfilter);
    }


    public function getLastRecord(){
      $last_recore = $this->db->insert_id();
      return $last_recore;
    }


    function getRegionPlaces($id_region){
     $this->db->select('p.id_place, p.name,c.category_name');
     $this->db->from('place p');
     $this->db->join('reg_category rc','rc.id = p.id_reg_category');
     $this->db->join('category c','rc.id_category = c.id');
     $this->db->where("rc.id_region = $id_region");
     $this->db->where(array('p.id_admin' => NULL));
     return $this->db->get();
    }

    function json($id_admin) {
        $this->datatables->select('p.id_post as id, p.post_author as author, p.post_title as title, p.post_category as category, p.post_content as content,  (select group_concat(f.file_url) as image
          from files f where f.id_post = p.id_post) as image');
        $this->datatables->from('posts p');
        $this->datatables->join('place pl','pl.id_place=p.id_place');
        $this->datatables->where('pl.id_admin',$id_admin);
        $this->datatables->add_column('view', '<center><button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id');
        return $this->datatables->generate();
    }

     function jsonRegion($id_region) {
        $this->datatables->select('p.id_post as id,pl.name as name, p.post_author as author, p.post_title as title, p.post_category as category, p.post_content as content, (select group_concat(f.file_url) as image
          from files f where f.id_post = p.id_post) as image,');
        $this->datatables->from('posts p');
        $this->datatables->join('place pl','pl.id_place=p.id_place');
        $this->datatables->join('reg_category rc','rc.id = pl.id_reg_category');
        $this->datatables->join('region r', 'r.id = rc.id_region');
        $this->datatables->where('r.id',$id_region);
        $this->datatables->add_column('view', '<center><button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id');
        return $this->datatables->generate();
    }



    // function json($id) {
    //     $this->datatables->select('p.id_post as id, p.post_author as author, p.post_title as title, p.post_category as category, p.post_content as content, f.file_url as image');
    //     $this->datatables->from('posts p');
    //     $this->datatables->join('files f','f.id_post = p.id_post');
    //     $this->datatables->join('place pl','pl.id_place=p.id_place');
    //     // $this->datatables->join('admin a','a.id_admin = pl.id_admin');

    //     // $this->datatables->join('region r','r.id = rc.id_region');
    //     // if($region_id!='0')
    //     //   $this->datatables->where("rc.id_region = $region_id");
    //     // if($category_id!='0')
    //     //   $this->datatables->where("rc.id_category = $category_id");
    //     $this->datatables->where('p.id_place',$id);
    //     $this->datatables->add_column('view', '<center><button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id');
    //     return $this->datatables->generate();
    // }

    //   function json_placeByRegionId($id) {
    //     $this->datatables->select('p.id_place as id,p.name as name, p.address as address, p.phone_number as phoneNumber, p.description as description, c.category_name as categoryName, c.category_code as categoryCode');
    //     $this->datatables->from('place p');
    //     //$this->datatables->join('admin a','a.id_admin = p.id_admin');
    //     $this->datatables->join('reg_category rc', 'rc.id = p.id_reg_category');
    //     $this->datatables->join('category c','c.id = rc.id_category');
    //     $this->datatables->join('region r', 'r.id = rc.id_region');
    //     $this->datatables->where('r.id', $id);
    //     $this->datatables->add_column('view', '<center><a class=\'btn btn-info btn-xs\' value=\'$1\' target=\'_blank\' href=\'http://www.google.com/maps/place/$2,$3\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></a> <button class=\'btn btn-success btn-xs\' value=\'$1\' onclick=\'edit(this.value)\' title=\'Edit Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-edit\'></span></button> <button class=\'btn btn-danger btn-xs\' value=\'$1\' onclick=\'hapus(this.value)\' title=\'Hapus Data\' data-toggle="modal"><span class=\'glyphicon glyphicon-remove\'></span></button></center>', 'id,lat,lng');
    //     return $this->datatables->generate();
    // }



}
