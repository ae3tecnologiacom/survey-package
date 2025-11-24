<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forms.survey_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained('forms.surveys');
            $table->string('action')->nullable()->default(null);
            $table->json('data')->nullable()->default(null);
            $table->string('device')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms.survey_logs');
    }
};
