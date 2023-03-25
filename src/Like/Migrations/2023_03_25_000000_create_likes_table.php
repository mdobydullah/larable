<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('larable_like.likes_table', 'larable_likes'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger(config('larable_like.user_foreign_key'))->index()->comment('user_id');
            $table->morphs('likeable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(config('larable_like.likes_table'));
    }
}
