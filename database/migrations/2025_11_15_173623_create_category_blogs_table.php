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
        Schema::create('category_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_blogs');
    }

    private function dropCategoryBlogsTable(): void {
        if (!Schema::hasTable('category_blogs')){
            return;
        }
        
        // Matikan cek FK (opsional; aman kalau ada FK yang mengarah ke categories)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('category_blogs');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
