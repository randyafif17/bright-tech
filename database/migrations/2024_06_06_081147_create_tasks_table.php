<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\TaskType;
use App\Enums\TaskStatus;
use App\Enums\PaymentStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('instagram_link')->nullable();
            $table->timestamp('visit_at')->nullable(); // Define custom timestamps separately
            $table->timestamp('post_at')->nullable(); // Define custom timestamps separately
            $table->enum('payment_status', [PaymentStatus::Unpaid->value, PaymentStatus::Paid->value])->default(PaymentStatus::Unpaid->value);
            $table->enum('type', [TaskType::ProductReview->value, TaskType::VisitStore->value])->default(TaskType::VisitStore->value);
            $table->enum('status', [TaskStatus::Todo->value, TaskStatus::OnProgress->value, TaskStatus::Done->value])->default(TaskStatus::Todo->value);
            $table->timestamps(); // This will automatically add created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
