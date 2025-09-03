<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('conference_visitors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conference_id');
            $table->string('requester')->default('visitor');
            $table->string('ip')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conference_visitors');
    }
};
