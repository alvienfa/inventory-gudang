<?php
class M_user extends CI_Model
{

  public function insert($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  public function update($tabel, $data, $where)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }

  public function mengurangi($tabel, $id_transaksi, $jumlah)
  {
    $this->db->set("jumlah", "jumlah - $jumlah");
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->update($tabel);
  }

  public function sum($tabel, $field)
  {
    $query = $this->db->select_sum($field)
      ->from($tabel)
      ->get();
    return $query->result();
  }

  public function update_password($tabel, $where, $data)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }

  public function select($tabel)
  {
    return $this->db->select()
      ->from($tabel)
      ->order_by('id', 'desc')
      ->get()->result();
  }

  //====================================
  // 
  //
  // ===================================

  public function progress_barang()
  {
    $query = $this->db->from('tb_barang_masuk')->order_by('jumlah', 'desc')->limit(7)->get();
    return $query->result();
  }

  public function total_row($tabel)
  {
    $query = $this->db->select()->from($tabel)->get();
    return $query->num_rows();
  }

  public function select_limit($tabel1, $tabel2, $limit)
  {
    $query = $this->db->select("a.*,b.text_status")
      ->from($tabel1 . ' as a')
      ->join($tabel2 . ' as b', 'b.id = a.status', 'LEFT')
      ->limit($limit)
      ->order_by('id', 'desc')
      ->get()->result();
    return $query;
  }

  public function barang_masuk($a, $b)
  {
    $query = $this->db->select("a.*,b.nama_gudang")
      ->from($a . ' as a')
      ->join($b . ' as b', 'b.id = a.id_gudang', 'LEFT')
      ->order_by('a.id', 'desc')
      ->get()->result();
    return $query;
  }

  public function barang_keluar($a,$b,$c)
  {
    $query = $this->db->select("a.*,b.*,c.text_status")
    ->from($a . ' as a')
    ->join($b . ' as b', 'b.id=a.id_lokasi','left')
    ->join($c . ' as c', 'c.id=a.status', 'left')
    ->order_by('a.id', 'desc')
    ->get()->result();
  return $query;
  }

  public function barang_kembali($a)
  {
    $query = $this->db->select("*")
    ->from($a)
    // ->join($b . ' as b', 'b.id=a.id_lokasi','left')
    // ->join($c . ' as c', 'c.id=a.status', 'left')
    ->order_by('id', 'desc')
    ->get()->result();
  return $query;
  }
}
