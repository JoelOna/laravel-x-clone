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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('background_image')->default('https://res.cloudinary.com/dzcbguuls/image/upload/v1727171094/x-clone/background-image/hzjnpyauguzc1apdcsln.jpg')
                                                        ->after('user_img');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('background_image');
        });
    }
};
