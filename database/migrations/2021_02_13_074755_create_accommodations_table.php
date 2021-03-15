<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationsTable extends Migration
{
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->longText('grade_id')->nullable();
            $table->longText('designation_id')->nullable();
            $table->string('dhaka')->nullable();
            $table->string('divisional_town')->nullable();
            $table->string('other_area')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accommodations');
    }
}
