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
        Schema::create('habit_completes', function (Blueprint $table) {
            $table->id('hac_id');
            $table->unsignedBigInteger('hac_hab_id')->index('idx_hac_hab_id');
            $table->date('hac_date');
            $table->integer('hac_status')->default(1);
            $table->text('hac_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habit_completes');
    }
};
