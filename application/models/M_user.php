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

  public function progress_barang()
  {
    $query = $this->db->from('tb_barang_masuk')->order_by('jumlah', 'desc')->limit(7)->get();
    return $query->result();
  }

  public function total_row_active($tabel)
  {
    $query = $this->db->select()->from($tabel)->where('is_deleted', 0)->get();
    return $query->num_rows();
  }

  public function total_row($tabel)
  {
    $query = $this->db->select()->from($tabel)->get();
    return $query->num_rows();
  }

  public function select_limit($tabel1, $tabel2, $tabel3, $limit)
  {
    $query = $this->db->select("
    a.*,
    b.text_status,
    c.nama_barang,
    c.satuan,
    c.kode_barang,
    d.nm_penjab,
    d.nohp_penjab
    ")
      ->from($tabel1 . ' as a')
      ->join($tabel2 . ' as b', 'b.id = a.status', 'LEFT')
      ->join($tabel3 . ' as c', 'c.id_transaksi=a.id_transaksi' , 'LEFT')
      ->join('tb_barang_keluar as d', 'd.id=a.id_barang_keluar', 'LEFT')
      ->limit($limit)
      ->order_by('id', 'desc')
      ->get()->result();
    return $query;
  }

  public function barang_masuk($limit, $start, $search,$daterange)
  {
    $this->db->select("a.*,b.nama_gudang,c.nama_kategori");
    $this->db->from('tb_barang_masuk as a');
    $this->db->join('tb_gudang as b', 'b.id = a.id_gudang', 'LEFT');
    $this->db->join('tb_kategori as c', 'c.id = a.id_kategori', 'LEFT');
    $this->db->like($search);

    if($daterange !== NULL){
      $this->db->where("created_at BETWEEN '{$daterange[0]} 00:01' AND '{$daterange[1]} 23:59'");
    }
    $this->db->where('a.is_deleted', 0);
    $this->db->limit($limit, $start);
    $this->db->order_by('a.id', 'desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function barang_keluar($limit, $start, $search, $daterange)
  {
    $this->db->select("
    
    a.nm_penjab,
    a.nohp_penjab,
    a.jumlah,
    a.status,
    a.keterangan,
    b.alamat,
    b.kecamatan,
    b.kota,
    b.provinsi,
    b.kode_pos,
    c.text_status,
    e.nama_kategori,
    barang.id_transaksi,
    barang.nama_barang,
    barang.kode_barang,
    barang.satuan,
    ")
      ->from('tb_barang_keluar as a')
      ->join('map_lokasi as b', 'b.id=a.id_lokasi')
      ->join('tb_status as c', 'c.id=a.status')
      ->join('tb_barang_masuk as barang', 'barang.id_transaksi=a.id_transaksi')
      ->join('tb_gudang as d', 'd.id=barang.id_gudang')
      ->join('tb_kategori as e', 'e.id=barang.id_kategori')
      ->limit($limit, $start)
      ->like($search);
      
      if($daterange !== NULL){
        $this->db->where("a.created_at BETWEEN '{$daterange[0]} 00:01' AND '{$daterange[1]} 23:59'");
      }
      $this->db->order_by('a.id', 'desc');
      $query = $this->db->get();
    return $query->result();
  }

  public function barang_kembali($limit, $start)
  {
    $query = $this->db->select("barang.id_transaksi,barang.nama_barang,barang.satuan,barang.kode_barang,a.status,a.jumlah,b.text_status")
      ->from('tb_barang_kembali as a')
      ->join('tb_status as b', 'b.id=a.status', 'left')
      ->join('tb_barang_masuk as barang', 'barang.id_transaksi=a.id_transaksi')
      ->limit($limit, $start)
      ->order_by('a.id', 'desc')
      ->get()->result();
    return $query;
  }
}
