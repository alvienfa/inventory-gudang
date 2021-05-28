<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->model('M_user');
    $this->load->model('M_barang');
    $this->load->library('upload');
  }

  public function index()
  {
    $head['title'] = 'Detail Barang | User';
    $head['username'] = $this->session->userdata('email');
    $data = array(
      'title' => 'Scan Barcode',
      'views' => array(
        'header'  => $this->header()
      ),
    );
    $this->load->view('template/head', $head);
    $this->load->view('barang/index' , $data);
    $this->load->view('template/footer', $data);
  }

  function get_by_id($id_transaksi=FALSE)
  {
    $head['title'] = 'Detail Barang | User';
    $cards['detail'] = $this->M_barang->barang($id_transaksi);
    $data = array(
      'title' => 'Detail Barang',
      'views' => array(
        'header'    =>  $this->header(),
        'card_satu' => $this->load->view('barang/photo_barang.php' ,$cards, TRUE),
        'card_dua'  => $this->load->view('barang/detail_barang.php' ,$cards, TRUE),
      ),
    );

    $head['username'] = $this->session->userdata('email');
    $this->load->view('template/head.php' , $head);
    $this->load->view('user_stisla/index' , $data);
    $this->load->view('template/footer.php', $data);
  }

  public function header(){
    $data = array(
      'total' => array(
        'barang_masuk'    => $this->M_user->total_row('tb_barang_masuk'),
        'barang_keluar'   => $this->M_user->total_row('tb_barang_keluar'),
        'barang_kembali'  => $this->M_user->total_row('tb_barang_kembali')
      )      
    );
    return $this->load->view('template/header',$data, TRUE);
  } 

}