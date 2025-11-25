<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forms.questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->text('description')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->boolean('address_required')->default(false);
            $table->boolean('allow_address')->default(false);
            $table->boolean('person_required')->default(false);
            $table->boolean('allow_person')->default(false);
            $table->boolean('enabled')->default(true);
            $table->string('questionnaireable_type')->nullable()->default(null);
            $table->unsignedBigInteger('questionnaireable_id')->nullable()->default(null);
            $table->timestamp('last_change');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms.questionnaires');
    }
};
