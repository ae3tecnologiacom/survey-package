<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forms.question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('option_id')->constrained('forms.options');
            $table->foreignId('question_id')->constrained('forms.questions');
            $table->integer('order_num')->nullable()->default(null);
            $table->boolean('enabled')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms.question_options');
    }
};
