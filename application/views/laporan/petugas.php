
<table class="table table-striped table-bordered my-5">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($petugas as $p):?>
        <tr>
            <td><?= $no?></td>
            <td><?= $p['nama']?></td>
            <td><?= $p['username']?></td>
        </tr>

        <?php $no++; endforeach?>
        <?php
        // $count = $this->db->query('SELECT COUNT(nama) FROM tb_siswa');
        ?>
        <tr>
            <td style="display:none"><?= $no?></td>
            <td colspan="2" class="text-end">Jumlah Petugas</td>
            <td><?= $this->db->count_all_results('tb_petugas') ?></td>
        </tr>
    </tbody>
</table>