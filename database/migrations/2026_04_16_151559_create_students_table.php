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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();           // Nomor Induk Mahasiswa (unik)
            $table->string('name', 100);                    // Nama lengkap
            $table->string('email', 100)->unique();         // Email (unik)
            $table->string('major', 100);                   // Jurusan
            $table->integer('semester')->default(1);        // Semester
            $table->decimal('gpa', 3, 2)->nullable();       // IPK (misal: 3.75)
            $table->string('phone', 15)->nullable();        // Nomor telepon
            $table->text('address')->nullable();            // Alamat
            $table->timestamps();                           // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
