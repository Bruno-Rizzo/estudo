<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('adv_name');
            $table->string('oab_number');
            $table->date('date')->default(NOW());
            $table->string('entrance');
            $table->string('exit')->nullable();
            $table->json('prisioner')->nullable();
            $table->json('identity')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
