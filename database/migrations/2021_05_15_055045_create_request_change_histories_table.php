<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestChangeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_change_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content_change',1000);
            $table->softDeletes();
            $table->unsignedBigInteger('request_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_change_histories');
    }
}
