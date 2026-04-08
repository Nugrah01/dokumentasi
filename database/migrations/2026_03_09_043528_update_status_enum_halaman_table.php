<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE halaman 
            MODIFY status ENUM('publish','draft','delete') 
            DEFAULT 'publish'
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