<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignTblUserIdProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('tbl_users', function (Blueprint $table) {
            $table->foreign('id_perfil')
            ->references('id')->on('tbl_profiles');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints('tbl_users', function (Blueprint $table) {
            $table->dropForeign('tbl_users_id_perfil_foreign');
        });
    }
}
