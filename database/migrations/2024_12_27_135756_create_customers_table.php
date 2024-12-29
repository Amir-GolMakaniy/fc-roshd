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
			$table->string('name');
			$table->string('family');
			$table->string('national_code')->unique();
			$table->string('phone')->unique();
			$table->string('birthday');
			$table->boolean('one_clothes')->default(false);
			$table->boolean('two_clothes')->default(false);
			$table->boolean('shoes')->default(false);
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
