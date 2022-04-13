<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <style>
    .invoice table {
        background: white;
        width: 100%;
    }

    .invoice tr,
    .invoice th {
        color: black !important;
    }

    .invoice tr {
        border-radius: 5px;
        background: white;
    }

    .invoice thead {
        border-top: solid 1px black !important;
        border-bottom: solid 1px black !important;
    }

    .invoice-spp p {
        /* margin: 0; */
        margin-bottom: 5px;
    }

    .invoice-spp h6 {
        /* margin: 0; */
        margin-bottom: 10px;
    }
    </style>
    <title><?= $title; ?></title>
</head>

<body>
    <div class="row">
        <div class="col-12 invoice p-4 mt-3" id="invoices">
            <div class="text-center">
                <h1> Tanda Bukti Pembayaran </h1>
            </div>
            <div class="col-12 mb-4">
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row invoice-spp">
                            <div class="col-4">
                                <h6>NIS <span class="float-end">:</span></h6>
                                <h6>Nama Lengkap <span class="float-end">:</span></h6>
                                <h6>Kelas <span class="float-end">:</span></h6>
                            </div>
                            <div class="col-8">
                                <p><?= $spp['nis']?></p>
                                <p><?= $spp['nama']?></p>
                                <p><?= $spp['kelas']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row invoice-spp">
                            <div class="col-4">
                                <h6>Tgl Bayar <span class="float-end">:</span></h6>
                                <h6>Diterima Oleh <span class="float-end">:</span></h6>
                            </div>
                            <div class="col-8">
                                <p><?= $spp['date_created'] ?></p>
                                <?php 
                                            $id = $spp['id_petugas'];
                                            $query = $this->db->get_where('tb_user',['id_user' => "$id"])->row_array();
                                        ?>
                                <p><?= $query['nama']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="border-right:solid 1px black">Jenis Pembayaran</th>
                            <th style="border-right:solid 1px black">Keterangan</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $spp['id_transaksi']?></td>
                            <td>SPP</td>
                            <td>Pembayaran SPP Bulan <?= $spp['bulan']?></td>
                            <td>Rp. <?= number_format($spp['nominal'],2,',','.')?></td>
                        </tr>
                        <tr style="border-top: solid 1px black !important;">
                            <td></td>
                            <td></td>
                            <td style="font-weight:bold">Total</td>
                            <td>Rp. <?= number_format($spp['nominal'],2,',','.')?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>
    <?= $script ?>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>