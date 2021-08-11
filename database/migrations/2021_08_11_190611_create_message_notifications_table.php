<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_notifications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('chat_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('message_id');

            $table->boolean('is_seen')->default(false);
            $table->boolean('is_sender')->default(false);
            $table->boolean('flagged')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'message_id']);

            $table->foreign('message_id')
                ->references('id')->on('messages')
                ->onDelete('cascade');

            $table->foreign('chat_id')
                ->references('id')->on('chats')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
