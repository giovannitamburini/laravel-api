<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id')->nullable()->after('id');

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();

            // come dovrebbe essere. perchè i progetti non dovrebbero avere user_id nullo,
            // $table->unsignedBigInteger('user_id')->after('id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropForeign('projects_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
};
