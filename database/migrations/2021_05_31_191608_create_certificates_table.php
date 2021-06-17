<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->string("address", 255);
            $table->string("phone", 18);
            $table->string("email", 100);
            $table->string("date_of_birth", 20);
            $table->string("place_of_birth", 100);
            $table->string("grade", 100);
            $table->string("programme", 100);
            $table->string("year_of_admission", 4);
            $table->string("registration_number", 15);
            $table->string("year_of_graduation", 4);
            $table->date("form_date");
            $table->string("passport_size", 255);
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
        Schema::dropIfExists('certificates');
    }
}
