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
        Schema::create('tour_types', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->nullable();
            $table->string('name')->nullable();
            $table->string('name_kh')->nullable();
            $table->double('price_solo', 8, 2)->nullable();
            $table->double('price_group', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('description_kh')->nullable();
            $table->text('short_description')->nullable();
            $table->text('short_description_kh')->nullable();
            $table->text('term_condition')->nullable();
            $table->text('term_condition_kh')->nullable();
            $table->text('tour_includes')->nullable();
            $table->text('tour_includes_kh')->nullable();
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
        Schema::dropIfExists('tour_types');
    }
};
