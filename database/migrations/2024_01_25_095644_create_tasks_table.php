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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->text('Description');
            $table->date('StartTime');
            $table->date('EndTime');
            $table->enum('status',['Assigned','Pending','Completed']);
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
