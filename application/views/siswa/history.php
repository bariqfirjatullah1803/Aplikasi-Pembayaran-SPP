<div class="text-center">

    <h1>History Pembayaran SPP Anda</h1>
</div>
<?php if(!$maxbulan):?>
<div class="card mx-auto mt-3" style="max-width: 540px;border-left:5px #0d6efd solid">
    <div class="card-body text-dark" sytle="">
        <div class="row">
            <div class="col-9">
                <h4 class="card-title fw-bold "><?= $realdate['bulan']?></h4>
                <p class="card-text">SPP Bulan <?= $realdate['bulan']?> Belum Di Bayar</p>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<div class="my-5">
    <?php foreach ($spp as $s ):?>
    <a href="" data-bs-toggle="modal" data-bs-target="#modal<?= $s['id_transaksi']?>" style="text-decoration: none">
        <div class="card mx-auto mt-3" style="max-width: 540px;border-left:5px #0d6efd solid">
            <div class="card-body text-dark" sytle="">
                <div class="row">
                    <div class="col-9">
                        <h4 class="card-title fw-bold "><?= $s['bulan']?></h4>
                        <p class="card-text"><?= $s['date_created']?></p>
                    </div>
                    <div class="col-3">
                        <p class="card-text mt-3" style="color: green"><?= $s['status']?></p>
                    </div>
                </div>
            </div>
        </div>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="modal<?= $s['id_transaksi']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="500" src="<?= base_url('laporan/spp/'.$s['id_transaksi'])?>">
                    </iframe>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('laporan/cetakSPP/').$s['id_transaksi']?>" target="_blank"
                        class="btn btn-danger"><i class="fa fa-print"></i> Print</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach?>
</div>