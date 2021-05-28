<?php 
class M_barang extends CI_Model{
    
    public function barang($id_transaksi)
    {
        $query = $this->db->select("a.*,b.nama_gudang")
            ->from('tb_barang_masuk as a')
            ->join('tb_gudang as b', 'b.id=a.id_gudang')
            ->where('a.id_transaksi', $id_transaksi)
            ->get();
        return $query->row();
    } 
}

