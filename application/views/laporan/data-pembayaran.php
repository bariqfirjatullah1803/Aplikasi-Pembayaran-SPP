    <form action="<?= base_url()?>laporan/data_pembayaran" method="post">
        <div class="row my-5">
            <div class="col-1">
                <label for="tanggalawal" class="from-label">Dari Tanggal : </label>
            </div>
            <div class="col-4">
                <input type="date" id="tanggalawal" class="form-control" name="tanggalawal"
                    <?php if($tanggal != ''):?>value="<?= $tanggal[0]?>" <?php endif?>>
            </div>
            <div class="col-1">
                <label for="tanggalakhir" class="form-label">Sampai Tanggal : </label>
            </div>
            <div class="col-4">
                <input type="date" class="form-control" name="tanggalakhir" id="tanggalakhir"
                    <?php if($tanggal != ''):?>value="<?= $tanggal[1]?>" <?php endif?>>
            </div>
            <div class="col-2">
                <input type="submit" class="btn btn-primary" value="submit">
            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Bulan</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Tanggal Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;$jumlah = 0;foreach($pembayaran as $p):?>
            <tr>
                <td><?= $no?></td>
                <td><?= $p['nis']?></td>
                <td><?= $p['nama']?></td>
                <td><?= $p['bulan']?></td>
                <td>Rp <?= number_format($p['nominal'],2,",",".")?></td>
                <td><?= $p['status']?></td>
                <td><?= $p['date_created']?></td>
            </tr>
            <?php $jumlah += intval($p['nominal']); $no++;endforeach?>
            <tr>
                <td>Jumlah</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Rp <?= number_format($jumlah,2,",",".")?></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>