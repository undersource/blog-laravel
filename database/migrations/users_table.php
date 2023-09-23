<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            $table->string('avatar');
            $table->string('name')->unique()->index();
            $table->string('email')->unique()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('bio');
            $table->rememberToken();
            $table->foreignId('role')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
};