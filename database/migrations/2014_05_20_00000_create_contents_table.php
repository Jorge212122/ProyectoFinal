<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedSmallInteger('duration')->default(0);
            $table->string('year', 4)->default('2000');
            $table->unsignedSmallInteger('seasons')->default(0);
            $table->string('image_path', 2048)->nullable();
            $table->string('link_path', 2048)->nullable();
            $table->timestamp('updated_at')->nullable();        
            $table->timestamp('created_at')->default(Carbon::now()->toDateTimeString());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
