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
            $table->string('pro_name');
            $table->text('pro_description')->nullable();
            $table->enum('pro_priority', ['p1', 'p2', 'p3', 'p4'])->default('p1');
            $table->date('pro_date_start');
            $table->date('pro_date_end');
            $table->foreignId('pro_prg_id')->constrained('project_groups', 'prg_id');
            $table->foreignId('pro_use_id')->constrained('users', 'id');
            $table->integer('pro_status')->default(1);
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
