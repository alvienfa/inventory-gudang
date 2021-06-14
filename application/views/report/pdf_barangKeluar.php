<style>
    .table th {
        text-align: center;
        height: 240px;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
        height: 40px;
    }


    .table td.fit,
    .table th.fit {
        white-space: nowrap;
        width: 1%;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .bold {
        font-weight: 800;
    }

    .text-warning {
        color: orange;
    }

    .text-danger {
        color: red;
    }

    .text-success {
        color: green;
    }

    .text-primary {
        color: blue;
    }
</style>
<div>
    <h1 align="center">Surat Jalan Pengeluaran Barang</h1><br><br>
    <table border="0" width="100%">
        <thead>
            <tr>
                <td style="width:180px">No. Transaksi</td>
                <td style="width:10px">:</td>
                <td colspan="6" style="width:340px"><?= $list_data->id_transaksi ?></td>
            </tr>

            <tr>
                <td style="width:180px">Ditunjukkan untuk</td>
                <td style="width:10px">:</td>
                <td style="width:200px"><?= $list_data->perusahaan ?></td>
                <td style="width:80px"></td>
                <td style="width:120px"></td>
                <td style="width:180px">Penanggung Jawab</td>
                <td style="width:10px">:</td>
                <td style="width:180px"><?= $list_data->nm_penjab ?></td>
            </tr>

            <tr>
                <td>Hari / Tanggal</td>
                <td>:</td>
                <td><?= date('l / d F Y', strtotime($list_data->tanggal_keluar)) ?></td>
                <td></td>
                <td></td>
                <td>No. Handphone</td>
                <td>:</td>
                <td><?= $list_data->nohp_penjab ?><br></td>
            </tr>

            <tr>
                <td style="width:180px">Po. Customer </td>
                <td>:<br></td>
                <td> </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><br></td>
            </tr>
        </thead>

    </table>

    <table border="1" cellspacing="0" cellpadding="7">
    
        <tr>
            
            <th align="center" style="width: 180px;height: 40px;">ID Transaksi</th>
            <th align="center"  >Kode</th>
            <th align="center"  >Nama </th>
            <th align="center"  >Tipe Barang</th>
            <th align="center" style="width: 160px;"  >Tanggal Keluar</th>
            
            <th align="center" style="width: 80px;"  >Jumlah</th>
        </tr>



        <tr>
            <td align="center" ><?= $list_data->id_transaksi ?></td>
            <td align="center"  ><?= $list_data->kode_barang ?></td>
            <td align="center"  ><?= $list_data->nama_barang ?></td>
            <td align="center"  ><?= $list_data->nama_kategori ?></td>
            <td align="center"  ><?= date('d F Y', strtotime($list_data->tanggal_keluar)) ?></td>
            
            <td align="center"  ><?= $list_data->jumlah ?> <?= $list_data->satuan ?></td>
        </tr>

        <tr>
            <td align="center" colspan="5" height="40px"><b>Jumlah</b></td>
            <td align="center"><?= $list_data->jumlah ?> <?= $list_data->satuan ?></td>
        </tr>
    </table><br><br>
    <table>
        <thead>

            <tr>
                <td align="center" style="width:180px">Mengetahui </td>
                <td></td>
                
                <td align="center" colspan="1" style="width:180px">Penyedia</td>
                <td></td>
                <td align="center" style="width:180px">Penanggung Jawab</td>
                <td><br></td>
            </tr>

            <tr>
                <td style="width:180px"> </td>
                <td></td>
                
                <td colspan="1"></td>
                <td></td>
                <td><br></td>
            </tr>

            <tr>
                <td style="width:180px"> </td>
                <td></td>
                
                <td colspan="1"></td>
                <td></td>
                <td><br></td>
            </tr>

            <tr>
                <td style="width:180px"> </td>
                <td></td>
                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><br></td>
            </tr>


            <tr>
                <td align="center" style="width:180px"><u><?= $this->session->userdata('nama_user') ?></u></td>
                <td></td>

                <td align="center" colspan="1" style="width:180px"><u><?= $list_data->nama_user ?></u></td>
                <td></td>
                <td align="center" style="width:180px"><u><?= $list_data->nm_penjab ?></u></td>
                <td><br></td>
            </tr>
        </thead>
    </table>
    <br><h6>Catatan : <?= $list_data->keterangan ?> </h6><br><br>
</div>