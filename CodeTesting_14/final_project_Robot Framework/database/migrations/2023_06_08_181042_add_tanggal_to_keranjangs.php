<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('keranjangs', function (Blueprint $table) {
            $table->date('tanggal');
        });
    }


    public function down(): void
    {
        Schema::table('keranjangs', function (Blueprint $table) {
            //
        });
    }
};
