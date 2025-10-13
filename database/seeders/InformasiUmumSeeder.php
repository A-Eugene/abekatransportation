<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\KategoriInformasiUmum;
use App\Models\InformasiUmum;

class InformasiUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Pengiriman' => [
                [
                    'judul' => 'Estimasi Waktu Pengiriman',
                    'isi' => 'Waktu pengiriman standar berkisar antara 3 hingga 5 hari kerja, tergantung jarak dan lokasi tujuan. Untuk wilayah kota besar, pengiriman biasanya dapat tiba lebih cepat, sedangkan daerah terpencil membutuhkan waktu tambahan. Kami selalu berusaha menjaga ketepatan waktu dengan memantau setiap proses pengiriman secara real-time. Dalam kondisi tertentu seperti cuaca ekstrem atau lonjakan pengiriman, estimasi waktu dapat sedikit berubah.'
                ],
                [
                    'judul' => 'Pelacakan Paket',
                    'isi' => 'Setiap paket yang dikirimkan dilengkapi dengan nomor resi unik yang dapat digunakan untuk melacak status secara langsung melalui situs web kami. Pelacakan mencakup informasi lengkap seperti lokasi terakhir paket, waktu pembaruan, serta perkiraan waktu tiba. Kami terus meningkatkan sistem pelacakan agar pelanggan mendapatkan informasi yang lebih akurat dan transparan. Dengan demikian, Anda dapat merasa tenang karena mengetahui posisi paket Anda setiap saat.'
                ]
            ],
            'Tarif & Biaya' => [
                [
                    'judul' => 'Biaya Kargo Standar',
                    'isi' => 'Tarif kargo standar dimulai dari Rp 10.000 per kilogram untuk wilayah Jabodetabek, dengan biaya tambahan untuk tujuan luar pulau. Kami berkomitmen untuk memberikan harga yang kompetitif tanpa mengorbankan kualitas layanan. Biaya akhir akan dihitung berdasarkan berat aktual dan jarak tempuh, serta dapat dilihat secara transparan sebelum proses pengiriman dimulai. Pelanggan juga dapat mengajukan estimasi biaya melalui fitur kalkulator tarif kami.'
                ],
                [
                    'judul' => 'Biaya Layanan Carter',
                    'isi' => 'Layanan carter menawarkan fleksibilitas pengiriman eksklusif untuk pelanggan yang membutuhkan pengiriman cepat dan langsung. Tarif dihitung per perjalanan berdasarkan jarak, jenis kendaraan, serta kapasitas muatan. Layanan ini cocok untuk pengiriman volume besar atau barang bernilai tinggi yang memerlukan perhatian khusus. Setiap perjalanan didukung oleh tim logistik berpengalaman untuk menjamin keamanan barang sampai di tujuan.'
                ]
            ],
            'Kebijakan & Syarat' => [
                [
                    'judul' => 'Barang Terlarang',
                    'isi' => 'Kami memiliki kebijakan ketat terhadap jenis barang yang tidak dapat dikirimkan melalui layanan kami. Barang-barang seperti bahan peledak, zat kimia berbahaya, narkotika, serta produk ilegal dilarang keras untuk dikirim. Hal ini sesuai dengan peraturan hukum yang berlaku dan demi menjaga keselamatan pengiriman. Pelanggaran terhadap kebijakan ini dapat mengakibatkan pembatalan pengiriman tanpa pengembalian biaya.'
                ],
                [
                    'judul' => 'Pengembalian Paket',
                    'isi' => 'Jika terjadi kesalahan dalam proses pengiriman, pelanggan dapat mengajukan permintaan pengembalian paket sesuai prosedur yang berlaku. Kami akan melakukan verifikasi data pengiriman dan membantu menyelesaikan masalah secepat mungkin. Biaya pengembalian dapat ditanggung sebagian atau sepenuhnya oleh pihak kami tergantung pada penyebab kesalahan. Tujuan kami adalah memberikan pengalaman pengiriman yang aman dan bebas dari kekhawatiran.'
                ]
            ],
            'Promo & Penawaran' => [
                [
                    'judul' => 'Diskon Musiman',
                    'isi' => 'Kami secara berkala menghadirkan promo menarik selama periode tertentu, termasuk diskon hingga 20% untuk pengiriman di musim liburan. Penawaran ini berlaku untuk pelanggan individu maupun korporat dengan syarat dan ketentuan yang jelas. Selain itu, pelanggan yang berlangganan newsletter kami akan mendapatkan pemberitahuan lebih awal mengenai promo terbaru. Jangan lewatkan kesempatan untuk menghemat biaya pengiriman Anda sepanjang tahun.'
                ]
            ],
            'Kontak & Dukungan' => [
                [
                    'judul' => 'Layanan Pelanggan 24/7',
                    'isi' => 'Tim layanan pelanggan kami siap membantu Anda selama 24 jam setiap hari, termasuk hari libur nasional. Anda dapat menghubungi kami melalui telepon, email, atau fitur live chat di situs resmi kami. Setiap keluhan dan pertanyaan akan ditangani secara profesional oleh staf yang berpengalaman. Kami berkomitmen untuk memberikan solusi cepat dan tepat agar pengalaman Anda dengan layanan kami selalu memuaskan.'
                ]
            ]
        ];


        foreach ($data as $kategoriName => $informasis) {
            $kategori = KategoriInformasiUmum::where('kategori', $kategoriName)->first();
            foreach ($informasis as $info) {
                InformasiUmum::create([
                    'kategori_id' => $kategori->id,
                    'judul' => $info['judul'],
                    'isi' => $info['isi']
                ]);
            }
        }

        KategoriInformasiUmum::all()->each(function($kategori) {
            InformasiUmum::factory(rand(5,10))->create([
                'kategori_id' => $kategori->id
            ]);
        });
    }
}

# php artisan db:seed --class=InformasiUmumSeeder
