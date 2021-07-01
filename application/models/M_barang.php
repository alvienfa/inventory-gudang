<?php
class M_barang extends CI_Model
{
    public function select($table, $where)
    {
        $query = $this->db->select("a.*,b.satuan,b.nama_barang,lokasi.kota,lokasi.provinsi")
        ->from($table . ' as a')
        ->join('tb_barang_masuk as b' , 'b.id_transaksi=a.id_transaksi')
        ->join('map_lokasi as lokasi' , 'lokasi.id=a.id_lokasi')
        ->where($where)
        ->order_by('a.id', 'desc')
        ->get()->result();
        return $query;
    }

    public function select_row($table, $where)
    {
        $this->db->select("*");
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get()->row();
        return $query;
    }

    public function barang($id_transaksi)
    {
        $query = $this->db->select("a.*,b.nama_gudang,c.nama_kategori")
            ->from('tb_barang_masuk as a')
            ->join('tb_gudang as b', 'b.id=a.id_gudang')
            ->join('tb_kategori as c', 'c.id=a.id_kategori')
            ->where('a.id_transaksi', $id_transaksi)
            ->get();
        return $query->row();
    }
    public function total_status($status)
    {
        $query = $this->db->select("a.*,b.nama_gudang,c.nama_kategori")
            ->from('tb_barang_masuk as a')
            ->get();
        return $query->num_row();
    }

    public function total_per_barang($id_transaksi){
        $rusak = $this->db->query("SELECT sum(jumlah) AS total_rusak FROM tb_barang_keluar AS a WHERE a.status =3 AND a.id_transaksi='{$id_transaksi}'")->row()->total_rusak;
        $service = $this->db->query("SELECT sum(jumlah) AS total_service FROM tb_barang_keluar as a WHERE a.status=2 AND a.id_transaksi='{$id_transaksi}' ")->row()->total_service;
        $keluar = $this->db->query("SELECT sum(jumlah) AS total_keluar FROM tb_barang_keluar as a WHERE a.status=0 AND a.id_transaksi='{$id_transaksi}' ")->row()->total_keluar; 
        $data = (object) array(
            'total_keluar' => $keluar,
            'total_stok' => 0,
            'total_service' => $service,
            'total_rusak' => $rusak
        );
        return $data;
    }
    public function total()
    {
        $rusak = $this->db->query("SELECT sum(jumlah) AS total_rusak FROM tb_barang_keluar AS a WHERE a.status =3 ")->row()->total_rusak;
        $service = $this->db->query("SELECT sum(jumlah) AS total_service FROM tb_barang_keluar as a WHERE a.status=2 ")->row()->total_service;
        $keluar = $this->db->query("SELECT sum(jumlah) AS total_keluar FROM tb_barang_keluar as a WHERE a.status=0 ")->row()->total_keluar; 
        $data = (object) array(
            'total_keluar' => $keluar,
            'total_stok' => 0,
            'total_service' => $service,
            'total_rusak' => $rusak
        );
        return $data;
    }
    public function kategori()
    {
        $demo = $this->db->query("SELECT 'a.id' FROM tb_barang_masuk as a WHERE a.id_kategori=1 ")->num_rows(); 
        $inventory = $this->db->query("SELECT 'a.id' FROM tb_barang_masuk as a WHERE a.id_kategori=2 ")->num_rows();
        $persediaan = $this->db->query("SELECT 'a.id' FROM tb_barang_masuk AS a WHERE a.id_kategori =3 ")->num_rows();
        $data = (object) array(
            'total_demo' => $demo,
            'total_inventory' => $inventory,
            'total_persediaan' => $persediaan
        );
        return $data;
    } 
}
