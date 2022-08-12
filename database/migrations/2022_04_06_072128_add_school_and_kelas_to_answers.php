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
        Schema::table('answers', function (Blueprint $table) {
            //
            $table->foreignId('schools_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kelas_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            //
            $table->dropForeign(['schools_id']);
            $table->dropForeign(['kelas_id']);
            $table->dropColumn('schools_id');
            $table->dropColumn('kelas_id');
        });
    }
};
