<?php

use App\Models\File;
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
            $table->string('email')->nullable();
            $table->longText('about_me');
            $table->float('number_project');
            $table->float('profit');
            $table->float('Growth');
            $table->float('Fund');
            $table->longText('file')->nullable();
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
