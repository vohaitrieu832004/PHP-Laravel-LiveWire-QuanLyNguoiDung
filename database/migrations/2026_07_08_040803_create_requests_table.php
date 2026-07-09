<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('request_type_id')->constrained('request_types')->cascadeOnDelete();
            $table->foreignId('processing_department_id')->constrained('departments')->cascadeOnDelete();
            $table->string('machine_location', 255);
            $table->text('description');
            $table->enum('priority', ['Thấp', 'Trung bình', 'Cao']);
            $table->date('request_date');
            $table->enum('status', ['Chờ phê duyệt', 'Đã phê duyệt', 'Từ chối', 'Đang xử lý', 'Hoàn thành'])->default('Chờ phê duyệt');
            $table->dateTime('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};