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
    <h1 class="uppercase"><?= ($this->input->get('id_kategori')? $list_data[0]->nama_kategori: NULL)?></h1>
    <table class="table" cellspacing="10" cellpadding="5">
        <thead>
            <tr>
                <th style="white-space: nowrap;width:10%;"><h3>NO</h3></th>
                <th style="white-space: nowrap;width:35%;text-align: left;"><h3>NAMA</h3></th>
                <th style="white-space: nowrap;width:20%;text-align: left"><h3>KODE</h3></th>
                <th style="white-space: nowrap;width:20%;text-align: center"><h3>STATUS</h3></th>
                <th style="white-space: nowrap;width:15%;text-align: right"><h3>JUMLAH</h3></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($list_data as $item) : ?>
                <tr>
                    <td style="white-space: nowrap;width:10%;"><?= $no ?></td>
                    <td style="white-space: nowrap;width:35%;text-align: left;"><?= $item->nama_barang ?></td>
                    <td style="white-space: nowrap;width:20%;text-align: left"><?= $item->kode_barang ?></td>
                    <?php 
                    switch($item->status){
                        case 0:
                            $color = 'text-warning';
                            break;
                        case 1:
                            $color = 'text-success';
                            break;
                        case 2:
                            $color = 'text-primary';
                            break;
                        case 3:
                            $color = 'text-danger';
                            break;            
                    }

                    ?>
                    <td style="white-space: nowrap;width:20%;text-align: center;"><h4 class="uppercase <?= $color?>"><?= $item->text_status ?></h4></td>
                    <td style="white-space: nowrap;width:15%;text-align: right;"><?= $item->jumlah ?> <?= $item->satuan ?></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>