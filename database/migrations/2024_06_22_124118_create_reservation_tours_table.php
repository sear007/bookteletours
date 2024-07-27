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
        Schema::create('reservation_tours', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tour_type_id')->nullable();  //ok
            $table->bigInteger('branch_id')->nullable();  //ok
            $table->string('name')->nullable();  //ok
            $table->double('price', 8, 2)->nullable(); //ok
            $table->double('price_solo', 8, 2)->nullable(); //ok
            $table->double('price_group', 8, 2)->nullable(); //ok
            $table->integer('quantity_solo')->nullable(); //ok
            $table->integer('quantity_group')->nullable(); //ok
            $table->string('pick_location')->nullable(); //ok
            $table->string('date')->nullable(); //ok
            $table->string('time')->nullable(); //ok
            $table->string('telephone')->nullable(); //ok
            $table->string('email')->nullable(); //ok
            $table->string('commission')->nullable();
            $table->integer('status')->nullable();
            $table->string('req_time')->nullable(); //ok
            $table->string('tran_id')->unique(); //ok
            $table->string('hash')->nullable(); //ok
            $table->text('hashData')->nullable(); //ok
            $table->string('payment_option')->nullable(); //ok
            $table->string('payment_status')->nullable();
            $table->tinyInteger('payment_email_approved')->default(0);
            $table->dateTime('created')->nullable();
            $table->integer('created_by')->nullable();
            $table->dateTime('modified')->nullable();
            $table->integer('modified_by')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_tours');
    }
};
