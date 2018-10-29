<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuildableTables extends Migration
{
    public function up()
    {
        Schema::create('comments', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('commentable_type');
            $table->integer('commentable_id')->unsigned();
            $table->mediumText('content')->nullable()->default(null);
            $table->unsignedInteger('comment_id')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('comments');
    }
}