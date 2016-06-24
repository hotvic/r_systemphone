<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveQuotaIdFieldFromQuotaRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quota_requests', function (Blueprint $table) {
            $table->dropForeign('quota_requests_quota_id_foreign');

            $table->dropColumn('quota_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quota_requests', function (Blueprint $table) {
            $table->integer('quota_id')->unsigned()->after('user_id');
        });
    }
}
