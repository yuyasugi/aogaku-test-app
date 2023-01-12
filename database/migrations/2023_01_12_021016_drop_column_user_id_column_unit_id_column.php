<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnUserIdColumnUnitIdColumn extends Migration
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
            $table->dropForeign('issue_results_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('issue_results_unit_id_foreign');
            $table->dropColumn('unit_id');
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
