<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBbs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbs', function (Blueprint $table) {
            //氏名、性別、年齢、投稿内容
            $table->bigIncrements('id');
            $table->string('your_name',20);
            $table->string('email',255);
            $table->string('url')->nullable($value =true);
            $table->boolean('gender');
            $table->tinyInteger('age');
            $table->string('contact',200);
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
        Schema::dropIfExists('bbs');
    }
}
