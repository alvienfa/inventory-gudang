<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Pdf');
    $this->load->model('M_admin');
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
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 10,PDF_MARGIN_RIGHT);
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
        <h1 align="center">Invoice Bukti Pengeluaran Barang</h1>
        <table border="0" width="100%">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<td style="width:110px"> No. Transaksi</td>';
        $html .= '<td>:</td>';
        $html .= '<td colspan="8" style="width:140px"></td>';
        $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td style="width:510px">Ditunjukkan untuk</td>';
            $html .= '<td>:</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td>Penanggung Jawab</td>';
            $html .= '<td>:</td>';
            $html .= '<td></td>';
            
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td>Tanggal</td>';
            $html .= '<td>:</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td>No. Handphone</td>';
            $html .= '<td>:</td>';
            $html .= '<td></td>';
            
            $html .= '</tr>';
            
        $html .= '<tr>';
        $html .= '<td colspan="8" style="width:140px">Po. Customer  :</td>';
        $html .= '</tr>';
        $html .= '</thead>';

    $html .=
      '</table>
        
        <table border="1" >
          <tr>
            <th style="width:40px" align="center">No</th>
            <th style="width:110px" align="center">ID Transaksi</th>
            <th style="width:110px" align="center">Tanggal Masuk</th>
            <th style="width:110px" align="center">Tanggal Keluar</th>
            <th style="width:130px" align="center">Lokasi</th>
            <th style="width:140px" align="center">Kode Barang</th>
            <th style="width:140px" align="center">Nama Barang</th>
            <th style="width:80px" align="center">Satuan</th>
            <th style="width:80px" align="center">Jumlah</th>
          </tr>';


          $no = 1;
            $html .= '<tr>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '<td align="center"></td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td align="center" colspan="8"><b>Jumlah</b></td>';
            $html .= '<td align="center"></td>';
            $html .= '</tr>';
            $no++;

        $html .='
            </table><br>
            <h6>Mengetahui</h6><br><br><br><br>
            <h6>Admin</h6>
          </div>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

    $pdf->Output('contoh_report.pdf','I');
  }

  public function barangKeluar()
  {
    $id = $this->uri->segment(3);
    
    $ls   = array(
      'id' => $id
      );
    $data = $this->M_admin->get_data_row('tb_barang_keluar',$ls);
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
    $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 10,PDF_MARGIN_RIGHT);
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
        <h1 align="center">Invoice Bukti Pengeluaran Barang</h1><br>

        <table border="0" width="100%">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<td style="width:180px">No. Transaksi</td>';
        $html .= '<td style="width:10px">:</td>';
        $html .= '<td colspan="6" style="width:340px">'.$data->id_transaksi.'</td>';
        $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td style="width:180px">Ditunjukkan untuk</td>';
            $html .= '<td style="width:10px">:</td>';
            $html .= '<td style="width:110px">'.$data->lokasi.'</td>';
            $html .= '<td style="width:100px"></td>';
            $html .= '<td style="width:150px"></td>';
            $html .= '<td style="width:180px">Penanggung Jawab</td>';
            $html .= '<td style="width:10px">:</td>';
            $html .= '<td style="width:180px">'.$data->nm_penjab.'</td>';
            
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td>Tanggal</td>';
            $html .= '<td>:</td>';
            $html .= '<td>'.$data->tanggal_keluar.'</td>';
            $html .= '<td></td>';
            $html .= '<td></td>';
            $html .= '<td>No. Handphone</td>';
            $html .= '<td>:</td>';
            $html .= '<td>'.$data->nohp_penjab.'<br></td>';
            $html .= '</tr>';
            
        $html .= '<tr>';
        $html .= '<td colspan="8" style="width:140px">Po. Customer  :<br></td>';
        $html .= '</tr>';
        $html .= '</thead>';

    $html .=
      '</table>
        
        <table border="1" >
          <tr>
            <th style="width:40px" align="center">No</th>
            <th style="width:110px" align="center">ID Transaksi</th>
            <th style="width:110px" align="center">Tanggal Masuk</th>
            <th style="width:110px" align="center">Tanggal Keluar</th>
            <th style="width:130px" align="center">Lokasi</th>
            <th style="width:140px" align="center">Kode Barang</th>
            <th style="width:140px" align="center">Nama Barang</th>
            <th style="width:80px" align="center">Satuan</th>
            <th style="width:80px" align="center">Jumlah</th>
          </tr>';


          $no = 1;
            $html .= '<tr>';
            $html .= '<td align="center">'.$no.'</td>';
            $html .= '<td align="center">'.$data->id_transaksi.'</td>';
            $html .= '<td align="center">'.$data->tanggal_masuk.'</td>';
            $html .= '<td align="center">'.$data->tanggal_keluar.'</td>';
            $html .= '<td align="center">'.$data->lokasi.'</td>';
            $html .= '<td align="center">'.$data->kode_barang.'</td>';
            $html .= '<td align="center">'.$data->nama_barang.'</td>';
            $html .= '<td align="center">'.$data->satuan.'</td>';
            $html .= '<td align="center">'.$data->jumlah.'</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td align="center" colspan="8"><b>Jumlah</b></td>';
            $html .= '<td align="center">'.$data->jumlah.'</td>';
            $html .= '</tr>';
            $no++;

        $html .='
            </table><br>
            <h6>Mengetahui</h6><br><br><br><br>
            <h6>Admin</h6>
          </div>';

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
    
    $pdf->Output('invoice_barang_keluar.pdf','I');

  }
}
