<?php
class M_barang extends CI_Model
{

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

    public function total()
    {
        $rusak = $this->db->query("SELECT sum(jumlah) AS total_rusak FROM tb_barang_keluar AS a WHERE a.status =3 ")->row()->total_rusak;
        $service = $this->db->query("SELECT sum(jumlah) AS total_service FROM tb_barang_keluar as a WHERE a.status=2 ")->row()->total_service;
        $keluar = $this->db->query("SELECT sum(jumlah) AS total_keluar FROM tb_barang_keluar as a WHERE a.status=0 ")->row()->total_keluar; 
        $data = (object) array(
            'total_keluar' => $keluar,
            'total_stok' => NULL,
            'total_service' => $service,
            'total_rusak' => $rusak
        );
        // echo json_encode($data);die();
        return $data;
    }
}
