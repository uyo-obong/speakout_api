<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblcomplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcomplaints', function (Blueprint $table) {
            $table->increments('complaintNumber');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('categoryid')->nullable();
            $table->unsignedInteger('subcategoryid')->nullable();
            $table->string('state', 250)->nullable();
            $table->string('local_gov', 250)->nullable();
            $table->string('complaintType', 180);
            $table->string('noc');
            $table->longText('complaintDetails');
            $table->string('complaintFile');
            $table->string('regDate');
            $table->string('status')->default('In Progress');
            $table->string('lastUpdationDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblcomplaints');
    }
}
