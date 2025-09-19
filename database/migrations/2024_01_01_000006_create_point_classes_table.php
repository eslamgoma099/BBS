<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('point_id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('classroom_id')->references('id')->on('class_rooms')->onDelete('cascade');
            $table->foreign('point_id')->references('id')->on('points')->onDelete('cascade');
            
            $table->unique(['classroom_id', 'point_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_classes');
    }
}