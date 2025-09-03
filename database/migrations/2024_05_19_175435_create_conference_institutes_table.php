<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conference_institutes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conference_id');
            $table->foreignId('institute_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conference_institutes');
    }
};
