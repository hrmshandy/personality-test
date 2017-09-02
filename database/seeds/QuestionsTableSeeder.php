<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                ['preference_id' => 7, 'question' => 'Spontan, Fleksibel, tidak diikat waktu'],
                ['preference_id' => 8, 'question' => 'Terencana dan memiliki deadline jelas'],
            ],
            [
                ['preference_id' => 1, 'question' => 'Lebih memilih berkomunikasi dengan menulis'],
                ['preference_id' => 2, 'question' => 'Lebih memilih berkomunikasi dengan bicara'],
            ],
            [
                ['preference_id' => 8, 'question' => 'Tidak menyukai hal-hal yang bersifat mendadak dan di luar perencanaan'],
                ['preference_id' => 7, 'question' => 'Perubahan mendadak tidak jadi masalah'],
            ],
            [
                ['preference_id' => 5, 'question' => 'Obyektif'],
                ['preference_id' => 6, 'question' => 'Subyektif'],
            ],
            [
                ['preference_id' => 2, 'question' => 'Menemukan dan mengembangkan ide dengan mendiskusikannya '],
                ['preference_id' => 1, 'question' => 'Menemukan dan mengembangkan ide dengan merenungkan'],
            ],
            [
                ['preference_id' => 4, 'question' => 'Bergerak dari gambaran umum baru ke detail'],
                ['preference_id' => 3, 'question' => 'Bergerak dari detail ke gambaran umum sebagai kesimpulan akhir'],
            ],
            [
                ['preference_id' => 2, 'question' => 'Berorientasi pada dunia eksternal (kegiatan, orang)'],
                ['preference_id' => 1, 'question' => 'Berorientasi pada dunia internal (memori, pemikiran, ide)'],
            ],
            [
                ['preference_id' => 3, 'question' => 'Berbicara mengenai masalah yang dihadapi hari ini dan langkah-langkah praktis mengatasinya'],
                ['preference_id' => 4, 'question' => 'Berbicara mengenai visi masa depan dan konsep-konsep mengenai visi tersebut '],
            ],
            [
                ['preference_id' => 6, 'question' => 'Diyakinkan dengan penjelasan yang menyentuh perasaan '],
                ['preference_id' => 5, 'question' => 'Diyakinkan dengan penjelasan yang masuk akal '],
            ],
            [
                ['preference_id' => 1, 'question' => 'Fokus pada sedikit hobi namun mendalam'],
                ['preference_id' => 2, 'question' => 'Fokus pada banyak hobi secara luas dan umum '],
            ],
            [
                ['preference_id' => 1, 'question' => 'Tertutup dan mandiri '],
                ['preference_id' => 2, 'question' => 'Sosial dan ekspresif'],
            ],
            [
                ['preference_id' => 7, 'question' => 'Aturan, jadwal dan target sangat mengikat dan membebani'],
                ['preference_id' => 8, 'question' => 'Aturan, jadwal dan target akan sangat membantu dan memperjelas tindakan'],
            ],
            [
                ['preference_id' => 3, 'question' => 'Menggunakan pengalaman sebagai pedoman'],
                ['preference_id' => 4, 'question' => 'Menggunakan imajinasi dan perenungan sebagai pedoman'],
            ],

            [
                ['preference_id' => 5, 'question' => 'Berorientasi tugas dan job description'],
                ['preference_id' => 6, 'question' => 'Berorientasi pada manusia dan hubungan'],
            ],
            [
                ['preference_id' => 1, 'question' => 'Pertemuan dengan orang lain dan aktivitas sosial melelahkan'],
                ['preference_id' => 2, 'question' => 'Bertemu orang dan aktivitas sosial membuat bersemangat'],
            ],
            [
                ['preference_id' => 3, 'question' => 'SOP sangat membantu'],
                ['preference_id' => 4, 'question' => 'SOP sangat membosankan'],
            ],
            [
                ['preference_id' => 5, 'question' => 'Mengambil keputusan berdasar logika dan aturan main'],
                ['preference_id' => 6, 'question' => 'Mengambil keputusan berdasar perasaan pribadi dan kondisi orang lain '],
            ],
            [
                ['preference_id' => 4, 'question' => 'Bebas dan dinamis'],
                ['preference_id' => 3, 'question' => 'Prosedural dan tradisional '],
            ],
            [
                ['preference_id' => 8, 'question' => 'Berorientasi pada hasil '],
                ['preference_id' => 7, 'question' => 'Berorientasi pada proses'],
            ],
            [
                ['preference_id' => 1, 'question' => 'Beraktifitas sendirian di rumah menyenangkan '],
                ['preference_id' => 2, 'question' => 'Beraktifitas sendirian di rumah membosankan'],
            ],
            [
                ['preference_id' => 3, 'question' => 'Menggunakan pengalaman sebagai pedoman'],
                ['preference_id' => 4, 'question' => 'Menggunakan imajinasi dan perenungan sebagai pedoman['],
            ],
            [
                ['preference_id' => 3, 'question' => 'Menggunakan pengalaman sebagai pedoman'],
                ['preference_id' => 4, 'question' => 'Menggunakan imajinasi dan perenungan sebagai pedoman['],
            ],
            [
                ['preference_id' => 3, 'question' => 'Menggunakan pengalaman sebagai pedoman'],
                ['preference_id' => 4, 'question' => 'Menggunakan imajinasi dan perenungan sebagai pedoman['],
            ],
            [
                ['preference_id' => 3, 'question' => 'Menggunakan pengalaman sebagai pedoman'],
                ['preference_id' => 4, 'question' => 'Menggunakan imajinasi dan perenungan sebagai pedoman['],
            ],
        ];

        foreach ($questions as $question) {
            \App\Question::create($question);
        }
    }
}
