<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone', 20);
            $table->string('room', 3);
            $table->enum('status', ['aktif', 'alumni', 'tidak_jelas']);
            $table->string('institute');
            $table->string('address');
            $table->string('birthplace');
            $table->date('born');
            $table->date('year_of_entry');
            $table->date('year_out')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('jabatan_id')->nullable()->constrained('jabatans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santris');
    }
}
