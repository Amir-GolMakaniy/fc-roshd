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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
			$table->string('image')->nullable();
			$table->string('name');
			$table->string('family');
			$table->string('father_name')->nullable();
			$table->string('national_code')->nullable()->unique();
			$table->string('phone')->nullable();
			$table->string('birthday')->nullable();
			$table->string('one_clothes')->nullable();
			$table->string('two_clothes')->nullable();
			$table->string('shoes')->nullable();
			$table->string('insurance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
