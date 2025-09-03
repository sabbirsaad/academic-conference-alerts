<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('search_terms', function (Blueprint $table) {
            $table->id();
            $table->string('terms');
            $table->integer('search_result')->default(0);
            $table->string('requester')->default('visitor');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('search_terms');
    }
};
