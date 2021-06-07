<?php 
class M_barang extends CI_Model{
    
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
    public function total_status($status){
        $query = $this->db->select("a.*,b.nama_gudang,c.nama_kategori")
        ->from('tb_barang_masuk as a')
        ->get();
    return $query->num_row();
    } 
}

