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
        // Schema::table('user_apps', function (Blueprint $table) {
        //     $table->string('avatar')->nullable();
        //     $table->string('provider')->nullable();
        //     $table->string('telegram_id')->nullable();
        //     $table->string('facebook_id')->nullable();
        //     $table->string('google_id')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('user_apps', function (Blueprint $table) {
        //     $table->dropColumn('avatar');
        //     $table->dropColumn('provider');
        //     $table->dropColumn('telegram_id');
        //     $table->dropColumn('facebook_id');
        //     $table->dropColumn('google_id');
        // });
    }
};
