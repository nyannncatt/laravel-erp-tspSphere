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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('course');
            $table->string('grade');
            $table->timestamps(); // Laravel automatically adds created_at and updated_at
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('grades');
    }
    
};