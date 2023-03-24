<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create(config('larable.follow.followers_table', 'followers'), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(config('larable.follow.user_foreign_key', 'user_id'))->index()->comment('user_id');
            if (config('larable.follow.uuids')) {
                $table->uuidMorphs('followable');
            } else {
                $table->morphs('followable');
            }

            $table->timestamp('accepted_at')->nullable();
            $table->timestamps();

            $table->index(['followable_type', 'accepted_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('larable.follow.followers_table', 'followers'));
    }
};
