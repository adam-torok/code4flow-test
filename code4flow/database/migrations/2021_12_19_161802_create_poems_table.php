<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoemsTable extends Migration
{
    public function up()
    {
        Schema::create('poems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('title');
            $table->longText('text');
            $table->enum('status', ['WAITING', 'APPROVED', 'DECLINED'])->default('WAITING');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poems');
    }
}
