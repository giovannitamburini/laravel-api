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

            // deve essere nullable perchè in onDelete ho settato null
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            // FOREIGN KEY, riferita alla colonna id
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('set null');
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

            // eliminare la relazione delle righe tramite la foreign key
            // sintassi. nome Tabella, nome della colonna, foreign
            $table->dropForeign('projects_type_id_foreign');
            // eliminare la colonna
            $table->dropColumn('type_id');
        });
    }
};
