<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('halaman', function (Blueprint $table) {
            $table->enum('status',['publish','draft'])
                  ->default('publish')
                  ->after('jawaban');
        });
    }

    public function down()
    {
        Schema::table('halaman', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
