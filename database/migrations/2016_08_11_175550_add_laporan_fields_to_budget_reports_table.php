<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLaporanFieldsToBudgetReportsTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budget_reports', function(Blueprint $table) {

            $table->string('laporan_file_name')->nullable();
            $table->integer('laporan_file_size')->nullable()->after('laporan_file_name');
            $table->string('laporan_content_type')->nullable()->after('laporan_file_size');
            $table->timestamp('laporan_updated_at')->nullable()->after('laporan_content_type');

        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('budget_reports', function(Blueprint $table) {

            $table->dropColumn('laporan_file_name');
            $table->dropColumn('laporan_file_size');
            $table->dropColumn('laporan_content_type');
            $table->dropColumn('laporan_updated_at');

        });
    }

}