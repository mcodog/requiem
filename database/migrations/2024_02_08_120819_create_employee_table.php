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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('lname');
            $table->string('fname');
            $table->string('address');
            $table->string('position');
            $table->integer('age');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('status_id');
            $table->foreign('class_id')->references('id')->on('employee_class');
            $table->foreign('status_id')->references('id')->on('employee_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
