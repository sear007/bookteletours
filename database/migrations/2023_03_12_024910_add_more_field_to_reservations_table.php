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
        // Schema::table('reservations', function (Blueprint $table) {
        //     $table->string('req_time')->nullable();
        //     $table->string('tran_id')->unique()->nullable();
        //     $table->string('hash')->nullable();
        //     $table->json('hashData')->nullable();
        //     $table->string('payment_option')->nullable();
        //     $table->string('payment_status')->nullable();
        //     $table->boolean('payment_email_approved')->default(false);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('reservations', function (Blueprint $table) {
        //     $table->dropColumn('req_time');
        //     $table->dropColumn('tran_id');
        //     $table->dropColumn('payment_option');
        //     $table->dropColumn('payment_status');
        //     $table->dropColumn('hashData');
        //     $table->dropColumn('hash');
        // });
    }
};
