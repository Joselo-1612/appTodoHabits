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
        Schema::create('activity_sections', function (Blueprint $table) {
            $table->id('acs_id');
            $table->string('acs_name');
            $table->foreignId('acs_pro_id')->constrained('projects', 'pro_id');
            $table->integer('acs_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_sections');
    }
};
