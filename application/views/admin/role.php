<?= $this->session->flashdata('message');?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Role
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('admin/role')?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputRole" class="form-label">Nama Role</label>
                        <input type="text" class="form-control" id="exampleInputRole" name="role">
                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
            foreach ($role as $r):?>
                <tr>
                    <th><?= $no?></th>
                    <td><?= $r['role']?></td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $r['id_role']?>"
                            class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $r['id_role']?>"
                            class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>

                        <!-- Modal Edit-->
                        <div class="modal fade" id="modalEdit<?= $r['id_role']?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="<?= base_url('admin/roleEdit')?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Role</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <input type="hidden" value="<?= $r['id_role'] ?>" name="idRole">
                                                <label for="exampleInputRole" class="form-label">Nama Role</label>
                                                <input type="text" class="form-control" id="exampleInputRole"
                                                    name="role" value="<?= $r['role']?>">
                                                <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
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
                        <div class="modal fade" id="modalDelete<?= $r['id_role']?>" data-bs-backdrop="static"
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
                                        <a href="<?= base_url('admin/roleDelete/').$r['id_role']?>" class="btn btn-primary">Hapus</a>
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