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
        Schema::create('tontines', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('profit');
            $table->integer('delay');
            $table->enum('periode', ['day', 'week', 'month', 'year']);
            $table->integer('amount');
            $table->integer('number_of_members');
            $table->text('description');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('suspension_date')->nullable();
            $table->text('suspension_reason')->nullable();
            $table->softDeletes();
            $table->foreignUuid('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tontines');
    }
};
