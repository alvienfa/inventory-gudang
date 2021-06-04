<?php

class M_admin extends CI_Model
{

  public function insert($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  public function select_desc($tabel)
  {
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get($tabel);
    return $query->result();
  }
  public function select($tabel)
  {
    $query = $this->db->get($tabel);
    return $query->result();
  }

  public function cek_jumlah($tabel, $id_transaksi)
  {
    return  $this->db->select('*')
      ->from($tabel)
      ->where('id_transaksi', $id_transaksi)
      ->get();
  }

  public function insert_lokasi($table, $data)
  {
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }
  public function get_data_array($tabel, $id_transaksi)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($id_transaksi)
      ->get();
    return $query->result_array();
  }


  public function get_data_row($tabel, $where)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($where)
      ->get();
    return $query->row();
  }

  public function get_data($tabel, $id_transaksi)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($id_transaksi)
      ->get();
    return $query->result();
  }

  public function update($tabel, $data, $where)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }

  public function delete($tabel, $where)
  {
    $this->db->where($where);
    $this->db->delete($tabel);
  }

  public function mengurangi($tabel, $id_transaksi, $jumlah)
  {
    $this->db->set("jumlah", "jumlah-$jumlah", FALSE);
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->update($tabel);
  }

  public function menambah($tabel, $id_transaksi, $jumlah)
  {
    $this->db->set("jumlah", "jumlah+$jumlah", FALSE);
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->update($tabel);
  }

  public function update_password($tabel, $where, $data)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }

  public function get_data_gambar($tabel, $username)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where('username_user', $username)
      ->get();
    return $query->result();
  }

  public function sum($tabel, $field)
  {
    $query = $this->db->select_sum($field)
      ->from($tabel)
      ->get();
    return $query->result();
  }

  public function numrows($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->get();
    return $query->num_rows();
  }

  public function kecuali($tabel, $username)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where_not_in('username', $username)
      ->get();

    return $query->result();
  }
  public function join_tabel_desc()
  {
    $this->db->select('a.*,b.nama_gudang');
    $this->db->from('tb_barang_masuk as a');
    $this->db->join('tb_gudang as b', "b.id = a.id_gudang");
    $this->db->where('a.is_deleted', 0);
    $this->db->order_by('a.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_gambar($id_transaksi){
    $this->db->select("gambar")->from('tb_barang_masuk')->where('id_transaksi', $id_transaksi);
    $query = $this->db->get()->row();
    // var_dump($query);die();
    return $query;
  }

  public function barang_by_gudang($id_gudang)
  {
    $this->db->select('a.*,b.nama_gudang');
    $this->db->from('tb_barang_masuk as a');
    $this->db->join('tb_gudang as b', "b.id = a.id_gudang");
    $this->db->where('a.is_deleted', 0);
    $this->db->where('a.id_gudang', $id_gudang);
    $this->db->order_by('a.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  } 
}
