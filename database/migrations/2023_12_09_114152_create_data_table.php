<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('datatable', function (Blueprint $table) {
            $table->id();
            $table->string('code', 1024)
                ->default('');
            $table->string('name', 1024)
                ->default('');
            $table->string('level1', 1024)
                ->default('');
            $table->string('level2', 1024)
                ->default('');
            $table->string('level3', 1024)
                ->default('');
            $table->string('price', 1024)
                ->default('');
            $table->string('pricesp', 1024)
                ->default('');
            $table->string('amount', 1024)
                ->default('');
            $table->string('properties', 1024)
                ->default('');
            $table->string('purchases', 1024)
                ->default('');
            $table->string('unit', 1024)
                ->default('');
            $table->string('image', 1024)
                ->default('');
            $table->string('show_on_main', 1024)
                ->default('');
            $table->string('descr', 1024)
                ->default('');
            $table->timestamp('created_at')
                ->useCurrent();
            $table->timestamp('updated_at')
                ->useCurrent()
                ->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datatable');
    }
};
