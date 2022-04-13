<form class="my-5" action="<?= base_url()?>laporan/siswa" method="post">
    <div class="row">
        <div class="col-3">
            <select class="form-select" aria-label="Default select example" name="kelas">
                <option>Pilih Kelas</option>
                <?php foreach($Gkelas as $k):?>
                <option <?php if($k['kelas'] == $k) echo 'selected';?> value="<?= $k['kelas']?>"><?= $k['kelas']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-2">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </div>
</form>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tahun Ajaran</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($siswa as $s):?>
        <tr>
            <td><?= $no?></td>
            <td><?= $s['nis']?></td>
            <td><?= $s['nama']?></td>
            <td><?= $s['kelas']?></td>
            <td><?= $s['tahun']?></td>
        </tr>

        <?php $no++; endforeach?>
        <?php
        // $count = $this->db->query('SELECT COUNT(nama) FROM tb_siswa');
        ?>
        <tr>
            <td style="display:none"><?= $no?></td>
            <td style="display:none"></td>
            <td style="display:none"></td>
            <td colspan="4" class="text-end">Jumlah Siswa</td>
            <td><?= $this->db->count_all_results('tb_siswa') ?></td>
        </tr>
    </tbody>
</table>