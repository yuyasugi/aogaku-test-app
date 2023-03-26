<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnNameColumnCorrectColumnIncorrectColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_issues', function (Blueprint $table) {
            //からむ削除
            $table->dropColumn('name');
            $table->dropColumn('correct');
            $table->dropColumn('incorrect');
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
