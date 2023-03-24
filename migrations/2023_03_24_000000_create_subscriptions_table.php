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
        Schema::create(config('larable.subscribe.subscriptions_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger(config('larable.subscribe.user_foreign_key'))->index()->comment('user_id');
            $table->morphs('subscribable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists(config('larable.subscribe.subscriptions_table'));
    }
};
