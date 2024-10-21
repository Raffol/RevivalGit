<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('createnews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('media')->nullable(); // Для хранения пути к медиафайлу
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('newsindex');
    }
}

