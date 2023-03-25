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
        Schema::create(config('larable_subscribe.subscriptions_table', 'larable_subscriptions'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger(config('larable_subscribe.user_foreign_key'))->index()->comment('user_id');
            $table->morphs('subscribable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(config('larable_subscribe.subscriptions_table'));
    }
};
