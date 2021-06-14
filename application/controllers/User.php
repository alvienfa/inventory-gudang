<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
    $this->load->model('M_barang');


    if ($this->session->userdata('status') == 'login') {
      $role = intval($this->session->userdata('role'));
      if ($role == 1 || $role == 2 || $role == 3 || $role == 4) {
        redirect('admin');
      } elseif ($role == 6 || $role == 5) {
        $this->role = $role;
        $this->nama_user = $this->session->userdata('nama_user');
      } else {
        redirect('login');
      }
    }else{
      redirect('login');
    }
  }

  public function index()
  {
    $head['sidebar_menu'] = $this->sidebar_menu();
    $head['username'] = $this->session->userdata('email');
    $head['title'] = 'Dashboard | User';
    $data['views']['header'] = $this->header();
    if ($this->role == 5) {
      $data['title'] = 'Atasan | Dashboard';
      $cards_satu['last_data']        = $this->M_user->select_limit('tb_barang_kembali', 'tb_status','tb_barang_masuk', 10);
      $cards_dua['progress_barang']  = $this->M_user->progress_barang();
      $data['views']['card_satu'] = $this->load->view('user_stisla/cards/barang_kembali.php', $cards_satu, TRUE);
      $data['views']['card_dua']  = $this->load->view('user_stisla/cards/progress_barang.php', $cards_dua, TRUE);
      $this->load->view('template/head.php', $head);
      $this->load->view('user_stisla/index', $data);
      $this->load->view('template/footer.php');
    } else {
      $data['title'] = 'Scan Barang';
      $cards_satu['type'] = 'masuk';
      $data['views']['card_satu'] = $this->load->view('user_stisla/cards/scan_barang.php', $cards_satu, TRUE);
      $data['views']['card_dua'] = NULL;  
      $this->load->view('template/head.php', $head);
      $this->load->view('user_stisla/index', $data);
      $this->load->view('template/footer.php');
    }
  }

  public function token_generate()
  {
    return $tokens = md5(uniqid(rand(), true));
  }

  private function hash_password($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public function setting()
  {
    $data['token_generate'] = $this->token_generate();
    $this->session->set_userdata($data);

    $this->load->view('user/templates/header.php');
    $this->load->view('user/setting', $data);
    $this->load->view('user/templates/footer.php');
  }

  public function setting_user()
  {
    $data['token_generate'] = $this->token_generate();
    $this->session->set_userdata($data);
    $head['sidebar_menu'] = $this->sidebar_menu();
    $head['title'] = 'Barang Keluar | User';
    $head['username'] = $this->session->userdata('email');
    $this->load->view('template/head.php', $head);
    $this->load->view('user_stisla/setting_user', $data);
    $this->load->view('template/footer.php', $data);
  }

  public function proses_new_password()
  {
    $this->form_validation->set_rules('new_password', 'New Password', 'required');
    $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');

    if ($this->form_validation->run() == TRUE) {
      if ($this->session->userdata('token_generate') === $this->input->post('token')) {
        $username = $this->input->post('username');
        $new_password = $this->input->post('new_password');

        $data = array(
          'password' => $this->hash_password($new_password)
        );

        $where = array(
          'id' => $this->session->userdata('id')
        );

        $this->M_user->update_password('user', $where, $data);

        $this->session->set_flashdata('msg_berhasil', 'Password Telah Diganti');
        redirect(base_url('user/setting_user'));
      }
    } else {
      $this->load->view('user/setting_user');
    }
  }

  public function signout()
  {
    session_destroy();
    redirect('login');
  }

  public function tabel_barang_masuk()
  {
    $this->load->library('pagination');
    $limit = $this->input->get('limit') ? intval($this->input->get('limit')) : 10;
    $config['base_url']             = base_url('user/tabel_barang_masuk?limit=' . $limit);
    $config['total_rows']           = $this->M_user->total_row_active('tb_barang_masuk');
    $config['per_page']             = $limit;
    $config['enable_query_strings'] = TRUE;
    $config['page_query_string']    = TRUE;
    $config['use_page_numbers']     = TRUE;
    $config['first_link']           = 'FIRST';
    $config['last_link']            = 'LAST';
    $config['num_links']            = 3;
    $config['query_string_segment'] = 'page';
    $config['full_tag_open']        = '<ul class="pagination">';
    $config['full_tag_close']       = '</ul>';
    $config['prev_link']            = '<i class="fas fa-chevron-left"></i>';
    $config['next_link']            = '<i class="fas fa-chevron-right"></i>';
    $config['cur_tag_open']         = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close']        = '</a></li>';
    $config['num_tag_open']         = '<li class="page-item">';
    $config['num_tag_close']        = '</li>';

    $start = $this->input->get('page') ? (intval($this->input->get('page')) - 1) * $limit : 0;

    $this->pagination->initialize($config);

    $search = array(
      'nama_barang'   => $this->input->get('nama_barang'),
      'id_gudang'     => $this->input->get('id_gudang'),
      'id_transaksi'  => $this->input->get('id_transaksi'),
      'id_kategori'   => $this->input->get('id_kategori')
    );


    $cards['total_barang_masuk'] = $this->M_user->total_row('tb_barang_masuk');
    $cards['page']               = $this->input->get('page');
    $cards['pagination']         = $this->pagination->create_links();
    $cards['list_data']          = $this->M_user->barang_masuk($limit, $start, $search);
    $print['list_gudang']        = $this->M_user->select('tb_gudang');
    $print['list_kategori']      = $this->M_user->select('tb_kategori');

    $data = array(
      'title' => 'Tabel Barang Masuk',
      'barang_masuk'  => $this->M_user->select('tb_barang_masuk'),
      'views'         => array(
        'card_satu'   => $this->load->view('user_stisla/tabel/barang_masuk', $cards, TRUE),
        'modal_print' => $this->load->view('user_stisla/modals/print', $print, TRUE)
      ),
      'list_gudang'   => $this->M_user->select('tb_gudang'),
      'list_kategori'   => $this->M_user->select('tb_kategori')
    );
    $head['sidebar_menu'] = $this->sidebar_menu();
    $head['username'] = $this->session->userdata('email');
    $head['title'] = 'Barang Masuk | User';
    $this->load->view('template/head.php', $head);
    $this->load->view('user_stisla/index', $data);
    $this->load->view('template/footer.php', $data);
  }

  public function tabel_barang_keluar()
  {
    $this->load->library('pagination');
    $limit = $this->input->get('limit') ? intval($this->input->get('limit')) : 10;
    $config['base_url']             = base_url('user/tabel_barang_keluar?limit=' . $limit);
    $config['total_rows']           = $this->M_user->total_row('tb_barang_keluar');
    $config['per_page']             = $limit;
    $config['enable_query_strings'] = TRUE;
    $config['page_query_string']    = TRUE;
    $config['use_page_numbers']     = TRUE;
    $config['first_link']           = 'FIRST';
    $config['last_link']            = 'LAST';
    $config['num_links']            = 2;
    $config['query_string_segment'] = 'page';
    $config['full_tag_open']        = '<ul class="pagination">';
    $config['full_tag_close']       = '</ul>';
    $config['prev_link']            = '<i class="fas fa-chevron-left"></i>';
    $config['next_link']            = '<i class="fas fa-chevron-right"></i>';
    $config['cur_tag_open']         = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close']        = '</a></li>';
    $config['num_tag_open']         = '<li class="page-item">';
    $config['num_tag_close']        = '</li>';

    $start = $this->input->get('page') ? (intval($this->input->get('page')) - 1) * $limit : 0;

    $this->pagination->initialize($config);

    $cards['pagination']         = $this->pagination->create_links();
    $cards['list_data']          = $this->M_user->barang_keluar($limit, $start, array());
    $print['list_gudang']        = $this->M_user->select('tb_gudang');
    $print['list_kategori']      = $this->M_user->select('tb_kategori');
    $print['list_status']        = $this->M_user->select('tb_status');
    $data = array(
      'title' => 'Tabel Barang Keluar',
      'views' => array(
        'header' => $this->header(),
        'card_satu'  => $this->load->view('user_stisla/tabel/barang_keluar.php', $cards, TRUE),
        'modal_print' => $this->load->view('user_stisla/modals/print', $print, TRUE)
      ),
      'list_gudang' => $this->M_user->select('tb_gudang')
    );
    $head['sidebar_menu'] = $this->sidebar_menu();
    $head['title'] = 'Barang Keluar | User';
    $head['username'] = $this->session->userdata('email');
    $this->load->view('template/head.php', $head);
    $this->load->view('user_stisla/index', $data);
    $this->load->view('template/footer.php', $data);
  }

  public function tabel_barang_kembali()
  {
    $this->load->library('pagination');
    $limit = $this->input->get('limit') ? intval($this->input->get('limit')) : 10;
    $config['base_url']             = base_url('user/tabel_barang_kembali?limit=' . $limit);
    $config['total_rows']           = $this->M_user->total_row('tb_barang_kembali');
    $config['per_page']             = $limit;
    $config['enable_query_strings'] = TRUE;
    $config['page_query_string']    = TRUE;
    $config['use_page_numbers']     = TRUE;
    $config['first_link']           = 'FIRST';
    $config['last_link']            = 'LAST';
    $config['num_links']            = 2;
    $config['query_string_segment'] = 'page';
    $config['full_tag_open']        = '<ul class="pagination">';
    $config['full_tag_close']       = '</ul>';
    $config['prev_link']            = '<i class="fas fa-chevron-left"></i>';
    $config['next_link']            = '<i class="fas fa-chevron-right"></i>';
    $config['cur_tag_open']         = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close']        = '</a></li>';
    $config['num_tag_open']         = '<li class="page-item">';
    $config['num_tag_close']        = '</li>';

    $start = $this->input->get('page') ? (intval($this->input->get('page')) - 1) * $limit : 0;

    $this->pagination->initialize($config);

    $cards['pagination'] = $this->pagination->create_links();

    $cards['list_data'] = $this->M_user->barang_kembali('tb_barang_kembali', 'tb_status', $limit, $start, 'tb_barang_masuk');
    $data = array(
      'title' => 'Tabel Barang Kembali',
      'views' => array(
        'header' => $this->header(),
        'card_satu'  => $this->load->view('user_stisla/tabel/barang_kembali.php', $cards, TRUE),
      ),
    );
    $head['sidebar_menu'] = $this->sidebar_menu();
    $head['title'] = 'Barang Kembali | User';
    $head['username'] = $this->session->userdata('email');
    $this->load->view('template/head.php', $head);
    $this->load->view('user_stisla/index', $data);
    $this->load->view('template/footer.php', $data);
  }

  public function list_barang_masuk()
  {
    $this->load->library('pagination');
    $limit = 24;
    $config['base_url']             = base_url('user/list_barang_masuk');
    $config['per_page']             = $limit;
    $config['enable_query_strings'] = TRUE;
    $config['page_query_string']    = TRUE;
    $config['use_page_numbers']     = TRUE;
    $config['first_link']           = 'FIRST';
    $config['last_link']            = 'LAST';
    $config['num_links']            = 10;
    $config['query_string_segment'] = 'page';
    $config['full_tag_open']        = '<ul class="pagination">';
    $config['full_tag_close']       = '</ul>';
    $config['prev_link']            = '<i class="fas fa-chevron-left"></i>';
    $config['next_link']            = '<i class="fas fa-chevron-right"></i>';
    $config['cur_tag_open']         = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close']        = '</a></li>';
    $config['num_tag_open']         = '<li class="page-item">';
    $config['num_tag_close']        = '</li>';
    $config['total_rows']           = $this->M_user->total_row_active('tb_barang_masuk');

    $start = $this->input->get('page') ? (intval($this->input->get('page')) - 1) * $limit : 0;

    if (!$this->input->get('search') == NULL) {
      $search = array(
        'id_transaksi'  => $this->input->get('search'),
        'nama_barang'   => $this->input->get('search'),
        'nama_gudang'   => $this->input->get('search'),
        'kode_barang'   => $this->input->get('search'),
      );
      $list_data = $this->M_user->barang_masuk('tb_barang_masuk', 'tb_gudang', 'tb_kategori' , $limit, $start, $search);
      $config['total_rows'] = count($list_data);
    } else {
      $search = array();
      $list_data = $this->M_user->barang_masuk('tb_barang_masuk', 'tb_gudang','tb_kategori', $limit, $start, $search);
    }

    $this->pagination->initialize($config);

    $cards['pagination']         = $this->pagination->create_links();
    $cards['total_barang_masuk'] = $config['total_rows'];
    $cards['page']               = $this->input->get('page');
    $cards['list_data']          = $list_data;
    $data = array(
      'title' => 'List Barang Masuk',
      'barang_masuk'      => $this->M_user->select('tb_barang_masuk'),
      'views' => array(
        'header' => $this->search(),
        'card_satu'  => $this->load->view('user_stisla/list/barang_masuk.php', $cards, TRUE),
      ),
      'list_gudang' => $this->M_user->select('tb_gudang')
    );
    $head['sidebar_menu'] = $this->sidebar_menu();
    $head['username'] = $this->session->userdata('email');
    $head['title'] = 'Barang Masuk | User';
    $this->load->view('template/head.php', $head);
    $this->load->view('user_stisla/index', $data);
    $this->load->view('template/footer.php', $data);
  }

  public function header()
  {
    if ($this->role == 5) {
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
    }else{
      return NULL;
    }
  }

  public function search()
  {
    return $this->load->view('user_stisla/list/search', '', TRUE);
  }
  public function sidebar_menu()
  {
    $data['role'] = $this->role;
    return $this->load->view('template/sidebar_menu', $data, TRUE);
  }
}
