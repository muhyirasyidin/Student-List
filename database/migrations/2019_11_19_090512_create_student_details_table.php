<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('student')->create('student_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->string('nik')->nullable();
            $table->string('origin_school')->nullable();
            $table->text('origin_school_address')->nullable();
            $table->string('transfer_school')->nullable();
            $table->text('transfer_school_address')->nullable();
            $table->text('transfer_reason')->nullable();
            $table->integer('entry_date')->nullable();
            $table->integer('class_accepted')->nullable();
            $table->enum('religion', ['-', 'islam', 'kristen-protestan', 'katolik', 'hindu', 'buddha', 'kong-hu-cu'])->default('-');
            $table->enum('nationality', ['-', 'wni', 'wna'])->default('-');
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->integer('test_iq')->nullable();
            $table->date('test_iq_date')->nullable();
            $table->enum('living_with', ['-', 'sendiri', 'wali', 'orang-tua'])->default('-');
            $table->string('home_distance')->nullable();
            $table->string('daily_vehicle')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('student_email')->nullable();
            $table->string('province')->nullable();
            $table->string('regency')->nullable();
            $table->string('district')->nullable();
            $table->string('village')->nullable();
            $table->text('address')->nullable();
            $table->string('pos_zip')->nullable();
            $table->string('ijazah_number')->nullable();
            $table->string('ijazah_year')->nullable();
            $table->string('skhun_number')->nullable();
            $table->string('test_number')->nullable();
            $table->text('achievement')->nullable();
            $table->enum('bloodtype', ['-', 'a', 'b', 'o', 'ab'])->default('-');
            $table->string('illness_history')->nullable();
            $table->string('allergic_history')->nullable();
            $table->integer('child_number')->nullable();
            $table->integer('siblings')->nullable();
            $table->enum('child_condition_status', ['-', 'non-yatim-piatu', 'yatim', 'piatu', 'yatim-piatu'])->default('-');
            $table->enum('child_status', ['-', 'kandung', 'angkat'])->default('-');
            $table->enum('active_language', ['-', 'indonesia', 'english', 'arab'])->default('-');
            $table->string('family_card')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('nisn_card')->nullable();
            $table->string('healthy_certificate')->nullable();
            $table->string('graduation_certificate')->nullable();
            $table->string('skpi_certificate')->nullable();
            $table->string('sps_certificate')->nullable();
            $table->string('skpsa_certificate')->nullable();
            $table->string('skkbri_certificate')->nullable();
            $table->string('child_identity_card')->nullable();
            $table->string('transfer_certificate')->nullable();
            $table->string('disability')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_details');
    }
}
