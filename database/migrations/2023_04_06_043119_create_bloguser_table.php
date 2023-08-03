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
        Schema::create('bloguser', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('firstname',12);
            $table->string('lastname',12);
            $table->string('username',15);
            $table->string('email',30);
            $table->string('password',70);
            $table->string('avatar_src',300);
            $table->string('is_admin',2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bloguser');
    }
};
