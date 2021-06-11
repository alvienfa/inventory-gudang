<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->library('upload');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
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
      } elseif ($role == 6 || $role == 5) {
        redirect('user');
      } elseif ($role == 1) {
        $this->role = $role; //superadmin
        $this->gudang = 'superadmin';
        $this->id_gudang = 'superadmin';
      } else {
        redirect('login');
      }
    }else{
      redirect('login');
    }
  }

  public function index()
  {
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = $this->gudang . ' | Dashboard';
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
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
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
    $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
    $this->form_validation->set_rules('new_password', 'New Password', 'required');
    $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $nama_user = $this->input->post('nama_user');
        $new_password = $this->input->post('new_password');

        $data = array(
          'email'    => $email,
          'nama_user' => $nama_user,
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
        $data['role'] = $this->role;
        $data['sidebar']['nama_gudang'] = $this->gudang;
        $data['pesan_error'] = $this->image_lib->display_errors();
        $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
        $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
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
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
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
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = 'Inventory Gudang | Form Barang Masuk';
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['list_role'] = $this->M_admin->select('tb_role');
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
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = 'Inventory Gudang | User';
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['token_generate'] = $this->token_generate();
    $data['list_data'] = $this->M_admin->get_data('user', $where);
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
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
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('nama_user', 'nama_user', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|matches[password]');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $username     = $this->input->post('username', TRUE);
        $nama_user    = $this->input->post('nama_user', TRUE);
        $email        = $this->input->post('email', TRUE);
        $password     = $this->input->post('password', TRUE);
        $role         = $this->input->post('role', TRUE);
        $data = array(
          'username'     => $username,
          'nama_user'    => $nama_user,
          'email'        => $email,
          'password'     => $this->hash_password($password),
          'role'         => $role,
        );

        $profile = array(
          'username_user'    => $username,
          'nama_file'   => 'nopic.png'
        ); 
        $this->M_admin->insert('user', $data);
        $this->M_admin->insert('tb_upload_gambar_user', $profile);
        $this->session->set_flashdata('msg_berhasil', 'User Berhasil Ditambahkan');
        redirect(base_url('admin/form_user'));
      }
    } else {
      $data['role'] = $this->role;
      $data['sidebar']['nama_gudang'] = $this->gudang;
      $head['title'] = 'Inventory Gudang | Form Insert';
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->session->set_flashdata('msg_gagal', 'Tambah User Gagal');
      redirect(base_url('admin/form_user'));
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
        $nama_user    = $this->input->post('nama_user', TRUE);
        $email        = $this->input->post('email', TRUE);
        $role         = $this->input->post('role', TRUE);

        $where = array('id' => $id);
        $data = array(
          'username'     => $username,
          'nama_user'    => $nama_user,
          'email'        => $email,
          'role'         => $role,
        );
        $this->M_admin->update('user', $data, $where);
        $this->session->set_flashdata('msg_berhasil', 'Data User Berhasil Diupdate');
        redirect(base_url('admin/users'));
      }
    } else {
      $data['role'] = $this->role;
      $data['sidebar']['nama_gudang'] = $this->gudang;
      $head['title'] = 'Inventory Gudang | Form Update';
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
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
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
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
    $id_kategori = $this->input->get('id_kategori');
    $where = array(
      'id_gudang'   => $this->id_gudang,
      'id_kategori' => $id_kategori
    );

    $data = array(
      'role'      => $this->role,
      'list_data' => $this->M_admin->join_tabel_desc($where),
      'avatar'    => $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name')),
      'sidebar'   => array(
        'nama_gudang' => $this->gudang
      ),
    );
    $head['title'] = $this->gudang . ' | Barang Keluar';
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/tabel/tabel_barangmasuk', $data);
  }

  public function update_barang($id)
  {
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = 'Inventory Gudang | Form Update Barang Masuk';
    $where = array('id' => $id);
    $data['list_gudang'] = $this->M_admin->select('tb_gudang');
    $data['list_data'] = $this->M_admin->get_data_row('tb_barang_masuk', $where);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/form_barangmasuk/form_update', $data);
  }

  public function delete_barang()
  {
    $id = $this->input->post('id', TRUE);
    $where = array('id' => $id);
    $this->M_admin->delete('tb_barang_masuk', $where);
    redirect('admin/tabel_barangmasuk');
  }



  public function proses_databarang_masuk_insert()
  {
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
      $id_kategori  = $this->input->post('id_kategori', TRUE);
      $id_gudang    = $this->id_gudang;
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

      $image_name = $nama_barang . "-" . $id_transaksi . '.png'; //buat name dari qr code sesuai dengan nim

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
        $data = array(
          'id_transaksi' => $id_transaksi,
          'tanggal'      => $tanggal,
          'keterangan'   => $keterangan,
          'kode_barang'  => $kode_barang,
          'nama_barang'  => $nama_barang,
          'satuan'       => $satuan,
          'jumlah'       => $jumlah,
          'qr_code'      => $image_name,
          'gambar'       => 'preview.jpg',
          'id_kategori'  => $id_kategori,
          'id_gudang'    => $id_gudang,
          'created_at'   => date("Y-m-d H:i:s") 
        );
        $this->M_admin->insert('tb_barang_masuk', $data);
        $this->session->set_flashdata('msg_berhasil', 'Data Barang Berhasil Ditambahkan');
        redirect(base_url('admin/tabel_barangmasuk') . '?id_kategori='. $id_kategori);
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
          'gambar'       => $nama_file,
          'id_kategori'   => $id_kategori,
          'id_gudang'    => $id_gudang,
          'created_at'   => date("Y-m-d H:i:s") 
        );
        $this->M_admin->insert('tb_barang_masuk', $data);
        $this->session->set_flashdata('msg_berhasil', 'Data Barang Berhasil Ditambahkan');
        redirect(base_url('admin/tabel_barangmasuk') . '?id_kategori='. $id_kategori);
      }
    } else {
      $head['title'] = 'Inventory Gudang | From Barang Masuk';
      $data['list_satuan'] = $this->M_admin->select('tb_satuan');
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['role'] = $this->role;
      $data['sidebar']['nama_gudang'] = $this->gudang;
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('layout/head', $head);
    }
  }

  public function proses_databarang_masuk_update($id)
  {
    $nama_barang  = $this->input->post('nama_barang', TRUE);
    $keterangan   = $this->input->post('keterangan', TRUE);
    $jumlah       = $this->input->post('jumlah', TRUE);
    $id_kategori  = $this->input->post('id_kategori', TRUE);
    $where = array('id' => $id);
    //update gambar
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
      $gambar       = $this->input->post('old_gambar', TRUE);
      $data = array(
        'nama_barang'  => $nama_barang,
        'gambar'       => $gambar,
        'jumlah'       => $jumlah,
        'id_kategori'  => $id_kategori,
        'keterangan'   => $keterangan,
        'updated_at'   => date("Y-m-d H:i:s")
      );
      $this->M_admin->update('tb_barang_masuk', $data, $where);
      $this->session->set_flashdata('msg_berhasil', 'Data Barang Berhasil Diupdate');
      redirect(base_url('admin/tabel_barangmasuk') . '?id_kategori='. $id_kategori);
    } else {
      $upload_data = $this->upload->data();
      $nama_file = $upload_data['file_name'];
      $data = array(
        'nama_barang'  => $nama_barang,
        'gambar'       => $nama_file,
        'jumlah'       => $jumlah,
        'id_kategori'  => $id_kategori,
        'keterangan'   => $keterangan,
        'updated_at'   => date("Y-m-d H:i:s")
      );
      //
      $this->M_admin->update('tb_barang_masuk', $data, $where);
      $this->session->set_flashdata('msg_berhasil', 'Data Barang Berhasil Diupdate');
      redirect(base_url('admin/tabel_barangmasuk') . '?id_kategori='. $id_kategori);
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
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = 'Inventory Gudang | Satuan Barang';
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/form_satuan/form_insert', $data);
  }

  public function tabel_satuan()
  {
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = 'Inventory Gudang | Tabel Satuan';
    $data['list_data'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/tabel/tabel_satuan', $data);
  }

  public function update_satuan()
  {
    $id = $this->uri->segment(3);
    $head['title'] = 'Inventory Gudang | Update Data Satuan';
    $data['token_generate'] = $this->token_generate();
    $data['data_satuan'] = $this->M_admin->get_data_row('tb_satuan', array('id_satuan' => $id));
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->session->set_userdata($data);
    $this->load->view('layout/head', $head);
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
      $data['role'] = $this->role;
      $data['sidebar']['nama_gudang'] = $this->gudang;
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
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
      $data['role'] = $this->role;
      $data['sidebar']['nama_gudang'] = $this->gudang;
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
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

  public function scan_barang_keluar()
  {
    $uri = $this->uri->segment(3);
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = 'Inventory Gudang | Perpindahan Barang';
    $where = array('id_transaksi' => $uri);
    $data['list_data'] = $this->M_admin->get_data_row('tb_barang_masuk', $where);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/scanner/scan_barang_keluar', $data);
  }

  public function proses_data_keluar()
  {
    $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'trim|required');
    $id_transaksi   = $this->input->post('id_transaksi', TRUE);
    if ($this->form_validation->run() === TRUE) {
      $tanggal_masuk  = $this->input->post('tanggal', TRUE);
      $tanggal_keluar = $this->input->post('tanggal_keluar', TRUE);
      $lokasi         = $this->input->post('lokasi', TRUE);
      $jumlah         = $this->input->post('jumlah', TRUE);
      $keterangan     = $this->input->post('keterangan', TRUE);
      $alamat = array(
        'alamat' => $this->input->post('alamat', TRUE),
        'kecamatan' => $this->input->post('kecamatan', TRUE),
        'kota' => $this->input->post('kota', TRUE),
        'provinsi' => $this->input->post('provinsi', TRUE),
        'kode_pos' => $this->input->post('kode_pos', TRUE),
      );
      $nm_penjab         = $this->input->post('nm_penjab', TRUE);
      $nohp_penjab         = $this->input->post('nohp_penjab', TRUE);

      $id_lokasi = $this->M_admin->insert_lokasi('map_lokasi', $alamat);

      $where = array('id_transaksi' => $id_transaksi);
      $insert = array(
        'id_transaksi' => $id_transaksi,
        'tanggal_masuk' => $tanggal_masuk,
        'tanggal_keluar' => $tanggal_keluar,
        'id_lokasi' => $id_lokasi,
        'jumlah' => $jumlah,
        'keterangan' => $keterangan,
        'nm_penjab' => $nm_penjab,
        'nohp_penjab' => $nohp_penjab,
        'created_at'  => date("Y-m-d H:i:s")
      );

      $this->M_admin->mengurangi('tb_barang_masuk', $id_transaksi, $jumlah);
      $this->M_admin->insert('tb_barang_keluar', $insert);
      $this->session->set_flashdata('msg_berhasil_keluar', 'Data Berhasil Keluar');
      redirect(base_url('admin/tabel_barangkeluar'));
    } else {
      $head['title'] = 'Inventory Gudang | Perpindahan Barang';
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['role'] = $this->role;
      $data['sidebar']['nama_gudang'] = $this->gudang;
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
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
    $head['title'] = $this->gudang . ' | Barang Keluar';
    $data['role'] = $this->role;
    $id_kategori = $this->input->get('id_kategori');
    $id_gudang = $this->id_gudang;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $data['list_data'] = $this->M_admin->stok_barang_keluar($id_gudang, $id_kategori);
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
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
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/scanner/scan_barang_kembali', $data);
  }


  public function edit_list_barang()
  {
    $id = $this->uri->segment(3);
    $data['role']                   = $this->role;
    $head['title']                  = 'Inventory Gudang | Form Barang Kembali';
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $row_data                       = $this->M_admin->get_data_row('tb_barang_keluar',array('id' => $id));
    $data['gambar_barang']          = $this->M_admin->get_gambar($row_data->id_transaksi);
    $data['alamat']                 = $this->M_admin->get_data_row('map_lokasi', array('id' => $row_data->id_lokasi));
    $data['list_data']              = $row_data;
    $data['avatar']                 = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu']  = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header']        = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/scanner/form_barang_kembali.php', $data);
  }

  public function scan_list_barang()
  {
    $id_transaksi = $this->uri->segment(3);
    $head['title'] = 'Inventory Gudang | List Barang by QR';
    // $where = array(
    //   'status'       => 0,
    //   'id_transaksi' => $id_transaksi
    // );
    $data['list_data'] = $this->M_admin->stok_barang_keluar($this->id_gudang);
    $data['list_satuan'] = $this->M_admin->select('tb_satuan');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
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
      'id_lokasi'       => $data->id_lokasi,
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
      $keterangan      = $this->input->post('keterangan', TRUE);

      $where = array('id_transaksi' => $id_transaksi);
      $data  = array(
        'id_transaksi' => $id_transaksi,
        'tanggal_kembali' => $tanggal_kembali,
        'lokasi'  => $lokasi,
        'kode_barang' => $kode_barang,
        'nama_barang' => $nama_barang,
        'satuan'  => $satuan,
        'jumlah'  => $jumlah,
        'status'  => $status,
        'keterangan' => $keterangan
      );

      $this->M_admin->menambah('tb_barang_masuk', $id_transaksi, $jumlah);
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
    $data['role'] = $this->role;
    $id_gudang = $this->id_gudang;
    $id_kategori = $this->input->get('id_kategori');
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = $this->gudang . ' | Barang Keluar';
    $data['list_data'] = $this->M_admin->stok_barang_kembali($id_gudang, $id_kategori);
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);

    $this->load->view('admin/tabel/tabel_barangkembali', $data);
  }

  

  public function gudang($id_gudang = false)
  {
    $total_gudang = $this->M_admin->numrows('tb_gudang');
    if ($id_gudang <= $total_gudang) {
      $head['title'] = 'Inventory Gudang | Data Gudang';
      $data['list_data'] = $this->M_admin->barang_by_gudang($id_gudang);
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['role'] = $this->role;
      $data['sidebar']['nama_gudang'] = $this->gudang;
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('layout/head', $head);
      $this->load->view('admin/tabel/tabel_barangmasuk', $data);
    } else {
      redirect(base_url('admin/gudang/1'));;
    }
  }

  public function form_gudang()
  {
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = 'Inventory Gudang | Tambah Data Gudang';
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/form_gudang/form_insert', $data);
  }

  public function tabel_gudang()
  {
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $head['title'] = 'Inventory Gudang | Data Gudang';
    $data['list_data'] = $this->M_admin->select('tb_gudang');
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->load->view('layout/head', $head);

    $this->load->view('admin/tabel/tabel_gudang', $data);
  }

  public function update_gudang()
  {
    $id = $this->uri->segment(3);
    $head['title'] = 'Inventory Gudang | Update Data Gudang';
    $data['token_generate'] = $this->token_generate();
    $data['data_gudang'] = $this->M_admin->get_data_row('tb_gudang', array('id' => $id));
    $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
    $data['role'] = $this->role;
    $data['sidebar']['nama_gudang'] = $this->gudang;
    $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
    $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
    $this->session->set_userdata($data);
    $this->load->view('layout/head', $head);
    $this->load->view('admin/form_gudang/form_update', $data);
  }

  public function delete_gudang()
  {
    $uri = $this->uri->segment(3);
    $where = array('id' => $uri);
    $this->M_admin->delete('tb_gudang', $where);
    redirect(base_url('admin/tabel_gudang'));
  }

  public function proses_gudang_insert()
  {
    $this->form_validation->set_rules('nama_gudang', 'Nama Gudang', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('detail_gudang', 'Detail Gudang', 'trim|required|max_length[100]');

    if ($this->form_validation->run() ==  TRUE) {
      $nama_gudang = $this->input->post('nama_gudang', TRUE);
      $detail_gudang = $this->input->post('detail_gudang', TRUE);

      $data = array(
        'nama_gudang' => $nama_gudang,
        'detail_gudang' => $detail_gudang
      );
      $this->M_admin->insert('tb_gudang', $data);

      $this->session->set_flashdata('msg_berhasil', 'Data Gudang Berhasil Ditambahkan');
      redirect(base_url('admin/form_gudang'));
    } else {
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['role'] = $this->role;
      $data['sidebar']['nama_gudang'] = $this->gudang;
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('admin/form_gudang/form_insert', $data);
    }
  }

  public function proses_gudang_update()
  {
    $head['title'] = 'Inventory Gudang | Form Gudang';
    $this->form_validation->set_rules('nama_gudang', 'Nama Gudang', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('detail_gudang', 'Detail Gudang', 'trim|required|max_length[100]');

    if ($this->form_validation->run() ==  TRUE) {
      $id_gudang   = $this->input->post('id', TRUE);
      $nama_gudang = $this->input->post('nama_gudang', TRUE);
      $detail_gudang = $this->input->post('detail_gudang', TRUE);

      $where = array(
        'id' => $id_gudang
      );

      $data = array(
        'nama_gudang' => $nama_gudang,
        'detail_gudang' => $detail_gudang
      );
      $this->M_admin->update('tb_gudang', $data, $where);

      $this->session->set_flashdata('msg_berhasil', 'Data Gudang Berhasil Di Update');
      redirect(base_url('admin/tabel_gudang'));
    } else {
      $data['avatar'] = $this->M_admin->get_data_gambar('tb_upload_gambar_user', $this->session->userdata('name'));
      $data['role'] = $this->role;
      $data['sidebar']['nama_gudang'] = $this->gudang;
      $data['views']['sidebar_menu'] = $this->load->view('layout/sidebar_menu', $data, TRUE);
      $data['views']['header'] = $this->load->view('layout/header', $data, TRUE);
      $this->load->view('layout/head', $head);
      $this->load->view('admin/form_gudang/form_update');
    }
  }  
  
  public function tabel_delete_barang()
  {
  }

  public function soft_delete_barang($id = false)
  {
    $update = array(
      'deleted_at'  => date("Y-m-d H:i:s"),
      'is_deleted' => 1
    );
    $where = array('id' => $id);
    if ($this->M_admin->update('tb_barang_masuk', $update, $where)) {
      redirect("admin/tabel_barangmasuk");
    } else {
      $error = array('error' => 'gagal delete barang');
      echo json_encode($error);
    }
  }
}
