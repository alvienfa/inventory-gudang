<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
    $this->load->library('upload');
  }

  public function index($id = false)
  {
    var_dump($id);die();
  }

  function get_by_id($id=FALSE)
  {
    $barang_masuk = $this->M_admin->get_data_row('tb_barang_masuk', array('id' => $id));
    echo json_encode($barang_masuk);
  }
  
}