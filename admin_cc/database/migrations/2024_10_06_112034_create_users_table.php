<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing 'id' field
            $table->string('first_name'); // First name
            $table->string('middle_name')->nullable(); // Middle name (nullable)
            $table->string('last_name'); // Last name
            $table->string('email')->unique(); // Email (must be unique)
            $table->string('password'); // Password
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
