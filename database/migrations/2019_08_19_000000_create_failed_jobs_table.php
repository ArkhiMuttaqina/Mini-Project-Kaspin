<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('nama');
            $table->string('inisial');
            $table->string('password');
            $table->string('NoHP');
            $table->string('HakAkses');
            $table->string('otp');
            $table->rememberToken();
            $table->timestamp('failed_at')->useCurrent();
        }); ///Nama, Inisial, Username, Password, Nomor HP, Hak Akses
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
