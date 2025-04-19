<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('volunteer_applications', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->text('skills');
        $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        $table->string('cv')->nullable();
        $table->timestamps();
    });
}
};
