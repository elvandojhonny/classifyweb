<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->text('campus_address')->nullable();

            $table->text('maps_link')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->dropColumn([
                'campus_address',
                'maps_link'
            ]);

        });
    }
};