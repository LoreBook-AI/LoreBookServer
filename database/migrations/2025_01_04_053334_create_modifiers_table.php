<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(table: 'modifiers', callback: function (Blueprint $table): void {
            $table->id();
            $table->enum(
                column: 'advantage_disadvantage',
                allowed: [
                    'normal',
                    'advantage',
                    'disadvantage'
                ]
            )->default(value: 'normal');
            $table->integer(column: 'flat_bonus')->default(value: 0);
            $table->json(column: 'attribute');
            $table->unsignedBigInteger(column: 'modifiable_id');
            $table->string(column: 'modifiable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'modifiers');
    }
};
