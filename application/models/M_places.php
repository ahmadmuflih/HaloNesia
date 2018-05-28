<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_places extends CI_Model {
  function __construct(){
      parent::__construct();
      // $this->db1 = $this->load->database('db1', TRUE);
    }

     function insert($arraydata = array() )
  {
    $this->db->insert('place', $arraydata);

    $last_recore = $this->db->insert_id();
    return $last_recore;
  }

  
  function update($parameterfilter=array(), $arraydata=array() )
    {
        $this->db->where($parameterfilter);
        $this->db->update('place', $arraydata);
        return $this->db->affected_rows();
    }
    function delete($parameter=array())
    {
        $this->db->delete('place', $parameter );
        return $this->db->affected_rows();
    }
    public function get($parameterfilter=array()){
      return $this->db->get_where('place', $parameterfilter);
    }
    public function getDetails($parameterfilter=array()){
        $this->db->select('p.*, c.category_name');
        $this->db->from('place p');
        $this->db->join('reg_category rc','p.id_reg_category = rc.id');
        $this->db->join('category c','rc.id_category = c.id');
        $this->db->where($parameterfilter);
        return $this->db->get();
    }

    

    // public function getPlaceByRegionId($id_region()){
    //   $this->db->select('')



    //   return $this->db->get_where('place', $parameterfilter);
    // }


    function getRegionPlaces($id_region){ 
     $this->db->select('p.id_place, p.name,c.category_name'); 
     $this->db->from('place p'); 
     $this->db->join('reg_category rc','rc.id = p.id_reg_category');
     $this->db->join('category c','rc.id_category = c.id'); 
     $this->db->where("rc.id_region = $id_region");
     // $this->db->where(array('p.id_admin' => NULL)); 
     return $this->db->get();
    }

    function getPlacesNoAdminYet($id_region){ 
     $this->db->select('p.id_place, p.name,c.category_name'); 
     $this->db->from('place p'); 
     $this->db->join('reg_category rc','rc.id = p.id_reg_category');
     $this->db->join('category c','rc.id_category = c.id'); 
     $this->db->where("rc.id_region = $id_region");
     $this->db->where("p.id_admin = ");
     // $this->db->where(array('p.id_admin' => NULL)); 
     return $this->db->get();
    }
    
    
}
