<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->after('name')->nullable();
            $table->string('phone')->after('email')->nullable();
            $table->string('nid')->after('phone')->nullable();
            $table->string('designation')->after('nid')->nullable();
            $table->string('salary')->after('designation')->nullable();
            $table->string('grade')->after('salary')->nullable();
            $table->string('document')->after('grade')->nullable();
            $table->string('joining_date')->after('grade')->nullable();
            $table->string('address')->after('joining_date')->nullable();
            $table->longText('description')->after('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
