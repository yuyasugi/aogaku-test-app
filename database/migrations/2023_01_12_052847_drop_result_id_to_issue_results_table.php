<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropResultIdToIssueResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issue_results', function (Blueprint $table) {
            // 外部キー制約の削除
            $table->dropForeign('issue_results_result_id_foreign');
            // カラム削除
            $table->dropColumn('result_id');
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
