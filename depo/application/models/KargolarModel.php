<?php
class KargolarModel extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();

  }

  public function select()
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $query = $this->db->get();
    return $query->result();
  }


  public function sonkargoveri()
  {
    $this->db->select("*");
    $this->db->from('kargolar_sayim');
    $this->db->order_by('veri_id','DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result();
  }



  public function get_ulke_name($x)
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->like('acik_adres', $x);
    $query = $this->db->get();
    return $query->result();
  }


  public function sonkargo()
  {
    $this->db->select("id");
    $this->db->from('tbl_kargolar');
    $this->db->order_by('id','DESC');
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->result();
  }




  public function barkoda_gore($x)
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->where('barkod_no', $x);
    $query = $this->db->get();
    return $query->result();
  }


  public function id_gore($x)
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->where('id', $x);
    $query = $this->db->get();
    return $query->result();
  }




  public function kargoge_barkode($x)
  {

    $this->db->where('barkod_no', $x);
    $query = $this->db->get('tbl_kargolar');
    return $query->num_rows();

    
  }


  public function kargoge_barkode_ara_kargo($x)
  {

    $this->db->where('barkod_no', $x);
    $query = $this->db->get('ara_kargo');
    return $query->num_rows();


  }


  public function get_merkez_kargo_adeti()
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->where('status', 0);
    $query = $this->db->get();
    return $query->num_rows();

  }

  public function get_depo_için_yolda()
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->where('status', 1);
    $query = $this->db->get();
    return $query->num_rows();

  }


  public function get_depoda()
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->where('status', 2);
    $query = $this->db->get();
    return $query->num_rows();

  }

  public function get_dagitimda()
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->where('status', 3);
    $query = $this->db->get();
    return $query->num_rows();

  }


  public function get_tamamlandi()
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->where('status', 4);
    $query = $this->db->get();
    return $query->num_rows();

  }



  public function get_ulke_name_eu($x)
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->like('acik_adres', $x);
    $this->db->where('status', 2);
    $query = $this->db->get();
    return $query->result();
  }




  public function select_admin()
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $query = $this->db->get();
    return $query->result();
  }


  public function select_eu()
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->where('status',3);
    $query = $this->db->get();
    return $query->result();
  }

  public function tekkargo($x)
  {

    $this->db->select("*");
    $this->db->from('tbl_kargolar');
    $this->db->where('id',$x);
    $query = $this->db->get();
    return $query->result();
  }


  public function kargo_sayim_ekle($data)
  {
    $this->db->insert('kargolar_sayim',$data);
    return $this->db->insert_id();
  }
  
  public function ara_kargo_ekle($data)
  {
    $this->db->insert('ara_kargo',$data);
    return $this->db->insert_id();
  }


  public function create($data)
  {
    $this->db->insert('tbl_kargolar',$data);
    return $this->db->insert_id();
  }

  public function edit($where, $data)
  {
    $this->db->update('tbl_kargolar', $data, $where);
    return $this->db->affected_rows();
  }

  public function edit_arakargo($where, $data)
  {
    $this->db->update('ara_kargo', $data, $where);
    return $this->db->affected_rows();
  }

  public function delete()
  {
    $this->db->where('id', $this->input->post('id'));
    return $this->db->delete("tbl_kargolar");

  }


}
?>
