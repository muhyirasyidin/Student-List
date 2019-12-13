<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('student')->create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('rfid')->nullable();
            $table->string('photo')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nis')->unique();
            $table->string('full_name');
            $table->string('nick_name')->nullable();
            $table->enum('grade', ['SDTQ', 'SMP', 'SMA', 'ST']);
            $table->enum('current_grade', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3', 'Master', '-'])->default('-');
            $table->enum('gender', ['L', 'P']);
            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->enum('status', ['waiting-list', 'belum-aktif', 'aktif', 'tidak-aktif', 'lulus']);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
