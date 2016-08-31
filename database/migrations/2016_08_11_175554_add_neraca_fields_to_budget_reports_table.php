<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNeracaFieldsToBudgetReportsTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budget_reports', function(Blueprint $table) {

            $table->string('neraca_file_name')->nullable();
            $table->integer('neraca_file_size')->nullable()->after('neraca_file_name');
            $table->string('neraca_content_type')->nullable()->after('neraca_file_size');
            $table->timestamp('neraca_updated_at')->nullable()->after('neraca_content_type');

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

            $table->dropColumn('neraca_file_name');
            $table->dropColumn('neraca_file_size');
            $table->dropColumn('neraca_content_type');
            $table->dropColumn('neraca_updated_at');

        });
    }

}