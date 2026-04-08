<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE halaman 
            MODIFY status ENUM('draft','publish','archived','delete') 
            DEFAULT 'draft'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE halaman 
            MODIFY status ENUM('publish','draft') 
            DEFAULT 'publish'
        ");
    }
};