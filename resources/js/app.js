import './bootstrap';

// ===================================
// TAMBAHKAN BLOK KODE INI
// ===================================
import Splide from '@splidejs/splide';

// Inisialisasi Splide setelah halaman dimuat
document.addEventListener( 'DOMContentLoaded', function () {

    // Cari semua elemen dengan class .splide
    var splides = document.querySelectorAll('.splide');

    if (splides.length) {
        // Loop setiap elemen dan inisialisasi
        for (var i = 0; i < splides.length; i++) {

            // Ambil data-options dari atribut HTML
            var options = {};
            if (splides[i].dataset.options) {
                options = JSON.parse(splides[i].dataset.options);
            }

            new Splide(splides[i], options).mount();
        }
    }
} );
// ===================================
// AKHIR BLOK KODE
// ===================================
