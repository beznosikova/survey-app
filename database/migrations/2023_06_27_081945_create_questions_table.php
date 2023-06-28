<?php

use App\Enums\QuestionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('order');
            $table->text('content');
            $table->string('type')->default(QuestionType::SINGLE->value);
            $table->timestamps();

            $table->foreignId('survey_id')
                ->constrained()
                ->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
