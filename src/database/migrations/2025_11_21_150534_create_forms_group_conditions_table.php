<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('forms.group_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('forms.groups');
            $table->integer('max_age')->nullable()->default(null);
            $table->integer('min_age')->nullable()->default(null);
            $table->unsignedBigInteger('nationality')->nullable()->default(null);
            $table->enum('allowed_genre', [
                'F', 'M', 'O'
            ]);
            $table->boolean('only_for_responsible_family')->default(false);
            $table->boolean('required_if_new_record')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms.group_conditions');
    }
};
