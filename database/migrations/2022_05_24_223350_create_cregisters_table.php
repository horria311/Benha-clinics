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
        Schema::create('cregisters', function (Blueprint $table) {
            $table->id();
            $table->string('cname');
            $table->string('cemail');
            $table->string('cphone');
            $table->string('cnum');
            $table->string('Password');
            $table->string('Password_confirmation');
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
        Schema::dropIfExists('cregisters');
    }
};
