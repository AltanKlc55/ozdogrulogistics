<?php
class MusteriModel extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();

  }

  public function select()
  {

    $this->db->select("*");
    $this->db->from('tbl_musteriler');
    $query = $this->db->get();
    return $query->result();
  }

  public function tekmusteri($x)
  {
    $this->db->select("*");
    $this->db->from('tbl_musteriler');
    $this->db->where('id' , $x);
    $query = $this->db->get();
    return $query->result();
  }

  public function sonmusteri()
  {
    $this->db->select("id");
    $this->db->from('tbl_musteriler');
    $this->db->order_by('id','DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result();
  }

  public function telefon_kontrol($x)
  {
    $this->db->select("*");
    $this->db->from('tbl_musteriler');
    $this->db->where('tel_no' , $x);
    $query = $this->db->get();
    return $query->result();
  }


  public function select_admin()
  {

    $this->db->select("*");
    $this->db->from('tbl_musteriler');
    $query = $this->db->get();
    return $query->result();
  }


  //public function canli_arama($x)
  //{
//
  //  $this->db->select("*");
  //  $this->db->from("tbl_musteriler");
  //  if($x != '')
  //  {
  //    $this->db->like('ad', $x);
  //    $this->db->or_like('soyad', $x);
  //  }
  //  $this->db->order_by('id', 'DESC');
  //  return $this->db->get();
  //}


  public function create($data)
  {
    $this->db->insert('tbl_musteriler',$data);
    return $this->db->insert_id();
  }

  public function edit($where, $data)
  {
    $this->db->update('tbl_musteriler', $data, $where);
    return $this->db->affected_rows();
  }

  public function delete()
  {
    $this->db->where('id', $this->input->post('id'));
    return $this->db->delete("tbl_musteriler");

  }


}
?>
