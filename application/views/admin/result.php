<?= $this->session->flashdata('message')?>
<a href="<?= base_url('admin/pembayaran')?>">Kembali</a>
<div class="card">
    <div class="card-body">
        <p>NIS : <?= $siswa['nis'] ?></p>
        <p>Nama : <?= $siswa['nama'] ?></p>
        <p>Kelas : <?= $siswa['kelas'] ?></p>
        <p>Tahun Ajaran : <?= $siswa['tahun'] ?></p>
    </div>
</div>
<div class="card mt-2  mx-auto">
    <div class="card-header">
        Data Siswa
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $tahun = $siswa['tahun'];
                $id_siswa = $siswa['id_siswa'];
                $spp = $this->db->query("SELECT * FROM tb_spp WHERE tahun = $tahun")->row_array();
            
            

            ?>
                <?php $no = 1;
            foreach ($bulan as $b):?>
                <tr>
                    <th><?= $no?></th>

                    <td><?= $b['bulan']?></td>
                    <td><?= $spp['nominal']?></td>
                    <?php 
                    $id_bulan = $b['id_bulan'];
                    $pembayaran = $this->db->query("SELECT * FROM tb_transaksi WHERE id_siswa = '$id_siswa' AND id_bulan = $id_bulan")->row_array();
                    if($pembayaran):
                    ?>
                    <td><?= $pembayaran['status']?></td>
                    <td class="text-center">
                        <a href="<?= base_url('admin/deleteTransaksi/').$pembayaran['id_transaksi'].'/'.$siswa['nis']?>" class="btn btn-primary">
                            <i class="fa fa-money"></i> Batal Bayar
                        </a>
                        <a href="<?= base_url('laporan/cetakSPP/'.$pembayaran['id_transaksi'])?>" target="_blank" class="btn btn-danger">
                            <i class="fa fa-print"></i> Cetak Bukti
                        </a>
                    </td>
                    <?php else:?>
                    <td>Belum Lunas</td>
                    <td class="text-center">
                        <a href="<?= base_url('admin/bayar/').$b['id_bulan'].'/'.$id_siswa.'/'.$user['id_user'].'/'.$spp['id_spp'].'/'.$siswa['nis']?>" class="btn btn-primary">
                            <i class="fa fa-money"></i> Bayar
                        </a>
                    </td>
                    <?php endif?>
                </tr>
                <?php $no++;
             endforeach;?>
            </tbody>
        </table>
    </div>
</div>