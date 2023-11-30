<?php
// database/migrations/xxxx_xx_xx_create_properties_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_name');
            $table->decimal('rent', 10, 2);
            $table->decimal('management_fee', 10, 2);
            $table->decimal('security_deposit', 10, 2);
            $table->decimal('key_money', 10, 2);
            $table->string('location');
            $table->string('layout');
            $table->decimal('floor_area', 8, 2);
            $table->integer('floor_level');
            $table->integer('total_floors');
            $table->string('building_type');
            $table->integer('built_year');
            $table->string('structure');
            $table->text('facilities');
            $table->string('thumbnail_photo')->nullable();
            $table->enum('status', ['unpublished', 'published', 'contracted'])->default('unpublished');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
