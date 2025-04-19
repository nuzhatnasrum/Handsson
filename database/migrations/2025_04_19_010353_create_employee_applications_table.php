<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // assuming it's linked to a user
            $table->string('status')->default('pending'); // could be 'pending', 'approved', etc.
            $table->text('message')->nullable(); // optional field
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_applications');
    }
};
