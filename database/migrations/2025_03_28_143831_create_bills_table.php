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
            Schema::create('bills', function (Blueprint $table) {
                $table->increments('id');
                $table->string('customerId');
                $table->string('month');
                $table->string('year');
                $table->integer('initial');
                $table->integer('final');
                $table->integer('units');
                $table->integer('amount');
                $table->string('status');
                $table->unique(array('customerId','month', 'year'));
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
