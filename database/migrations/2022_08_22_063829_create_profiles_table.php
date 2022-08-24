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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('fax')->nullable();
            $table->string('mobile',11)->nullable();
            $table->longText('about_me');
            $table->bigInteger('number_project');
            $table->bigInteger('profit');
            $table->bigInteger('Growth');
            $table->bigInteger('Fund');
            $table->foreignIdFor(file::class);
            $table->softdeletes();
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
        Schema::dropIfExists('profiles');
    }
};
