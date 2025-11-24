<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forms.groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionnaire_id')->constrained('forms.questionnaires');
            $table->string('name')->index();
            $table->text('description')->nullable()->default(null);
            $table->integer('order_num')->nullable()->default(null);
            $table->boolean('enabled')->default(true);
            $table->string('condition')->nullable()->default(null);
            $table->text('hint')->nullable()->default(null);
            $table->integer('quantity_column_presentation')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms.groups');
    }
};
