document.addEventListener('DOMContentLoaded', function() {
    var selectPinjam = document.getElementById('no_transaksi_pinjam');
    var inputAnggota = document.getElementById('kd_anggota');
    var inputTgPinjam = document.getElementById('tg_pinjam');
    var inputTgKembali = document.getElementById('tg_kembali');
    var inputKdKoleksi = document.getElementById('kd_koleksi');
    var inputJudul = document.getElementById('judul');
    var inputJnsBhnPustaka = document.getElementById('jns_bhn_pustaka');
    var inputJnsKoleksi = document.getElementById('jns_koleksi');
    var inputJnsMedia = document.getElementById('jns_media');

    selectPinjam.addEventListener('change', function() {
        var selectedOption = selectPinjam.options[selectPinjam.selectedIndex];
        var kodeAnggota = selectedOption.getAttribute('data-kode-anggota');
        var tgPinjam = selectedOption.getAttribute('data-tg-pinjam');
        var tgKembali = selectedOption.getAttribute('data-tg-kembali');
        var kdKoleksi = selectedOption.getAttribute('data-kd-koleksi');
        var judul = selectedOption.getAttribute('data-judul');
        var jnsBhnPustaka = selectedOption.getAttribute('data-jns-bhn-pustaka');
        var jnsKoleksi = selectedOption.getAttribute('data-jns-koleksi');
        var jnsMedia = selectedOption.getAttribute('data-jns-media');
        
        inputAnggota.value = kodeAnggota;
        inputTgPinjam.value = tgPinjam;
        inputTgKembali.value = tgKembali;
        inputKdKoleksi.value = kdKoleksi;
        inputJudul.value = judul;
        inputJnsBhnPustaka.value = jnsBhnPustaka;
        inputJnsKoleksi.value = jnsKoleksi;
        inputJnsMedia.value = jnsMedia;
    });
});
// Menghitung Selisih
function hitungDenda(tanggalPinjam, tanggalKembali) {
    var tanggalPinjam = new Date(tanggalPinjam);
    var tanggalKembali = new Date(tanggalKembali);

    var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
    var selisih = Math.round((tanggalKembali.getTime() - tanggalPinjam.getTime()) / oneDay);

    var denda = 0;
    if (selisih > 30) {
        denda = selisih * 1000;
    } else if (selisih > 7) {
        denda = selisih * 500;
    } else if (selisih > 1) {
        denda = 2000;
    }

    document.getElementById('denda').value = denda;
}

window.onload = function() {
    // Panggil fungsi hitungDenda saat halaman dimuat
    hitungDenda(document.getElementById('tg_pinjam').value, document.getElementById('tg_kembali').value);

    // Tambahkan event listener untuk input tg_pinjam
    document.getElementById('tg_pinjam').addEventListener('change', function() {
        hitungDenda(this.value, document.getElementById('tg_kembali').value);
    });

    // Tambahkan event listener untuk input tg_kembali
    document.getElementById('tg_kembali').addEventListener('change', function() {
        hitungDenda(document.getElementById('tg_pinjam').value, this.value);
    });
};





