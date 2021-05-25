<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->library('upload');
  }

  public function index()
  {
    $head['title'] = 'Inventory Gudang | Dashboard';
    if ($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 1) {
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['stokBarangMasuk'] = $this->M_admin->sum('tb_barang_masuk', 'jumlah');
      $data['stokBarangKeluar'] = $this->M_admin->sum('tb_barang_keluar', 'jumlah');
      $data['dataUser'] = $this->M_admin->numrows('user');
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $data['views']['card'] = $this->load->view('components/card', $data, TRUE);
      $this->load->view('layout/head', $head);
      $this->load->view('admin/index', $data);
      $this->load->view('layout/script');
    } else {
      $this->load->view('login/login');
    }
  }

  public function signout()
  {
    session_destroy();
    redirect('login');
  }

  ####################################
  // Profile
  ####################################

  public function profile()
  {
    $data['token_generate'] = $this->token_generate();
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $head['title'] = 'Inventory Gudang | Profile';
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->session->set_userdata($data);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/profile', $data);
  }

  public function token_generate()
  {
    return $tokens = md5(uniqid(rand(), true));
  }

  private function hash_password($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public function proses_new_password()
  {
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('new_password', 'New Password', 'required');
    $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $new_password = $this->input->post('new_password');

        $data = array(
          'email'    => $email,
          'password' => $this->hash_password($new_password)
        );

        $where = array(
          'id' => $this->session->userdata('id')
        );

        $this->M_admin->update_password('user', $where, $data);

        $this->session->set_flashdata('msg_berhasil', 'Password Telah Diganti');
        redirect(base_url('admin/profile'));
      }
    } else {
      redirect(base_url('admin/profile'));
    }
  }

  public function proses_gambar_upload()
  {
    $config =  array(
      'upload_path'     => "./assets/upload/user/img/",
      'allowed_types'   => "gif|jpg|png|jpeg",
      'encrypt_name'    => False, //
      'max_size'        => "50000",  // ukuran file gambar
      'max_height'      => "9680",
      'max_width'       => "9024"
    );
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('userpicture')) {
      $data['pesan_error'] = $this->upload->display_errors();
      $this->session->set_flashdata('msg_error_gambar', $this->upload->display_errors());
      $this->load->view('admin/profile', $data);
    } else {
      $upload_data = $this->upload->data();
      $nama_file = $upload_data['file_name'];
      $ukuran_file = $upload_data['file_size'];

      //resize img + thumb Img -- Optional
      $config['image_library']     = 'gd2';
      $config['source_image']      = $upload_data['full_path'];
      $config['create_thumb']      = FALSE;
      $config['maintain_ratio']    = TRUE;
      $config['width']             = 150;
      $config['height']            = 150;

      $this->load->library('image_lib', $config);
      $this->image_lib->initialize($config);
      if (!$this->image_lib->resize()) {
        $data['pesan_error'] = $this->image_lib->display_errors();
        $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
        $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
        $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
        $this->load->view('admin/profile', $data);
      }

      $where = array(
        'username_user' => $this->session->userdata('name')
      );

      $data = array(
        'nama_file' => $nama_file,
        'ukuran_file' => $ukuran_file
      );

      $this->M_admin->update('tb_upload_gambar_user', $data, $where);
      $this->session->set_flashdata('msg_berhasil_gambar', 'Gambar Berhasil Di Upload');
      redirect(base_url('admin/profile'));
    }
  }


  ####################################
  // End Profile
  ####################################



  ####################################
  // Users
  ####################################
  public function users()
  {
    $head['title'] = 'Inventory Gudang | Users';
    $data['list_users'] = $this->M_admin->kecuali('user', $this->session->userdata('name'));
    $data['token_generate'] = $this->token_generate();
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->session->set_userdata($data);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/users', $data);
  }

  public function form_user()
  {
    $head['title'] = 'Inventory Gudang | Form Barang Masuk';
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['token_generate'] = $this->token_generate();
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->session->set_userdata($data);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/form_users/form_insert', $data);
  }

  public function update_user()
  {
    $head['title'] = 'Inventory Gudang | User';
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['token_generate'] = $this->token_generate();
    $data['list_data'] = $this->M_admin->get_data('user', $where);
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->session->set_userdata($data);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/form_users/form_update', $data);
  }

  public function proses_delete_user()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $this->M_admin->delete('user', $where);
    $this->session->set_flashdata('msg_berhasil', 'User Behasil Di Delete');
    redirect(base_url('admin/users'));
  }

  public function proses_tambah_user()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {

        $username     = $this->input->post('username', TRUE);
        $email        = $this->input->post('email', TRUE);
        $password     = $this->input->post('password', TRUE);
        $role         = $this->input->post('role', TRUE);

        $data = array(
          'username'     => $username,
          'email'        => $email,
          'password'     => $this->hash_password($password),
          'role'         => $role,
        );
        $this->M_admin->insert('user', $data);

        $this->session->set_flashdata('msg_berhasil', 'User Berhasil Ditambahkan');
        redirect(base_url('admin/form_user'));
      }
    } else {
      $head['title'] = 'Inventory Gudang | Form Insert';
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('layout/head',  $head);
      $this->load->view('admin/form_users/form_insert', $data);
    }
  }

  public function proses_update_user()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $id           = $this->input->post('id', TRUE);
        $username     = $this->input->post('username', TRUE);
        $email        = $this->input->post('email', TRUE);
        $role         = $this->input->post('role', TRUE);

        $where = array('id' => $id);
        $data = array(
          'username'     => $username,
          'email'        => $email,
          'role'         => $role,
        );
        $this->M_admin->update('user', $data, $where);
        $this->session->set_flashdata('msg_berhasil', 'Data User Berhasil Diupdate');
        redirect(base_url('admin/users'));
      }
    } else {
      $head['title'] = 'Inventory Gudang | Form Update';
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('layout/head', $head);
      $this->load->view('admin/form_users/form_update', $data);
    }
  }


  ####################################
  // End Users
  ####################################



  ####################################
  // DATA BARANG MASUK
  ####################################

  public function form_barangmasuk()
  {
    $head['title'] = 'Inventory Gudang | Form Barang Masuk';
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/form_barangmasuk/form_insert', $data);
  }

  public function tabel_barangmasuk()
  {
    $data = array(
      'list_data' => $this->M_admin->select_desc('tb_barang_masuk') ,
      'avatar'    => $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'))
    );
    $head['title'] = 'Inventory Gudang | Table Barang Masuk';
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/tabel/tabel_barangmasuk', $data);
  }

  public function update_barang($id_transaksi)
  {
    $where = array('id_transaksi' => $id_transaksi);
    $data['data_barang_update'] = $this->M_admin->get_data('tb_barang_masuk', $where);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('admin/form_barangmasuk/form_update', $data);
  }

  public function delete_barang($id_transaksi)
  {
    $where = array('id_transaksi' => $id_transaksi);
    $this->M_admin->delete('tb_barang_masuk', $where);
    redirect(base_url('admin/tabel_barangmasuk'));
  }



  public function proses_databarang_masuk_insert()
  {
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

    if ($this->form_validation->run() == TRUE) {
      $id_transaksi = $this->input->post('id_transaksi', TRUE);
      $tanggal      = $this->input->post('tanggal', TRUE);
      $keterangan   = $this->input->post('keterangan', TRUE);
      $kode_barang  = $this->input->post('kode_barang', TRUE);
      $nama_barang  = $this->input->post('nama_barang', TRUE);
      $satuan       = $this->input->post('satuan', TRUE);
      $jumlah       = $this->input->post('jumlah', TRUE);

      //qrcode
      $qr = $this->load->library('ciqrcode'); //pemanggilan library QR CODE
      $config['cacheable']    = true; //boolean, the default is true
      $config['cachedir']     = './assets/qrcode'; //string, the default is application/cache/
      $config['errorlog']     = './assets/qrcode'; //string, the default is application/logs/
      $config['imagedir']     = './assets/qrcode/images/'; //direktori penyimpanan qr code
      $config['quality']      = true; //boolean, the default is true
      $config['size']         = '1024'; //interger, the default is 1024
      $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
      $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
      $this->ciqrcode->initialize($config);

      $image_name = $id_transaksi . '.png'; //buat name dari qr code sesuai dengan nim

      $params['data'] = $id_transaksi; //data yang akan di jadikan QR CODE
      $params['level'] = 'H'; //H=High
      $params['size'] = 10;
      $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
      $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
      //upload gambar
      $config =  array(
        'upload_path'     => "./assets/upload/gambar/",
        'allowed_types'   => "gif|jpg|png|jpeg",
        'encrypt_name'    => False, //
        'max_size'        => "60000",  // ukuran file gambar
        'max_height'      => "9680",
        'max_width'       => "9024"
      );
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('gambar')) {
        $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
        $data['list_satuan'] = $this->M_admin->select('tb_satuan');
        $this->session->set_flashdata('msg_gagal', $this->upload->display_errors());
        redirect(base_url('admin/form_barangmasuk'));
      } else {
        $upload_data = $this->upload->data();
        $nama_file = $upload_data['file_name'];
        $data = array(
          'id_transaksi' => $id_transaksi,
          'tanggal'      => $tanggal,
          'keterangan'   => $keterangan,
          'kode_barang'  => $kode_barang,
          'nama_barang'  => $nama_barang,
          'satuan'       => $satuan,
          'jumlah'       => $jumlah,
          'qr_code'      => $image_name,
          'gambar'       => $nama_file
        );
        $this->M_admin->insert('tb_barang_masuk', $data);
        $this->session->set_flashdata('msg_berhasil', 'Data Barang Berhasil Ditambahkan');
        redirect(base_url('admin/form_barangmasuk'));
      }
    }else{
      $head['title'] = 'Inventory Gudang | From Barang Masuk';
      $data['list_satuan'] = $this->M_admin->select('tb_satuan');
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('layout/head', $head);
    }
  }

  public function proses_databarang_masuk_update()
  {
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

    if ($this->form_validation->run() == TRUE) {
      $id_transaksi = $this->input->post('id_transaksi', TRUE);
      $tanggal      = $this->input->post('tanggal', TRUE);
      $lokasi       = $this->input->post('lokasi', TRUE);
      $kode_barang  = $this->input->post('kode_barang', TRUE);
      $nama_barang  = $this->input->post('nama_barang', TRUE);
      $satuan       = $this->input->post('satuan', TRUE);
      $jumlah       = $this->input->post('jumlah', TRUE);

      $where = array('id_transaksi' => $id_transaksi);
      $data = array(
        'id_transaksi' => $id_transaksi,
        'tanggal'      => $tanggal,
        'lokasi'       => $lokasi,
        'kode_barang'  => $kode_barang,
        'nama_barang'  => $nama_barang,
        'satuan'       => $satuan,
        'jumlah'       => $jumlah
      );
      $this->M_admin->update('tb_barang_masuk', $data, $where);
      $this->session->set_flashdata('msg_berhasil', 'Data Barang Berhasil Diupdate');
      redirect(base_url('admin/tabel_barangmasuk'));
    } else {
      $head['title'] = 'Inventory Gudang | Form Barang Masuk';
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);

      $this->load->view('layout/head', $head);
      $this->load->view('admin/form_barangmasuk/form_update', $data);
    }
  }
  ####################################
  // END DATA BARANG MASUK
  ####################################


  ####################################
  // SATUAN
  ####################################

  public function form_satuan()
  {
    $head['title'] = 'Inventory Gudang | Satuan Barang';
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/form_satuan/form_insert', $data);
  }

  public function tabel_satuan()
  {
    $head['title'] = 'Inventory Gudang | Tabel Satuan';
    $data['list_data'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/tabel/tabel_satuan', $data);
  }

  public function update_satuan()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_satuan' => $uri);
    $data['data_satuan'] = $this->M_admin->get_data('tb_satuan', $where);
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('admin/form_satuan/form_update', $data);
  }

  public function delete_satuan()
  {
    $uri = $this->uri->segment(3);
    $where = array('id_satuan' => $uri);
    $this->M_admin->delete('tb_satuan', $where);
    redirect(base_url('admin/tabel_satuan'));
  }

  public function proses_satuan_insert()
  {
    $this->form_validation->set_rules('kode_satuan', 'Kode Satuan', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'trim|required|max_length[100]');

    if ($this->form_validation->run() ==  TRUE) {
      $kode_satuan = $this->input->post('kode_satuan', TRUE);
      $nama_satuan = $this->input->post('nama_satuan', TRUE);

      $data = array(
        'kode_satuan' => $kode_satuan,
        'nama_satuan' => $nama_satuan
      );
      $this->M_admin->insert('tb_satuan', $data);

      $this->session->set_flashdata('msg_berhasil', 'Data satuan Berhasil Ditambahkan');
      redirect(base_url('admin/form_satuan'));
    } else {
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('admin/form_satuan/form_insert', $data);
    }
  }

  public function proses_satuan_update()
  {
    $head['title'] = 'Inventory Gudang | Form Satuan';
    $this->form_validation->set_rules('kode_satuan', 'Kode Satuan', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'trim|required|max_length[100]');

    if ($this->form_validation->run() ==  TRUE) {
      $id_satuan   = $this->input->post('id_satuan', TRUE);
      $kode_satuan = $this->input->post('kode_satuan', TRUE);
      $nama_satuan = $this->input->post('nama_satuan', TRUE);

      $where = array(
        'id_satuan' => $id_satuan
      );

      $data = array(
        'kode_satuan' => $kode_satuan,
        'nama_satuan' => $nama_satuan
      );
      $this->M_admin->update('tb_satuan', $data, $where);

      $this->session->set_flashdata('msg_berhasil', 'Data satuan Berhasil Di Update');
      redirect(base_url('admin/tabel_satuan'));
    } else {
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('layout/head', $head);
      $this->load->view('admin/form_satuan/form_update');
    }
  }

  ####################################
  // END SATUAN
  ####################################


  ####################################
  // DATA MASUK KE DATA KELUAR
  ####################################

  public function barang_keluar()
  {
    $uri = $this->uri->segment(3);
    $head['title'] = 'Inventory Gudang | Perpindahan Barang';
    $where = array('id_transaksi' => $uri);
    $data['list_data'] = $this->M_admin->get_data('tb_barang_masuk', $where);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/form_barangmasuk/scanner_barcode', $data);
  }

  public function proses_data_keluar()
  {
    $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'trim|required');
    $id_transaksi   = $this->input->post('id_transaksi', TRUE);
    if ($this->form_validation->run() === TRUE) {
      $tanggal_masuk  = $this->input->post('tanggal', TRUE);
      $tanggal_keluar = $this->input->post('tanggal_keluar', TRUE);
      $lokasi         = $this->input->post('lokasi', TRUE);
      $kode_barang    = $this->input->post('kode_barang', TRUE);
      $nama_barang    = $this->input->post('nama_barang', TRUE);
      $satuan         = $this->input->post('satuan', TRUE);
      $jumlah         = $this->input->post('jumlah', TRUE);
      $keterangan         = $this->input->post('keterangan', TRUE);
      $nm_penjab         = $this->input->post('nm_penjab', TRUE);
      $nohp_penjab         = $this->input->post('nohp_penjab', TRUE);

      $where = array('id_transaksi' => $id_transaksi);
      $data = array(
        'id_transaksi' => $id_transaksi,
        'tanggal_masuk' => $tanggal_masuk,
        'tanggal_keluar' => $tanggal_keluar,
        'lokasi' => $lokasi,
        'kode_barang' => $kode_barang,
        'nama_barang' => $nama_barang,
        'satuan' => $satuan,
        'jumlah' => $jumlah,
        'keterangan' => $keterangan,
        'nm_penjab' => $nm_penjab,
        'nohp_penjab' => $nohp_penjab
      );
      $this->M_admin->mengurangi('tb_barang_masuk', $id_transaksi,$jumlah);
      $this->M_admin->insert('tb_barang_keluar', $data);
      $this->session->set_flashdata('msg_berhasil_keluar', 'Data Berhasil Keluar');
      redirect(base_url('admin/tabel_barangmasuk'));
    } else {
      $head['title'] = 'Inventory Gudang | Perpindahan Barang';
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('layout/head', $head);
      $this->load->view('admin/form_barangmasuk/scanner_barcode/' . $id_transaksi);
    }
  }
  ####################################
  // END DATA MASUK KE DATA KELUAR
  ####################################


  ####################################
  // DATA BARANG KELUAR
  ####################################

  public function tabel_barangkeluar()
  {
    $head['title'] = 'Inventory Gudang | Barang Keluar';
    // $data['list_data'] = $this->M_admin->select('tb_barang_keluar');
    $data['list_data'] = $this->M_admin->select_desc('tb_barang_keluar');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);

    $this->load->view('admin/tabel/tabel_barangkeluar', $data);
  }

  public function scan_barang_kembali()
  {
    $uri = $this->uri->segment(3);
    $head['title'] = 'Inventory Gudang | Barang Kembali';
    $where = array('id_transaksi' => $uri);
    $data['list_data'] = $this->M_admin->get_data('tb_barang_keluar', $where);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/scanner/scan_barang_keluar', $data);
  }


  public function edit_list_barang()
  {
    $id = $this->uri->segment(3);
    $head['title'] = 'Inventory Gudang | Form Barang Kembali';
    $where = array('id' => $id);
    $data['list_data'] = $this->M_admin->get_data('tb_barang_keluar', $where);
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/scanner/form_barang_kembali.php', $data);
  }
  public function scan_list_barang()
  {
    $uri = $this->uri->segment(3);
    $head['title'] = 'Inventory Gudang | List Barang by QR';
    $where = array(
      'status'       => '0',
      'id_transaksi' => $uri
    );
    $data['list_data'] = $this->M_admin->get_data('tb_barang_keluar', $where);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/scanner/list_barang', $data);
  } 

  public function submit_barang_kembali()
  {
    $id_transaksi    = $this->input->post('id_transaksi', TRUE);
    $jumlah          = $this->input->post('jumlah', TRUE);
    $status          = $this->input->post('status', TRUE);
    $where = array('id' => $this->input->post('id', TRUE));
  
    $data = $this->M_admin->get_data_row('tb_barang_keluar', $where);
    $insert = array(
      'id_transaksi'    => $data->id_transaksi,
      'tanggal_kembali' => date('Y-m-d'),
      'lokasi'          => $data->lokasi,
      'kode_barang'     => $data->kode_barang,
      'nama_barang'     => $data->nama_barang,
      'satuan'          => $data->satuan,
      'jumlah'          => $jumlah,
      'status'          => $status,
    );
    $update = array(
      'status' => $status
    );
    $this->M_admin->menambah('tb_barang_kembali', $id_transaksi, $jumlah);
    $this->M_admin->insert('tb_barang_kembali', $insert);
    $this->M_admin->update('tb_barang_keluar', $update ,$where);
    $this->session->set_flashdata('msg_berhasil_masuk', 'Barang Berhasil DiKembalikan');
    redirect(base_url('admin/tabel_barangkeluar'));
  }
  public function proses_data_kembali()
  {
    $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'trim|required');
    $id_transaksi    = $this->input->post('id_transaksi', TRUE);
    if ($this->form_validation->run() === TRUE) {
      $tanggal_kembali = $this->input->post('tanggal_kembali', TRUE);
      $lokasi          = $this->input->post('lokasi', TRUE);
      $kode_barang     = $this->input->post('kode_barang', TRUE);
      $nama_barang     = $this->input->post('nama_barang', TRUE);
      $satuan          = $this->input->post('satuan', TRUE);
      $jumlah          = $this->input->post('jumlah', TRUE);
      $status          = $this->input->post('status', TRUE);

      $where = array('id_transaksi' => $id_transaksi);
      $data  = array(
        'id_transaksi' => $id_transaksi,
        'tanggal_kembali' => $tanggal_kembali,
        'lokasi'  => $lokasi,
        'kode_barang' => $kode_barang,
        'nama_barang' => $nama_barang,
        'satuan'  => $satuan,
        'jumlah'  => $jumlah,
        'status'  => $status
      );
      $this->M_admin->menambah('tb_barang_kembali', $id_transaksi, $jumlah);
      $this->M_admin->insert('tb_barang_kembali', $data);
      $this->session->set_flashdata('msg_berhasil_masuk', 'Barang Berhasil DiKembalikan');
      redirect(base_url('admin/tabel_barangmasuk'));
    } else {
      $this->load->view('perpindahan_barang/form_update_kembali/' . $id_transaksi);
    }
  }


  ####################################
  // END DATA MASUK KE DATA KELUAR
  ####################################


  ####################################
  // DATA BARANG KELUAR
  ####################################


  public function tabel_barangkembali()
  {
    $head['title'] = 'Inventory Gudang | Barang Kembali';
    $data['list_data'] = $this->M_admin->select('tb_barang_kembali');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data ,TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);

    $this->load->view('admin/tabel/tabel_barangkembali', $data);
  }

  public function submit()
  {
    
  }
}
