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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('class_id');
            $table->foreign("class_id")->references('id')->on("classes");
            $table->unsignedBigInteger('marque_id')->nullable();
            $table->foreign("marque_id")->references('id')->on("marques");
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign("type_id")->references('id')->on("types");
            $table->unsignedBigInteger('parentdevice_id');

            $table->string("n_série");
            $table->string("n_inventaire");
            $table->integer("ram");
            $table->integer("stockage");
            $table->string("os");
 
            $table->boolean("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
