<?php

use App\Models\File;
use App\Models\Group;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->longtext('File')->nullable();
            $table->foreignIdFor(Group::class);
            $table->string('name');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longtext('body');
            $table->float('fee');
            $table->enum('status',['draft','published','deleted'])->default('draft');
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
        Schema::dropIfExists('crops');
    }
};
