<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forms.group_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('order_num')->nullable()->default(null);
            $table->foreignId('group_id')->constrained('forms.groups');
            $table->foreignId('question_id')->constrained('forms.questions');
            $table->string('condition')->nullable()->default(null);
            $table->boolean('required')->default(false);
            $table->json('custom_resource')->nullable()->default(null);
            $table->boolean('is_sensitive_data')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms.group_questions');
    }
};
