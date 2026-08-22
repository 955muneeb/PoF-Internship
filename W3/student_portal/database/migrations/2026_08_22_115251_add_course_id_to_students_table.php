<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('students', function (Blueprint $table) {
        // Drop the old string column
        $table->dropColumn('course');
        // Add the foreign key mapping to the courses table
        $table->foreignId('course_id')->nullable()->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('students', function (Blueprint $table) {
        $table->string('course');
        $table->dropForeign(['course_id']);
        $table->dropColumn('course_id');
    });
}
};
