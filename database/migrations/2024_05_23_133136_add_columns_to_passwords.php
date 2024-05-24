<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('passwords', function (Blueprint $table) {
            $table->string('from_date')->nullable()->default('0000-00-00'); // Define the from_date column
            $table->string('to_date')->nullable()->default('0000-00-00'); // Define the to_date column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passwords', function (Blueprint $table) {
            //
        });
    }
};
