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

    $role = intval($this->session->userdata('role'));
    if ($this->session->userdata('status') == 'login') {
      if ($role == 1 || $role == 2 || $role == 3 || $role == 4) {
        redirect('admin');
      } elseif ($role == 6 || $role == 5) {
        $this->role = $role;
        $this->author = $this->session->userdata('id');
      } else {
        redirect('login');
      }
    } else {
      redirect('login');
    }
  }

  public function index()
  {
    $head['title'] = 'Scan QR Barang | User';
    $head['username'] = $this->session->userdata('email');
    $head['sidebar_menu'] = $this->sidebar_menu();
    $data = array(
      'title' => 'Scan Barcode',
      'views' => array(
        'card_satu' => $this->load->view('user_stisla/cards/scan_barang', '', TRUE)
      ),
    );
    $this->load->view('template/head', $head);
    $this->load->view('user_stisla/index', $data);
    $this->load->view('template/footer', $data);
  }

  function get_by_id($id_transaksi = FALSE)
  {
    $head['title'] = 'Detail Barang | User';
    $head['username'] = $this->session->userdata('email');
    $head['sidebar_menu'] = $this->sidebar_menu();
    $cards['detail'] = $this->M_barang->barang($id_transaksi);
    $cards['list_status'] = $this->M_admin->select('tb_status');
    $cards['total'] = $this->M_barang->total();
    $where = array(
      'a.id_transaksi'  => $id_transaksi,
      'a.created_by'    => $this->author
    );
    $cards['barang_keluar'] = $this->M_barang->select('tb_barang_keluar', $where);
    // echo json_encode($cards['barang_keluar']);die();
    if ($this->M_barang->barang($id_transaksi)) {
      $data = array(
        'title' => $cards['detail']->nama_barang,
        'views' => array(
          'header'    => $this->role !== 6 ? $this->header() : NULL,
          'card_satu' => $this->load->view('barang/photo_barang.php', $cards, TRUE),
          'card_dua'  => $this->load->view('barang/detail_barang.php', $cards, TRUE),
          'card_tiga' => $this->load->view('barang/scanner.php', $cards, TRUE), //modal scanner
          'modal_scanner' => $this->load->view('user_stisla/modals/scanner.php', $cards, TRUE),
        ),
      );
    } else {
      $data = array(
        'title' => 'Barang Tidak Ada',
        'views' => array(
          'header'    => $this->header(),
          'card_satu' => $this->load->view('barang/404.php', '', TRUE),
        ),
      );
    }

    $this->load->view('template/head.php', $head);
    $this->load->view('user_stisla/index', $data);
    $this->load->view('template/footer.php', $data);
  }

  public function scan($type = false)
  {
    if ($type == '') {
      echo 'masuk';
    } elseif ($type == 'keluar') {
      echo 'keluar';
    } else {
      echo $type;
    }
  }

  public function submit($type = false)
  {
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
    $id_transaksi         = $this->input->post('id_transaksi', TRUE);
    $barang               = $this->M_barang->barang($id_transaksi);
    $jumlah               = $this->input->post('jumlah', TRUE);
    $keterangan           = $this->input->post('keterangan', TRUE);
    $nm_penjab            = $this->input->post('nm_penjab', TRUE);
    $nohp_penjab          = $this->input->post('nohp_penjab', TRUE);
    $alamat = array(
      'alamat'           => $this->input->post('alamat', TRUE),
      'kecamatan'        => $this->input->post('kecamatan', TRUE),
      'kota'             => $this->input->post('kota', TRUE),
      'provinsi'         => $this->input->post('provinsi', TRUE),
      'kode_pos'         => $this->input->post('kode_pos', TRUE),
      'perusahaan'       => $this->input->post('perusahaan', TRUE),
    );

    if ($this->form_validation->run() === TRUE) {
      switch ($type):
        case 'kembali':
          $status = $this->input->post('status', TRUE);
          $kembali = array(
            'id_transaksi'      => $id_transaksi,
            'jumlah'            => $jumlah,
            'keterangan'        => $keterangan,
            'status'            => $status,
            'id_barang_keluar'  => $this->input->post('id', TRUE),
            'created_by'        => $this->author,
            'tanggal_kembali'   => date("Y-m-d"),
            'created_at'        => date("Y-m-d H:i:s"),
          );
          $update = array(
            'status'      => $status,
            'keterangan'  => $keterangan,
            'jumlah'      => $this->input->post('stok', TRUE) - $jumlah,
            'updated_at'  => date("Y-m-d"),
          );
          if($status !== 0){
            $this->M_admin->menambah('tb_barang_masuk', $id_transaksi, $jumlah);
          }

          $this->M_admin->insert('tb_barang_kembali', $kembali);
          $this->M_admin->update('tb_barang_keluar', $update, array('id' => $kembali['id_barang_keluar']));
          $this->session->set_flashdata('msg_berhasil_kembali', 'Data Berhasil Kembali');
          redirect('logs');
          break;
        case 'keluar':
          $keluar = array(
            'id_transaksi'    => $id_transaksi,
            'tanggal_keluar'  => date("Y/m/d"),
            'id_lokasi'       => $this->M_admin->insert_lokasi('map_lokasi', $alamat),
            'jumlah'          => $jumlah,
            'keterangan'      => $keterangan,
            'nm_penjab'       => $nm_penjab, //penerima
            'nohp_penjab'     => $nohp_penjab, //no hape penerima
            'created_by'      => $this->author,
            'created_at'      => date("Y-m-d H:i:s")
          );
          $this->M_admin->mengurangi('tb_barang_masuk', $id_transaksi, $jumlah);
          $this->M_admin->insert('tb_barang_keluar', $keluar);
          $this->session->set_flashdata('msg_berhasil_keluar', 'Data Berhasil Keluar');
          redirect('logs');
          break;
        default:
          $error = array(
            'message' => 'gagal',
            'status'  => 400
          );
          echo json_encode($error);
          break;
      endswitch;
    } else {
      $error = array(
        'message' => 'gagal submit',
        'status'  => 400
      );
      echo json_encode($error);
      die();
      $this->session->set_flashdata('msg_gagal', 'Gagal Submit');
      redirect(base_url('barang/' . $id_transaksi));
    }
  }

  public function edit_list_barang()
  {
    $id = $this->uri->segment(3);
    $head['title'] = 'Inventory Gudang | Form Barang Kembali';
    $where = array('id' => $id);
    $list_data = $this->M_admin->get_data_row('tb_barang_keluar', $where);
    $data['gambar_barang'] = $this->M_admin->get_gambar($list_data->id_transaksi);
    $data['alamat'] = $this->M_admin->get_data_row('map_lokasi', array('id' => $list_data->id_lokasi));
    $data['list_data'] = $list_data;
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/scanner/form_barang_kembali.php', $data);
  }

  public function scan_list_barang()
  {
    $uri = $this->uri->segment(3);
    $head['title'] = 'Inventory Gudang | List Barang by QR';
    $where = array(
      'status'       => 0,
      'id_transaksi' => $uri
    );
    $data['list_data'] = $this->M_admin->get_data('tb_barang_keluar', $where);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/scanner/list_barang', $data);
  }

  public function submit_barang_kembali()
  {
    $id_transaksi     = $this->input->post('id_transaksi', TRUE);
    $status           = $this->input->post('status', TRUE);
    $keterangan       = $this->input->post('keterangan', TRUE);
    $where = array('id' => $this->input->post('id', TRUE));
    $jumlah           = $this->input->post('jumlah', TRUE);
    $data = $this->M_admin->get_data_row('tb_barang_keluar', $where);
    $insert = array(
      'id_transaksi'    => $data->id_transaksi,
      'tanggal_kembali' => date('Y-m-d'),
      'kode_barang'     => $data->kode_barang,
      'nama_barang'     => $data->nama_barang,
      'satuan'          => $data->satuan,
      'jumlah'          => $jumlah,
      'status'          => $status,
      'keterangan'      => $keterangan,
      'created_at'      => date('Y-m-d H:i:s')
    );
    $update = array(
      'status' => $status,
      'keterangan' => $keterangan
    );

    if ($status !== 0) {
      $this->M_admin->menambah('tb_barang_masuk', $id_transaksi, $jumlah);
    }

    $this->M_admin->insert('tb_barang_kembali', $insert);
    $this->M_admin->update('tb_barang_keluar', $update, $where);
    $this->session->set_flashdata('msg_berhasil_masuk', 'Barang Berhasil DiKembalikan');
    redirect(base_url('admin/tabel_barangkeluar'));
  }

  public function scan_barang($type = false)
  {
    $head['sidebar_menu'] = $this->sidebar_menu();
    $head['title'] = 'Scan QR Barang | User';
    $head['username'] = $this->session->userdata('email');
    if ($type == 'kembali') {
      $data = array(
        'title' => 'Scan Barcode',
        'views' => array(
          'header'  => $this->header()
        ),
      );
    } else {
    }
    $this->load->view('template/head', $head);
    $this->load->view('barang/index', $data);
    $this->load->view('template/footer', $data);
  }
  public function header()
  {
    $data = array(
      'total' => array(
        'barang_masuk'    => $this->M_user->total_row('tb_barang_masuk'),
        'barang_keluar'   => $this->M_user->total_row('tb_barang_keluar'),
        'barang_kembali'  => $this->M_user->total_row('tb_barang_kembali'),
      ),
      'status' => $this->M_barang->total(),
      'kategori' => $this->M_barang->kategori()
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
