<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_additional_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id')->foreign()->references('id')->on('events');
            $table->string('title')->nullable();
            $table->integer('price')->default(0);
            $table->integer('order_by')->default(1);
            $table->string('status')->default('active')->comment('active, inactive');
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
        Schema::dropIfExists('event_additional_details');
    }
};
