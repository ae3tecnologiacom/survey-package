<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forms.survey_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained('forms.surveys');
            $table->foreignId('question_id')->constrained('forms.questions');
            $table->json('answers');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms.survey_items');
    }
};
