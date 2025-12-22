<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
  public function run(): void
  {
    $articles = [
      [
        'title' => 'Panduan Pemilahan Sampah di Rumah',
        'excerpt' => 'Cara mudah memilah sampah organik, anorganik, dan B3 agar lebih ramah lingkungan.',
        'body' => 'Memilah sampah di rumah adalah langkah pertama menuju lingkungan yang lebih bersih. Mulailah dengan memisahkan organik, anorganik, dan B3. Gunakan wadah terpisah dan label yang jelas. Konsistensi sehari-hari akan mengurangi volume sampah ke TPA dan meningkatkan tingkat daur ulang.',
        'image' => 'https://images.unsplash.com/photo-1604187351574-c75ca79f5807?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'tag' => 'Pemilahan',
        'read_time' => '4 menit',
      ],
      [
        'title' => 'Tips Daur Ulang Plastik Sehari-hari',
        'excerpt' => 'Kenali jenis plastik, simbol daur ulang, dan praktik terbaik pengumpulan plastik.',
        'body' => 'Periksa simbol daur ulang pada kemasan untuk mengetahui kategori plastik. Bilas kemasan sebelum dikumpulkan agar tidak mencemari material lain. Kompakkan botol plastik untuk menghemat ruang pengangkutan.',
        'image' => 'https://plus.unsplash.com/premium_photo-1683133531613-6a7db8847c72?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8cmVjeWNsZXxlbnwwfHwwfHx8MA%3D%3D',
        'tag' => 'Plastik',
        'read_time' => '5 menit',
      ],
      [
        'title' => 'Manfaat Recycle untuk Lingkungan & Ekonomi',
        'excerpt' => 'Dari pengurangan emisi hingga peluang ekonomi sirkular untuk komunitas.',
        'body' => 'Daur ulang menurunkan kebutuhan bahan baku baru dan mengurangi emisi GRK. Ekonomi sirkular menciptakan lapangan kerja baru di pengumpulan dan pengolahan. Masyarakat lebih bersih, biaya pengelolaan sampah berkurang.',
        'image' => 'https://images.unsplash.com/photo-1582408921715-18e7806365c1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'tag' => 'Manfaat',
        'read_time' => '6 menit',
      ],
      [
        'title' => 'Cara Mengolah Sampah Organik Menjadi Kompos',
        'excerpt' => 'Ubah sisa makanan dan daun menjadi kompos berkualitas dengan teknik composting rumahan.',
        'body' => 'Composting adalah proses alami mengubah sampah organik menjadi nutrisi tanah. Siapkan bak tertutup, lapisi dengan karbon (dedaunan), tambahkan nitrogen (sisa makanan). Dalam 2-3 bulan, Anda punya kompos siap pakai untuk tanaman.',
        'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cmVjeWNsZXxlbnwwfHwwfHx8MA%3D%3D',
        'tag' => 'Organik',
        'read_time' => '5 menit',
      ],
      [
        'title' => 'Mengenal Simbol Daur Ulang dan Maknanya',
        'excerpt' => 'Pelajari angka dan simbol pada kemasan untuk memahami jenis plastik dan tingkat daur ulangnya.',
        'body' => 'Setiap kemasan plastik memiliki simbol segitiga berisi angka 1-7. Angka 1 (PET) dan 2 (HDPE) adalah paling mudah didaur ulang. Angka 3-7 lebih jarang diolah. Kenali simbol ini untuk memilah dengan benar dan berkontribusi pada ekonomi sirkular.',
        'image' => 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'tag' => 'Edukasi',
        'read_time' => '4 menit',
      ],
      [
        'title' => 'Dampak Sampah Plastik terhadap Ekosistem Laut',
        'excerpt' => 'Memahami bagaimana sampah plastik mencapai lautan dan membahayakan kehidupan laut.',
        'body' => 'Jutaan ton sampah plastik masuk ke laut setiap tahun, membahayakan ikan, penyu, dan mamalia laut. Mikroplastik memasuki rantai makanan dan berakhir di meja makan kita. Mengurangi penggunaan plastik dan mendaur ulang adalah kunci untuk menyelamatkan ekosistem laut.',
        'image' => 'https://images.unsplash.com/photo-1618477461853-cf6ed80faba5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'tag' => 'Laut',
        'read_time' => '7 menit',
      ],
    ];

    foreach ($articles as $data) {
      Article::create([
        'title' => $data['title'],
        'slug' => Str::slug($data['title']),
        'excerpt' => $data['excerpt'],
        'body' => $data['body'],
        'image' => $data['image'],
        'tag' => $data['tag'],
        'read_time' => $data['read_time'],
        'published_at' => now(),
      ]);
    }
  }
}
