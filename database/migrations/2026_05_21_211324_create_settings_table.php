<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            $table->string('system_name')->nullable();

            $table->string('system_status')->default('ONLINE');

            $table->string('operational_hours')->nullable();

            $table->string('support_email')->nullable();

            $table->string('support_phone')->nullable();

            $table->text('running_text')->nullable();

            $table->text('welcome_description')->nullable();

            $table->text('maps_embed')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};