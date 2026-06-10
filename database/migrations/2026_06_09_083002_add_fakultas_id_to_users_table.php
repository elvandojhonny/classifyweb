<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger('fakultas_id')
                  ->nullable()
                  ->after('role');

            $table->foreign('fakultas_id')
                  ->references('id')
                  ->on('fakultas')
                  ->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['fakultas_id']);
            $table->dropColumn('fakultas_id');

        });
    }
};