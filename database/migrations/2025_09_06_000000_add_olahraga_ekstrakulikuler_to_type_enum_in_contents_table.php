<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddOlahragaEkstrakulikulerToTypeEnumInContentsTable extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE contents MODIFY COLUMN type ENUM(
            'magazine', 'poetry', 'editorial', 'news', 'agenda', 'cerita_seru', 'puisi_cilik', 'baca_yuk', 'kata_baru',
            'angka_ajaib', 'bermain_hitung', 'cerita_matematika', 'tips_hitung_cepat', 'karya_kita', 'bintang_minggu_ini',
            'foto_kegiatan', 'teka_teki_seru', 'komik_edukasi', 'fun_facts', 'olahraga', 'ekstrakulikuler'
        ) NOT NULL");
    }

    public function down()
    {
        DB::statement("ALTER TABLE contents MODIFY COLUMN type ENUM(
            'magazine', 'poetry', 'editorial', 'news', 'agenda', 'cerita_seru', 'puisi_cilik', 'baca_yuk', 'kata_baru',
            'angka_ajaib', 'bermain_hitung', 'cerita_matematika', 'tips_hitung_cepat', 'karya_kita', 'bintang_minggu_ini',
            'foto_kegiatan', 'teka_teki_seru', 'komik_edukasi', 'fun_facts'
        ) NOT NULL");
    }
}
