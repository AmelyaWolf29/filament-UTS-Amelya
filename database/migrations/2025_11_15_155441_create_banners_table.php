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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150); 
            $table->string('subtitle', 255)->unique();
            $table->string('image_url', 255)->nullable();
            $table->string('link_url', 255)->nullable();
            $table->enum('position', ['top', 'sidebar', 'footer', 'popup'])->default('top');
            $table->unsignedBigInteger('order_index')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }

    private function dropBannersTable(): void {
        if (!Schema::hasTable('banners')){
            return;
        }
        
        // Matikan cek FK (opsional; aman kalau ada FK yang mengarah ke categories)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('banners');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

};
