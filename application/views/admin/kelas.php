<?= $this->session->flashdata('message');?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Kelas
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('admin/kelas')?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="cnth : XII RPL B">
                        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputJurusan" class="form-label">Nama Jurusan</label>
                        <input type="text" class="form-control" id="exampleInputJurusan" name="jurusan">
                        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
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

<div class="card mt-2 mx-auto">
    <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kelas</th>
                    <th scope="cole">Jurusan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
            foreach ($kelas as $k):?>
                <tr>
                    <th><?= $no?></th>
                    <td><?= $k['kelas']?></td>
                    <td><?= $k['jurusan']?></td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $k['id_kelas']?>"
                            class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $k['id_kelas']?>"
                            class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>

                        <!-- Modal Edit-->
                        <div class="modal fade" id="modalEdit<?= $k['id_kelas']?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="<?= base_url('admin/kelasEdit')?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Kelas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="kelas" class="form-label">Nama Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas"
                                                    placeholder="cnth : XII RPL B" value="<?= $k['kelas']?>">
                                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputJurusan" class="form-label">Nama Jurusan</label>
                                                <input type="text" class="form-control" id="exampleInputJurusan"
                                                    value="<?= $k['jurusan']?>" name="jurusan">
                                                <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <input type="hidden" value="<?= $k['id_kelas']?>" name="idKelas">
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
                        <div class="modal fade" id="modalDelete<?= $k['id_kelas']?>" data-bs-backdrop="static"
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
                                        <a href="<?= base_url('admin/kelasDelete/').$k['id_kelas']?>"
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