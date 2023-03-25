<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('larable_vote.votes_table', 'larable_votes'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger(config('larable_vote.user_foreign_key'))->index()->comment('user_id');
            $table->integer('votes');
            $table->morphs('votable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(config('larable_vote.votes_table'));
    }
};
