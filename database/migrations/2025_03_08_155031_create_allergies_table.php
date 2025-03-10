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
        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('severity');
            $table->date('diagnosis_date');
            $table->string('treatment');
            $table->string('notes')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        if (Schema::hasTable('allergies')) {
            Schema::table('allergies', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
        }

        Schema::dropIfExists('allergies');
    }
};
