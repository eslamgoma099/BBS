<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('point_id');
            $table->integer('point'); // The actual points awarded/deducted
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('classroom_id')->nullable();
            $table->text('reason')->nullable();
            $table->timestamp('date_awarded')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('point_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('class_rooms')->onDelete('set null');
            
            $table->index(['student_id', 'date_awarded']);
            $table->index(['teacher_id', 'date_awarded']);
            $table->index(['classroom_id', 'date_awarded']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_points');
    }
}