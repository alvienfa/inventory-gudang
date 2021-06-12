<!-- <page></page> -->
<div>
    <h1 class="text-center">Surat Pengembalian Barang</h1><br>
    <table width="100%">
        <thead>
            <tr>
                <td style="width:180px">No. Transaksi</td>
                <td style="width:10px">:</td>
                <td style="width:200px"><?= $data->id_transaksi ?></td>
                <td style="width:80px"></td>
                <td style="width:120px"></td>
                <td style="width:180px">Penanggung Jawab</td>
                <td style="width:10px">:</td>
                <td style="width:180px"><?= $data->nm_penjab ?></td>
            </tr>

            <tr>
                <td>Hari / Tanggal</td>
                <td>:</td>
                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                <td><?= date('l / d F Y', strtotime($data->tanggal_kembali)) ?></td>
                <td></td>
                <td></td>
                <td>No. Handphone</td>
                <td>:</td>
                <td><?php $data->nohp_penjab ?><br></td>
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

    <table style="border: 1px solid black">
        <tr>
            <th style="width:140px;text-align:center">Kode</th>
            <th style="width:140px;text-align:center">Nama</th>
            <th style="width:110px;text-align:center">Tipe Barang</th>
            <th style="width:110px;text-align:center">Tanggal Keluar</th>
            <th style="width:110px;text-align:center">Tanggal Kembali</th>
            <th style="width:130px;text-align:center">Perusahaan</th>
            <th style="width:80px;text-align:center">Jumlah</th>
            <th style="width:110px;text-align:center">Status</th>
        </tr>

        <?php $no = 1 ?>;
        <tr>
            <td class="text-center" height="60px"><?= $data->kode_barang ?></td>
            <td class="text-center"><?= $data->nama_barang ?></td>
            <td class="text-center"><?= $data->nama_kategori ?></td>
            <td class="text-center"><?= $data->tanggal_keluar ?></td>
            <td class="text-center"><?= $data->tanggal_kembali ?></td>
            <td class="text-center"><?= $data->perusahaan ?></td>
            <td class="text-center"><?= $data->jumlah ?> <?= $data->satuan ?></td>
            <td class="text-center"><?= $data->text_status ?></td>
        </tr>

        <tr>
            <td class="text-center" colspan="7" height="40px"><b>Jumlah</b></td>
            <td class="text-center"><?= $data->jumlah ?> <?= $data->satuan ?></td>
        </tr>
        <?php $no++; ?>
    </table><br><br>
    <table width="100%">
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
                <td colspan="1" style="width:180px"><u><?= $data->nama_user ?></u></td>
                <td></td>
                <td style="width:180px"><u><?= $data->nm_penjab ?></u></td>
                <td><br></td>
            </tr>
        </thead>
    </table>
    <br>
    <br>

    <h6>Catatan : <?= $data->keterangan ?> </h6><br><br>

</div>