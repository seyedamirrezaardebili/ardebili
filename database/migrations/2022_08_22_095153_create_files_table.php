<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Files', function (Blueprint $table) {
            $table->id();
            $table->float('size')->nullable();
            $table->string('dimension')->nullable();
            $table->string('url');
            $table->string('title')->nullable();
            $table->string('alt')->nullable();
            $table->string('extension',6)->nullable();
            $table->string('name');
            $table->enum('key', ['header', 'movie', 'down','up']);
            $table->enum('status',['draft','published','deleted']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
};
