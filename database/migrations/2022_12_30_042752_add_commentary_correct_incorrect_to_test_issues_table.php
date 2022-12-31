<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommentaryCorrectIncorrectToTestIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_issues', function (Blueprint $table) {
            //カラム追加
            $table->longText('commentary');
            $table->integer('correct');
            $table->integer('incorrect');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_issues', function (Blueprint $table) {
            //
        });
    }
}
