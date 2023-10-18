<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnjigeTable extends Migration
{
    public function up()
    {
        Schema::create('knjige', function (Blueprint $table) {
            $table->id();
            $table->string('naslov');
            $table->string('autor');
            $table->integer('godina_izdanja');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('knjige');
    }
}
