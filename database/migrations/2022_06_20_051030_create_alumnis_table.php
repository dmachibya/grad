<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("userid");
            $table->string("name", 200);
            $table->string("admission", 200);
            $table->string("level", 200);
            $table->string("programme", 200);
            $table->string("address", 200);
            $table->string("country", 200);
            $table->string("gender", 200);
            $table->string("date_of_birth", 200);
            $table->string("address2", 200)->nullable();
            $table->string("email", 200);
            $table->string("email2", 200)->nullable();
            $table->string("phone", 200);
            $table->string("phone2", 200)->nullable();
            $table->string("employment", 200);
            $table->string("job_title", 200);
            $table->string("employment_country", 200);
            $table->string("anything", 200)->nullable();
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
        Schema::dropIfExists('alumnis');
    }
}
