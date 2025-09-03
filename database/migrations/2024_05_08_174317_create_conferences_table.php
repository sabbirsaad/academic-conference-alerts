<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->longText('details');
            $table->timestamp('start_at');
            $table->timestamp('end_at')->nullable();
            $table->string('type');
            $table->string('url');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('featured_at')->nullable();
            $table->integer('views')->default(1);
            $table->foreignId('creator_id');
            $table->foreignId('approver_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conferences');
    }
};
