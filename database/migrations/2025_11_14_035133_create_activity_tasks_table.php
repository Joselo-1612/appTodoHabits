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
        Schema::create('activity_tasks', function (Blueprint $table) {
            $table->id('ata_id');
            $table->string('ata_name');
            $table->string('ata_description')->nullable();
            $table->date('ata_date');
            $table->integer('ata_remind')->default(1);
            $table->integer('ata_is_done')->default(0);
            $table->integer('ata_status')->default(1);
            $table->foreignId('ata_act_id')->constrained('activities', 'act_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_tasks');
    }
};
