<style>
    .table th {
        text-align: center;
    }

    .table td {
        text-align: center;
    }


    .table td.fit,
    .table th.fit {
        white-space: nowrap;
        width: 1%;
    }
    .uppercase{
        text-transform: uppercase;
    }

    .bold{
        font-weight: 800;
    }
    .text-warning{
        color: orange;
    }
    .text-danger{
        color: red;
    }
    .text-success{
        color: green;
    }
    .text-primary{
        color: blue;
    }
</style>
<div>
<?php if (is_array($list_data)) { ?>
                          <?php $no = 1; ?>
                          <?php foreach ($list_data as $dd) : ?>
    <h1 class="text-center">Surat Jalan Pengeluaran Barang</h1><br>
    <table border="0" width="100%">
        <thead>
            <tr>
                <td style="width:180px">No. Transaksi</td>
                <td style="width:10px">:</td>
                <td colspan="6" style="width:340px"><?= $dd->id_transaksi ?></td>
            </tr>

            <tr>
                <td style="width:180px">Ditunjukkan untuk</td>
                <td style="width:10px">:</td>
                <td style="width:200px"><?= $dd->perusahaan ?></td>
                <td style="width:80px"></td>
                <td style="width:120px"></td>
                <td style="width:180px">Penanggung Jawab</td>
                <td style="width:10px">:</td>
                <td style="width:180px"><?= $dd->nm_penjab ?></td>
            </tr>

            <tr>
                <td>Hari / Tanggal</td>
                <td>:</td>
                <td><?= date('l / d F Y', strtotime($dd->tanggal_keluar)) ?></td>
                <td></td>
                <td></td>
                <td>No. Handphone</td>
                <td>:</td>
                <td><?= $dd->nohp_penjab ?><br></td>
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

    <table border="1">
        <tr>
            <th style="width:40px" class="text-center">No</th>
            <th style="width:160px" class="text-center">ID Transaksi</th>
            <th style="width:140px" class="text-center">Kode</th>
            <th style="width:140px" class="text-center">Nama </th>
            <th style="width:110px" class="text-center">Tipe Barang</th>
            <th style="width:110px" class="text-center">Tanggal Keluar</th>
            <th style="width:130px" class="text-center">Perusahaan</th>
            <th style="width:80px" class="text-center">Jumlah</th>
        </tr>


        
        <tr>
            <td class="text-center" height="50px"><?= $no ?></td>
            <td class="text-center"><?= $dd->id_transaksi ?></td>
            <td class="text-center"><?= $dd->kode_barang ?></td>
            <td class="text-center"><?= $dd->nama_barang ?></td>
            <td class="text-center"><?= $dd->nama_kategori ?></td>
            <td class="text-center"><?= $dd->tanggal_keluar ?></td>
            <td class="text-center"><?= $dd->perusahaan ?></td>
            <td class="text-center"><?= $dd->jumlah ?> <?= $dd->satuan ?></td>
        </tr>

        <tr>
            <td class="text-center" colspan="7" height="40px"><b>Jumlah</b></td>
            <td class="text-center"><?= $dd->jumlah ?> <?= $dd->satuan ?></td>
        </tr>
        $no++;
    </table><br><br>
    <table border="0" width="100%">
        <thead>

            <tr>
                <td style="width:180px">Mengetahui </td>
                <td></td>
                <td></td>
                <td colspan="1" style="width:180px">Penyedia</td>
                <td></td>
                <td style="width:180px">Penanggung Jawab</td>
                <td><br></td>
            </tr>

            <tr>
                <td style="width:180px"> </td>
                <td></td>
                <td> </td>
                <td colspan="1"></td>
                <td></td>
                <td><br></td>
            </tr>

            <tr>
                <td style="width:180px"> </td>
                <td></td>
                <td> </td>
                <td colspan="1"></td>
                <td></td>
                <td><br></td>
            </tr>

            <tr>
                <td style="width:180px"> </td>
                <td></td>
                <td> </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><br></td>
            </tr>


            <tr>
                <td style="width:180px"><u><?= $this->session->userdata('nama_user') ?></u></td>
                <td></td>
                <td> </td>
                <td colspan="1" style="width:180px"><u><?= $dd->nama_user ?></u></td>
                <td></td>
                <td style="width:180px"><u><?= $dd->nm_penjab ?></u></td>
                <td><br></td>
            </tr>
        </thead>
    </table>
    <br>
    <br>

    <h6>Catatan : <?= $dd->keterangan ?> </h6><br><br>
    <?php $no++; ?>
                    <?php endforeach; ?>
                  <?php } else { ?>
                    <td align="center" colspan="11" center="center"><strong style="color:gray">Data Kosong</strong></td>
                  <?php } ?>

</div>