<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forms.questions', function (Blueprint $table) {
            $table->id();
            $table->string('label')->index();
            $table->boolean('enabled')->default(true);
            $table->json('mimes')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->foreignId('field_type_id')
                ->nullable()
                ->default(null)
                ->constrained('forms.field_types')
                ->nullOnDelete();
            $table->foreignId('input_type_id')
                ->nullable()
                ->default(null)
                ->constrained('forms.input_types')
                ->nullOnDelete();
            $table->text('hint')
                ->nullable()
                ->default(null);
            $table->string('placeholder')
                ->nullable()
                ->default(null);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms.questions');
    }
};
