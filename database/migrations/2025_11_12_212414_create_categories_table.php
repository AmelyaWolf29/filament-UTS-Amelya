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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kategori', 30)->unique(); //unik
            $table->string('nama_kategori', 150);
            $table->string('status', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }

    private function dropCategoriesTable(): void {
        if (!Schema::hasTable('categories')){
            return;
        }
        
        // Matikan cek FK (opsional; aman kalau ada FK yang mengarah ke categories)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('categories');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
