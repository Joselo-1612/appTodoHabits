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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('pro_id');
            $table->unsignedBigInteger('pro_prg_id')->index('idx_pro_prg_id');
            $table->unsignedBigInteger('pro_use_id')->index('idx_pro_use_id');
            $table->string('pro_name');
            $table->text('pro_description')->nullable();
            $table->enum('pro_priority', ['p1', 'p2', 'p3', 'p4'])->default('p1');
            $table->integer('pro_status')->default(1);
            $table->
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
