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
        Schema::create('event_class_packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_class_id')->foreign()->references('id')->on('event_classes');
            $table->string('title')->nullable();
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('event_class_packages');
    }
};
