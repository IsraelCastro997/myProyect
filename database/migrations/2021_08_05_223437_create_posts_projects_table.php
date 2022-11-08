<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_projects');
    }
    public function up()
    {
        Schema::create('posts_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('set null')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('career_id');
            $table->foreign('career_id')->references('id')->on('careers');
            $table->json('tags')->nullable();
            $table->string('document')->nullable();
            $table->string('division');
            $table->string('priority');
            $table->string('schedule');
            $table->text('experience');
            $table->string('area');
            $table->text('notes')->nullable();
            $table->string('image')->nullable();
            $table->integer('likes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
}
