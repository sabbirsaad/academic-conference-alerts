<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('category_newsletter_subscribers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('newsletter_subscriber_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_newsletter_subscribers');
    }
};
