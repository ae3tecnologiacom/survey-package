<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forms.surveys', function (Blueprint $table) {
            $table->id();
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->foreignId('questionnaire_id')->constrained('forms.questionnaires');
            $table->foreignId('status_id')->constrained('forms.statuses');
            $table->string('answerable_type')->nullable()->default(null);
            $table->unsignedBigInteger('answerable_id')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms.surveys');
    }
};
