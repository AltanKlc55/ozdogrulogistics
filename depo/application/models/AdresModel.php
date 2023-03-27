<?php
class AdresModel extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();

  }


  public function ulkeler()
  {
    $this->db->select("*");
    $this->db->from('ulkeler');
    $query = $this->db->get();
    return $query->result();
  }

  public function sehirler($x)
  {
    $this->db->select("*");
    $this->db->from('sehirler');
    $this->db->where('ulke_id' , $x);
    $query = $this->db->get();
    return $query->result();
  }


  public function ilceler($y)
  {
    $this->db->select("*");
    $this->db->from('ilceler');
    $this->db->where('sehir_id' , $y);
    $query = $this->db->get();
    return $query->result();
  }


}
?>
