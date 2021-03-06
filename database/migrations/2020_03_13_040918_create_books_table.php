<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('isbn')->unique()->nullable();
            $table->string('img_url');
            $table->enum('status' , ['b' ,'g' , 'e']);

            $table->unsignedBigInteger('owner_user_id')->nullable()->index();
            $table->foreign('owner_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_published')->nullable();


            $table->unsignedBigInteger('t_handed_user_id')->nullable()->index()
                ->comment('t is meaning of temporary');
            $table->foreign('t_handed_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('t_handed_at', 0)->nullable()
                ->comment('t is meaning of temporary');


            $table->unsignedBigInteger('handed_in_user_id')->nullable()->index();
            $table->foreign('handed_in_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('handed_in_at', 0)->nullable();


            $table->unsignedBigInteger('library_id')->nullable();
            $table->foreign('library_id')->references('id')->on('librarys');

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
        Schema::dropIfExists('books');
    }
}
