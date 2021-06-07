<?php

class M_admin extends CI_Model
{

  public function insert($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  public function select_desc($tabel, $where)
  {
    $this->db->order_by('id', 'DESC');
    $this->db->where($where);
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
    $query = $this->db->update($tabel, $data);
    return $query;
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
    $query = $this->db->select("a.id,a.nama_user,a.email,a.username,a.last_login,b.nama_role")
      ->from($tabel .' as a')
      ->join('tb_role as b', 'b.id=a.role')
      ->where_not_in('username', $username)
      ->get();
    return $query->result();
  }
  public function join_tabel_desc($where)
  {
    $this->db->select('a.*,b.nama_gudang,c.nama_kategori');
    $this->db->from('tb_barang_masuk as a');
    $this->db->join('tb_gudang as b', 'b.id = a.id_gudang');
    $this->db->join('tb_kategori as c', 'c.id = a.id_kategori');
    $this->db->where('a.is_deleted', 0);
    if($this->session->userdata('role') !== '1' && $this->session->userdata('role') !== '5')
    {
      $this->db->where('a.id_gudang', $where['id_gudang']);
      $this->db->where('a.id_kategori', $where['id_kategori']);
    }

    $this->db->order_by('a.id', 'DESC');
    $query = $this->db->get();
    // var_dump($this->session->userdata('role') !== 1);die();
    return $query->result();
  }

  public function print_stok()
  {
    $this->db->select('a.*,b.nama_gudang,c.nama_kategori');
    $this->db->from('tb_barang_masuk as a');
    $this->db->join('tb_gudang as b', 'b.id = a.id_gudang');
    $this->db->join('tb_kategori as c', 'c.id = a.id_kategori');
    $this->db->where('a.is_deleted', 0);
    $this->db->order_by('a.id', 'DESC');
    $query = $this->db->get();
    var_dump($this->session->userdata('role') == '5');die();
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
    $this->db->select('a.*,b.nama_gudang,c.nama_kategori');
    $this->db->from('tb_barang_masuk as a');
    $this->db->join('tb_gudang as b', "b.id = a.id_gudang");
    $this->db->join('tb_kategori as c', "c.id=a.id_kategori");
    $this->db->where('a.is_deleted', 0);
    $this->db->where('a.id_gudang', $id_gudang);
    $this->db->order_by('a.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
  
  public function stok_barang_keluar($id_gudang, $id_kategori)
  {
    $this->db->select('a.*,b.id_gudang,b.id_kategori');
    $this->db->from('tb_barang_keluar as a');
    $this->db->join('tb_barang_masuk as b', "b.id_transaksi=a.id_transaksi");
    if($this->session->userdata('role') !== 1)
    {
      $this->db->where('b.id_gudang', $id_gudang);
      $this->db->where('b.id_kategori', $id_kategori);
    }
    $this->db->order_by('a.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function stok_barang_kembali($id_gudang, $id_kategori)
  {
    $this->db->select('a.*,b.id_gudang,b.id_kategori');
    $this->db->from('tb_barang_kembali as a');
    $this->db->join('tb_barang_masuk as b', "b.id_transaksi=a.id_transaksi");
    if(!$this->session->userdata('role') !== 1)
    {
      $this->db->where('b.id_gudang', $id_gudang);
      $this->db->where('b.id_kategori', $id_kategori);
    }
    $this->db->order_by('a.id', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  
}
