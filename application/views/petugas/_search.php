<div class="card text-center">

    <div class="card-body p-5">
        <?= $this->session->flashdata('message');
                    ?>
        <form method="POST" action="<?= base_url('petugas/pembayaran')?>">
            <div class="mb-3">
                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukan NIS ...">
                <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Cari Data</button>

        </form>
    </div>
</div>

<div class="card mt-2  mx-auto">
    <div class="card-header">
        History Pembayaran
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Pembayaran</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
            foreach ($history as $h):?>
                <tr>
                    <th><?= $no?></th>
                    <td><?= $h['nis']?></td>
                    <td><?= $h['nama']?></td>
                    <td><?= $h['bulan']?></td>
                    <td><?= $h['nominal']?></td>
                    <td><?= $h['status']?></td>
                    <td><?= $h['date_created']?></td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modal<?= $h['id_transaksi']?>"
                            class="btn btn-primary">
                            <i class="fa fa-info"></i> Detail
                        </a>
                        <a href="<?= base_url('laporan/cetakSPP/'.$h['id_transaksi'])?>" target="_blank" class="btn btn-danger">
                            <i class="fa fa-print"></i> Cetak
                        </a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="modal<?= $h['id_transaksi']?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="500" src="<?= base_url('laporan/spp/'.$h['id_transaksi'])?>">
                                </iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
 
                <?php $no++;
             endforeach;?>
            </tbody>
        </table>
    </div>
</div>