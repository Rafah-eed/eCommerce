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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user');
            $table->string('f_name');
            $table->string('l_name');
            $table->enum('sex', ['M', 'F']);
			$table->date('date_of_birth');
			$table->text('address')->nullable();
			$table->boolean('delete')->default(false);
			$table->unique(['f_name', 'l_name']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
