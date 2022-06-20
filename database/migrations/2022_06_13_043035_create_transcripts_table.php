<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranscriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcripts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("userid");
            $table->string("name", 200);
            $table->string("admission", 200);
            $table->string("programme", 200);
            $table->string("check_csee", 1);
            $table->string("admission_check", 1);
            $table->string("date_check", 1);
            $table->string("programme_check", 1);
            $table->string("award_check", 1);
            $table->string("gpa_check", 1);
            $table->string("grade_check", 1);
            $table->string("printed", 1);
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
        Schema::dropIfExists('transcripts');
    }
}
