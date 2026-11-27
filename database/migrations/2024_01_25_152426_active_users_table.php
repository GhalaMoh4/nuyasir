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
        Schema::create('Active_Users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('PhoneNum');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status');
            $table->string('created_at');
            $table->string('Id_iqama')->nullable();
            $table->string('UID')->nullable();
            $table->string('RDegree')->nullable();
            $table->string('CDegree')->nullable();
            $table->string('Rspe')->nullable();
            $table->string('applicationStatus');
            $table->string('applicationNum', 10)->nullable();
            $table->string('Job_status');


            $table->string('F_document');
         
            $table->string('rejection_reason')->nullable();
            $table->string('modification_reason')->nullable();




        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Active_Users');
    }
};
