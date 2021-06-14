<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Pdf');
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
        $this->role = $role;
        $this->gudang = $data->nama_gudang;
        $this->id_gudang = $data->id_gudang;
      } elseif ($role == 6 || $role == 5) {
        $this->role = $role;
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

  public function barangKeluarManual()
  {

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // document informasi
    $pdf->SetCreator('Web Aplikasi Gudang');
    $pdf->SetTitle('Laporan Data Barang Keluar');
    $pdf->SetSubject('Barang Keluar');

    //header Data
    $pdf->SetHeaderData('unsada.jpg',30,'Laporan Data','Barang Keluar',array(203, 58, 44),array(0, 0, 0));
    $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    //set margin
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    //FONT Subsetting
    $pdf->setFontSubsetting(true);

    $pdf->SetFont('helvetica','',14,'',true);

    $pdf->AddPage('L');

    $html=
      '<div>
        <h1 align="center">Surat Jalan Pengeluaran Barang</h1><br>

        <table border="0" width="100%">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<td style="width:180px">No. Transaksi</td>';
        $html .= '<td style="width:10px">:</td>';
        $html .= '<td colspan="6" style="width:340px"></td>';
        $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td style="width:180px">Ditunjukkan untuk</td>';
            $html .= '<td style="width:10px">:</td>';
            $html .= '<td style="width:150px"></td>';
            $html .= '<td style="width:100px"></td>';
            $html .= '<td style="width:150px"></td>';
            $html .= '<td style="width:180px">Penanggung Jawab</td>';
            $html .= '<td style="width:10px">:</td>';
            $html .= '<td style="width:180px"></td>';
            
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td>Hari / Tanggal</td>';
            $html .= '<td>:</td>';
            $html .= '<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td>No. Handphone</td>';
            $html .= '<td>:</td>';
            $html .= '<td><br><br></td>';
            $html .= '</tr>';
            
        $html .= '<tr>';
        $html .= '<td style="width:180px">Po. Customer  </td>';
        $html .= '<td>:<br></td>';
        $html .= '<td> </td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td><br></td>';
        $html .= '</tr>';
        $html .= '</thead>';

    $html .=
      '</table>
        
        <table border="1"  >
          <tr>
            <th style="width:40px" align="center">No</th>
            <th style="width:160px" align="center">ID Transaksi</th>
            <th style="width:140px" align="center">Kode Barang</th>
            <th style="width:140px" align="center">Nama Barang</th>
            <th style="width:110px" align="center">Barang</th>
            <th style="width:110px" align="center">Tanggal Keluar</th>
            <th style="width:130px" align="center">Tujuan</th>
            <th style="width:80px" align="center">Jumlah</th>
          </tr>';


          $no = 1;
            $html .= '<tr>';
            $html .= '<td align="center" height="50px"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"> </td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td align="center" colspan="7" height="40px"><b>Jumlah</b></td>';
            $html .= '<td align="center"></td>';
            $html .= '</tr>';
            $no++;

        $html .='
            </table><br><br>
            <table border="0" width="100%">';
        $html .= '<thead>';
            
        $html .= '<tr>';
        $html .= '<td style="width:180px">Mengetahui  </td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td colspan="1" style="width:180px">Penyedia</td>';
        $html .= '<td></td>';
        $html .= '<td style="width:180px">Penanggung Jawab</td>';
        $html .= '<td><br></td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td style="width:180px">  </td>';
        $html .= '<td></td>';
        $html .= '<td> </td>';
        $html .= '<td colspan="1"></td>';
        $html .= '<td></td>';
        $html .= '<td><br></td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td style="width:180px">  </td>';
        $html .= '<td></td>';
        $html .= '<td> </td>';
        $html .= '<td colspan="1"></td>';
        $html .= '<td></td>';
        $html .= '<td><br></td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td style="width:180px">  </td>';
        $html .= '<td></td>';
        $html .= '<td> </td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td></td>';
        $html .= '<td><br></td>';
        $html .= '</tr>';


        $html .= '<tr>';
        $html .= '<td style="width:180px"></td>';
        $html .= '<td></td>';
        $html .= '<td> </td>';
        $html .= '<td colspan="1" style="width:180px"></td>';
        $html .= '<td></td>';
        $html .= '<td style="width:180px"></td>';
        $html .= '<td><br></td>';
        $html .= '</tr>';

        $html .= '</thead>';

    $html .=
      '</table>
            <br>
            <br>
            
            <h6>Catatan :  </h6><br><br>
            
          </div>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

    $pdf->Output('contoh_report.pdf','I');
  }

  public function barangKeluar()
  {
    $id_barang = intval($this->uri->segment(3));
    
    $where   = array(
      'a.id' => $id_barang
      );
    $data['list_data'] = $this->M_admin->barang_by_id($id_barang);
    
    $limit = 1000;

    $start = $this->input->get('page') ? (intval($this->input->get('page')) - 1) * $limit : 0;

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // document informasi
    $pdf->SetCreator('Inventory Gudang');
    $pdf->SetTitle('Laporan Barang Keluar');
    $pdf->SetSubject('Barang Keluar');
    
    //header Data
    $pdf->SetHeaderData(FCPATH . '\assets\img\preview.jpg' ,0,'Barang','Barang Keluar',array(203, 58, 44),array(255, 255, 255));
    $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    //set margin
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 10,PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    // $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
    
    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    //FONT Subsetting
    $pdf->setFontSubsetting(true);
    
    $pdf->SetFont('helvetica','',14,'',true);
    
    $pdf->AddPage('L');
    $pdf->SetAutoPageBreak(TRUE, 10);
    
    $html = $this->load->view('report/pdf_barangKeluar',$data,TRUE);
    // var_dump($html);
    // die();
    
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);    
    $pdf->Output('surat_barang_keluar.pdf','I');

  }

  public function barangMasuk($id_gudang=false)
  {
    $limit = 100;

    $start = $this->input->get('page') ? (intval($this->input->get('page')) - 1) * $limit : 0;

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // document informasi
    $pdf->SetCreator('Inventory Gudang');
    $pdf->SetTitle('Laporan Stok Barang');
    $pdf->SetSubject('Stok Barang');
    
    //header Data
    $pdf->SetHeaderData(FCPATH . 'assets\img\preview.jpg' ,0,'Barang','Stok Barang',array(203, 58, 44),array(255, 255, 255));
    $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
    
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    //set margin
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    // $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
    
    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    //FONT Subsetting
    $pdf->setFontSubsetting(true);
    
    $pdf->SetFont('helvetica','',8,'',true);
    
    $pdf->AddPage('A4');
    $pdf->SetAutoPageBreak(TRUE, 10);
    
    $search = array(
      'nama_barang'   => $this->input->get('nama_barang'),
      'id_gudang'     => $this->input->get('id_gudang'),
      'id_transaksi'  => $this->input->get('id_transaksi'),
      'id_kategori'   => $this->input->get('id_kategori')
    );
  
    $data = array(
      'list_data' => $this->M_user->barang_masuk('tb_barang_masuk', 'tb_gudang' ,'tb_kategori', $limit, $start, $search)
    );

    $html = $this->load->view('report/pdf_stok_barang', $data, TRUE);
    
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);    
    $pdf->Output('stock_barang.pdf','I');
  }
  
  public function barangKembali()
  {
    $id_barang = intval($this->uri->segment(3));
    
    $where   = array(
      'a.id' => $id_barang
      );
    $data['list_data'] = $this->M_admin->kembali_by_id($id_barang);
    
    $limit = 1000;

    $start = $this->input->get('page') ? (intval($this->input->get('page')) - 1) * $limit : 0;

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // document informasi
    $pdf->SetCreator('Inventory Gudang');
    $pdf->SetTitle('Laporan Barang Kembali');
    $pdf->SetSubject('Barang Kembali');
    
    //header Data
    $pdf->SetHeaderData(FCPATH . '\assets\img\preview.jpg' ,0,'Barang','Barang Keluar',array(203, 58, 44),array(255, 255, 255));
    $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    //set margin
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 10,PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    // $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
    
    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    //FONT Subsetting
    $pdf->setFontSubsetting(true);
    
    $pdf->SetFont('helvetica','',14,'',true);
    
    $pdf->AddPage('L');
    $pdf->SetAutoPageBreak(TRUE, 10);
    
    $html = $this->load->view('report/pdf_barangKembali',$data,TRUE);
    // var_dump($html);
    // die();
    
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);    
    $pdf->Output('surat_barang_kembali.pdf','I');

  }

  public function laporan_barang()
  {
    $limit = 1000;

    $start = $this->input->get('page') ? (intval($this->input->get('page')) - 1) * $limit : 0;

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // document informasi
    $pdf->SetCreator('Inventory Gudang');
    $pdf->SetTitle('Laporan Barang Keluar');
    $pdf->SetSubject('Barang Keluar');
    
    //header Data
    $pdf->SetHeaderData(FCPATH . '\assets\img\preview.jpg' ,0,'Barang','Barang Keluar',array(203, 58, 44),array(255, 255, 255));
    $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    //set margin
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    // $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
    
    //SET Scaling ImagickPixel
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    //FONT Subsetting
    $pdf->setFontSubsetting(true);
    
    $pdf->SetFont('helvetica','',8,'',true);
    
    $pdf->AddPage('A4');
    $pdf->SetAutoPageBreak(TRUE, 10);
    
    $search = array(
      'barang.nama_barang'   => $this->input->get('nama_barang'),
      'barang.id_gudang'     => $this->input->get('id_gudang'),
      'barang.id_transaksi'  => $this->input->get('id_transaksi'),
      'barang.id_kategori'   => $this->input->get('id_kategori')
    );
  
    $data = array(
      'list_data' => $this->M_user->barang_keluar($limit, $start, $search)
    );
    $html = $this->load->view('report/pdf_barang_keluar', $data, TRUE);
    
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);    
    $pdf->Output('stock_barang.pdf','I');
  }
}
