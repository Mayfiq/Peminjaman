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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('merk');
            $table->string('type');
            $table->string('nama');
            $table->enum('status', ['available', 'borrowed'])->default('available');
            $table->string('qrcode')->nullable(); 
            $table->foreignId('kategori_id')->references('id')->on('kategoris')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
