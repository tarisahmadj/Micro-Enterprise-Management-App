<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usaha_usulan', function (Blueprint $table) {
            $table->id();
            $table->char('usaha_usulan',255);
            $table->string('scan_surat');
            $table->char('permasalahan_usaha_sebelum',255);
            $table->integer('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usaha_usulan');
    }
};
