<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('source')->nullable();
            $table->string('name')->nullable();;
            $table->string('email')->nullable();;
            $table->string('phone')->nullable();;
            $table->text('address')->nullable();;
            $table->string('size')->nullable();;
            $table->string('color')->nullable();
            $table->string('paided')->nullable();
            $table->string('status')->nullable();
            $table->text('comment')->nullable();
            $table->string('fio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
