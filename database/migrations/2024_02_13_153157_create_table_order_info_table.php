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
        Schema::create('order_info', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_ordered')->nullable(false);
            $table->timestamp('date_shipped')->nullable(true);
            $table->string('status');
            $table->unsignedBigInteger('employee_id')->nullable(true);
            $table->unsignedBigInteger('branch_id')->nullable(false);
            $table->unsignedBigInteger('customer_id')->nullable(true);

            $table->foreign('employee_id')->references('id')->on('employee');
            $table->foreign('branch_id')->references('id')->on('branch');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_order_info');
    }
};
