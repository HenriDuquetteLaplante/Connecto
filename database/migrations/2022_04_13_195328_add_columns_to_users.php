<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->dropColumn('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('is_active');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
            $table->string('name');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('is_active');

        });
    }
};
