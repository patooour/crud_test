<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->unsignedBigInteger('post_id')->nullable(true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('Cascade')->onDelete('set null');
            $table->foreign('post_id')->references('id')->on('posts')
                ->onUpdate('Cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
