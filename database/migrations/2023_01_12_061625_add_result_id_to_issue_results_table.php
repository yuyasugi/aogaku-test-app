<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResultIdToIssueResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issue_results', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('result_id');
            $table->foreign('result_id')->references('id')->on('results');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issue_results', function (Blueprint $table) {
            //
        });
    }
}
