<?= $this->session->flashdata('message');?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Siswa
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('admin/siswa')?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $query = $this->db->query("SELECT MAX(id_siswa) AS idMax FROM tb_siswa")->row_array();
                    $id_siswa = $query['idMax'];
                    
                    $no = (int) substr($id_siswa,3,3);
                    $no++;
            
                    $char = "S";
                    $id_siswa = $char . sprintf("%04s", $no);
                ?>
                    <input type="hidden" value="<?= $id_siswa;?>" name="idSiswa">
                    <div class="mb-3">
                        <label for="exampleInputNIS" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="exampleInputNIS" name="nis">
                        <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputNama" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="exampleInputNama" name="nama">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputKelas" class="form-label">Kelas</label>
                        <select class="form-select" name="kelas" aria-label="Default select example">
                            <option selected>- Pilih Kelas -</option>
                            <?php foreach($kelas as $k):?>
                            <option value="<?= $k['kelas']?>">
                                <?= $k['kelas']?></option>
                            <?php endforeach?>
                        </select>
                        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTahun" class="form-label">Tahun Ajaran</label>
                        <select class="form-select" name="tahun" aria-label="Default select example">
                            <option selected>- Pilih Tahun Ajaran -</option>
                            <?php foreach($tahun as $t):?>
                            <option value="<?= $t['tahun']?>">
                                <?= $t['tahun']?></option>
                            <?php endforeach?>
                        </select>
                        <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card mt-2  mx-auto">
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="cole">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
            foreach ($siswa as $s):?>
                <tr>
                    <th><?= $no?></th>
                    <td><?= $s['nis']?></td>
                    <td><?= $s['nama']?></td>
                    <td><?= $s['kelas']?></td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $s['id_siswa']?>"
                            class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $s['id_siswa']?>"
                            class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>

                        <!-- Modal Edit-->
                        <div class="modal fade" id="modalEdit<?= $s['id_siswa']?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="<?= base_url('admin/siswaEdit')?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Data Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" value="<?= $s['id_siswa']?>" name="idSiswa">
                                            <div class="mb-3">
                                                <label for="exampleInputNIS" class="form-label">NIS</label>
                                                <input type="text" class="form-control" id="exampleInputNIS" name="nis"
                                                    value="<?= $s['nis']?>">
                                                <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputNama" class="form-label">Nama Siswa</label>
                                                <input type="text" class="form-control" id="exampleInputNama"
                                                    name="nama" value="<?= $s['nama']?>">
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputKelas" class="form-label">Kelas</label>
                                                <select class="form-select" name="kelas"
                                                    aria-label="Default select example">
                                                    <option selected>- Pilih Kelas -</option>
                                                    <?php foreach($kelas as $k):?>
                                                    <option
                                                        <?= $k['kelas'] == $s['kelas'] ? "selected":"" ?>
                                                        value="<?= $k['kelas']?>">
                                                        <?= $k['kelas']?></option>
                                                    <?php endforeach?>
                                                </select>
                                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /. -->

                        <!-- Modal Delete-->
                        <div class="modal fade" id="modalDelete<?= $s['id_siswa']?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <p>Apakah anda yakin ingin menghapus data ini ? </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <a href="<?= base_url('admin/siswaDelete/').$s['id_siswa']?>"
                                            class="btn btn-primary">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /. -->


                    </td>
                </tr>
                <?php $no++;
             endforeach;?>
            </tbody>
        </table>
    </div>
</div>