<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logs extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->model('M_user');

    if ($this->session->userdata('status') == 'login') {
      $role = $this->session->userdata('role');
      $data = $this->db->select('a.*,b.nama_gudang')
        ->from('tb_role as a')
        ->join('tb_gudang as b', 'b.id=a.id_gudang')
        ->where('a.id', $role)
        ->get()->row();
      if ($role == 2 || $role == 3 || $role == 4) {
        $this->gudang = $data->nama_gudang;
        $this->id_gudang = $data->id_gudang;
        $this->role = $role;
      } elseif ($role == 5) {
        redirect('user');
      } elseif ($role == 6) {
        $this->role = $role;
      } elseif ($role == 1) {
        $this->role = $role;
        $this->gudang = 'superadmin';
        $this->id_gudang = 'superadmin';
      } else {
        redirect('login');
      }
    } else {
      redirect('login');
    }
  }

  public function index()
  {
    $head['title'] = 'Log Barang | User';
    $head['username'] = $this->session->userdata('email');
    $head['sidebar_menu'] = $this->sidebar_menu();
    $card['pagination'] = NULL;
    $card['list_data'] = $this->M_user->barang_keluar('tb_barang_keluar', 'map_lokasi', 'tb_status', 'tb_gudang', 10, 0, 'tb_barang_masuk');
    $data = array(
      'title' => 'Log Barang',
      'views' => array(
        'card_satu' => $this->load->view('user_stisla/tabel/barang_keluar', $card, TRUE)
      ),
    );
    $this->load->view('template/head', $head);
    $this->load->view('user_stisla/index', $data);
    $this->load->view('template/footer', $data);
  }

  public function header()
  {
    $data = array(
      'total' => array(
        'barang_masuk'    => $this->M_user->total_row('tb_barang_masuk'),
        'barang_keluar'   => $this->M_user->total_row('tb_barang_keluar'),
        'barang_kembali'  => $this->M_user->total_row('tb_barang_kembali')
      )
    );
    return $this->load->view('template/header', $data, TRUE);
  }

  public function sidebar_menu()
  {
    $data = array(
      'role' => $this->role
    );
    return $this->load->view('template/sidebar_menu', $data, TRUE);
  }
}
