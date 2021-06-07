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
</style>
<div>
    <table class="table" cellspacing="10" cellpadding="5">
        <thead>
            <tr>
                <th style="white-space: nowrap;width:10%;">NO</th>
                <th style="white-space: nowrap;width:50%;">Nama</th>
                <th style="white-space: nowrap;width:25%;">ID</th>
                <th style="white-space: nowrap;width:25%;">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
            foreach ($list_data as $item) : ?>
                <tr>
                    <th style="white-space: nowrap;width:10%;"><?= $no?></th>
                    <th style="white-space: nowrap;width:50%;"><?= $item->nama_barang ?></th>
                    <td style="white-space: nowrap;width:25%;"><?= $item->id_transaksi ?></td>
                    <td style="white-space: nowrap;width:15%;text-align: right;"><?= $item->jumlah ?> <?= $item->satuan?></td>
                </tr>
            <?php $no++;endforeach; ?>
        </tbody>
    </table>
</div>