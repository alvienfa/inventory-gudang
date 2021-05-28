<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
  }

  public function index()
  {
    if($this->session->userdata('status') == 'login' && $this->session->userdata('role') == 0)
    {
      // $this->load->view('user/templates/header.php');
      // $this->load->view('user/index');
      // $this->load->view('user/templates/footer.php');

      $cards['progress_barang'] = $this->M_user->progress_barang();
      $cards['last_data']       = $this->M_user->select_limit('tb_barang_kembali','tb_status', 10);
      $data = array(
        'title'             => 'Dashboard',
        'barang_keluar'     => $this->M_user->select('tb_barang_keluar'),
        'barang_masuk'      => $this->M_user->select('tb_barang_masuk'),
        'barang_kembali'    => $this->M_user->select('tb_barang_kembali'),
        'total' => array(
          'barang_masuk'    => $this->M_user->total_row('tb_barang_masuk'),
          'barang_keluar'   => $this->M_user->total_row('tb_barang_keluar'),
          'barang_kembali'  => $this->M_user->total_row('tb_barang_kembali'),
          'barang_jual'     => $this->M_user->total_row('tb_barang_jual') 
        ),
          
        'views' => array(
          'header' =>$this->header(),
          'card_satu'  => $this->load->view('user_stisla/cards/barang_kembali.php' ,$cards, TRUE),
          'card_dua' => $this->load->view('user_stisla/cards/progress_barang.php' ,$cards, TRUE)
        ),
        
      );
      $head['username'] = $this->session->userdata('email');
      $head['title'] = 'Dashboard | User';
      $this->load->view('template/head.php' , $head);
      $this->load->view('user_stisla/index' , $data);
      $this->load->view('template/footer.php', $data);
    }else {
      $this->load->view('login/login');
    }
  }

  public function token_generate()
  {
    return $tokens = md5(uniqid(rand(), true));
  }

  private function hash_password($password)
  {
    return password_hash($password,PASSWORD_DEFAULT);
  }

  public function setting()
  {
      $data['token_generate'] = $this->token_generate();
      $this->session->set_userdata($data);

      $this->load->view('user/templates/header.php');
      $this->load->view('user/setting',$data);
      $this->load->view('user/templates/footer.php');
  }

  public function proses_new_password()
  {
    $this->form_validation->set_rules('new_password','New Password','required');
    $this->form_validation->set_rules('confirm_new_password','Confirm New Password','required|matches[new_password]');

    if($this->form_validation->run() == TRUE)
    {
      if($this->session->userdata('token_generate') === $this->input->post('token'))
      {
        $username = $this->input->post('username');
        $new_password = $this->input->post('new_password');

        $data = array(
            'password' => $this->hash_password($new_password)
        );

        $where = array(
            'id' =>$this->session->userdata('id')
        );

        $this->M_user->update_password('user',$where,$data);

        $this->session->set_flashdata('msg_berhasil','Password Telah Diganti');
        redirect(base_url('user/setting'));
      }
    }else {
      $this->load->view('user/setting');
    }
  }

  public function signout()
  {
      session_destroy();
      redirect(base_url());
  }
  
  public function tabel_barang_masuk()
  {
    $cards['progress_barang'] = $this->M_user->progress_barang();
    $cards['list_data']       = $this->M_user->barang_masuk('tb_barang_masuk','tb_gudang');
    $data = array(
      'title' => 'Tabel Barang Masuk',
      'barang_masuk'      => $this->M_user->select('tb_barang_masuk'),
      'views' => array(
        'header' => $this->header(),
        'card_satu'  => $this->load->view('user_stisla/tabel/barang_masuk.php' ,$cards, TRUE),
      ),
    );

    $head['username'] = $this->session->userdata('email');
    $head['title'] = 'Barang Masuk | User';
    $this->load->view('template/head.php' , $head);
    $this->load->view('user_stisla/index' , $data);
    $this->load->view('template/footer.php', $data);
  }

  public function tabel_barang_keluar()
  {
    $cards['list_data'] = $this->M_user->barang_keluar('tb_barang_keluar','map_lokasi', 'tb_status');
    $data = array(
      'title' => 'Tabel Barang Keluar',
      // 'barang_keluar'     => $this->M_user->select('tb_barang_keluar'),
      'views' => array(
        'header' => $this->header(),
        'card_satu'  => $this->load->view('user_stisla/tabel/barang_keluar.php' ,$cards, TRUE),
      ),
    );

    $head['title'] = 'Barang Keluar | User';
    $head['username'] = $this->session->userdata('email');
    $this->load->view('template/head.php' , $head);
    $this->load->view('user_stisla/index' , $data);
    $this->load->view('template/footer.php', $data);
  }

  public function tabel_barang_kembali()
  {
    $cards['list_data'] = $this->M_user->barang_kembali('tb_barang_kembali');
    $data = array(
      'title' => 'Tabel Barang Kembali',
      'barang_kembali'    => $this->M_user->select('tb_barang_kembali'),
      'views' => array(
        'header' => $this->header(),
        'card_satu'  => $this->load->view('user_stisla/tabel/barang_kembali.php' ,$cards, TRUE),
      ),
    );

    $head['title'] = 'Barang Kembali | User';
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
        'barang_kembali'  => $this->M_user->total_row('tb_barang_kembali'),
        'barang_jual'     => $this->M_user->total_row('tb_barang_jual') 
      )      
    );
    return $this->load->view('template/header',$data, TRUE);
  } 

}

?>
