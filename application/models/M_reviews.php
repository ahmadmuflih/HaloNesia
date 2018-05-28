<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_reviews extends CI_Model {
  function __construct(){
      parent::__construct();
      // $this->db1 = $this->load->database('db1', TRUE);
    }

     function insert($arraydata = array())
  {
    $this->db->insert('reviews', $arraydata);


    $last_recore = $this->db->insert_id();
    // $id_postLastRecord = array('id_post' => $last_recore);
    // $masukin= $this->db->insert('files', "id_post = $last_recore", $arraydata1);
    return $last_recore;
  }






  function update($parameterfilter=array(), $arraydata=array() )
    {
        $this->db->where($parameterfilter);
        $this->db->update('reviews', $arraydata);
        return $this->db->affected_rows();
    }
    function delete($parameter=array())
    {
        $this->db->delete('reviews', $parameter );
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
      return $this->db->get_where('reviews', $parameterfilter);
    }


    public function getLastRecord(){
      $last_recore = $this->db->insert_id();
      return $last_recore;
    }


    function json($id_admin) {
        $this->datatables->select('r.id_review, r.title,u.user_name as name, concat(r.rating,"/5") as rating, r.photo,r.content,r.created_at');
        $this->datatables->from('reviews r');
        $this->datatables->join('users u','r.id_user=u.id_user','left');
        $this->datatables->join('place pl','pl.id_place=r.id_place');
        $this->datatables->where('pl.id_admin',$id_admin);
        $this->datatables->add_column('photo', '<center><img src="'.base_url().'$1" width="200px"/></center>', 'photo');
        return $this->datatables->generate();
    }





    // function json($id) {
    //     $this->datatables->select('p.id_post as id, p.post_author as author, p.post_title as title, p.post_category as category, p.post_content as content, f.file_url as image');
    //     $this->datatables->from('reviews p');
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
