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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 30)->unique(); //unik
            $table->string('nama_barang', 150);
            $table->decimal('harga', 15, 2)->default(0);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }

    private function dropProductsTable(): void {
        if (!Schema::hasTable('products')){
            return;
        }
        
        // Matikan cek FK (opsional; aman kalau ada FK yang mengarah ke products)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('products');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
