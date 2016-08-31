<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddGambarFieldsToArticlesTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function(Blueprint $table) {

            $table->string('gambar_file_name')->nullable();
            $table->integer('gambar_file_size')->nullable()->after('gambar_file_name');
            $table->string('gambar_content_type')->nullable()->after('gambar_file_size');
            $table->timestamp('gambar_updated_at')->nullable()->after('gambar_content_type');

        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function(Blueprint $table) {

            $table->dropColumn('gambar_file_name');
            $table->dropColumn('gambar_file_size');
            $table->dropColumn('gambar_content_type');
            $table->dropColumn('gambar_updated_at');

        });
    }

}