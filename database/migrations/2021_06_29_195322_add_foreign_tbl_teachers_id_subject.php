<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignTblTeachersIdSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_teachers', function (Blueprint $table) {
            $table->foreign('subject')
            ->references('id')->on('tbl_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints('tbl_teachers', function (Blueprint $table) {
            $table->dropForeign('tbl_teachers_subject_foreign');
        });
    }
}
