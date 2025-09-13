<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateTypeEnumInContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Modify the enum column 'type' to include all required content types
        DB::statement("ALTER TABLE contents MODIFY COLUMN type ENUM('magazine', 'poetry', 'editorial', 'news', 'agenda', 'cerita_seru', 'puisi_cilik', 'baca_yuk', 'kata_baru', 'angka_ajaib', 'bermain_hitung', 'cerita_matematika', 'tips_hitung_cepat', 'karya_kita', 'bintang_minggu_ini', 'foto_kegiatan', 'teka_teki_seru', 'komik_edukasi', 'fun_facts') NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert the enum column 'type' to original values
        DB::statement("ALTER TABLE contents MODIFY COLUMN type ENUM('magazine', 'poetry') NOT NULL");
    }
}
