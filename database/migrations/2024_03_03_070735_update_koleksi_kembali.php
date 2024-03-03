<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_koleksi_kembali_status', function (Blueprint $table) {
            $table->id();
        });

        // Menambahkan pernyataan SQL untuk membuat trigger
        $triggerQuery = "
        CREATE TRIGGER update_koleksi_kembali_status AFTER INSERT ON transaksi_kembalis
        FOR EACH ROW
        BEGIN
            UPDATE koleksis 
            SET status = 'Tersedia'
            WHERE kd_koleksi = NEW.kd_koleksi;
        END;
        ";
        DB::unprepared($triggerQuery);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('update_koleksi_kembali_status');
    }
};
