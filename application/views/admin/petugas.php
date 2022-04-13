<?= $this->session->flashdata('message');?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Tambah Data Petugas
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('admin/petugas')?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Petugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $query = $this->db->query("SELECT MAX(id_petugas) AS idMax FROM tb_petugas")->row_array();
                    $id_petugas = $query['idMax'];
                    
                    $no = (int) substr($id_petugas,3,3);
                    $no++;
            
                    $char = "P";
                    $id_petugas = $char . sprintf("%04s", $no);
                ?>
                    <input type="hidden" value="<?= $id_petugas;?>" name="idPetugas">
                    <div class="mb-3">
                        <label for="exampleInputNama" class="form-label">Nama Petugas</label>
                        <input type="text" class="form-control" id="exampleInputNama" name="nama">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputUsername" class="form-label">Username Petugas</label>
                        <input type="text" class="form-control" id="exampleInputUsername" name="username">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    <th scope="col">Username</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
            foreach ($petugas as $p):?>
                <tr>
                    <th><?= $no?></th>
                    <td><?= $p['nama']?></td>
                    <td><?= $p['username']?></td>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $p['id_petugas']?>"
                            class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalPassword<?= $p['id_petugas']?>"
                            class="btn btn-secondary">
                            <i class="fa fa-key"></i>
                        </a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $p['id_petugas']?>"
                            class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>

                        <!-- Modal Edit-->
                        <div class="modal fade" id="modalEdit<?= $p['id_petugas']?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="<?= base_url('admin/petugasEdit')?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Role</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" value="<?= $p['id_petugas'] ?>" name="idPetugas">
                                            <div class="mb-3">
                                                <label for="exampleInputNama" class="form-label">Nama Petugas</label>
                                                <input type="text" class="form-control" id="exampleInputNama"
                                                    name="nama" value="<?= $p['nama']?>">
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputUsername" class="form-label">Username
                                                    Petugas</label>
                                                <input type="text" class="form-control" id="exampleInputUsername"
                                                    name="username" value="<?= $p['username']?>">
                                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
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

                        <!-- Modal Password -->
                        <div class="modal fade" id="modalPassword<?= $p['id_petugas']?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="<?= base_url('admin/petugasPassword')?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Password</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" value="<?= $p['id_petugas'] ?>" name="idPetugas">
                                            <div class="mb-3">
                                                <label for="inputPassword" class="form-label">New Password</label>
                                                <input type="text" class="form-control" id="inputPassword"
                                                    name="password">
                                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
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
                        <div class="modal fade" id="modalDelete<?= $p['id_petugas']?>" data-bs-backdrop="static"
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
                                        <a href="<?= base_url('admin/petugasDelete/').$p['id_petugas']?>"
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