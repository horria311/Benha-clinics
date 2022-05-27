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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('bname');
            $table->unsignedBigInteger('clinic_id');
            $table->date('date');
            $table->time('time');
            $table->text('bmessage')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('Pregisters')->onDelete('cascade');

            $table->foreign('clinic_id')
            ->references('id')->on('Cregisters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
