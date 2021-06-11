<div>
    <h1 class="text-center">Surat Jalan Pengeluaran Barang</h1><br>
    <table border="0" width="100%">
        <thead>
            <tr>
                <td style="width:180px">No. Transaksi</td>
                <td style="width:10px">:</td>
                <td colspan="6" style="width:340px"><?= $data->id_transaksi ?></td>
            </tr>

            <tr>
                <td style="width:180px">Ditunjukkan untuk</td>
                <td style="width:10px">:</td>
                <td style="width:200px"><?= $data->perusahaan ?></td>
                <td style="width:80px"></td>
                <td style="width:120px"></td>
                <td style="width:180px">Penanggung Jawab</td>
                <td style="width:10px">:</td>
                <td style="width:180px"><?= $data->nm_penjab ?></td>
            </tr>

            <tr>
                <td>Hari / Tanggal</td>
                <td>:</td>
                <td><?= date('l / d F Y', strtotime($data->tanggal_keluar)) ?></td>
                <td></td>
                <td></td>
                <td>No. Handphone</td>
                <td>:</td>
                <td><?= $data->nohp_penjab ?><br></td>
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


        <?php $no = 1;?>
        <tr>
            <td class="text-center" height="50px"><?= $no ?></td>
            <td class="text-center"><?= $data->id_transaksi ?></td>
            <td class="text-center"><?= $data->kode_barang ?></td>
            <td class="text-center"><?= $data->nama_barang ?></td>
            <td class="text-center"><?= $data->nama_kategori ?></td>
            <td class="text-center"><?= $data->tanggal_keluar ?></td>
            <td class="text-center"><?= $data->perusahaan ?></td>
            <td class="text-center"><?= $data->jumlah ?> <?= $data->satuan ?></td>
        </tr>

        <tr>
            <td class="text-center" colspan="7" height="40px"><b>Jumlah</b></td>
            <td class="text-center"><?= $data->jumlah ?> <?= $data->satuan ?></td>
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