<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->dateTime('createDate');
            $table->char('status', 1);
            $table->dateTime('registerDate')->nullable();
            $table->boolean('active')->default(false);
            $table->unsignedBigInteger('children_id');
            $table->timestamps();

            $table->foreign('children_id')->references('id')->on('children')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}
