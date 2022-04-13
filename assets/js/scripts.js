$.ajax({
    url: "http://localhost/ukk_pembayaran_spp/laporan/getsiswa",
    type: "POST",
    cache: false,
    success: function(data) {
        //alert(data);
        $('#show_siswa').html(data);
        window.print()
    }
});