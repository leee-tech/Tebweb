<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('drug_id');
            $table->unsignedBigInteger('disease_id');
            $table->text('usage_instruction');
            $table->text('feedback')->nullable();
            $table->string('date')->nullable();

            $table->foreign('book_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('drug_id')->references('id')->on('diseases')->onDelete('cascade');
            $table->foreign('disease_id')->references('id')->on('drugs')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}
