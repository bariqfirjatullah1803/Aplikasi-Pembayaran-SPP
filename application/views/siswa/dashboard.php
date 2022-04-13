<div class="text-center">

    <h1>Selamat Datang <?= $user['nama']?></h1>
</div>
<a href="<?= base_url('siswa/history')?>" style="text-decoration: none">
    <div class="card mb-3 mx-auto mt-5" style="max-width: 540px;border-left:5px #0d6efd solid">
        <div class="row g-0">
            <div class="col-md-4 text-center py-4">
                <i class="fas fa-clipboard-list" style="font-size:100px;color:#0d6efd"></i>
            </div>
            <div class="col-md-8 py-5">
                <div class="card-body" sytle="">
                    <h4 class="card-title fw-bold text-dark">History Pembayaran SPP</h4>
                </div>
            </div>
        </div>
    </div>
</a>