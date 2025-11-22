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
        Schema::create('activity_x_tags', function (Blueprint $table) {
            $table->id('axt_id');
            $table->foreignId('axt_tag_id')->constrained('tags', 'tag_id');
            $table->foreignId('axt_act_id')->constrained('activities', 'act_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_x_tags');
    }
};
